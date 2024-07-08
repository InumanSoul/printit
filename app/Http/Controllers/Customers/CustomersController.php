<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomersController extends Controller
{
    public function index()
    {
        if (!Auth::user()){
            return response()->json(['error' => 'Unauthorized, you need to login first'], 401);
        }

        $company = Auth::user()->company_id;
        $customers = Customers::where('company_id', $company)->get();

        return response()->json($customers);
    }
}
