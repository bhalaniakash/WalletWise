<?php

namespace App\Http\Controllers;
use App\Models\ExpenseController;
use App\Models\incomeController;
use Illuminate\Http\Request;

class chartController extends Controller
{


public function index()
{
    $monthlyIncome = incomeController::selectRaw('SUM(amount) as total, MONTH(created_at) as month')
        ->groupBy('month')
        ->pluck('total', 'month');

    $monthlyExpense = ExpenseController::selectRaw('SUM(amount) as total, MONTH(created_at) as month')
        ->groupBy('month')
        ->pluck('total', 'month');

    return view('dashboard', compact('monthlyIncome', 'monthlyExpense'));
}

}
