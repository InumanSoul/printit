<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Models\Companies;
use Illuminate\Support\Facades\Auth;

class CompaniesController extends Controller
{
    public function index()
    {
        $company = Auth::user()->company_id;
        $companies = Companies::where('id', $company)->get();

        return response()->json($companies);
    }
}
