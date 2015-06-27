<?php namespace App\Http\Controllers;

class DefaultController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $sites_1 = \App\Site::where('level','1')->limit(30)->get();
        $sites_2 = \App\Site::where('level','2')->limit(30)->get();
        $sites_3 = \App\Site::where('level','3')->limit(30)->get();
        $sites_4 = \App\Site::where('level','4')->limit(30)->get();
//        $site_types = \App\Types::where('type','1')->where('level','1')->limit(30)->get();
		return view('default',compact('sites_1','sites_2','sites_3','sites_4'));
	}

}
