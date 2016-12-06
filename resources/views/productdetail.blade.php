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
	</div>
</div>
<script>
	(function() {
		var imageContainers = getImageContainers();
		changeStyles(0, imageContainers);
	})();

	function getImageContainers() {
		return document.getElementsByClassName('image-container');
	}

	function selectImage(selectedElement) {
  		var imageContainers = getImageContainers();
  		document.getElementById('selected-image').src = selectedElement.src;
  		changeStyles(selectedElement.id, imageContainers);
	}

	function changeStyles(id, imageContainers) {
		for (var i = imageContainers.length - 1; i >= 0; i--) {
			if(i != id)
			{
				imageContainers[i].style.opacity = 0.5;
				imageContainers[i].style.border = 'none';
			}
			else 
			{
				imageContainers[i].style.border = '2px solid white';
				imageContainers[i].style.opacity = 1;
			}
		}
	}
</script>
@endsection
