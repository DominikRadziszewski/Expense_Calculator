<?php

namespace App\Http\Controllers;

use App\Enums\IncomeCategory;
use App\Http\Controllers\Controller;
use App\Models\Expenses;
use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ReportController extends Controller
{
    public function index($month)
    {
        $user = Auth::user();

        $incomes = Income::filterIncomesByMonth($user->incomes(), $month)->get();
        $expenses = Expenses::filterExpensesByMonth($user->expenses(), $month)->get();


        $labels = IncomeCategory::IncomeCategory;

        foreach ($labels as $label)  {
            $totalAmount = $incomes->where('category', $label)->sum('amount');
            $values[$label] = $totalAmount;
        }
  
    
        return view('report.index', compact('month','incomes','labels','values'));


    }
}
