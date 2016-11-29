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
				<h1>Hot items</h1>
			</div>
		</div>
@endsection
