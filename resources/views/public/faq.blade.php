@extends('layouts.app')

@section('content')

@include('includes.admin-nav')

<div class="content search-page secondary-bg">
	<div class="main-content">
		<h1 class="title">Frequently Asked Questions</h1>
		{!! Form::open(['url' => '/faq', 'method' => 'get']) !!}
				{{ Form::text('query', '', ['placeholder' => 'Search on keyword','class' => 'search-field dark']) }}
				@if ($errors->first('query'))
					{{ $errors->first('query') }}
				@endif
		{!! Form::close() !!}
		@if ($questions)
			@if ($questions->count())
			<div id="search-info">
				<span>Don't find what you're looking for?</span><br>
				<span>You can always contact our <a href="/about">customer service</a>. We're happy to help you!</span>
			</div>
			@endif
		@endif
		@if ($response)
		<h3 id="search-response">{{ $response }}</h3>
		@endif
		<div class="searchresults-container">
			@if($questions)
				@foreach ($questions as $question)
					<div class="searchresult">
						<h3>{{ $question->title}}</h3>
						<p>{{ $question->body}}</p>
					</div>
				@endforeach
			@endif
		</div>
	</div>
</div>
@endsection