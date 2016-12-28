@extends('layouts.app')

@section('content')
<div class="content search-page secondary-bg">
	<div class="main-content">
		<a href="/admin/questions">Back to overview</a>
		<h1>Question</h1>
		<h2>Q: {{ $question->question_nl }}</h2>
		<h2>A: {{ $question->answer_nl }}</h2>
		<hr>
		<h3>Belongs to following products: </h3>
		@if(count($question->products))
			@foreach($question->products as $product)
				<span>- {{$product->name_nl}}</span><br>
			@endforeach
		@else
			<span>This question does not belong to any products. It is placed in the 'about' section of the site.</span>
		@endif
	</div>
</div>
@endsection