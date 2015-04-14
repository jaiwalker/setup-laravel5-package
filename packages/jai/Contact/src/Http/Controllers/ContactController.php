<?php namespace Jai\Contact\Http\Controllers;
/**
 * 
 * @author kora jai <kora.jayaram@gmail>
 */


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;


class ContactController extends Controller
{

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		dd(Config::get("contact.message"));
		return view('contact::contact');
	}
}