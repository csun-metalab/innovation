<?php

declare(strict_types=1);

namespace Helix\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GenericMailer extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $data;
    public $view;
    public $replyTo;

    /**
     * Create a new message instance.
     *
     * @param string $view
     * @param array  $data
     * @param string $subject
     */
    public function __construct(String $view, array $data, String $subject, array $replyTo)
    {
        $this->view = $view;
        $this->subject = $subject;
        $this->data = $data;
        $this->replyTo = $replyTo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from(config('mail.username'))
                    ->replyTo($this->replyTo["address"],$this->replyTo["name"])
                    ->subject($this->subject)
                    ->view($this->view)
                    ->with($this->data);
    }
}
