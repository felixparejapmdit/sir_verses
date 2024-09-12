<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\VerseExtractor;
use Illuminate\Support\Facades\Storage;

class VerseSearchController extends Controller
{
    public function index()
    {
        // Display the form without any data at first
        return view('search_management.verse_search');
    }

    public function import(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:docx|max:2048', // Restrict to .docx files only, max 2MB
        ]);

        // Store the uploaded file
        $path = $request->file('file')->store('uploads');

        // Get the full path to the stored file
        $filePath = storage_path('app/' . $path);

        // Extract the verses
        $versesData = VerseExtractor::extractVerses($filePath);

        // Pass the extracted data to the view
        return view('search_management.verse_search', compact('versesData'));
    }
}
