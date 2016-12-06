@extends('layouts.app')

@section('content')

		@include('includes.carousel')

		<div class="content">
			<div class="intro-content">
	            <p>{{ trans('messages.welcome') }}</p>
	        </div>
	        <div class="categories-content">
		        @foreach ($categories as $category)
		        	<div class="category">
		        		<img src="/img/{{ $category->image_url }}" alt="{{ $category->name }}">
		        		<span>{{$category->name}}</span>
		        	</div>
		        @endforeach
			</div>
			<div class="main-content">
				<h1>Hot items.</h1>
				<div class="hot-items-container">
					@foreach ($hotitems as $hotitem)
						<div class="hot-item">
							@if ($hotitem->product->productimages->count() > 1)
								<div class="imagecount">
									<span>{{ $hotitem->product->productimages->count() }}</span>
								</div>
							@endif
							<div class="image-container">
								<img src="/img/{{ $hotitem->product->productimages->first()->image_url}}" alt="hot-item-1">
							</div>
							<div class="description">
							<span>{{ $hotitem->product->name }}</span>
							<span>€ {{ $hotitem->product->price }}</span>
							</div>
						</div>
					@endforeach
				</div>
				<span class="text-right"><a href="#">Visit the store</a></span>
				@include('includes.subscribe')
			</div>
		</div>
@endsection
