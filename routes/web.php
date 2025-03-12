<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [RegisteredUserController::class, 'create'])->name('register');

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/dashboard/category',function(){
    return view('dashboard.category');
});
Route::get('/dashboard/income',function(){
    return view('dashboard.income');
});
Route::get('/dashboard/expense',function(){
    return view('dashboard.expense');
});
Route::get('/dashboard/incomeReport',function(){
    return view('dashboard.incomeReport');
});
Route::get('/dashboard/expenseReport',function(){
    return view('dashboard.expenseReport');
});
Route::get('/dashboard/savingReport',function(){
    return view('dashboard.savingReport');
});
Route::get('/dashboard/profile',function(){
    return view('dashboard.profile');
});