<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('customers', 'App\Http\Controllers\Customers\CustomersController')->middleware('auth:sanctum');
Route::apiResource('companies', 'App\Http\Controllers\Customers\CompaniesController')->middleware('auth:sanctum');
Route::apiResource('categories', 'App\Http\Controllers\Categories\CategoriesController')->middleware('auth:sanctum');
Route::apiResource('products', 'App\Http\Controllers\Products\ProductsController')->middleware('auth:sanctum');
