<?php

namespace App\Http\Controllers\Expenses;

use App\Http\Controllers\Controller;
use App\Models\Expenses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = Auth::user()->company_id;

        $expenses = Expenses::where('company_id', '=', $company)->paginate(10);

        return response()->json($expenses);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $company = Auth::user()->company_id;

        $request->validate([
            'date' => 'required',
            'description' => 'required|min:3',
            'amount' => 'required',
            'category_id' => 'required',
        ]);

        try {
            $expense = new Expenses();
            $expense->company_id = $company;
            $expense->date = $request->date;
            $expense->description = $request->description;
            $expense->amount = $request->amount;
            $expense->category_id = $request;
            $expense->save();
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }

        $expense->tax()->sync($request->tax_ids);

        return response()->json($expense);
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
