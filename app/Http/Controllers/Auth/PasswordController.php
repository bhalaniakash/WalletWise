<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'string', 'min:8', 'regex:/^(?=.*[0-9])(?=.*[\W_]).+$/', 'confirmed'],
        ], [
            'password.regex' => 'The password must contain at least one number and one special character.',
        ]);
    
        $user = Auth::user();
        if (!$user instanceof User) {
            return back()->withErrors(['user' => 'Authenticated user is not valid.']);
        }
        $user->password = Hash::make($request->password);
        $user->password = bcrypt($request->password);
        $user->save();
    
        return back()->with('status', 'password-updated');
    }
    
}
