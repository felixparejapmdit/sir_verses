<?php

namespace App\Http\Controllers;

use App\Models\LocaleCongregation;
use App\Models\District;
use Illuminate\Http\Request;

class LocaleCongregationController extends Controller
{
    public function index()
    {
        $localeCongregations = LocaleCongregation::with('district')->get();
        $districts = District::all();
        return view('locale_congregations', compact('localeCongregations', 'districts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'district_id' => 'required|exists:districts,id',
        ]);

        LocaleCongregation::create($request->all());

        return redirect()->route('locale_congregations.index')->with('success', 'Locale congregation created successfully');
    }

    public function update(Request $request, LocaleCongregation $localeCongregation)
    {
        $request->validate([
            'name' => 'required|max:255',
            'district_id' => 'required|exists:districts,id',
        ]);

        $localeCongregation->update($request->all());

        return redirect()->route('locale_congregations.index')->with('success', 'Locale congregation updated successfully');
    }

    public function destroy(LocaleCongregation $localeCongregation)
    {
        $localeCongregation->delete();

        return redirect()->route('locale_congregations.index')->with('success', 'Locale congregation deleted successfully');
    }
}
