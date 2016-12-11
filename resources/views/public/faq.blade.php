@extends('layouts.app')

@section('content')

@include('includes.admin-nav')

<div class="content secondary-bg">
	<div class="main-content top-margin">
		<h1 class="title">Frequently Asked Questions</h1>
		{!! Form::open(['url' => '/searchfaq']) !!}
			{{ Form::token() }}
				{{ Form::text('searchfaq', '', ['placeholder' => 'Search on keyword','class' => 'search-field dark']) }}
				@if ($errors->first('searchfaq'))
					{{ $errors->first('searchfaq') }}
				@endif
		{!! Form::close() !!}
	</div>
</div>
@endsection