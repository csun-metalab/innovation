<?php

namespace Helix\Mailers;

use Mail;
use Helix\Mail\GenericMailer;

class Mailer
{

	/**
	* Send an email to one recipient processed in the request
	*/
    public function sendToOne($view, array $data, $email, $subject)
    {
        return Mail::to($email)->send(new GenericMailer($view, $data, $subject));
    }

    /*
    * Send an email to multiple recipients in the request
    */
    public function sendToMany($view, array $data, array $emails, $subject)
    {
        return Mail::to($emails)->send(new GenericMailer($view, $data, $subject));
    }

    /*
    |--------------------------------------------------------------------------------
    | NOTE: THE QUEUE DRIVER MUST BE SET UP BEFORE USING THE METHODS BELOW
    |--------------------------------------------------------------------------------
    */

    /**
    * Queue the email and send to one recipient
    */
    public function queueToOne($view, array $data, $email, $subject)
    {
    	return Mail::to($email)->queue(new GenericMailer($view, $data, $subject));
    }

    /**
    * Queue the email and send to multiple recipients
    */
    public function queueToMany($view, array $data, array $emails, $subject)
    {
        return Mail::to($email)->queue(new GenericMailer($view, $data, $subject));
    }
}
