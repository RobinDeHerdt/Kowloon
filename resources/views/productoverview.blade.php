@extends('layouts.app')

@section('content')
       @include('includes.carousel')

		<div class="content">
			<div class="main-content">
			<h1 class="title">{{ str_singular($category->name) }} articles.</h1>
				<span>Filter</span>
				<span class="caret"></span>
				<div class="filter">
					<div class="collection">
						<p>By collection </p>
						@foreach ($tags as $tag)
							<div class="collection-item">
								<input type="checkbox">
								<label>{{ $tag->name }} </label>
							</div>
						@endforeach	
					</div>
					<div class="price">
						<p>Price range </p>
						<span class="euro">€ <input type="text"></span>
						<span class="price-divider"> - </span>
						<span class="euro">€ <input type="text"></span>
					</div>
				</div>

				<hr>

				<div class="dropdown dropdown-left">
				  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				    Sort by relevance
				    <span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
				    <li><a href="#">Price: low to high</a></li>
				    <li><a href="#">Price: high to low</a></li>
				    <li><a href="#">Latest</a></li>
				    <li><a href="#">Oldest</a></li>
				  </ul>
				</div>

				<div class="text-right">
					<span class="text-thin">{{ str_singular($category->name) }} items: </span>
					<span>{{ count($products) }} of {{ count($products) }}</span>
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
@endsection
