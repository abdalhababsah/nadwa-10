<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactUsController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);
    
        // Send the email using the Mailable
        Mail::to('info@alnadwaarchitects.com')->send(new ContactMail($validated));
    
        return redirect()->route('contact')->with('success', 'Your message has been sent successfully!');
    }
}