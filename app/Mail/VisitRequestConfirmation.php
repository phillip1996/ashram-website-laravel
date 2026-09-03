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

    public $request;

    public function __construct(VisitRequest $request)
    {
        $this->request = $request;
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
                'name' => $this->request->name,
                'visitType' => $this->request->visit_type,
                'date' => $this->request->preferred_date->format('F j, Y'),
                'time' => $this->request->preferred_time,
                'guests' => $this->request->guests,
            ],
        );
    }
}