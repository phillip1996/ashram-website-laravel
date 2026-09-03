<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisitRequest;
use Illuminate\Http\Request;
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
            'status' => 'required|in:pending,confirmed,cancelled,completed',
        ]);

        $visitRequest->update([
            'status' => $request->status,
            'confirmed_at' => $request->status === 'confirmed' ? now() : null,
        ]);

        return back()->with('success', "Visit request status updated to {$request->status}.");
    }

    public function destroy(VisitRequest $visitRequest)
    {
        $name = $visitRequest->name;
        $visitRequest->delete();
        return back()->with('success', "Visit request from {$name} has been deleted.");
    }
}