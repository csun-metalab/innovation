<?php namespace Helix\Traits;
use ReCaptcha\ReCaptcha;

/**
 * Trait ReCaptchaTrait
 * Use this trait in a controller that needs to verify a recaptcha.
 * @package Helix\Traits
 */
trait ReCaptchaTrait {
    /**
     * Verifies that a reCaptcha has been accepted.
     * You can use this return value in a validator,
     * especially if you would like to flash a message
     * upon failure to accept.
     * You can see an example in the processStudentRequest method
     * in the InvitationController .
     * @return bool
     */
    public function recaptchaCheck()
    {
        if(!request()->has('g-recaptcha-response')) {
            return false;
        }
        $response = request('g-recaptcha-response');
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $secret   = env('RE_CAP_SECRET_KEY');

        $recaptcha = new ReCaptcha($secret);
        $resp = $recaptcha->verify($response, $remoteip);
        return $resp->isSuccess();
    }

}
