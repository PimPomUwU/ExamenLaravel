<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $vehicles = Company::all();

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
            'company_name' => 'required|string|min:0',

            'user_id' => 'required|exists:delivery,id',
        ]);

        $company = Company::create($validated);

        //if ($request->wantsJson()) {
            return response()->json(['data' => $company], 201);
        //}

        //return redirect()->route('centers.index')->with('success', 'Centro creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Company $company)
    {
        //
                //if ($request->wantsJson()) {
            return response()->json(['data' => $company], 200);
        //}

        //return view('center.show', compact('center'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        //
            $validated = $request->validate([
            'company_name' => 'required|string|min:0',

            'user_id' => 'required|exists:delivery,id',

        ]);

        //$center->employee_manager_id = $request->employee_manager_id;


        $company->update($validated);

        //if ($request->wantsJson()) {
            return response()->json(['data' => $company], 200);
        //}

        //return redirect()->route('centers.index')->with('success', 'Company actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Company $company)
    {
        //
        $company->delete();

        //if ($request->wantsJson()) {
            return response()->json(['message' => 'Company eliminado'], 200);
        //}

        //return redirect()->route('centers.index')->with('success', 'Company eliminado');
    }
}
