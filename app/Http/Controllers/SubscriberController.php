<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscriber;
use App\Mail\Subscribed;
use Mail;

class SubscriberController extends Controller
{
    public function store($lang, Request $request)
    {
        $subscriber = new Subscriber();

        $subscriber->email 		= $request->email;
        $subscriber->language 	= $lang;

        $subscriber->save();

        Mail::to($subscriber->email)->send(new Subscribed($lang));

        return back();
    }
}
