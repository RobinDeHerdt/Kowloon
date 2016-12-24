<div class="faq-container">
	<h1 class="title">Frequently Asked Questions</h1>
	@if($questions->count())
		@foreach ($questions as $question)
			<div class="question">
				<h3>{{ $question->question }}</h3>
				<p>{{ $question->answer }}</p>
			</div>
		@endforeach
		<span class="text-right"><a href="/faq">More questions?</a></span>
	@else
		<h3>There are no questions (yet).</h3>
	@endif
	<br>
</div>
