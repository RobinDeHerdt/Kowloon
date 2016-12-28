@if(Session::has('subscribe_success'))
	<div class="alert alert-success"><span>{{ session('subscribe_success') }}</span></div>
@endif
@if(Session::has('subscribe_failed'))
	<div class="alert alert-warning"><span>{{ session('subscribe_failed') }}</span></div>
@endif
@if ($errors->first('email'))
	<div class="alert alert-warning"><span>{{ $errors->first('email') }}</span></div>
@endif
<div class="subscribe-container">
	<div class="discover-box">
		<h1>{{ trans('messages.discover') }}</h1>
		<h3>{{ trans('messages.newsletter') }}</h3>
	</div>
	<div class="input-box">
		<h3>{{ trans('messages.subscribe') }}</h2>
		<span>{{ trans('messages.subscribe') }}</span>
		{!! Form::open(['url' => '/' . LaravelLocalization::getCurrentLocale() . '/subscribe']) !!}
			{{ Form::token() }}
			{{ Form::text('email', '', ['placeholder' => 'name@domain.com']) }}
			{{ Form::submit('OK') }}
		{!! Form::close() !!}
	</div>
</div>