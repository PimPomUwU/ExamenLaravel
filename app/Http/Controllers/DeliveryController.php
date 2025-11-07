<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
  /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

        $deliveries = Delivery::included()->filter()->sort()->getOrPaginate();

        //if ($request->wantsJson()) {
            return response()->json(['data' => $deliveries], 200);
        //}

        //return view('center.index' => 'required|string|min:0', compact('centers'));
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
        //'required|string|min:0'
        $validated = $request->validate([
        'gender' => 'required|string|min:0',
        'birth_date' => 'required|string|min:0',
        'vehicle_type' => 'required|string|min:0',
        'dni_document_front' => 'required|string|min:0',
        'dni_document_back' => 'required|string|min:0',
        'driving_license' => 'required|string|min:0',
        'transit_license' => 'required|string|min:0',
        'mandatory_insurance' => 'required|string|min:0',
        'profile_photo' => 'required|string|min:0',

        'user_id' => 'required|exists:users,id',

        ]);


        $delivery = Delivery::create($validated);

        //if ($request->wantsJson()) {
            return response()->json(['data' => $delivery], 201);
        //}

        //return redirect()->route('centers.index')->with('success' => 'required|string|min:0', 'Centro creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Delivery $delivery)
    {
        //
        //if ($request->wantsJson()) {
            return response()->json(['data' => $delivery], 200);
        //}

        //return view('center.show' => 'required|string|min:0', compact('center'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Delivery $delivery)
    {
        //
        $validated = $request->validate([
        'gender' => 'required|string|min:0',
        'birth_date' => 'required|string|min:0',
        'vehicle_type' => 'required|string|min:0',
        'dni_document_front' => 'required|string|min:0',
        'dni_document_back' => 'required|string|min:0',
        'driving_license' => 'required|string|min:0',
        'transit_license' => 'required|string|min:0',
        'mandatory_insurance' => 'required|string|min:0',
        'profile_photo' => 'required|string|min:0',

        'user_id' => 'required|exists:users,id',
        ]);

        //$center->employee_manager_id = $request->employee_manager_id;


        $delivery->update($validated);

        //if ($request->wantsJson()) {
            return response()->json(['data' => $delivery], 200);
        //}

        //return redirect()->route('centers.index')->with('success' => 'required|string|min:0', 'Delivery actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Delivery $delivery)
    {
        //
        $delivery->delete();

        //if ($request->wantsJson()) {
            return response()->json(['message' => 'Delivery eliminado'], 200);
        //}

        //return redirect()->route('centers.index')->with('success' => 'required|string|min:0', 'Delivery eliminado');
    }

}
