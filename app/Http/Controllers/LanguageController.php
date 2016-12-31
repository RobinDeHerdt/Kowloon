<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelLocalization;
use App;

class LanguageController extends Controller
{
    public function index() 
    {
    	return view('public.chooselanguage');
    }

    public function update(Request $request)
    {
    	$this->validate($request, [
            'lang'  => 'in:nl,fr',
        ]);
    	
    	$splitUri = substr($request->uri, 2);

    	LaravelLocalization::setLocale($request->lang);

    	return redirect($request->lang . $splitUri);
    }
}
