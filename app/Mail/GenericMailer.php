<?php

namespace Helix\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use Illuminate\Contracts\Queue\ShouldQueue;

class GenericMailer extends Mailable
{
    use Queueable, SerializesModels;

    public $subject, $data, $view;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(String $view, Array $data, String $subject)
    {
        $this->view = $view;
        $this->subject = $subject;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.username'))
                    ->subject($this->subject)
                    ->view($this->view)
                    ->with($this->data);
    }
}
