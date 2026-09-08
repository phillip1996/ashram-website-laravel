<?php

namespace App\Mail;

use App\Models\VisitRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VisitRequestStatusUpdate extends Mailable
{
    use Queueable, SerializesModels;

    public $visitRequest;
    public $status;

    public function __construct(VisitRequest $visitRequest, $status)
    {
        $this->visitRequest = $visitRequest;
        $this->status = $status;
    }

    public function envelope(): Envelope
    {
        $subject = match($this->status) {
            'confirmed' => '✓ Visit Request Confirmed – The Lekki Ashram',
            'cancelled' => 'Visit Request Cancelled – The Lekki Ashram',
            default => 'Visit Request Update – The Lekki Ashram'
        };

        return new Envelope(
            subject: $subject,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.visit-status-update',
            with: [
                'visitRequest' => $this->visitRequest,
                'status' => $this->status,
            ]
        );
    }
}