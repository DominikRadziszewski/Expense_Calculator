<?php

use App\Http\Controllers\IncomeController;
use App\Http\Controllers\MonthCotroller;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/budget', [App\Http\Controllers\BudgetController::class, 'index'])->name('budget.index');
Route::get('/budget/create', [App\Http\Controllers\BudgetController::class, 'create'])->name('budget.create');
Route::post('/budget/store', [App\Http\Controllers\BudgetController::class, 'store'])->name('budget.store');
Route::delete('/budget/{id}', [App\Http\Controllers\BudgetController::class, 'destroy'])->name('budget.destroy');

Route::get('/report/{month}', [ReportController::class, 'index'])->name('report.index');

Route::match(['get', 'post'], '/budget/{month}', [MonthCotroller::class, 'index'])->name('nextmonth.index');


