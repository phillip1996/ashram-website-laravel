<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::orderBy('created_at', 'desc')->get();
        return Inertia::render('Admin/Subscribers/Index', [
            'subscribers' => $subscribers,
        ]);
    }

    public function toggleActive(Subscriber $subscriber)
    {
        $subscriber->update(['is_active' => !$subscriber->is_active]);
        $status = $subscriber->is_active ? 'activated' : 'deactivated';
        return back()->with('success', "Subscriber {$subscriber->email} has been {$status}.");
    }

    public function destroy(Subscriber $subscriber)
    {
        $email = $subscriber->email;
        $subscriber->delete();
        return back()->with('success', "Subscriber {$email} has been deleted successfully.");
    }
}