<div class="faq-container">
	<h1 class="title">Frequently Asked Questions</h1>
	@if($questions->count())
		@foreach ($questions as $question)
			<div class="question">
				<h3>{{ $question->title }}</h3>
				<p>{{ $question->body }}</p>
			</div>
		@endforeach
	@else
		<h1>No questions for this product yet.</h1>
	@endif
	<br>
</div>
<span class="text-right"><a href="/faq">More questions?</a></span>