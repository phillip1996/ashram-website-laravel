<?php

namespace App\Mail;

use App\Models\VisitRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewVisitRequestNotification extends Mailable
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
            subject: 'New Visit Request from ' . $this->request->name,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.visit-request-notification',
            with: [
                'id' => $this->request->id,
                'name' => $this->request->name,
                'email' => $this->request->email,
                'phone' => $this->request->phone,
                'visitType' => $this->request->visit_type,
                'date' => $this->request->preferred_date->format('F j, Y'),
                'time' => $this->request->preferred_time,
                'guests' => $this->request->guests,
                'requests' => $this->request->special_requests,
            ],
        );
    }
}