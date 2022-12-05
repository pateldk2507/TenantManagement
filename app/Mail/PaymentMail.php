<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaymentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $rent,$dueDate,$tranId,$tName,$tEmail,$lName,$lEmail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($rent,$dueDate,$tranId,$tName,$tEmail,$lName,$lEmail)
    {
        $this->rent = $rent;
        $this->dueDate = $dueDate;
        $this->tranId = $tranId;
        $this->tName = $tName;
        $this->tEmail = $tEmail;
        $this->lName = $lName;
        $this->lEmail = $lEmail;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Payment Mail',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'mail.payment',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
