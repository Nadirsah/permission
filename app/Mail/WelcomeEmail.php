<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use App\Models\User;
use App\Models\MailModel;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */ public $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }


    /**
     * Get the message envelope.
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Nproduction',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content()
    {
        $text = MailModel::first();
        
        return new Content(
            view: 'admin.mail.sendmail',
            with: [
                'text' => $text ,
               'user' => $this->user,// Məlumatları düzgün formatda ötürün
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
