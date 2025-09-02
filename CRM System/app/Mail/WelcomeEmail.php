<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;


    // constructor to pass data to the email
    public function __construct(User $user)
    {
        $this->user = $user;
    }


    // subject , sender of the mail
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Welcome Email',
        );
    }


    // content of the mail
    public function content(): Content
    {
        return new Content(
            view: 'mail.welcome',
            with: [
                'user' => $this->user,   // passing user to the view 
            ],
        );
    }


    // for attaching files
    public function attachments(): array
    {
        return [];
    }
}
