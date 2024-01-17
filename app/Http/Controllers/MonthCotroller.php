<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Income;
use Illuminate\Support\Facades\Auth;
use App\Models\Expenses;
class MonthCotroller extends Controller
{
    public function index($month = null){
        $month = $month ?: now()->format('m');
        $month = is_numeric($month) ? $month : now()->format('m');

        $user = Auth::user();

        $incomesQuery = Income::where('user_id', $user->id);
        $filteredIncomes = Income::filterIncomesByMonth($incomesQuery, $month);
        $incomes = $filteredIncomes->get();
        
        $expensesQuery = Expenses::where('user_id', $user->id);
        $filteredExpenses = Expenses::filterExpensesByMonth($expensesQuery, $month);
        $expenses = $filteredExpenses->get();

        $general_income = $user->generalIncome();
        $general_expenses = $user->generalExpenses();
    
       
        return view('nextmonth.index', ['month' => $month,
        'incomes' => $incomes,
        'expenses' => $expenses,
        'general_income' => $general_income,
        'general_expenses' => $general_expenses]);
 

}
}