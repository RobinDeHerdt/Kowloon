<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CookieController extends Controller
{
    public function store() 
    {
    	return response('200')->cookie('cookiePopup','checked');
    }
}
