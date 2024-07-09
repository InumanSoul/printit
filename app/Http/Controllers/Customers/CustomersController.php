<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use Illuminate\Http\Request;



class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $company = Auth::user()->company_id;
        $customers = Customers::get(['id', 'name', 'email', 'phone', 'address', 'document'])->all();

        return response()->json($customers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customers::find($id);

        return response()->json($customer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
