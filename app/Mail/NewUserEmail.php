<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewUserEmail extends Mailable
{
    use Queueable;
    use SerializesModels;

    /**
     * Create a new message instance.
     */
    public $user;
    public $datos;
    public function __construct($user, $datos)
    {
        $this->user = $user;
        $this->datos = $datos;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Cuenta de acceso a Aeneta',
        );
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        return $this
            ->view('emails.newUserAccount');
    }
}
