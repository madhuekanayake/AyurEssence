<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SubscriptionReply extends Mailable
{
    use Queueable, SerializesModels;

    public $subjectText;
    public $messageBody;

    public function __construct($subject, $messageBody)
    {
        $this->subjectText = $subject;
        $this->messageBody = $messageBody;
    }

    public function envelope(): Envelope
    {
        return new Envelope(subject: $this->subjectText);
    }

    public function content(): Content
    {
        return new Content(view: 'emails.subscriptionReply');
    }
}
