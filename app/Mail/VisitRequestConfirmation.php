<?php

namespace App\Mail;

use App\Models\VisitRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VisitRequestConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $visitRequest;

    public function __construct(VisitRequest $visitRequest)
    {
        $this->visitRequest = $visitRequest;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Visit Request Received – The Lekki Ashram',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.visit-request-confirmation',
            with: [
                'name' => $this->visitRequest->name,
                'visitType' => $this->visitRequest->visit_type,
                'date' => $this->visitRequest->preferred_date instanceof \Carbon\Carbon 
                    ? $this->visitRequest->preferred_date->format('F j, Y') 
                    : \Carbon\Carbon::parse($this->visitRequest->preferred_date)->format('F j, Y'),
                'time' => $this->visitRequest->preferred_time,
                'guests' => $this->visitRequest->guests,
                'phone' => $this->visitRequest->phone,
                'requests' => $this->visitRequest->special_requests,
            ],
        );
    }
}