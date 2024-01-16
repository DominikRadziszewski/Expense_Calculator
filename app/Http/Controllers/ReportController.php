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
    public function index()
    {
        $user = Auth::user();
    $incomesQuery = Income::where('user_id', $user->id);
    
    $date = now();
    $filteredIncomes = Income::filterIncomesByMonth($incomesQuery, 'm', $date);
    
    $incomes = $filteredIncomes->get();
        $expenses = Expenses::where('user_id', $user->id)->get();

        $labels = IncomeCategory::IncomeCategory;

        foreach ($labels as $label)  {
            $totalAmount = $incomes->where('category', $label)->sum('amount');
            $values[$label] = $totalAmount;
        }
    
    


        return view('report.index', [
            'labels' => $labels,
            'values' => $values,
        ]);
    }
}
