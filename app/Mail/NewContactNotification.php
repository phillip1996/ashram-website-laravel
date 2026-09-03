<?php

namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewContactNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $message;

    public function __construct(ContactMessage $message)
    {
        $this->message = $message;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Contact Message from ' . $this->message->name,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-notification',
            with: [
                'name'    => $this->message->name,
                'email'   => $this->message->email,
                'phone'   => $this->message->phone,
                'subject' => $this->message->subject,
                'body'    => $this->message->message,
            ],
        );
    }
}