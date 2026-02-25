<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;

class ContactFormSubmission extends Mailable implements ShouldQueue
{
    use Queueable;
    use SerializesModels;

    public function __construct(public array $payload)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Contact Form Submission - Codikal',
            replyTo: [
                new Address($this->payload['email'], $this->payload['name']),
            ],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-form-submission',
        );
    }
}
