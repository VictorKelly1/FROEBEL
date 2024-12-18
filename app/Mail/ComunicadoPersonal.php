<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
//
use Illuminate\Support\Facades\Session;

class ComunicadoPersonal extends Mailable
{
    use Queueable, SerializesModels;

    public $InfoMail;

    public function __construct($InfoMail)
    {
        //pasa los datos a la vista del correo para que se muestra ahi
        $this->InfoMail = $InfoMail;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $CorreoSesion = Session::get('Correo', 'ColegioFroebel@froebel.edu.mx');

        return new Envelope(
            from: new Address('$ColegioFroebel@froebel.edu.mx', 'Colegio Froebel.'),
            subject: 'Comunicado directo',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.Comunicado',
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
