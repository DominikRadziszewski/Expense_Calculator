<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Income;
use Illuminate\Support\Facades\Auth;

class BudgetController extends Controller
{
    public function index()
    {
        return view('budget.index',['incomes' => Income::all()]);
    }
    public function create()
    {
        
    
        return view('budget.create');
    }
    function store(Request $request)
    {
    $income = new Income;
        $income->name = $request->input('name');
        $income->amount = $request->input('amount');
        $income->category = $request->input('income_category');
        $income->date = $request->input('date');
        $income->user_id = auth()->id(); // Assuming you have a user_id column
 
        $income->save();
        return redirect()->route('budget.index');
    }
}