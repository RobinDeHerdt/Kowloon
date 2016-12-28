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
    	$questions = Question::whereDoesntHave('products')->get();

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

        Session::flash('contact_status', 'contact_status');

    	return back();
    }
}
