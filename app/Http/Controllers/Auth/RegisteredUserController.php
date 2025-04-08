<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => [
                'required',
                'confirmed',
                Rules\Password::defaults(),
                'regex:/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/'
            ],
            'age' => ['required', 'integer', 'min:15'],
            'contact' => ['required', 'digits:10'],
            // 'plan_type' => ['required', 'in:regular,premium'],
            'profile_picture' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
        ], [
            'name.regex' => 'The name should only contain letters and spaces.',
            'password.regex' => 'The password must contain at least one letter, one number, and one special character.',
            'contact.digits' => 'The contact number must be exactly 10 digits.',
            'profile_picture.required' => 'Image cannot be empty.',
            'profile_picture.image' => 'The uploaded file must be an image.',
            'profile_picture.mimes' => 'Only JPG, PNG, and JPEG formats are allowed.',
            'profile_picture.max' => 'The profile picture must not be larger than 2MB.',
        ]);

        $profilePicturePath = null;
        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'age' => $request->age,
            'contact' => $request->contact,
            // 'plan_type' => $request->plan_type,
            'profile_picture' => $profilePicturePath,
        ]);

        Auth::login($user);

        event(new Registered($user));

        return redirect(route('dashboard', absolute: false));
    }
    public function verifyNotice()
    {
        return view('auth.verify-email');
    }

    public function verifyHandler(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    }
    public function verifyEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect()->route('dashboard');
    }
}
