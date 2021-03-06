@extends('layouts.app')

@section('content')

@include('includes.admin-nav')

<a href="/home"><img src="/img/logo.png" alt="Kowloon logo" class="logo-image"></a>
<div class="content">
	<div class="main-content top-margin">
		<div class="productdetail-left">
			<div class="main-image-container">
				<img src="/img/products/{{ $product->productimages->first()->image_url }}" id="selected-image">
			</div>
			<div class="details-images-container">
				@foreach ($productimages as $key=>$image)
					<div class="details-image">
						<div class="image-container details-img-container">
							<img src="/img/products/{{ $image->image_url }}" id="{{ $key }}" onclick="selectImage(this)">
						</div>
						<span>{{ $image->{"description_" . LaravelLocalization::getCurrentLocale()} }}</span>
					</div>
				@endforeach
			</div>
		</div>
		<div class="productdetail-right">
			<div class="tags-container">
				<img src="/img/k_logo.png" class="small_logo">
				<div class="tag">
					<div class="tag-category-color {{ $product->category->classname }}"></div>
					{{ $product->category->{"name_" . LaravelLocalization::getCurrentLocale()} }}
				</div>
				@foreach($product->tags as $tag)
				<div class="tag">
					{{ $tag->{"name_" . LaravelLocalization::getCurrentLocale()} }}
				</div>
				@endforeach
			</div>
			<h1 class="title">{{ $product->{"name_" . LaravelLocalization::getCurrentLocale()} }}</h1>
			<h2>€ {{ $product->price}}</h2>
			@if($product->colors->count())
				<h2>{{ trans('messages.colors') }}</h2>
				@foreach ($product->colors as $color)
					<div class="color"></div>
					<input type="hidden" value="{{$color->hex}}" class="hexval">
				@endforeach
			@endif
			<h2>{{ trans('messages.description') }}</h2>
			<p>{{ $product->{"description_" . LaravelLocalization::getCurrentLocale()} }}</p>
		</div>
		<hr>
		<div class="product-specifications">
			<h3>{{ trans('messages.specifications') }}</h3>
			<h4>{{ trans('messages.dimensions')}}</h4>
			<div class="specification">
			@if($product->dimensions->count())
				@foreach ($product->dimensions as $dimension)
					<span>{{$dimension->body}}</span>
				@endforeach
			@else
				<span>{{ trans('messages.no_dimensions') }}</span>
			@endif
			</div>
			<h4>{{ trans('messages.technical_description')}}</h4>
			<div class="specification">
				<span>{{ $product->{"technical_description_" . LaravelLocalization::getCurrentLocale()} }}</span>
			</div>
		</div>
		@if ($relatedProducts->count())
		<h1 class="title">{{ trans('messages.related_products') }}</h1>
		<div class="products-container">
			@foreach ($relatedProducts as $product)
			<div class="product-item">
			<a href="/category/{{ $product->category_id}}/product/{{ $product->id }}">
				<div class="product-image-container overlay {{ $product->category->classname}}">
					<img src="/img/products/{{ $product->productimages->first()->image_url }}" alt="{{ $product->productimages->first()->description }}">
				</div>
			</a>
			</div>
			@endforeach
		</div>
		<span class="text-right"><a href="/category/{{ $product->category_id}}">{{ trans('messages.view_more') }}</a></span>
		@endif
		@include('includes.faq')
		@include('includes.subscribe')
	</div>
</div>
@endsection

@section('scripts')
<script src="/js/scroll.js"></script>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-89247037-1', 'auto');
ga('send', 'pageview');
</script>
@endsection