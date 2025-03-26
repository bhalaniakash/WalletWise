<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Expense;
use App\Models\Income;

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
        return view('admin.showCategory', compact('categories'));
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        // Check if there's a default category for this type (income/expense)
        $defaultCategory = Category::firstOrCreate(
            ['name' => 'Other', 'type' => $category->type]
        );

        // Update all related records to use the default category
        Expense::where('category_id', $id)->update(['category_id' => $defaultCategory->id]);
        Income::where('category_id', $id)->update(['category_id' => $defaultCategory->id]);

        // Delete the category
        $category->delete();

        return redirect()->back()->with('success', 'Category deleted. Related records moved to "Other".');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.editCategory', compact('category')); // Return edit form view
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:income,expense', // Ensure the type is either "income" or "expense"
        ]);

        $category->update([
            'name' => $request->input('name'),
            'type' => $request->input('type'), // Updating the type as well
        ]);

        return redirect()->route('admin.categories')->with('success', 'Category updated successfully!');
    }
}
