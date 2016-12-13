@extends('layouts.app')

@section('content')

@include('includes.admin-nav')

<div class="content secondary-bg">
	<div class="main-content">
		<div id="filterToggle" onclick="toggleFilter()">
			<span>Advanced filter</span>
			<span class="caret"></span>
		</div>
		<div class="filter hide" id="productFilter">
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
		<div class="space"></div>
		{!! Form::open(['url' => '/search']) !!}
			{{ Form::token() }}
				{{ Form::text('search', '', ['placeholder' => 'Just start typing and hit "enter" to search','class' => 'search-field']) }}
				@if ($errors->first('search'))
					{{ $errors->first('search') }}
				@endif
		{!! Form::close() !!}
	</div>
</div>
<script>
	function toggleFilter()
	{
		var productFilter = document.getElementById('productFilter');
		productFilter.classList.toggle('hide');
	}
</script>
@endsection