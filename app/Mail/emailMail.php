<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class emailMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public string $name, public string $email, public string $content,)
    {
        //
    }

    /**
     * Get the message envelope.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('contact from e-learning-pro')
            ->replyTo($this->email)
            ->markdown('emails.mail');
    }

    
}
