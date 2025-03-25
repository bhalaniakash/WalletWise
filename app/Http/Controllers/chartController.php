<?php

namespace App\Http\Controllers;
use App\Models\Expense;
use App\Models\Income;
use Illuminate\Http\Request;

class chartController extends Controller
{


public function index()
{
    $monthlyIncome = Income::selectRaw('SUM(amount) as total, MONTH(created_at) as month')
        ->groupBy('month')
        ->pluck('total', 'month');

    $monthlyExpense = Expense::selectRaw('SUM(amount) as total, MONTH(created_at) as month')
        ->groupBy('month')
        ->pluck('total', 'month');

    return view('dashboard', compact('monthlyIncome', 'monthlyExpense'));
}

}
