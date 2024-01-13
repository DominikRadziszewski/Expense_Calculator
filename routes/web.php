<?php

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
Route::post('/budget/store', [App\Http\Controllers\BudgetController::class,'store'])->name('budget.store');