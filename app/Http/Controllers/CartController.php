<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $carts = Cart::all();

        //if ($request->wantsJson()) {
            return response()->json(['data' => $carts], 200);
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
            'quantity' => 'required|integer|min:0',

            'user_id' => 'required|exists:user,id',
            'product_id' => 'required|exists:product,id',
            'service_id' => 'required|exists:service,id',
        ]);

        $cart = Cart::create($validated);

        //if ($request->wantsJson()) {
            return response()->json(['data' => $cart], 201);
        //}

        //return redirect()->route('centers.index')->with('success', 'Centro creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Cart $cart)
    {
        //
                //if ($request->wantsJson()) {
            return response()->json(['data' => $cart], 200);
        //}

        //return view('center.show', compact('center'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
            $validated = $request->validate([
            'quantity' => 'required|integer|min:0',

            'user_id' => 'required|exists:user,id',
            'product_id' => 'required|exists:product,id',
            'service_id' => 'required|exists:service,id',

        ]);

        //$center->employee_manager_id = $request->employee_manager_id;


        $cart->update($validated);

        //if ($request->wantsJson()) {
            return response()->json(['data' => $cart], 200);
        //}

        //return redirect()->route('centers.index')->with('success', 'Cart actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Cart $cart)
    {
        //
        $cart->delete();

        //if ($request->wantsJson()) {
            return response()->json(['message' => 'Cart eliminado'], 200);
        //}

        //return redirect()->route('centers.index')->with('success', 'Cart eliminado');
    }
}
