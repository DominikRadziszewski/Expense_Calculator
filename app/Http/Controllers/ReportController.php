<?php

namespace App\Http\Controllers;

use App\Enums\ExpensesCategory;
use App\Enums\IncomeCategory;
use App\Http\Controllers\Controller;
use App\Models\Expenses;
use App\Models\Income;
use Illuminate\Support\Facades\Auth;


class ReportController extends Controller
{
    public function index($month)
    {
        $user = Auth::user();

        $incomes = Income::filterIncomesByMonth($user->incomes(), $month)->get();
        $expenses = Expenses::filterExpensesByMonth($user->expenses(), $month)->get();


        $income_labels = IncomeCategory::IncomeCategory;

        foreach ($income_labels as $income_label) {
            $totalAmount = $incomes->where('category', $income_label)->sum('amount');
            $income_values[$income_label] = $totalAmount;
        }

        $expenses_labels = ExpensesCategory::ExpensesCategory;

        foreach ($expenses_labels as $expenses_label) {
            $totalAmount = $expenses->where('category', $expenses_label)->sum('amount');
            $expenses_values[$expenses_label] = $totalAmount;
        }
        return view('report.index', compact('month', 'incomes', 'income_labels', 'income_values', 'expenses_labels', 'expenses_values'));
    }
}
