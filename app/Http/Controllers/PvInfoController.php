<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PvInfoController extends Controller
{
    public function index()
    {
        $pvInfos = PvInfo::all();
        return view('pvinfo.index', compact('pvInfos'));
    }

    public function create()
    {
        // Assuming you have a form to create PvInfo, create.blade.php
        return view('pvinfo.create');
    }

    public function store(Request $request)
    {
        // Validate the request and store the PvInfo
        $validatedData = $request->validate([
            'pv_event_id' => 'required',
            'pv_event_type_id' => 'required',
            // Add other validation rules based on your columns
        ]);

        PvInfo::create($validatedData);

        return redirect()->route('pvinfo.index')->with('success', 'PvInfo created successfully!');
    }

    public function edit($id)
    {
        $pvInfo = PvInfo::findOrFail($id);
        return view('pvinfo.edit', compact('pvInfo'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request and update the PvInfo
        $validatedData = $request->validate([
            'pv_event_id' => 'required',
            'pv_event_type_id' => 'required',
            // Add other validation rules based on your columns
        ]);

        $pvInfo = PvInfo::findOrFail($id);
        $pvInfo->update($validatedData);

        return redirect()->route('pvinfo.index')->with('success', 'PvInfo updated successfully!');
    }

    public function destroy($id)
    {
        $pvInfo = PvInfo::findOrFail($id);
        $pvInfo->delete();

        return redirect()->route('pvinfo.index')->with('success', 'PvInfo deleted successfully!');
    }
}
