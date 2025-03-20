<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\User;

use Illuminate\Http\Request;

class UpdateCategory extends Controller
{
    public function edit($id)
    {
        $category = category::find($id);
        return view('admin.UpdateCategory', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('admin.categories')->with('success', 'Category updated successfully!');
    }
}