<?php

namespace App\Helpers;

use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Element\TextRun;

class VerseExtractor {
    public static function extractVerses($filePath) {
        if (!file_exists($filePath)) {
            throw new \Exception('File not found: ' . $filePath);
        }

        try {
            $phpWord = IOFactory::load($filePath);
        } catch (\Exception $e) {
            throw new \Exception('Error loading file: ' . $e->getMessage());
        }

        $versesData = [];
        $allRows = [];
        $versePositions = [];

        // Iterate over the document to collect all rows and verses
        foreach ($phpWord->getSections() as $section) {
            foreach ($section->getElements() as $element) {
                if (method_exists($element, 'getRows')) {
                    foreach ($element->getRows() as $index => $row) {
                        $cells = $row->getCells();
                        if (count($cells) >= 3) {
                            $tagalog = self::extractTextFromCell($cells[1]);
                            $translation = self::extractTextFromCell($cells[2]);
                            $allRows[] = ['tagalog' => $tagalog, 'translation' => $translation];

                            // Detect verses in both tagalog and translation
                            $tagalogVerse = self::extractVerseFromText($tagalog);
                            $translationVerse = self::extractVerseFromText($translation);

                            if ($tagalogVerse || $translationVerse) {
                                $versePositions[] = count($allRows) - 1; // Mark the verse positions
                            }
                        }
                    }
                }
            }
        }

        // Now, we go through all the detected verse positions and extract their explanations
        foreach ($versePositions as $position) {
            $verse = $allRows[$position];
            $tagalogExplanation = self::getExplanationFromPreviousRows($allRows, $position, true);
            $translationExplanation = self::getExplanationFromPreviousRows($allRows, $position, false);

            $versesData[] = [
                'verse' => self::highlightVerses($verse['tagalog']),
                'tagalog_explanation' => $tagalogExplanation,
                'translation_explanation' => $translationExplanation
            ];
        }

        return $versesData;
    }

    // Helper function to extract text from different types of elements
    private static function extractTextFromCell($cell) {
        $text = '';
        foreach ($cell->getElements() as $element) {
            if (method_exists($element, 'getText')) {
                $text .= $element->getText();
            } elseif ($element instanceof TextRun) {
                foreach ($element->getElements() as $childElement) {
                    if (method_exists($childElement, 'getText')) {
                        $text .= $childElement->getText();
                    }
                }
            }
        }
        return $text;
    }

    // Function to extract Bible verse references from text
    private static function extractVerseFromText($text) {
        $pattern = '/\b([1-3]?\s?[A-Za-z]{2,}\.?)\s?(\d+:\d+([-\d+,;\s]*\d*)*)\b/';
        preg_match($pattern, $text, $matches);
        return isset($matches[0]) ? $matches[0] : '';
    }

    // Function to highlight Bible verses in the text
    private static function highlightVerses($text) {
        $pattern = '/\b([1-3]?\s?[A-Za-z]{2,}\.?)\s?(\d+:\d+([-\d+,;\s]*\d*)*)\b/';
        return preg_replace($pattern, '<mark>$0</mark>', $text);
    }

    // Function to extract the explanation from both previous and following rows
 // Function to extract the explanation from both previous and following rows
// Function to extract the explanation from both previous and following rows
private static function getExplanationFromPreviousRows($rows, $verseRowIndex, $isTagalog) {
    $explanation = '';
    $foundQuestion = false;
    $verseText = $isTagalog ? $rows[$verseRowIndex]['tagalog'] : $rows[$verseRowIndex]['translation'];

    // Reading upwards for explanations (limit to 1-4 rows before the verse)
    for ($i = $verseRowIndex - 1, $count = 0; $i >= 0 && $count < 4; $i--, $count++) {
        $rowText = $isTagalog ? $rows[$i]['tagalog'] : $rows[$i]['translation'];

        // If the row ends with a period, stop reading upwards
        if (preg_match('/\.$/', trim($rowText))) {
            break;
        }

        // If the row ends with a question mark or no question has been found yet, add it to the explanation
        if (preg_match('/\?$/', trim($rowText)) || !$foundQuestion) {
            // Ensure that duplicate rows are not included
            if (strpos($explanation, trim($rowText)) === false) {
                $explanation = trim($rowText) . ' ' . $explanation;
            }
            if (preg_match('/\?$/', trim($rowText))) {
                $foundQuestion = true;
            }
        }
    }

    // Append the verse to the explanation after detecting the last statement or question
    $explanation .= ' ' . trim($verseText);

    // Reading downwards until another verse is found
    $nextVerseFound = false;
    for ($i = $verseRowIndex + 1; $i < count($rows); $i++) {
        $rowText = $isTagalog ? $rows[$i]['tagalog'] : $rows[$i]['translation'];

        // Stop reading when the next verse mark is found
        if (self::extractVerseFromText($rowText)) {
            $nextVerseFound = true;
            break;
        }

        // Ensure that repeated rows are cleared out or not added again
        if (strpos($explanation, trim($rowText)) === false) {
            $explanation .= ' ' . trim($rowText);
        } else {
            // Clear out the repeated row
            $explanation = str_replace(trim($rowText), '', $explanation);
        }
    }

    return trim($explanation);
}


}
