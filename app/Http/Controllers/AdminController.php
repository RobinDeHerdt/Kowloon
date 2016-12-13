<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotitem;
use App\Product;

class AdminController extends Controller
{
    public function index() 
    {
    	$products = Product::all();
    	$hotitems = Hotitem::all();

    	return view('admin.dashboard', [
    		'hotitems'	=> $hotitems,
    		'products'	=> $products
    	]);
    }
}
