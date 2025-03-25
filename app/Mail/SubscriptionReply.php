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

    /**
     * Create a new message instance.
     *
     * @param string $subject
     * @param string $messageBody
     */
    public function __construct($subject, $messageBody)
    {
        $this->subjectText = $subject;
        $this->messageBody = $messageBody;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.subscriptionReply')
            ->subject($this->subjectText)
            ->with([
                'messageBody' => $this->messageBody,
                'recipientName' => 'Subscriber', // Placeholder name
            ]);
    }
}
