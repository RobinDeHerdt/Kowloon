@extends('layouts.app')

@section('content')

@include('includes.admin-nav')

<a href="/home"><img src="/img/logo.png" alt="Kowloon logo" class="logo-image"></a>
<div class="content">
	<div class="main-content top-margin">
		<div class="productdetail-left">
			<div class="main-image-container">
				<img src="/img/{{ $product->productimages->first()->image_url }}" id="selected-image">
			</div>
			<div class="details-images-container">
				@foreach ($product->productimages as $key=>$image)
					<div class="details-image">
						<div class="image-container">
							<img src="/img/{{ $image->image_url }}" id="{{ $key }}" onclick="selectImage(this)">
						</div>
						<span>{{ $image->description }}</span>
					</div>
				@endforeach
			</div>
		</div>
		<div class="productdetail-right">
			<div class="tags-container">
				<img src="/img/k_logo.png" class="small_logo">
				<div class="tag">
					<div class="tag-category-color {{ str_singular(strtolower($product->category->name)) }}"></div>
						{{ $product->category->name }}
				</div>
				@foreach($product->tags as $tag)
				<div class="tag">
					{{ $tag->name }}
				</div>
				@endforeach
			</div>
			<h1 class="title">{{ $product->name }}</h1>
			<h2>€ {{ $product->price}}</h2>
			<h2>Colors</h2>
			<div class="color"></div>
			<div class="color"></div>
			<div class="color">	</div>
			<h2>Description</h2>
			<p>{{ $product->description}}</p>
		</div>
		<hr>
		<div class="product-specifications">
			<h3>Specifications</h3>
			<h4>Dimensions</h4>
			<div class="specification">
				<span>S - Ø 53x18cm</span><span>M - Ø 53x18cm</span><span>L - Ø 53x18cm</span>
			</div>
			<h4>Title</h4>
			<div class="specification">
				<span>{{  $product->technical_description}}</span>
			</div>
		</div>
		<h1 class="title">Related products</h1>
		<div class="products-container justify">
			@foreach ($relatedProducts as $product)
			<div class="product-item">
			<a href="/category/{{ $product->category_id}}/product/{{ $product->id }}">
				<div class="product-image-container overlay {{ str_singular(strtolower($product->category->name)) }}">
					<img src="/img/{{ $product->productimages->first()->image_url }}" alt="{{ $product->productimages->first()->description }}">
				</div>
			</a>
			</div>
			@endforeach
		</div>
		<span class="text-right"><a href="/category/{{ $product->category_id}}">View more</a></span>
		@include('includes.faq')
		@include('includes.subscribe')
	</div>
</div>
<script src="/js/displayselectedimage.js"></script>
@endsection
