<div class="faq-container">
	<h1 class="title">{{ trans('messages.faq') }}</h1>
	@if($questions->count())
		@foreach ($questions as $question)
			<div class="question">
				<h3>{{ $question->{"question_" . LaravelLocalization::getCurrentLocale()} }}</h3>
				<p>{{ $question->{"answer_" . LaravelLocalization::getCurrentLocale()} }}</p>
			</div>
		@endforeach
		<span class="text-right"><a href="/faq">{{ trans('messages.more_faq') }}</a></span>
	@else
		<span class="not-found-msg">{{ trans('messages.no_faq') }}</span>
	@endif
	<br>
</div>
