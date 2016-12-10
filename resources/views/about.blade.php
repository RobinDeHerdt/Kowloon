@extends('layouts.app')

@section('content')
<a href="/home"><img src="/img/logo.png" alt="Kowloon logo" class="logo-image"></a>
<div class="carousel">
	<div class="carousel-inner">
		<div class="item active">
			<img src="/img/carousel-4.png" alt="">
		</div>
	</div>
</div>
<div class="content">
	<div class="main-content">
		<div class="tags-container">
			<img src="/img/k_logo.png" class="small_logo">
			<div class="tag">
					about me
			</div>
		</div>
		<h1 class="title">About us</h1>
		<div class="about-left-content">
			<h3 class="title">Kowloon</h3>
			<p>Pet Concept, active since 1998, is developing, importing and exporting products for pets worldwide.</p> 
			<p>Natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae sequi nesciunt.</p>
		</div>
		<div class="about-right-content">
			<h3 class="title">Contact</h3>
			<ul>
				<li>Deckx Johan</li>
				<li>Bosdreef 7</li>
				<li>2200 Herentals</li>
			</ul>
		</div>
		<div class="contact-form">
			<h3 class="title">Leave us a message</h3>
			{!! Form::open(['url' => '/contact']) !!}
				{{ Form::token() }}
				<div class="form-group">
					{{ Form::label('email', 'E-mail') }}
					{{ Form::text('email', '', ['placeholder' => 'name@domain.com','class' => 'form-control']) }}
				</div>
				@if ($errors->first('email'))
					{{ $errors->first('email') }}
				@endif
				<div class="form-group">
					{{ Form::label('message', 'Your message') }}
					{{ Form::textarea('message', '', ['placeholder' => 'Write your message here','class' => 'form-control']) }}
				</div>
				@if ($errors->first('message'))
					{{ $errors->first('message') }}
				@endif
				<div class="form-group">
					{{ Form::submit('Send', ['class' => 'contact-button']) }}
				</div>
			{!! Form::close() !!}
		</div>
		@include('includes.faq')
	</div>
</div>
@endsection