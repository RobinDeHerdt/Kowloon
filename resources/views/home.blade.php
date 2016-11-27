@extends('layouts.app')

@section('content')
        <img src="/img/logo.png" alt="logo" class="logo-image">
        <!-- Carousel -->
        <img src="/img/dog-1.png" alt="dog picture" class="carousel-image">
		<div class="content">
			<div class="intro-content">
	        	<div id="introtext">
	            	<p>{{ trans('messages.welcome') }}</p>
	            </div>
	        </div>
	        <div class="categories-content">
	        	<div class="category">
	        		<img src="/img/dog.png" alt="dogs">
	        	</div>
	        	<div class="category">
					<img src="/img/cat.png" alt="cats">
				</div>
				<div class="category">
					<img src="/img/fish.png" alt="fish">
				</div>
				<div class="category">
					<img src="/img/bird.png" alt="birds">
				</div>
				<div class="category">
					<img src="/img/hamster.png" alt="small animals">
				</div>
				<div class="category">
					<img src="/img/plus.png" alt="other">
				</div>
				<h1>Hot items</h1>
			</div>

		</div>
@endsection
