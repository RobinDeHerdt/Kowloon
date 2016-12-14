<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Message;
use Session;

class ContactController extends Controller
{
    public function index()
    {
    	// Moet nog aangepast worden!
    	$questions = Question::all();

    	return view('public.about', ['questions' => $questions]);
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
        	'email' 	=> 'required|max:255|email',
        	'message' 	=> 'required|max:1024',
    	]);

    	$message = new Message();	

    	$message->email 	= $request->email;
    	$message->message 	= $request->message;

    	$message->save();

        Session::flash('contact_status', 'Bedankt voor je bericht!');

    	return back();
    }
}
