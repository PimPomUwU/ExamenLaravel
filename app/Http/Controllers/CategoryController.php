<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::all();

        //if ($request->wantsJson()) {
            return response()->json(['data' => $categories], 200);
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
        ]);

        $category = Category::create($validated);

        //if ($request->wantsJson()) {
            return response()->json(['data' => $category], 201);
        //}

        //return redirect()->route('centers.index')->with('success', 'Centro creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Category $category)
    {
        //
                //if ($request->wantsJson()) {
            return response()->json(['data' => $category], 200);
        //}

        //return view('center.show', compact('center'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
            $validated = $request->validate([
            'brand' => 'required|string|min:0',

            'company_id' => 'required|exists:user,id',

        ]);

        //$center->employee_manager_id = $request->employee_manager_id;


        $category->update($validated);

        //if ($request->wantsJson()) {
            return response()->json(['data' => $category], 200);
        //}

        //return redirect()->route('centers.index')->with('success', 'Category actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Category $category)
    {
        //
        $category->delete();

        //if ($request->wantsJson()) {
            return response()->json(['message' => 'Category eliminado'], 200);
        //}

        //return redirect()->route('centers.index')->with('success', 'Category eliminado');
    }
}
