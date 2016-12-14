<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
    public function index()
    {
    	$messages = Message::paginate(10)->sortBy('seen');

    	return view('admin.messages', [
    		'messages' => $messages]);
    }

    public function show($id) 
    {
    	$message = Message::find($id);
    	$message->seen = 1;
    	$message->save();

    	return view('admin.message', [
    		'message' => $message
    	]);
    }
}
