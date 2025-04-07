<?php

namespace App\Http\Controllers;

use App\Models\contactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function store(request $request)
    {
        // dd('Contact Us form submitted!');
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        contactUs::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ]);

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
