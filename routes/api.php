<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('companies', 'App\Http\Controllers\Companies\CompaniesController');
    Route::apiResource('customers', 'App\Http\Controllers\Customers\CustomersController');
});
