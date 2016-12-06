<?php

namespace App\Http\Controllers;

use App\Application;

use App\Mail\ApplicationReceived;
use Illuminate\Support\Facades\Mail;

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
    	$application->uuid = $user->get()->uuid;
    	$application->email = $request->email;
    	$application->ip = $request->ip();
    	$application->status = 0; // Pending
    	$application->message = $request->message;
    	$application->token = str_random(15);

    	$application->save();

    	Mail::to($application->email)->send(new ApplicationReceived($application));
    	
    	return redirect(route('application-success'));
    }

    public function success() {
    	return view('application.success');
    }

    public function statusPage() {
        return view('application.status_form');
    }

    public function statusPost(Request $request) {
        if(is_null($request->token)) {
            abort(500, 'No token specified');
        }
        return redirect('/status/'.$request->token);
    }

    public function status($token) {
        $application = Application::where('token', $token)->firstOrFail();
        return view('application.status')->with('application', $application);
    }
}
