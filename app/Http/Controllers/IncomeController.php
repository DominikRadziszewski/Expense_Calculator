<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Income;

class IncomeController extends Controller
{
    
        public function index()
        {
            $incomes = Income::all();
            return response()->json($incomes); 
        }
    
    
}
