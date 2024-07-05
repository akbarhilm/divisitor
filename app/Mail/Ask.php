<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;

class Ask extends Mailable
{
    use Queueable, SerializesModels;

    public $undangan;
    public $pdf;

    /**
     * Create a new message instance.
     */
    public function __construct($undangan,$pdf)
    {
        $this->undangan = $undangan;
        $this->pdf = $pdf;
        //$this->tamu = $tamu;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(subject: config('app.name') . ' - Visitor');
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.invitation',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        
        return [
            Attachment::fromData(fn () => $this->pdf, 'Invitation.pdf')
                ->withMime('application/pdf'),
        ];
    }
}
