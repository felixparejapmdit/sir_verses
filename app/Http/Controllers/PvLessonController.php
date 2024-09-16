<?php

namespace App\Http\Controllers;

use App\Models\PvLesson;
use Illuminate\Http\Request;

class PvLessonController extends Controller
{
    public function index()
    {
        $lessons = PvLesson::all();
        return view('lessons', compact('lessons'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        PvLesson::create($request->all());

        return redirect()->route('lessons.index')->with('success', 'Lesson created successfully');
    }

    public function update(Request $request, PvLesson $lesson)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        $lesson->update($request->all());

        return redirect()->route('lessons.index')->with('success', 'Lesson updated successfully');
    }

    public function destroy(PvLesson $lesson)
    {
        $lesson->delete();

        return redirect()->route('lessons.index')->with('success', 'Lesson deleted successfully');
    }
}
