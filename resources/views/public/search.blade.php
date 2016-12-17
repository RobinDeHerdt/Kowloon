@extends('layouts.app')

@section('content')

@include('includes.admin-nav')

<div class="content search-page secondary-bg">
	<div class="main-content">
		<div id="filterToggle" onclick="toggleFilter()">
			<span>Advanced filter</span>
			<span class="caret"></span>
		</div>
		{!! Form::open(['url' => '/search', 'method' => 'GET', 'id' => 'search_form']) !!}
		<div class="filter" id="productFilter">
			<div class="collection left">
				<p>Category</p>
				@foreach ($categories as $key => $category)
					<div class="collection-item">
						{{ Form::checkbox('categories[]', $category->id, (in_array($category->id, $selectedCategories)) ? true : '')}}
						{{ Form::label($category->name) }}
					</div>
				@endforeach	
			</div>
			<div class="price right">
				<p>Price range </p>
				<span class="euro">€ {{ Form::text('maxprice', $maxprice)}}</span>
				<span class="price-divider"> - </span>
				<span class="euro">€ {{ Form::text('minprice', $minprice)}}</span>
			</div>
		</div>
		<div class="space"></div>
		{{ Form::text('query', '', ['placeholder' => 'Just start typing and hit "enter" to search','class' => 'search-field', 'onkeypress' => 'keyPress(event);']) }}
		{!! Form::close() !!}
	
		@if ($results)
			@if ($results->count())
			<div id="search-info">
				<span>Don't find what you're looking for?</span><br>
				<span>You can always contact our <a href="/about">customer service</a>. We're happy to help you!</span>
			</div>
			@endif
		@endif

		@if ($response)
		<h3 id="search-response">{{ $response }}</h3>
		@endif

		@if($results)
		<div class="searchresults-container">
			@foreach ($results as $result)
				<div class="searchresult">
					<div class="result-image">
						<img src="/img/{{$result->productimages->first()->image_url}}" alt="">
					</div>
					<div class="result-text">
						<h3>{{$result->name}}</h3>
						<span>€{{$result->price}}</span>
						<p>{{$result->description}}</p>
						<p>{{$result->technical_description}}</p>
						<a href="/category/{{$result->category->id}}/product/{{$result->id}}"></a>
					</div>
				</div>
			@endforeach
			{{ $results->links() }}
		</div>
		@endif
	</div>
</div>
<script>
	function toggleFilter()
	{
		var productFilter = document.getElementById('productFilter');
		productFilter.classList.toggle('hide');
	}

	function keyPress(e)
	{
		var searchfield = document.getElementsByClassName('search-field')[0];
		if(e.keyCode === 13)
		{
			var form = document.getElementById('search_form');
			form.submit();
		}
	}
</script>
@endsection