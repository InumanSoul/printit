<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:sanctum', 'role:admin']], function () {
    Route::apiResource('contacts', 'App\Http\Controllers\Contacts\ContactsController');
    Route::apiResource('companies', 'App\Http\Controllers\Customers\CompaniesController');
    Route::apiResource('categories', 'App\Http\Controllers\Categories\CategoriesController');
    Route::apiResource('products', 'App\Http\Controllers\Products\ProductsController');
    Route::apiResource('expenses', 'App\Http\Controllers\Expenses\ExpensesController');
    Route::apiResource('taxes', 'App\Http\Controllers\Taxes\TaxesController');
});

