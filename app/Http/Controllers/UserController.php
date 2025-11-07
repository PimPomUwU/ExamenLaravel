<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

        $users = User::included()->filter()->sort()->getOrPaginate();

        //if ($request->wantsJson()) {
            return response()->json(['data' => $users], 200);
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
            'lastname' => 'required|string|min:0',
            'email' => 'required|string|min:0',
            'country' => 'required|string|min:0',
            'phone' => 'required|string|min:0',
            'password' => 'required|string|min:8',
        ]);

        // Hashear la contraseña antes de guardar
        $validated['password_hash'] = Hash::make($validated['password']);
        unset($validated['password']);

        $user = User::create($validated);

        //if ($request->wantsJson()) {
            return response()->json(['data' => $user], 201);
        //}

        //return redirect()->route('centers.index')->with('success', 'Centro creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, User $user)
    {
        //
        //if ($request->wantsJson()) {
            return response()->json(['data' => $user], 200);
        //}

        //return view('center.show', compact('center'));

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
    public function update(Request $request, User $user)
    {
        //
        $validated = $request->validate([
            'name' => 'required|string|min:0',
            'lastname' => 'required|string|min:0',
            'email' => 'required|string|min:0',
            'country' => 'required|string|min:0',
            'phone' => 'required|string|min:0',
            'password' => 'required|string|min:8',
        ]);

        //$center->employee_manager_id = $request->employee_manager_id;


        $user->update($validated);

        //if ($request->wantsJson()) {
            return response()->json(['data' => $user], 200);
        //}

        //return redirect()->route('centers.index')->with('success', 'User actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, User $user)
    {
        //
        $user->delete();

        //if ($request->wantsJson()) {
            return response()->json(['message' => 'User eliminado'], 200);
        //}

        //return redirect()->route('centers.index')->with('success', 'User eliminado');
    }

}
