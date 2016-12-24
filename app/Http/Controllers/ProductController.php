<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\Productimage;
use App\Category;
use App\Product;
use App\Hotitem;
use App\Tag;

class ProductController extends Controller
{
    public function index()
    {
    	$products = Product::paginate(10);

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

    public function create()
    {
        // Dont get 'other' category
        $categories = Category::take(5)->get();
        $tags       = Tag::all();

        return view('admin.createproduct', [
            'tags'          => $tags,
            'categories'    => $categories
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'                      => 'required',
            'price'                     => 'required|numeric',
            'description'               => 'required',
            'technical_description'     => 'required',
            'category'                  => 'required',
            'image'                     => 'required',
            'imagedescription'          => 'required'
        ]);

        $count = count($request->image);

        $product = new Product();
        $product->name                  = $request->name;
        $product->price                 = $request->price;
        $product->description           = $request->description;
        $product->technical_description = $request->technical_description;
        $product->category_id           = $request->category;

        $product->save();

        for ($i = 0; $i < $count; $i++) { 
            $productimage = new Productimage(); 
            $path = $request->image[$i]->store('img', 'upload'); 
            $productimage->image_url    = basename($path);
            $productimage->description  = $request->imagedescription[$i];
            $productimage->product()->associate($product);
            $productimage->save();
        }

        if($request->tags)
        {
            foreach ($request->tags as $key => $tag) 
            {
                $product->tags()->attach($tag);
            }
        }

        Session::flash('product_create_status', 'Product created successfully');

        return redirect()->action('ProductController@index');
    }

    public function edit($id) 
    {
        $product    = Product::find($id);
        $categories = Category::take(5)->get();
        $tags       = Tag::all();

        return view('admin.editproduct', [
            'product'       => $product,
            'tags'          => $tags,
            'categories'    => $categories
        ]);
    }

    public function update(Request $request, $id) 
    {
        $count = count($request->image);

        $product = Product::find($id);
        $product->name                  = $request->name;
        $product->price                 = $request->price;
        $product->description           = $request->description;
        $product->technical_description = $request->technical_description;
        $product->category_id           = $request->category;

        $product->save();

        $productimages = Productimage::where('product_id', $id);
        $productimages->whereNotIn('id', $request->uploadedimages)->delete();
        
        for ($i = 0; $i < $count; $i++) { 
            $productimage = new Productimage(); 
            $path = $request->image[$i]->store('img', 'upload'); 
            $productimage->image_url    = basename($path);
            $productimage->description  = $request->imagedescription[$i];
            $productimage->product()->associate($product);
            $productimage->save();
        }

        if($request->tags)
        {
            $product->tags()->sync($request->tags);
        }
        else
        {
            $product->tags()->detach();
        }

        Session::flash('product_update_status', 'Product updated successfully');

        return redirect()->action('ProductController@index');
    }

    public function destroy($id)
    {
        $product    = Product::find($id);
        $hotitems   = Hotitem::where('product_id', $id)->get();

        if(count($hotitems))
        {
            foreach ($hotitems as $key => $hotitem) 
            {
                $firstProduct           = Product::where('id','!=', $id)->first();
                if($firstProduct)
                {
                    $hotitem->product_id    = $firstProduct->id;
                    $hotitem->save();
                }
                else
                {
                    Session::flash('product_delete_failed', 'You can not delete all products. Without products there are no hot items to display on the front page.');

                    return back();
                }  
            } 
        }

        $product->tags()->detach();
        $product->questions()->detach();

        foreach ($product->productimages as $key => $image) {
            $image->delete();
        }

        $product->delete();
        Session::flash('product_delete_status', 'Product deleted successfully');

        return back();
    }
}
