<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class members extends Controller
{
    public function destroy($id)
    {
        $category = User::find($id);
        $category->delete();
        return redirect()->back()->with('success', 'Category deleted successfully!');
    }
}
