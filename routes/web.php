<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckRecordsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard',[DashboardController::class,'dashboard'])->middleware(['auth','verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Categories Routes
Route::resource('category',CategoryController::class)->middleware(['auth','verified']);

// Income Routes
Route::resource('income',IncomeController::class)->middleware(['auth','verified']);

// Expense Routes
Route::resource('expense',ExpenseController::class)->middleware(['auth','verified']);

// Records Showing Routes

Route::get('/records',[CheckRecordsController::class,'summaryPage'])->middleware(['auth','verified'])->name('records.summary');
Route::post('/calculate-records',[CheckRecordsController::class,'calculateRedcords'])->middleware(['auth','verified'])->name('records.calculate');



require __DIR__.'/auth.php';
