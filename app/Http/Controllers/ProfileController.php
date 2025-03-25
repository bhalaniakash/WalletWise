<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }
    
    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
{
    $request->validate([
        'name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,' . Auth::id()],
        'age' => ['required', 'integer', 'min:15'],
        'contact' => ['required', 'digits:10'],
        'profile_picture' => ['nullable', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
    ], [
        'name.regex' => 'The name should only contain letters and spaces.',
        'contact.digits' => 'The contact number must be exactly 10 digits.',
        'profile_picture.image' => 'The uploaded file must be an image.',
        'profile_picture.mimes' => 'Only JPG, PNG, and JPEG formats are allowed.',
        'profile_picture.max' => 'The profile picture must not be larger than 2MB.',
    ]);

    $user = \App\Models\User::find(Auth::id());

    if ($request->hasFile('profile_picture')) {
        $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
        $user->profile_picture = $profilePicturePath;
    }

    $user->name = $request->name;
    $user->email = $request->email;
    $user->age = $request->age;
    $user->contact = $request->contact;
    $user->save();

    return back()->with('status', 'profile-updated');
}

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
