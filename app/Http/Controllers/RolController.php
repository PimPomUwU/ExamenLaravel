<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $rols = Rol::included();

        //if ($request->wantsJson()) {
            return response()->json(['data' => $rols], 200);
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
            'name' => 'required|string|min:0',
        ]);

        $rol = Rol::create($validated);

        //if ($request->wantsJson()) {
            return response()->json(['data' => $rol], 201);
        //}

        //return redirect()->route('centers.index')->with('success', 'Centro creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Rol $rol)
    {
        //
                //if ($request->wantsJson()) {
            return response()->json(['data' => $rol], 200);
        //}

        //return view('center.show', compact('center'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rol $rol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rol $rol)
    {
        //
            $validated = $request->validate([
            'name' => 'required|string|min:0',
        ]);

        //$center->employee_manager_id = $request->employee_manager_id;


        $rol->update($validated);

        //if ($request->wantsJson()) {
            return response()->json(['data' => $rol], 200);
        //}

        //return redirect()->route('centers.index')->with('success', 'Rol actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Rol $rol)
    {
        //
        $rol->delete();

        //if ($request->wantsJson()) {
            return response()->json(['message' => 'Rol eliminado'], 200);
        //}

        //return redirect()->route('centers.index')->with('success', 'Rol eliminado');
    }
}
