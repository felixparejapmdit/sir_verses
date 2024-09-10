<?php

namespace App\Http\Controllers;


use App\Models\PvEvent;
use Illuminate\Http\Request;

class PvEventController extends Controller
{
    public function index()
    {
        $events = PvEvent::all();
        return view('events', compact('events'));
    }

    public function create()
    {
        $events = PvEvent::all();
        return view('events', compact('events'));
    }

    public function store(Request $request)
    {
        // Validate and store the data
        // Add your validation and storage logic here
    }

    public function edit($id)
    {
        $event = PvEvent::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the data
        // Add your validation and update logic here
    }

    public function destroy($id)
    {
        $event = PvEvent::findOrFail($id);
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully');
    }
}
