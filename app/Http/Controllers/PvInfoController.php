<?php

namespace App\Http\Controllers;

use App\Models\PvInfo;
use App\Models\PvEvent;
use App\Models\PvEventType;
use Illuminate\Http\Request;

class PvInfoController extends Controller
{
    public function index()
    {
        // Get all PvInfo along with associated PvEvent and PvEventType
        $pvInfos = PvInfo::with(['pvEvent', 'pvEventType'])->get();
        $events = PvEvent::all(); // For the dropdown in the form
        $eventTypes = PvEventType::all(); // For the dropdown in the form

        return view('pvinfo', compact('pvInfos', 'events', 'eventTypes'));
        
    }

    public function create()
    {
        // Get the list of events and event types for the dropdowns
        $pvEvents = PvEvent::all();
        $pvEventTypes = PvEventType::all();

        return view('pvinfo.create', compact('pvEvents', 'pvEventTypes'));
    }

    public function store(Request $request)
    {
        // Validate and store the data
        $request->validate([
            'pv_event_id' => 'required',
            'pv_event_type_id' => 'required',
            'event_date' => 'required|date',
            'event_time' => 'required',
            'event_location' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        PvInfo::create($request->all());

        return redirect()->route('pvinfo.index')->with('success', 'PvInfo created successfully');
    }

    public function edit(PvInfo $pvInfo)
    {
        // Get the related PvEvent and PvEventType to populate the form dropdowns
        $pvEvents = PvEvent::all();
        $pvEventTypes = PvEventType::all();

        return view('pvinfo.edit', compact('pvInfo', 'pvEvents', 'pvEventTypes'));
    }

    public function update(Request $request, PvInfo $pvInfo)
    {
        // Validate and update the data
        $request->validate([
            'pv_event_id' => 'required',
            'pv_event_type_id' => 'required',
            'event_date' => 'required|date',
            'event_time' => 'required',
            'event_location' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $pvInfo->update($request->all());

        return redirect()->route('pvinfo.index')->with('success', 'PvInfo updated successfully');
    }

    public function destroy(PvInfo $pvInfo)
    {
        $pvInfo->delete();

        return redirect()->route('pvinfo.index')->with('success', 'PvInfo deleted successfully');
    }
}
