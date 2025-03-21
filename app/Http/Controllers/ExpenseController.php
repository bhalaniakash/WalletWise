<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\ExpenseController as ModelsExpenseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{
    public function store(Request $request)
    {
        
        $request->validate([
            'expense_name' => 'required|string|max:255', // ✅ Match form input
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
            'category_id' => 'required|exists:categories,id', // ✅ Match DB column
            'payment_method' => 'required|string|max:50',
            'description' => 'nullable|string',        
        ]);
        // dd($request->all());
        
        ModelsExpenseController::create([
            'user_id' => Auth::id(), // ✅ Correct user ID retrieval
            'expense_name' => $request->input('expense_name'), // ✅ Correct field names
            'amount' => $request->input('amount'),
            'date' => $request->input('date'),
            'category_id' => $request->input('category_id'),
            'payment_method' => $request->input('payment_method'),
            'description' => $request->input('description'),
        ]);

        // ✅ Redirect back with success message
        return redirect()->back()->with('success', 'Expense added successfully!');
    }

    
}

