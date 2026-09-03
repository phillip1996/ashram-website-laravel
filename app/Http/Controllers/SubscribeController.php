<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriptionConfirmation;
use App\Mail\NewSubscriberNotification;

class SubscribeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'max:255', Rule::unique('subscribers', 'email')],
        ]);

        $subscriber = Subscriber::create([
            'email' => $request->email,
            'subscribed_at' => now(),
        ]);

        // Send confirmation to subscriber
        Mail::to($subscriber->email)->send(new SubscriptionConfirmation($subscriber->email));

        // Send notification to admin
        Mail::to(config('mail.admin_email', 'admin@lekkiashram.com'))->send(new NewSubscriberNotification($subscriber->email));

        return back()->with('success', 'You have been subscribed successfully!');
    }
}