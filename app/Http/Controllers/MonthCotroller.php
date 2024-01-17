<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Income;
use Illuminate\Support\Facades\Auth;
use App\Models\Expenses;
class MonthCotroller extends Controller
{
     public function index($month)
    {
        $user = Auth::user();

        $incomes = Income::filterIncomesByMonth($user->incomes(), $month)->get();
        $expenses = Expenses::filterExpensesByMonth($user->expenses(), $month)->get();

        $general_income = $user->generalIncome();
        $general_expenses = $user->generalExpenses();

        return view('nextmonth.index', compact('month', 'incomes', 'expenses', 'general_income', 'general_expenses'));
    }

}
