<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewLeadMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public array $leadData,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '📩 Nouveau lead — ' . ($this->leadData['name'] ?? 'Contact'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.new-lead',
        );
    }
}
