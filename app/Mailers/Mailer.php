<?php

declare(strict_types=1);

namespace Helix\Mailers;

use Helix\Mail\GenericMailer;
use Mail;

class Mailer
{
    /**
     * Send an email to one recipient processed in the request.
     *
     * @param mixed $view
     * @param array $data
     * @param mixed $email
     * @param mixed $subject
     */
    public function sendToOne($view, array $data, $email, $subject)
    {
        return Mail::to($email)->send(new GenericMailer($view, $data, $subject));
    }

    /*
    * Send an email to multiple recipients in the request
    */
    public function sendToMany($view, array $data, array $emails, $subject, array $replyTo = [])
    {
        return Mail::to($emails)->send(new GenericMailer($view, $data, $subject, $replyTo));
    }

    /*
    |--------------------------------------------------------------------------------
    | NOTE: THE QUEUE DRIVER MUST BE SET UP BEFORE USING THE METHODS BELOW
    |--------------------------------------------------------------------------------
    */

    /**
     * Queue the email and send to one recipient.
     *
     * @param mixed $view
     * @param array $data
     * @param mixed $email
     * @param mixed $subject
     */
    public function queueToOne($view, array $data, $email, $subject)
    {
        return Mail::to($email)->queue(new GenericMailer($view, $data, $subject));
    }

    /**
     * Queue the email and send to multiple recipients.
     *
     * @param mixed $view
     * @param array $data
     * @param array $emails
     * @param mixed $subject
     */
    public function queueToMany($view, array $data, array $emails, $subject)
    {
        return Mail::to($email)->queue(new GenericMailer($view, $data, $subject));
    }
}
