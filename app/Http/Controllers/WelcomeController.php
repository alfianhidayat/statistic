<?php namespace App\Http\Controllers;

class WelcomeController extends Controller {

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		/**
		 * pages.msc means access view in resources/views/pages/msc,blade.php
		 * extended from welcome.blade.php
		 */
		return view('pages.msc'); 
	}

}
