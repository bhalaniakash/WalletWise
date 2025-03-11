<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('dashboard',function(){
    return view('dashboard.dashboard');
});
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