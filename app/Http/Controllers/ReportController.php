<?php

namespace App\Http\Controllers;

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
        $incomes = Income::where('user_id', $user->id)->get();
        $expenses = Expenses::where('user_id', $user->id)->get();

        $labels = [];
        $values = [];

        foreach ($incomes as $income) {
            $labels[] = $income->category;
            $values[] = $income->amount;
        }

        return view('report.index', [
            'labels' => $labels,
            'values' => $values,
        ]);
    }
}
