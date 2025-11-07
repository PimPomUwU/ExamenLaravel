<?php

use App\Http\Controllers\ORMController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('users', UserController::class);
Route::apiResource('rols', RolController::class);


//ORM
Route::get('/orm/relations/{model}', [ORMController::class, 'relations']);
