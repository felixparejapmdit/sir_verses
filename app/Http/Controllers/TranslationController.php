<?php

namespace App\Http\Controllers;

use App\Models\Translation;
use Illuminate\Http\Request;

class TranslationController extends Controller
{
    public function index()
    {
        $translations = Translation::all();
        return view('translations', compact('translations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'abbrev' => 'required|max:255',
            'name' => 'required|max:255',
        ]);

        Translation::create($request->all());

        return redirect()->route('translations.index')->with('success', 'Translation created successfully');
    }

    public function update(Request $request, Translation $translation)
    {
        $request->validate([
            'abbrev' => 'required|max:255',
            'name' => 'required|max:255',
        ]);

        $translation->update($request->all());

        return redirect()->route('translations.index')->with('success', 'Translation updated successfully');
    }

    public function destroy(Translation $translation)
    {
        $translation->delete();

        return redirect()->route('translations.index')->with('success', 'Translation deleted successfully');
    }
}
