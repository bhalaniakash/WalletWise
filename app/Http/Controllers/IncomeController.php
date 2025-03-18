<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\incomeController as ModelsIncomeController;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{
    public function store(request $request)
    {
        $request->validate([
            'iname' => 'required|string|max:255',
            'iamount' => 'required|numeric|min:0',
            'idate' => 'required|date',
            'icategory' => 'required|exists:categories,id',
            'idescription' => 'nullable|string',
        ]);
        ModelsIncomeController::create([
            'user_id' => Auth::id(), // Get the currently authenticated user ID
            'source' => $request->input('iname'),
            'amount' => $request->input('iamount'),
            'date' => $request->input('idate'),
            'category_id' => $request->input('icategory'),
            'description' => $request->input('idescription'),
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Income added successfully!');
    }
}
