<?php

namespace Helix\Http\Controllers;

use Illuminate\Http\Request;
use Helix\Http\Requests;
use Helix\Http\Controllers\Controller;

/**
 * Handles the landing page.
 *
 * @package Helix\Http\Controllers
 */
class WelcomeController extends Controller
{
    public function __construct(Request $request)
    {
        $this->prefix  = $request->route()->getPrefix();
    }

    public function index()
    {
    	return redirect($this->prefix.'/project');
    }
    public function aboutIndex()
    {
        return view('pages.about.index');
    }


    public function whatsNew()
    {
    	return view('pages.welcome.whats-new');
    }

    public function aboutApi()
    {
    	return view('pages.about.api-doc');
    }
}
