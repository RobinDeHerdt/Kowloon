<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;


class ProductController extends Controller
{
    public function index()
    {
    	$products = Product::paginate(5);

        return view('admin.products', [
        	'products' => $products
        ]);
    }

    public function show($id)
    {
    	$product = Product::find($id);

        return view('admin.product', [
        	'product' => $product
        ]);
    }
}
