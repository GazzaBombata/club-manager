<?php

namespace App\Mail;

use App\Models\Attendance;
use App\Models\Meeting;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Spatie\CalendarLinks\Link;
use DateTime;

class MeetingInvitation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct( public Meeting $meeting, public Attendance $attendance)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Meeting Invitation',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'meeting-invitation',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        // Creazione delle date per l'evento
        $from = new DateTime($this->meeting->meeting_date);
        $to = (clone $from)->modify('+2 hours'); // Durata di esempio di 2 ore

        // Crea il link dell'evento
        $link = Link::create(
            $this->meeting->meeting_name,
            $from,
            $to
        )->description($this->meeting->meeting_description)
            ->address($this->meeting->location);

        // Genera il file .ics da allegare
        $icsContent = $link->ics([], ['format' => 'file']);

        return [
            \Illuminate\Mail\Mailables\Attachment::fromData(fn () => $icsContent, 'meeting-invitation.ics')
                ->withMime('text/calendar'),
        ];
    }
}
