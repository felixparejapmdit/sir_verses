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
        $pvInfos = PvInfo::with(['pvEvent', 'pvEventType'])->get();
        $events = PvEvent::all();
        $eventTypes = PvEventType::all();

        return view('pvinfo', compact('pvInfos', 'events', 'eventTypes'));
    }

    public function store(Request $request)
    {
        PvInfo::create($request->all());

        return redirect()->route('pvinfo.index')->with('success', 'Pv Info created successfully');
    }

    public function update(Request $request, PvInfo $pvInfo)
    {
        $pvInfo->update($request->all());

        return redirect()->route('pvinfo.index')->with('success', 'Pv Info updated successfully');
    }

    public function destroy(PvInfo $pvInfo)
    {
        $pvInfo->delete();

        return redirect()->route('pvinfo.index')->with('success', 'Pv Info deleted successfully');
    }
}
