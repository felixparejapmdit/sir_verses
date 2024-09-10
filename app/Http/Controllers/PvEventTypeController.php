<?php

namespace App\Http\Controllers;

use App\Models\PvEventType;
use Illuminate\Http\Request;

class PvEventTypeController extends Controller
{
    public function index()
    {
        $eventtypes  = PvEventType::all();

        return view('eventtypes', compact('eventtypes'));
    }

    public function create()
    {
        // Add logic if needed
        $eventtypes = PvEventType::all();

        return view('eventtypes', compact('eventtypes'));
    }

    public function store(Request $request)
    {
        PvEventType::create($request->all());

        // Add logic or redirect if needed
        return redirect()->route('pveventtypes.index');
    }

    public function edit(PvEventType $pvEventType)
    {
        return view('pveventtypes.edit', compact('pvEventType'));
    }

    public function update(Request $request, PvEventType $pvEventType)
    {
        $pvEventType->update($request->all());

        // Add logic or redirect if needed
        return redirect()->route('pveventtypes.index');
    }

    public function destroy(PvEventType $pvEventType)
    {
        $pvEventType->delete();

        // Add logic or redirect if needed
        return redirect()->route('pveventtypes.index');
    }
}
