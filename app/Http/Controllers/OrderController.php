<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $orders = Order::all();

        //if ($request->wantsJson()) {
            return response()->json(['data' => $orders], 200);
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
            'phone' => 'required|string|min:0',

            'user_id' => 'required|exists:user,id',
            'product_id' => 'required|exists:product,id',
            'service_id' => 'required|exists:service,id',
            'company_id' => 'required|exists:company,id',
        ]);

        $order = Order::create($validated);

        //if ($request->wantsJson()) {
            return response()->json(['data' => $order], 201);
        //}

        //return redirect()->route('centers.index')->with('success', 'Centro creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Order $order)
    {
        //
                //if ($request->wantsJson()) {
            return response()->json(['data' => $order], 200);
        //}

        //return view('center.show', compact('center'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
            $validated = $request->validate([
            'phone' => 'required|string|min:0',

            'user_id' => 'required|exists:user,id',
            'product_id' => 'required|exists:product,id',
            'service_id' => 'required|exists:service,id',
            'company_id' => 'required|exists:company,id',

        ]);

        //$center->employee_manager_id = $request->employee_manager_id;


        $order->update($validated);

        //if ($request->wantsJson()) {
            return response()->json(['data' => $order], 200);
        //}

        //return redirect()->route('centers.index')->with('success', 'Order actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Order $order)
    {
        //
        $order->delete();

        //if ($request->wantsJson()) {
            return response()->json(['message' => 'Order eliminado'], 200);
        //}

        //return redirect()->route('centers.index')->with('success', 'Order eliminado');
    }
}
