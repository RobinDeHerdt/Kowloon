@extends('layouts.app')

@section('content')

@include('includes.admin-nav')
@include('includes.carousel')

<div class="content">
	<div class="main-content">
	<h1 class="title">{{ $category->{"name_" . LaravelLocalization::getCurrentLocale()} }} {{ trans('messages.articles') }}.</h1>
		<div id="filterToggle" onclick="toggleFilter()">
			<span>{{ trans('messages.filter') }}</span>
			<span class="caret"></span>
		</div>
		<div class="filter" id="productFilter">
			<form action="/category/{{$category->id}}" method="GET">
				<div class="collection">
					<p>{{ trans('messages.collection') }}</p>
				@if ($tags)
					@foreach ($tags as $tag)
						<div class="collection-item">
<input type="checkbox" name="collections[]" value="{{$tag->id}}" {{(in_array($tag->id, $selectedTags) ? 'checked' : '')}}>
							<label>{{ $tag->{"name_" . LaravelLocalization::getCurrentLocale()} }}</label>
						</div>
					@endforeach	
				@endif
				</div>
				<div class="price">
					<p>{{ trans('messages.price_range') }}</p>
					<span class="euro">€ <input type="text" name="minimumprice" value="{{$minimumprice}}"></span>
					<span class="price-divider"> - </span>
					<span class="euro">€ <input type="text" name="maximumprice" value="{{$maximumprice}}"></span>
				</div>
				<input type="hidden" value="" name="sort" id="selectedSortFunction">
				<div class="form-group">
					<input type="submit" value="{{ trans('messages.activate_filter') }}" class="button">
				</div>
			</form>
		</div>
		<hr>
		<div class="text-right">
			<span class="text-thin">{{ str_singular($category->{"name_" . LaravelLocalization::getCurrentLocale()}) }} items: </span>
			<span>{{ $products->count() }} of {{ $products->total() }}</span>
		</div>

		<div class="dropdown dropdown-left">
		  	<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
		    	<span class="caret"></span>
		  	</button>

			<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
				<li><a href="{{ (isset($_GET['sort']) ? str_replace($_GET['sort'],'relevance',url()->full())  : '?sort=relevance')}}">Relevance</a></li>
				<li><a href="{{ (isset($_GET['sort']) ? str_replace($_GET['sort'],'price_asc',url()->full())  : '?sort=price_asc')}}">Price: low to high</a></li>
				<li><a href="{{ (isset($_GET['sort']) ? str_replace($_GET['sort'],'price_desc',url()->full())  : '?sort=price_desc')}}">Price: high to low</a></li>
			    <li><a href="{{ (isset($_GET['sort']) ? str_replace($_GET['sort'],'latest',url()->full())  : '?sort=latest')}}">Latest</a></li>
			    <li><a href="{{ (isset($_GET['sort']) ? str_replace($_GET['sort'],'oldest',url()->full())  : '?sort=oldest')}}">Oldest</a></li>
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
					<div class="image-container overlay {{ $product->category->classname }}">
						<img src="/img/products/{{ $product->productimages->first()->image_url}}" alt="{{ $product->productimages->first()->{'description_' . LaravelLocalization::getCurrentLocale() } }}">
					</div>
					</a>
					<div class="description">
						<span>{{ $product->{"name_" . LaravelLocalization::getCurrentLocale()} }}</span>
						<span>€ {{ $product->price }}</span>
					</div>
				</div>
			@endforeach

		@else
			<span class="not-found-msg">{{ trans('messages.no_products') }}</span>
		@endif
		</div>
		{{ $products->links() }}
	</div>
</div>
@endsection

@section('scripts')
<script src="/js/showselecteddropdownvalue.js"></script>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-89247037-1', 'auto');
ga('send', 'pageview');
</script>
@endsection