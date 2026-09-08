<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisitRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\VisitRequestStatusUpdate;
use Inertia\Inertia;

class VisitRequestController extends Controller
{
    public function index()
    {
        $requests = VisitRequest::orderBy('created_at', 'desc')->get();
        return Inertia::render('Admin/VisitRequests/Index', [
            'requests' => $requests,
        ]);
    }

    public function updateStatus(Request $request, VisitRequest $visitRequest)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        $oldStatus = $visitRequest->status;
        $newStatus = $request->status;

        // Update the status
        $visitRequest->status = $newStatus;
        
        // Set confirmed_at timestamp only when status changes to confirmed
        if ($newStatus === 'confirmed' && $oldStatus !== 'confirmed') {
            $visitRequest->confirmed_at = now();
        } elseif ($newStatus !== 'confirmed') {
            $visitRequest->confirmed_at = null;
        }
        
        $visitRequest->save();

        // Send email notification to the visitor when status changes
        if ($oldStatus !== $newStatus) {
            try {
                Mail::to($visitRequest->email)->send(new VisitRequestStatusUpdate($visitRequest, $newStatus));
            } catch (\Exception $e) {
                \Log::error('Failed to send status update email: ' . $e->getMessage(), [
                    'visit_request_id' => $visitRequest->id,
                    'email' => $visitRequest->email,
                    'status' => $newStatus,
                ]);
            }
        }

        $statusMessages = [
            'pending' => 'pending review',
            'confirmed' => 'confirmed ✓',
            'cancelled' => 'cancelled ✗',
        ];

        return back()->with('success', "Visit request is now {$statusMessages[$newStatus]}.");
    }

    public function destroy(VisitRequest $visitRequest)
    {
        $name = $visitRequest->name;
        $visitRequest->delete();
        return back()->with('success', "Visit request from {$name} has been deleted.");
    }
}