@extends('layouts.app')

@section('content')
<div class="content search-page secondary-bg">
	<div class="main-content">
		<a href="/admin/products">Back to overview</a>
		<h1>Productinfo</h1>
		<h3>{{ $product->name}}</h3>
		<p>{{ $product->description}}</p>
		<p>{{ $product->technical_description}}</p>
		<h3>Tags: </h3>
		<br>
		@foreach ($product->tags as $tag)
			<span>- {{ $tag->name}}</span><br>
		@endforeach

		<h3>Questions</h3>
		@foreach($product->questions as $question)
			<span>{{ $question->question}}</span>
			<p>{{$question->answer}}</p>
		@endforeach

		<h3>Images</h3>
		@foreach ($product->productimages as $image)
		<div class="admin-image">
			<img src="/img/{{$image->image_url}}" alt=""><br>
			<span>{{$image->description}}</span>
		</div>
		@endforeach
	</div>
</div>
@endsection