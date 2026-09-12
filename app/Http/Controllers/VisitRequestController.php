<?php

namespace App\Http\Controllers;

use App\Models\VisitRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use App\Mail\VisitRequestConfirmation;
use App\Mail\NewVisitRequestNotification;

class VisitRequestController extends Controller
{
    /**
     * Valid values for visitType across both entry points:
     * - the About page's "Schedule a Visit" modal (meditation, retreat)
     * - the Programs page's "Enroll Now" modal (program slugs)
     */
    protected const VALID_VISIT_TYPES = [
        'meditation',
        'retreat',
        'meditation-retreats',
        'advaita-study',
        'eco-conservation',
        'satsang',
        'wellness',
        'lectures',
    ];

    public function store(Request $request)
    {
        $validated = $request->validate([
            'visitType' => ['required', Rule::in(self::VALID_VISIT_TYPES)],
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'guests' => 'required|integer|min:1|max:20',
            'requests' => 'nullable|string|max:1000',
        ]);

        // Create visit request
        $visitRequest = VisitRequest::create([
            'visit_type' => $validated['visitType'],
            'preferred_date' => $validated['date'],
            'preferred_time' => $validated['time'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'guests' => $validated['guests'],
            'special_requests' => $validated['requests'],
            'status' => 'pending',
        ]);

        // Send confirmation to user
        Mail::to($visitRequest->email)->send(new VisitRequestConfirmation($visitRequest));

        // Send notification to admin
        Mail::to(config('mail.admin_email', 'admin@lekkiashram.com'))->send(new NewVisitRequestNotification($visitRequest));

        return back()->with('success', 'Your visit request has been sent. We will confirm within 24 hours.');
    }
}