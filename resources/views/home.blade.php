@extends('layouts.app')

@section('content')
        <img src="/img/logo.png" alt="logo" class="logo-image">
        <!-- Carousel -->
        <img src="/img/dog-1.png" alt="dog picture" class="carousel-image">
		<div class="content">
			<div class="intro-content">
	            <p>{{ trans('messages.welcome') }}</p>
	        </div>
	        <div class="categories-content">
	        	<div class="category">
	        		<img src="/img/dog.png" alt="dogs">
	        		<span>dogs</span>
	        	</div>
	        	<div class="category">
					<img src="/img/cat.png" alt="cats">
					<span>cats</span>
				</div>
				<div class="category">
					<img src="/img/fish.png" alt="fish">
					<span>fish</span>
				</div>
				<div class="category">
					<img src="/img/bird.png" alt="birds">
					<span>birds</span>
				</div>
				<div class="category">
					<img src="/img/hamster.png" alt="small animals">
					<span>small animals</span>
				</div>
				<div class="category">
					<img src="/img/plus.png" alt="other">
					<span class="category-text">other</span>
				</div>
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
