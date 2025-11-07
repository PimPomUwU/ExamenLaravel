<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $vehicles = Vehicle::included()->filter()->sort()->getOrPaginate();

        //if ($request->wantsJson()) {
            return response()->json(['data' => $vehicles], 200);
        //}

        //return view('center.index', compact('centers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'brand' => 'required|string|min:0',

            'delivery_id' => 'required|exists:delivery,id',
        ]);

        $vehicle = Vehicle::create($validated);

        //if ($request->wantsJson()) {
            return response()->json(['data' => $vehicle], 201);
        //}

        //return redirect()->route('centers.index')->with('success', 'Centro creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Vehicle $vehicle)
    {
        //
                //if ($request->wantsJson()) {
            return response()->json(['data' => $vehicle], 200);
        //}

        //return view('center.show', compact('center'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        //
            $validated = $request->validate([
            'brand' => 'required|string|min:0',

            'delivery_id' => 'required|exists:delivery,id',

        ]);

        //$center->employee_manager_id = $request->employee_manager_id;


        $vehicle->update($validated);

        //if ($request->wantsJson()) {
            return response()->json(['data' => $vehicle], 200);
        //}

        //return redirect()->route('centers.index')->with('success', 'Vehicle actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Vehicle $vehicle)
    {
        //
        $vehicle->delete();

        //if ($request->wantsJson()) {
            return response()->json(['message' => 'Vehicle eliminado'], 200);
        //}

        //return redirect()->route('centers.index')->with('success', 'Vehicle eliminado');
    }
}
