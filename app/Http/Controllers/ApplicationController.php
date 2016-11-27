<?php

namespace App\Http\Controllers;

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


    	return view('application.check')->with('user', $user)->with('username', $username);
    }
}
