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

        // Check if the category already exists
        $exists = Category::where('name', $request->income_name)
            ->where('type', $request->income_type)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Category already exists!');
        }

        Category::create([
            'name' => $request->income_name,
            'type' => $request->income_type,
        ]);

        return redirect()->back()->with('success', 'Category added successfully!');
    }

    public function index()
    {
        $categories = Category::all();
        // $categories = Category::paginate(10); // Paginate categories
        return view('admin.showCategory', compact('categories'));
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        // Ensure "Other-Expenses" category exists
        $otherExpensesCategory = Category::firstOrCreate(['name' => 'Other-Expenses']);

        // Ensure "Other-Incomes" category exists
        $otherIncomesCategory = Category::firstOrCreate(['name' => 'Other-Incomes']);

        // Reassign related records based on type
        Expense::where('category_id', $id)->update(['category_id' => $otherExpensesCategory->id]);
        Income::where('category_id', $id)->update(['category_id' => $otherIncomesCategory->id]);

        // Delete the category
        $category->delete();

        return back()->with('success', 'Category deleted. Expenses moved to Other-Expenses, Incomes moved to Other-Incomes.');
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
            'type' => 'required|in:income,expense',
        ]);

        // Check if the updated name already exists for the same type
        $exists = Category::where('name', $request->name)
            ->where('type', $request->type)
            ->where('id', '!=', $id)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Category with this name and type already exists!');
        }

        $category->update([
            'name' => $request->input('name'),
            'type' => $request->input('type'),
        ]);

        return redirect()->route('admin.categories')->with('success', 'Category updated successfully!');
    }
}
