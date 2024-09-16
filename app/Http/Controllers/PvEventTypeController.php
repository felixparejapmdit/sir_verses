<?php

namespace App\Http\Controllers;

use App\Models\PvEvent;
use App\Models\PvEventType;
use Illuminate\Http\Request;

class PvEventTypeController extends Controller
{
    public function index()
    {
        $eventtypes = PvEventType::with('pvEvent')->get(); // Load related event
        $events = PvEvent::all(); // Get the events for the dropdown

        return view('eventtypes', compact('eventtypes', 'events'));
    }

    public function store(Request $request)
    {
        // Validate the data
        $request->validate([
            'pv_event_id' => 'required|exists:pv_events,id', // Event must exist
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Create new event type
        PvEventType::create($request->all());

        return redirect()->route('eventtypes.index')->with('success', 'Event type added successfully');
    }

    public function update(Request $request, PvEventType $eventtype)
    {
        // Validate the data
        $request->validate([
            'pv_event_id' => 'required|exists:pv_events,id', // Event must exist
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Update the event type
        $eventtype->update($request->all());

        return redirect()->route('eventtypes.index')->with('success', 'Event type updated successfully');
    }

    public function destroy(PvEventType $eventtype)
    {
        // Delete the event type
        $eventtype->delete();

        return redirect()->route('eventtypes.index')->with('success', 'Event type deleted successfully');
    }
}
