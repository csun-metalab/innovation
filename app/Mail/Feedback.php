<?php

namespace Helix\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request; 
use Illuminate\Contracts\Queue\ShouldQueue;

class Feedback extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    private $title, $email, $name, $body;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $feedback)
    {
        $this->email    =   $feedback->email;
        $this->title    =   $feedback->title;
        $this->name     =   $feedback->name;
        $this->body     =   $feedback->body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        return $this->from(config('mail.username'))
                    ->subject($this->title)
                    ->view('emails.feedback.pilot')
                    ->with([
                        'name' => $this->name,
                        'address' => $this->email,
                        'feedback' => $this->body
                    ]);
    }
}
