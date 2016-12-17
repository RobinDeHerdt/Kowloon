@extends('layouts.app')

@section('content')
<div class="content search-page secondary-bg">
	<div class="main-content">
		<a href="/admin/dashboard">Back to dashboard</a>
		<a href="/admin/products/create" class="admin-right">Create product</a>
		<h1>Products</h1>
		@if (session('product_create_status'))
	    <div class="alert alert-success">
	        {{ session('product_create_status') }}
	    </div>
		@endif
		<table class="table table-striped">
		    <thead>
		      	<tr>
			        <th>Name</th>
			        <th>Description</th>
			        <th>Technical description</th>
			        <th>Category</th>
			        <th>Tags</th>
			        <th>View</th>
			        <th>Update</th>
			        <th>Delete</th>
		      	</tr>
		    </thead>
		    <tbody>
		    	@foreach ($products as $product)
		      	<tr>
			        <td>{{$product->name}}</td>
			        <td>{{$product->description}}</td>
			        <td>{{$product->technical_description}}</td>
			        <td>{{$product->category->name}}</td>
			        <td>
			        	@foreach ($product->tags as $key => $tag)
							{{$tag->name }}
						@endforeach
			        </td>
			        <td><a href="/admin/products/{{$product->id}}">View</a></td>
			        <td><a href="/admin/products/edit/{{$product->id}}">Update</a></td>
			        <td>
				        <form action="/admin/products/{{$product->id}}/delete" method="POST">
				        	{{ Form::token() }}
				        	<input type="submit" value="Delete">
				        </form>
			        </td>
		      	</tr>
		      	@endforeach
		    </tbody>
	  	</table>
	</div>
</div>
@endsection