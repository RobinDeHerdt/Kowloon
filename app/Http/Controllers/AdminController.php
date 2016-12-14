<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotitem;
use App\Product;
use App\Message;

class AdminController extends Controller
{
    public function index() 
    {
    	$products 		= Product::all();
    	$hotitems 		= Hotitem::all();
    	$unseenmessages = Message::where('seen', 0)->take(5)->get();

    	return view('admin.dashboard', [
    		'hotitems'			=> $hotitems,
    		'products'			=> $products,
    		'unseenmessages' 	=> $unseenmessages
    	]);
    }
}
