<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public array $orderData,
    ) {}

    public function envelope(): Envelope
    {
        $type = $this->orderData['type'] === 'online' ? 'Cloud' : 'Bureau';

        return new Envelope(
            subject: "🛒 Nouvelle commande {$type} — " . ($this->orderData['phone'] ?? ''),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.new-order',
        );
    }
}
