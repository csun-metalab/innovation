<?php

namespace Helix\Http\Controllers;


use Helix\Http\Requests;
use Helix\Mail\Feedback;
use Helix\Mailers\Mailer;
use Auth;
use	Request;
use	Validator;
use Mail;

/**
 * Handles the feedback form.
 *
 * @package Helix\Http\Controllers
 */
class FeedbackController extends Controller
{
    protected $mailer, $feedback;
	/**
	 * Constructs a new FeedbackController object.
	 */
	public function __construct(Mailer $mailer) {
        $this->mailer = $mailer;
        $this->feedback = env('APP_FEEDBACK_TO');
	}

	/**
	 * Renders the Submit Pilot Feedback view.
	 *
	 * @return View
	 */
	public function getIndex() {
		return view("feedback.index");
	}

	/**
	 * Handles the submission of the feedback form.
	 *
	 * @return View
	 */
	public function postIndex() {
		// perform the validation before going any further
		$validator = Validator::make(
			$input = [
				'name'	=> Request::input('name'),
				'email'	=> Request::input('email'),
				'title'	=> Request::input('title'),
				'body'	=> Request::input('body'),
			],
			$rules = [
				'name'		=> 'required',
				'email'		=> 'email|required',
				'title'		=> 'required',
				'body'		=> 'required'
			],
			$messages = [
			    'name.required'    => 'You are missing your name.',
			    'email.required'    => 'You have not provided an email.',
			    'email.email' => 'A valid email must be provided.',
			    'title.required'      => 'Please supply a title to your feedback.',
			    'body.required'      => 'You have not entered any text in your message.',
			]

		);

		// if there were any errors flash the data and redirect back
		if ($validator->fails()){
			return redirect('feedback')->withErrors($validator)->withInput();
		}

        $emailItems = [
            'name' => Request::input('name'),
            'address' => Request::input('email'),
            'feedback' => Request::input('body')
        ];

        $this->mailer->sendToOne('emails.feedback.pilot', $emailItems, $this->feedback, request('title'));

		// render the success page
		return view("feedback.success");
	}
}
