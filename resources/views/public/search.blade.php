@extends('layouts.app')

@section('content')

@include('includes.admin-nav')

<div class="content secondary-bg">
	<div class="main-content">
		<span>Advanced filter</span>
		<span class="caret"></span>
		<div class="filter">
			<div class="collection left">
				<p>Category</p>
				@foreach ($categories as $category)
					<div class="collection-item">
						<input type="checkbox">
						<label>{{ $category->name }} </label>
					</div>
				@endforeach	
			</div>
			<div class="price right">
				<p>Price range </p>
				<span class="euro">€ <input type="text"></span>
				<span class="price-divider"> - </span>
				<span class="euro">€ <input type="text"></span>
			</div>
		</div>
		{!! Form::open(['url' => '/search']) !!}
			{{ Form::token() }}
				{{ Form::text('search', '', ['placeholder' => 'Just start typing and hit "enter" to search','class' => 'search-field']) }}
				@if ($errors->first('search'))
					{{ $errors->first('search') }}
				@endif
		{!! Form::close() !!}
	</div>
</div>
@endsection