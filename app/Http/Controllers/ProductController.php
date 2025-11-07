<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::included()->filter()->sort()->getOrPaginate();

        //if ($request->wantsJson()) {
            return response()->json(['data' => $products], 200);
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

        $product = Product::create($validated);

        //if ($request->wantsJson()) {
            return response()->json(['data' => $product], 201);
        //}

        //return redirect()->route('centers.index')->with('success', 'Centro creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Product $product)
    {
        //
                //if ($request->wantsJson()) {
            return response()->json(['data' => $product], 200);
        //}

        //return view('center.show', compact('center'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
            $validated = $request->validate([
           'name' => 'required|string|min:0',
            'description' => 'required|string|min:0',

            'company_id' => 'required|exists:company,id',
            'category_id' => 'required|exists:category,id',

        ]);

        //$center->employee_manager_id = $request->employee_manager_id;


        $product->update($validated);

        //if ($request->wantsJson()) {
            return response()->json(['data' => $product], 200);
        //}

        //return redirect()->route('centers.index')->with('success', 'Product actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Product $product)
    {
        //
        $product->delete();

        //if ($request->wantsJson()) {
            return response()->json(['message' => 'Product eliminado'], 200);
        //}

        //return redirect()->route('centers.index')->with('success', 'Product eliminado');
    }
}
