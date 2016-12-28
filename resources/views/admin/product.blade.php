@extends('layouts.app')

@section('content')
<div class="content search-page secondary-bg">
	<div class="main-content">
		<a href="/admin/products">Back to overview</a>
		<h1>Productinfo</h1>
		<h3>{{ $product->name_nl}}</h3>
		<p>Categry: {{$product->category->name_nl}}</p>
		<p>Description: {{ $product->description_nl}}</p>
		<p>Technical description: {{ $product->technical_description_nl}}</p>
		<h3>Tags: </h3>
		<br>
		@if($product->tags->count())
			@foreach ($product->tags as $tag)
				<span>- {{ $tag->name_nl}}</span><br>
			@endforeach
		@else
			<span>There are no tags for this product.</span>
		@endif

		<h3>Colors</h3>
		@if($product->colors->count())
			@foreach ($product->colors as $color)
				<div class="color"></div>
				<input type="hidden" value="{{$color->hex}}" class="hexval">
			@endforeach
		@else
			<span>There are no colors for this product.</span>
		@endif

		<h3>Dimensions</h3>
		@if($product->dimensions->count())
			@foreach ($product->dimensions as $dimension)
				<span>- {{ $dimension->body }}</span><br>
			@endforeach
		@else
			<span>There are no dimensions for this product.</span>
		@endif

		<h3>Questions</h3>
		@if($product->questions->count())
			@foreach($product->questions as $question)
				<span>Q: {{ $question->question_nl}}</span>
				<p>A: {{$question->answer_nl}}</p>
			@endforeach
		@else
			<span>There are no questions for this product. Create a question <a href="/admin/questions/create">here</a>.</span>
		@endif

		<h3>Images</h3>
		@foreach ($product->productimages as $image)
		<div class="admin-image">
			<img src="/img/products/{{$image->image_url}}" alt=""><br>
			<span>{{$image->description_nl}}</span>
		</div>
		@endforeach
	</div>
</div>
@endsection

@section('scripts')
	<script src="/js/showcolors.js"></script>
@endsection