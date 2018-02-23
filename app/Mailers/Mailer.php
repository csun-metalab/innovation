<?php

namespace Helix\Mailers;

use Mail;

class Mailer 
{

	/**
	* Send an email to one recipient processed in the request
	*/
    public function sendToOne($view, array $data, $email, $subject)
    {
        return Mail::send($view, $data, function($message) use ($email, $subject)
        {
            $message->to($email)->subject($subject);
        });
    }

    /*
    * Send an email to multiple recipients in the request
    */
    public function sendToMany($view, array $data, array $emails, $subject)
    {   
        return Mail::send($view, $data, function($message) use ($emails, $subject)
        {
            $message->to($emails)->subject($subject);
        });
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
    	return Mail::queue($view, $data, function($message) use ($email, $subject)
    	{
            $message->to($email)->subject($subject);
        });
    }

    /**
    * Queue the email and send to multiple recipients
    */
    public function queueToMany($view, array $data, array $emails, $subject)
    {
        return Mail::queue($view, $data, function($message) use ($emails, $subject)
        {
            $message->to($emails)->subject($subject);
        });
    }
}