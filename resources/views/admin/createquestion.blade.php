@extends('layouts.app')

@section('content')
<div class="content search-page secondary-bg">
	<div class="main-content">
		<a href="/admin/questions">Back to overview</a>
		<h1>New question</h1>
		{!! Form::open(['url' => '/admin/questions/create']) !!}
			{{ Form::token() }}
			<div class="form-group">
				@if ($errors->first('question'))
					<div class="alert alert-danger">{{ $errors->first('question') }}</div>
				@endif
				{{ Form::label('question', 'Question') }}
				{{ Form::text('question', '', ['class' => 'form-control']) }}
			</div>

			<div class="form-group">
				@if ($errors->first('answer'))
					<div class="alert alert-danger">{{ $errors->first('answer') }}</div>
				@endif
				{{ Form::label('answer', 'Answer') }}
				{{ Form::text('answer', '', ['class' => 'form-control']) }}
			</div>
			<label>This question belongs to the following products: (to create a question for the 'about' page, leave these fields blank) </label>
			@foreach ($products as $product)
				<div class="form-group">
					{{ Form::checkbox('products[]', $product->id) }}
					{{ Form::label($product->name) }}
				</div>
			@endforeach
			
			<div class="form-group">
				{{ Form::submit('Save', ['class' => 'button orange']) }}
			</div>
		{!! Form::close() !!}
	</div>
</div>
@endsection