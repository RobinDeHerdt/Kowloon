@extends('layouts.app')

@section('content')

@include('includes.admin-nav')
<div class="content search-page secondary-bg">
	<div class="main-content">
		<div id="filterToggle" onclick="toggleFilter()">
			<span>{{ trans('messages.advanced_filter') }}</span>
			<span class="caret"></span>
		</div>
		{!! Form::open(['url' => '/search', 'method' => 'GET', 'id' => 'search_form']) !!}
		<div class="filter" id="productFilter">
			<div class="collection left">
				<p>{{ trans('messages.category') }}</p>
				@foreach ($categories as $key => $category)
					<div class="collection-item">
						{{ Form::checkbox('categories[]', $category->id, (in_array($category->id, $selectedCategories)) ? true : '')}}
						{{ Form::label($category->{"name_" . LaravelLocalization::getCurrentLocale()} ) }}
					</div>
				@endforeach	
			</div>
			<div class="price right">
				<p>{{ trans('messages.price_range') }}</p>
				<span class="euro">€ {{ Form::text('minprice', $minprice)}}</span>
				<span class="price-divider"> - </span>
				<span class="euro">€ {{ Form::text('maxprice', $maxprice)}}</span>
			</div>
		</div>
		<div class="space"></div>
		{{ Form::text('query', '', ['placeholder' => trans('messages.search_placeholder'),'class' => 'search-field', 'onkeypress' => 'keyPress(event);']) }}
		{!! Form::close() !!}
	
		@if ($results)
			@if ($results->count())
			<div id="search-info">
				<span>Don't find what you're looking for?</span><br>
				<span>You can always contact our <a href="/about">customer service</a>. We're happy to help you!</span>
			</div>
			@endif
		@endif

		@if($response)
			<h3 id="search-response">{{ $response }}</h3>
		@endif
		
		@if($results && $inputstring)
			@if($results->count() == 1)
	        	<h3 id="search-response">Er werd 1 resultaat gevonden voor {{ $inputstring }}:</h3>
	        @elseif($results->count())
	        	<h3 id="search-response">Er werden {{ $results->total() }} resultaten gevonden voor {{ $inputstring }}:</h3>
	        @else
	        	<h3 id="search-response">Er werden geen resultaten gevonden voor "{{ $inputstring }}".</h3>
	        @endif
        @endif

		@if($results)
		<div class="searchresults-container">
			@foreach ($results as $result)
				<div class="searchresult">
					<div class="result-image">
						<img src="/img/products/{{$result->productimages->first()->image_url}}" alt="">
					</div>
					<div class="result-text">
						<h3>{{$result->{"name_" . LaravelLocalization::getCurrentLocale()} }}</h3>
						<span>€{{$result->price}}</span>
						<p>{{$result->{"description_" . LaravelLocalization::getCurrentLocale()} }}</p>
						<p>{{$result->{"technical_description_" . LaravelLocalization::getCurrentLocale()} }}</p>
						<a href="/category/{{$result->category->id}}/product/{{$result->id}}"></a>
					</div>
				</div>
			@endforeach
			{{ $results->links() }}
		</div>
		@endif
	</div>
</div>
@endsection

@section('scripts')
<script src="/js/searchpage.js"></script>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-89247037-1', 'auto');
ga('send', 'pageview');
</script>
@endsection