<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscriber;
use App\Mail\Subscribed;
use Exception;
use Session;
use Mail;

class SubscriberController extends Controller
{
    public function store($lang, Request $request)
    {
    	$this->validate($request, [
        	'email' 	=> 'required|max:255|email',
    	]);

    	try
    	{
    		$subscriber = new Subscriber();

	        $subscriber->email 		= $request->email;
	        $subscriber->language 	= $lang;

	        $subscriber->save();

	        Mail::to($subscriber->email)->send(new Subscribed($lang));

	        Session::flash('subscribe_success', 'Thanks for subscribing!');
    	}
    	catch(Exception $e)
    	{
    		switch($e->getCode())
    		{
    			case 23000: 
    				Session::flash('subscribe_failed', 'Je bent al ingeschreven voor onze nieuwsbrief!');
    				break;
    			case 0:
    				Session::flash('subscribe_failed', 'You are subscribed! But something went wrong sending the confirmation email.');
    				break;
    			default:
    				Session::flash('subscribe_failed', 'Something went wrong. Don\'t hesitate to contact us if the problem keeps occurring');
    				break;
    		}
    	}

        return back();
    }
}
