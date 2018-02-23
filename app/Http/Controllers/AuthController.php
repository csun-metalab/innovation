<?php namespace Helix\Http\Controllers;

use Auth;
use Request;
use Validator;
use Illuminate\Support\MessageBag;

use Toyota\Component\Ldap\Exception\SearchException;

/**
 * Handles the LDAP authentication, login, and logout.
 *
 * @package Helix\Http\Controllers
 */
class AuthController extends Controller
{
  /**
   * Returns and shows the login screen.
   *
   * @return View
   */
  public function getLogin() {
    // if the user is on the Login screen and we have asked to force SSL,
    // perform a secure re-direct to the login screen
    //
    // NOTE: Based on how the META+Lab infrastructure is set-up, we CANNOT
    // reliably use Request::secure() to determine whether the request
    // was performed over HTTPS so we have to check the port instead.
    if(config('app.force_ssl_login') && $_SERVER['SERVER_PORT'] != '443') {
      return redirect()->secure('login');
    }

    return view('pages.login.index');
  }

  /**
   * Handles the posting of data to the login screen.
   *
   * @return RedirectResponse
   */
  public function postLogin() {
    // grab the provided input
    $username = Request::input('username');
    $password = Request::input('password');

    // place the elements into an array
    $creds = [
      'username' => $username,
      'password' => $password
    ];

    // check to see if the validation passed on the credentials; most of
    // the validate() function can be done in a custom Validator class
    // but for MVP this should be okay.
    $vResult = $this->validateCredentials($creds);
    if($vResult === TRUE) {
      // attempt to perform the authentication
      try {
        if(Auth::attempt($creds)) {
          // faculty members should be allowed to authenticate
          if(Auth::user()->isFaculty() || Auth::user()->isAdmin()) {
            // redirect back to the landing page if no original target
            return redirect()->intended('admin/dashboard');
          }
          // If not, we're going to check if they are staff
          if (Auth::user()->isStaffBasedOnAffiliation()) {
            return redirect()->intended('/');
          }

          // other individuals not matching the above cases are not
          // allowed to authenticate
          $errorBag = new MessageBag([
            "invalid" => 'Invalid username / password combination or invalid user account.',
          ]);
          return redirect('login')->with('errors', $errorBag);
        }
        else
        {
          // auth unsuccessful so return to the login page with an
          // instance of MessageBag containing the message
          $errorBag = new MessageBag([
            "invalid" => 'Invalid username / password combination or invalid user account.',
          ]);
          return redirect('login')->with('errors', $errorBag);
        }
      }
      catch (SearchException $e)
      {
        return redirect('login')->with('error','Incorrect username or password');
      }
    }
    else
    {
      // spit back the error messages to the page
      return redirect('login')->with('errors', $vResult);
    }
  }

  /**
   * Handles the logout functionality.
   *
   * @return RedirectResponse
   */
  public function getLogout() {
    // perform the logout operation
    Auth::logout();

    // re-direct back to the landing page without HTTPS
    $landing = str_replace('https:', 'http:', url('/'));
    return redirect($landing);
  }

  /**
   * Validates the passed data to ensure the login credentials were provided.
   * Returns true if the validation passes or a set of messages if the
   * validation fails.
   *
   * @param array $data The data to validate
   * @return boolean|MessageBag
   */
  public function validateCredentials($data) {
    // ensure that the input passes some basic validation rules
    $validationRules = [
      "username" => "required",
    ];

    // if we don't allow blank passwords, add another validation rule
    if(!config('app.ldap.allow_no_pass')) {
      $validationRules['password'] = 'required';
    }

    // if the validator passed, return true; otherwise, return messages
    $validator = Validator::make($data, $validationRules);
    if($validator->passes()) {
      return true;
    }

    // validator failed so return messages
    return $validator->messages();
  }
}
