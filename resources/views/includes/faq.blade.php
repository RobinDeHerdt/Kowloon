<div class="faq-container">
	<h1 class="title">{{ trans('messages.faq') }}</h1>
	@if($questions->count())
		@foreach ($questions as $question)
			<div class="question">
				<h3>{{ $question->question }}</h3>
				<p>{{ $question->answer }}</p>
			</div>
		@endforeach
		<span class="text-right"><a href="/faq">{{ trans('messages.more_faq') }}</a></span>
	@else
		<h3>{{ trans('messages.no_faq') }}</h3>
	@endif
	<br>
</div>
