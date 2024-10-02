<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LocaleCongregation;

class LocaleCongregationController extends Controller
{
    /**
     * Get a list of all Locale Congregations or filtered by district_id.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

        public function index()
    {
        $locale_congregations = LocaleCongregation::all();
        return view('locale_congregations', compact('locale_congregations'));
    }


    /**
     * Get the details of a single Locale Congregation by its ID.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $localeCongregation = LocaleCongregation::find($id);

        if (!$localeCongregation) {
            return response()->json(['error' => 'Locale Congregation not found'], 404);
        }

        return response()->json($localeCongregation, 200);
    }

    /**
     * Store a new Locale Congregation.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'district_id' => 'required|exists:districts,id',
        ]);

        // Create a new Locale Congregation
        $localeCongregation = LocaleCongregation::create([
            'name' => $request->name,
            'district_id' => $request->district_id,
        ]);

        return response()->json($localeCongregation, 201); // 201 means "Created"
    }

    /**
     * Update an existing Locale Congregation.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        // Find the Locale Congregation by ID
        $localeCongregation = LocaleCongregation::find($id);

        if (!$localeCongregation) {
            return response()->json(['error' => 'Locale Congregation not found'], 404);
        }

        // Validate the request data
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'district_id' => 'sometimes|required|exists:districts,id',
        ]);

        // Update the Locale Congregation
        $localeCongregation->update($request->only('name', 'district_id'));

        return response()->json($localeCongregation, 200);
    }

    /**
     * Delete a Locale Congregation.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $localeCongregation = LocaleCongregation::find($id);

        if (!$localeCongregation) {
            return response()->json(['error' => 'Locale Congregation not found'], 404);
        }

        // Delete the Locale Congregation
        $localeCongregation->delete();

        return response()->json(['message' => 'Locale Congregation deleted successfully'], 200);
    }
}
