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