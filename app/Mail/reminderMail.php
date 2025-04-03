<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Http\Controllers\MailController;
use App\Models\reminder;

class reminderMail extends Mailable
{
    use Queueable, SerializesModels;
    public $reminderMessage;
    public reminder $reminder;
    public function __construct($reminderMessage, $reminder)
    {
        $this->reminderMessage = $reminderMessage;
        $this->reminder = $reminder;
    }
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Upcoming payment is due in 3 days',
        );
    }
    public function content(): Content
    {
        return new Content(
            view: 'Mail',
            with: [
                'userName' => $this->reminder->user->name ?? 'User',
                'dueAmount' => $this->reminder->reminder_amount ?? 'N\A',
                'dueDate' => $this->reminder->due_date ?? 'N\A',
            ]
        );
    }
    public function attachments(): array
    {
        return [];
    }
}
