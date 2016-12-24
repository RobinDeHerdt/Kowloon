<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotitem;
use App\Category;
use App\Carouselimage;

use Session;

class HomeController extends Controller
{
    public function index()
    {
    	$hotitems		= Hotitem::all();
    	$categories 	= Category::all();
    	$carouselimages = Carouselimage::all();

        return view('public.home', [
        	'hotitems' 			=> $hotitems,
        	'categories' 		=> $categories,
         	'carouselimages' 	=> $carouselimages
         ]);
    }

    public function update(Request $request)
    {
        foreach ($request->hotitems as $key => $new_hotitem_id) {
            $hotitem                = Hotitem::find($key+1);
            $hotitem->product_id    = $new_hotitem_id;
            $hotitem->save();
        }

        Session::flash('hotitems_update_status', 'Hot items updated successfully');

        return back();
    }
}
