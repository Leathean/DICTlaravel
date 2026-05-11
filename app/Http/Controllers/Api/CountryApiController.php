<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Country::all();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       Country::create([
            'name' => $request->name,
        ]);
          return response()->json([
            'message' => 'Country created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Country::findOrFail($id)->update([
            'name' => $request->name,
        ]);

        return response()->json([
            'message' => 'Country updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $data = Country::findOrFail($id);
        $data->delete();
        return response()->json([
            'message' => 'Country deleted successfully'
        ]);
    }
}
