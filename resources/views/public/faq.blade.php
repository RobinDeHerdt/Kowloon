@extends('layouts.app')

@section('content')

@include('includes.admin-nav')

<div class="content search-page secondary-bg">
	<div class="main-content">
		<h1 class="title">{{ trans('messages.faq') }}</h1>
		{!! Form::open(['url' => '/faq', 'method' => 'get']) !!}
				{{ Form::text('query', '', ['placeholder' =>  trans('messages.search_keyword'),'class' => 'search-field dark']) }}
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
						<h3>{{ $question->{"question_" . LaravelLocalization::getCurrentLocale()} }}</h3>
						<p class="answer">{{ $question->{"answer_" . LaravelLocalization::getCurrentLocale()} }}</p>
					</div>
				@endforeach
				{{ $questions->links() }}
			@endif
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-89247037-1', 'auto');
ga('send', 'pageview');
</script>
@endsection