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
        return view('budget.index',['incomes' => Income::all(), 'expenses' =>Expenses::all()]); 
    }
    public function create()
    {
        
    
        return view('budget.create');
    }
    function store(Request $request)
    {
        $this->validate($request, [
            'name' =>'required',
            'amount' =>'required',
            'type' =>'required',
            'category' =>'required',
            'date' =>'required',
        ]);
        if($request->type == 'income'){
    $income = new Income;
         $income->type = $request->input('type');
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