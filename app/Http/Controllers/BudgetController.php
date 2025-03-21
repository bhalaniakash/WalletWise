<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Budget; 
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BudgetController extends Controller
{
    public function store(Request $request)
{
    
    $validatedData = $request->validate([
        'limit' => 'required|numeric',
        'saving' => 'required|numeric',
    ]);

    $user = Auth::user();
    if (!$user) {
        return redirect()->back()->with('error', 'User not authenticated.');
    }

    $existingBudget = Budget::where('user_id', $user->id)
                            ->whereYear('created_at', now()->year)
                            ->whereMonth('created_at', now()->month)
                            ->first();

    if ($existingBudget) {
        return redirect()->back()->with('error', 'You have already set a budget for this month.');
    }

    // Insert new budget including user_id
    Budget::create([
        'user_id' => $user->id,
        'limit' => $validatedData['limit'],
        'saving' => $validatedData['saving'],
    ]);

    return redirect()->back()->with('success', 'Budget created successfully!');

}
    
}
