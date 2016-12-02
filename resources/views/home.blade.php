@extends('layouts.app')

@section('content')
        <img src="/img/logo.png" alt="logo" class="logo-image">

		<div id="myCarousel" class="carousel slide" data-ride="carousel">
		  	<ol class="carousel-indicators">
			  	@foreach ($carouselimages as $key => $image)
			    	<li data-target="#myCarousel" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
			    @endforeach
		 	</ol>

		  	<div class="carousel-inner" role="listbox">
			  	@foreach ($carouselimages as $key => $image)
			    	<div class="item {{ $key == 0 ? 'active' : '' }}">
			      		<img src="/img/{{ $image->image_url }}">
			    	</div>
				@endforeach
		  	</div>
		</div>
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
					<div class="hot-item">
						<img src="/img/cooling mat.png" alt="hot-item-1">
						<span>Cooling mat</span>
						<span>€ 15,49</span>
					</div>
					<div class="hot-item">
						<img src="/img/cooling mat.png" alt="hot-item-1">
						<span>Cooling mat</span>
						<span>€ 15,49</span>
					</div>
					<div class="hot-item">
						<img src="/img/cooling mat.png" alt="hot-item-1">
						<span>Cooling mat</span>
						<span>€ 15,49</span>
					</div>
					<div class="hot-item">
						<img src="/img/cooling mat.png" alt="hot-item-1">
						<span>Cooling mat</span>
						<span>€ 15,49</span>
					</div>
				</div>
				<span id="visit-link"><a href="#">Visit the store</a></span>
				<div class="subscribe-container">
					<div class="discover-box">
						<h1>discover amazing Kowloon deals!</h1>
						<h3>Only in our newsletter</h3>
					</div>
					<div class="input-box">
						<h3>Subscribe to our newsletter</h2>
						<span>Lorem ipsum dolor sit amet.</span>
						{!! Form::open(['url' => '/' . Lang::locale() . '/subscribe']) !!}
							{{ Form::token() }}
							{{ Form::text('email', '', ['placeholder' => 'name@domain.com']) }}
							{{ Form::submit('OK') }}
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
@endsection
