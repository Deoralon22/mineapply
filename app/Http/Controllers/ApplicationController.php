<?php

namespace App\Http\Controllers;

use App\Application;

use Cache;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ApplicationController extends Controller
{

	public function checkUsername($username) {

    	$minecraft = new \Sven\Minecraft\Minecraft;
    	$exists = true;

    	if (!Cache::has('mc-username-'.$username)) {

    		$minecraft;

	    	try {
	    		$minecraft->fromName($username);
	    	} catch (\Exception $e) {
	    		$exists = false;
	    	}

		    $expiresAt = Carbon::now()->addMinutes(15);
			Cache::put('mc-username-'.$username, $minecraft, $expiresAt);
		}

		$cache = Cache::get('mc-username-'.$username, false);

		return($cache);
	}

    public function checkPage($username) {

    	$user = $this->checkUsername($username);

    	if($user->get() != null) {
    		return redirect('/form/'.$user->get()->name);
    	} 

    	return view('application.check')->with('user', $user)->with('username', $username);
    }

    public function formPage($username) {

    	$user = $this->checkUsername($username);
    	if($user->get() == null) {
    		return redirect('/check/!');
    	} 

    	return view('application.form')->with('username', $username);
    }

    public function form(Request $request, $username) {
    	
    	$user = $this->checkUsername($username);
    	if($user->get() == null) {
    		return redirect('/check/!');
    	} 

    	$this->validate($request, [
    			'message' => 'required|min:50|max:500',
    			'email' => 'required|email'
    		], []);

    	$application = new Application;
    	
    	$application->username = $user->get()->name;
    	$application->username = $user->get()->uuid;
    	$application->email = $request->email;
    	$application->message = $request->message;

    	$application->save();

    	return $application;

    }
}
