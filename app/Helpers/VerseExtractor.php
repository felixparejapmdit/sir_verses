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

        foreach ($phpWord->getSections() as $section) {
            foreach ($section->getElements() as $element) {
                if (method_exists($element, 'getRows')) {
                    foreach ($element->getRows() as $index => $row) {
                        $cells = $row->getCells();
                        if (count($cells) >= 3) {
                            $tagalog = self::extractTextFromCell($cells[1]);
                            $translation = self::extractTextFromCell($cells[2]);
                            $allRows[] = ['tagalog' => $tagalog, 'translation' => $translation];
                            $tagalogVerse = self::extractVerseFromText($tagalog);
                            $translationVerse = self::extractVerseFromText($translation);

                            if ($tagalogVerse || $translationVerse) {
                                $versePositions[] = count($allRows) - 1;
                            }
                        }
                    }
                }
            }
        }

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

    private static function extractVerseFromText($text) {
        $pattern = '/\b([1-3]?\s?[A-Za-z]{2,}\.?)\s?(\d+:\d+([-\d+,;\s]*\d*)*)\b/';
        preg_match($pattern, $text, $matches);
        return $matches[0] ?? '';
    }

    private static function highlightVerses($text) {
        $pattern = '/\b([1-3]?\s?[A-Za-z]{2,}\.?)\s?(\d+:\d+([-\d+,;\s]*\d*)*)\b/';
        return preg_replace($pattern, '<mark>$0</mark>', $text);
    }

    // Modified function to extract explanation
    private static function getExplanationFromPreviousRows($rows, $verseRowIndex, $isTagalog) {
    $explanation = '';
    $foundQuestion = false;

    // Reading upwards for explanations
    for ($i = $verseRowIndex - 1; $i >= 0; $i--) {
        $rowText = $isTagalog ? $rows[$i]['tagalog'] : $rows[$i]['translation'];
        
        // Stop appending rows when we find a verse, indicating the start of the next explanation
        if (self::extractVerseFromText($rowText)) {
            break;
        }

        // Skip rows that end with a period initially
        if (preg_match('/\.$/', trim($rowText))) {
            continue;
        }

        // If the row ends with a question mark or no question has been found yet, add it to the explanation
        if (preg_match('/\?$/', trim($rowText)) || !$foundQuestion) {
            $explanation = trim($rowText) . ' ' . $explanation;
            if (preg_match('/\?$/', trim($rowText))) {
                $foundQuestion = true;
            }
        }
    }

    // Reading downwards until another verse is found
    for ($i = $verseRowIndex + 1; $i < count($rows); $i++) {
        $rowText = $isTagalog ? $rows[$i]['tagalog'] : $rows[$i]['translation'];

        // Stop reading when the next verse mark is found
        if (self::extractVerseFromText($rowText)) {
            break;
        }

        // Append rows that don't end with a period or another verse
        if (!preg_match('/\.$/', trim($rowText))) {
            $explanation .= ' ' . trim($rowText);
        } else {
            break;
        }
    }

    return trim($explanation);
}

}
