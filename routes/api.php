<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ORMController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('users', UserController::class);
Route::apiResource('rols', RolController::class);
Route::apiResource('deliveries', DeliveryController::class);
Route::apiResource('vehicles', VehicleController::class);
Route::apiResource('companies', CompanyController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('services', ServiceController::class);
Route::apiResource('products', ProductController::class);
Route::apiResource('carts', CartController::class);
Route::apiResource('orders', OrderController::class);


//ORM
Route::get('/orm/relations/{model}', [ORMController::class, 'relations']);
