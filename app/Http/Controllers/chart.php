<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;;
use App\Models\ExpenseController;
use App\Models\incomeController;
use Illuminate\Support\Facades\Auth;

class chart extends Controller
{
    public function index()
    {
        $userId = Auth::id(); // Get logged-in user's ID

        // Fetch total expense and income for the logged-in user
        $totalExpense = ExpenseController::where('user_id', $userId)->sum('amount');
        $totalIncome = incomeController::where('user_id', $userId)->sum('amount');

        
        // Pass data to the view
        return view('dashboard.dashboard', compact('totalExpense', 'totalIncome'));
    }
}
