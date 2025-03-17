<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count();
        $users = User::all();
        if (!isset($totalUsers)) {
            $totalUsers = 0;
        }
        return view('admin.dashboard', compact('totalUsers', 'users'));
    }
}
