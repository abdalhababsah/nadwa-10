<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject($this->data['subject'])
                    ->from('info@alnadwaarchitects.com', 'Al Nadwa Architects')
                    ->replyTo($this->data['email'], $this->data['name'])
                    ->view('emails.contact')->with([
                        'name' => $this->data['name'],
                        'email' => $this->data['email'],
                        'subject' => $this->data['subject'],
                        'messageBody' => $this->data['message'],
                    ]);
    }
}
