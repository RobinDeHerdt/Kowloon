@extends('layouts.app')

@section('content')
<img src="/img/logo.png" alt="Kowloon logo" class="logo-image">
<div class="content">
	<div class="main-content top-margin">
		<div class="productdetail-left">
			<div class="main-image-container">
				<img src="/img/{{ $product->productimages->first()->image_url }}" alt="">
			</div>
			<div class="details-images-container">
				@foreach ($product->productimages as $image)
					<div class="details-image">
						<div class="image-container">
							<img src="/img/{{ $image->image_url }}" alt="">
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
	</div>
</div>
@endsection
