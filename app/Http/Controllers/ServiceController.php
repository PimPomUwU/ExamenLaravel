<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $services = Service::included()->filter()->sort()->getOrPaginate();

        //if ($request->wantsJson()) {
            return response()->json(['data' => $services], 200);
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
            'description' => 'required|string|min:0',

            'company_id' => 'required|exists:company,id',
            'category_id' => 'required|exists:category,id',
        ]);

        $service = Service::create($validated);

        //if ($request->wantsJson()) {
            return response()->json(['data' => $service], 201);
        //}

        //return redirect()->route('centers.index')->with('success', 'Centro creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Service $service)
    {
        //
                //if ($request->wantsJson()) {
            return response()->json(['data' => $service], 200);
        //}

        //return view('center.show', compact('center'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        //
            $validated = $request->validate([
           'name' => 'required|string|min:0',
            'description' => 'required|string|min:0',

            'company_id' => 'required|exists:company,id',
            'category_id' => 'required|exists:category,id',

        ]);

        //$center->employee_manager_id = $request->employee_manager_id;


        $service->update($validated);

        //if ($request->wantsJson()) {
            return response()->json(['data' => $service], 200);
        //}

        //return redirect()->route('centers.index')->with('success', 'Service actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Service $service)
    {
        //
        $service->delete();

        //if ($request->wantsJson()) {
            return response()->json(['message' => 'Service eliminado'], 200);
        //}

        //return redirect()->route('centers.index')->with('success', 'Service eliminado');
    }
}
