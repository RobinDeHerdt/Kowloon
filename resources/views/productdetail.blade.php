@extends('layouts.app')

@section('content')
<img src="/img/logo.png" alt="Kowloon logo" class="logo-image">
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
			<h1>{{ $product->name }}</h1>
			<h2>€ {{ $product->price}}</h2>
			<h2>Colors</h2>

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
		<div class="related-products">
			<h1>Related products</h1>
			@foreach ($relatedProducts as $product)
			<div class="related-product">
				<a href="/category/{{ $product->category_id}}/product/{{ $product->id }}">
				<img src="/img/{{ $product->productimages->first()->image_url }}" alt="{{ $product->productimages->first()->description }}">
				</a>
			</div>
			@endforeach
		</div>
		<span class="text-right"><a href="/category/{{ $product->category_id}}">View more</a></span>
		<div class="faq-container">
			<h1>Frequently Asked Questions</h1>
			@if($questions->count())
				@foreach ($questions as $question)
					<div class="question">
						<h3>{{ $question->title }}</h3>
						<p>{{ $question->body }}</p>
					</div>
				@endforeach
			@else
				<h1>No questions for this product yet.</h1>
			@endif
			<br>
		</div>
		<span class="text-right"><a href="/faq">More questions?</a></span>
		
		@include('includes.subscribe')
	</div>
</div>
<script src="/js/displayselectedimage.js"></script>
@endsection
