<?php

namespace App\Http\Controllers\Taxes;

use App\Http\Controllers\Controller;
use App\Models\Taxes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaxesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = Auth::user()->company_id;

        $taxes = Taxes::where('company_id', '=', $company)->orWhere('is_shared', true)->paginate(10);

        return response()->json($taxes);
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
        //
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
