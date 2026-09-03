<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewContactNotification;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        // Store in database
        $contact = ContactMessage::create($validated);

        // Send notification to admin
        Mail::to(config('mail.admin_email', 'admin@lekkiashram.com'))->send(new NewContactNotification($contact));

        return back()->with('success', 'Your message has been sent. We will get back to you soon.');
    }
}