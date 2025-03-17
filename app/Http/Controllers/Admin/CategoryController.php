<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'income_name' => 'required|string|max:255',
            'income_type' => 'required|in:income,expense',
        ]);

        Category::create([
            'name' => $request->income_name,
            'type' => $request->income_type,
        ]);

        return redirect()->back()->with('success', 'Category added successfully!');
    }

    public function index()
    {
        $categories = Category::all();
        // dd($categories);
        return view('admin.showCategory', compact('categories'));
    }
}