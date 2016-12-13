@extends('layouts.app')

@section('content')

@include('includes.admin-nav')
@include('includes.carousel')

<div class="content">
	<div class="main-content">
	<h1 class="title">{{ str_singular($category->name) }} articles.</h1>
		<div id="filterToggle" onclick="toggleFilter()">
			<span>Filter</span>
			<span class="caret"></span>
		</div>
		<div class="filter hide" id="productFilter">
		{!! Form::open(['url' => '/category/' . $category->id, 'method' => 'get']) !!}
			
			<div class="collection">
				<p>By collection </p>
				@foreach ($tags as $tag)
					<div class="collection-item">
						<input type="checkbox" name="{{ $tag->name}}">
						<label>{{ $tag->name }} </label>
					</div>
				@endforeach	
			</div>
			<div class="price">
				<p>Price range </p>
				<span class="euro">€ <input type="text" name="minimumprice" value="{{ $minimumPricedProduct->price}}"></span>
				<span class="price-divider"> - </span>
				<span class="euro">€ <input type="text" name="maximumprice" value="{{ $maximumPricedProduct->price}}"></span>
			</div>
			<div class="form-group">
			{{ Form::submit('Filter', ['class' => 'button']) }}
			</div>
		</div>
		{!! Form::close() !!}
		<hr>
		
		<div class="text-right">
			<span class="text-thin">{{ str_singular($category->name) }} items: </span>
			<span>{{ count($products) }} of {{ count($products) }}</span>
		</div>

		<div class="dropdown dropdown-left">
		  	<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
		    	<span class="caret"></span>
		  	</button>

			<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
				<li><a href="{{ url()->full() }}{{($_GET) ? '&': '?'}}sort=relevance">Relevance</a></li>
			    <li><a href="{{ url()->full() }}&sort=price_asc">Price: low to high</a></li>
			    <li><a href="{{ url()->full() }}&sort=price_desc">Price: high to low</a></li>
			    <li><a href="{{ url()->full() }}&sort=latest">Latest</a></li>
			    <li><a href="{{ url()->full() }}&sort=oldest">Oldest</a></li>
		  	</ul>
		</div>

		<div class="products-container product-container-margin">
		@if ($products->count())
			@foreach ($products as $product)
				<div class="product-item">
					@if ($product->productimages->count() > 1)
						<div class="imagecount">
							<span>{{ $product->productimages->count() }}</span>
						</div>
					@endif
					<a href="/category/{{ $category->id }}/product/{{ $product->id }}">
					<div class="image-container overlay {{ str_singular(strtolower($product->category->name)) }}">
						<img src="/img/{{ $product->productimages->first()->image_url}}" alt="{{ $product->productimages->first()->description}}">
					</div>
					</a>
					<div class="description">
						<span>{{ $product->name }}</span>
						<span>€ {{ $product->price }}</span>
					</div>
				</div>
			@endforeach
		@else
			<h1>No products in this category yet.</h1>
		@endif
		</div>
	</div>
</div>
<script>
	(function(){
		var displaySelectedValueField 	= document.getElementById('dropdownMenu1');
		var sortBy 						= getParameterByName('sort');

		switch(sortBy)
		{
			case 'price_asc': sortBy = 'Price: low to high';
				break;
			case 'price_desc': sortBy = 'Price: high to low';
				break;
			case 'oldest': sortBy = 'Oldest';
				break;
			case 'latest': sortBy = 'Latest';
				break;
			default: sortBy = 'Relevance';
		}

		displaySelectedValueField.innerHTML = 'Sort by ' + sortBy + ' <span class="caret"></span>';
	})();

	// http://stackoverflow.com/questions/901115/how-can-i-get-query-string-values-in-javascript
	function getParameterByName(name, url) {
	    if (!url) {
	      url = window.location.href;
	    }

	    name = name.replace(/[\[\]]/g, "\\$&");
	    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
	        results = regex.exec(url);

	    if (!results) return null;
	    if (!results[2]) return '';

	    return decodeURIComponent(results[2].replace(/\+/g, " "));
	}

	function toggleFilter()
	{
		var productFilter = document.getElementById('productFilter');
		productFilter.classList.toggle('hide');
	}
</script>
@endsection