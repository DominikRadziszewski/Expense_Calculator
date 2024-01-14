<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Income;
use Illuminate\Support\Facades\Auth;
use App\Models\Expenses;

class BudgetController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        $incomes = Income::where('user_id', $user->id)->get();
        $expenses = Expenses::where('user_id', $user->id)->get();
        $general_income = $user->generalIncome();
        $general_expenses = $user->generalExpenses();
    
        return view('budget.index', [
            'incomes' => $incomes,
            'expenses' => $expenses,
            'general_income' => $general_income,
            'general_expenses' => $general_expenses,
        ]);
    }
    public function create()
    {
        
        return view('budget.create');
    }
    function store(Request $request)
    {
        $this->validate($request, [
            'name' =>'required|',
            'amount' =>'required',
            'type' =>'required',
            'category' =>'required',
            'date' =>'required',
        ]);
        if($request->type == 'income'){
    $income = new Income;
        $income->name = $request->input('name');
        $income->amount = $request->input('amount');
        $income->category = $request->input('category');
        $income->date = $request->input('date');
        $income->user_id = auth()->id();
 
        $income->save();
        }else{
            $expense = new Expenses;
            $expense->name = $request->input('name');
            $expense->amount = $request->input('amount');
            $expense->category = $request->input('category');
            $expense->date = $request->input('date');
            $expense->user_id = auth()->id();

             $expense->save();
        }
        return redirect()->route('budget.index');
    }
}