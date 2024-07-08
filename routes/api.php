<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users' , 'App\Http\Controllers\UserController@index');
Route::get('users/{id}' , 'App\Http\Controllers\UserController@show');
Route::apiResource('companies', 'App\Http\Controllers\Companies\CompaniesController');
Route::apiResource('customers', 'App\Http\Controllers\Customers\CustomersController');