@extends('layouts.app')

@section('content')
<div class="content search-page secondary-bg">
	<div class="main-content">
		<a href="/admin/questions">Back to overview</a>
		<h1>New question</h1>
		{!! Form::open(['url' => '/admin/questions/create']) !!}
			{{ Form::token() }}
			<div class="form-group">
				@if ($errors->first('question_nl'))
					<div class="alert alert-danger">{{ $errors->first('question_nl') }}</div>
				@endif
				{{ Form::label('question_nl', 'Question NL') }}
				{{ Form::text('question_nl', '', ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				@if ($errors->first('question_fr'))
					<div class="alert alert-danger">{{ $errors->first('question_fr') }}</div>
				@endif
				{{ Form::label('question_fr', 'Question FR') }}
				{{ Form::text('question_fr', '', ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				@if ($errors->first('answer_nl'))
					<div class="alert alert-danger">{{ $errors->first('answer_nl') }}</div>
				@endif
				{{ Form::label('answer_nl', 'Answer NL') }}
				{{ Form::text('answer_nl', '', ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				@if ($errors->first('answer_fr'))
					<div class="alert alert-danger">{{ $errors->first('answer_fr') }}</div>
				@endif
				{{ Form::label('answer_fr', 'Answer FR') }}
				{{ Form::text('answer_fr', '', ['class' => 'form-control']) }}
			</div>
			<label>This question belongs to the following products: (to create a question for the 'about' page, leave these fields blank) </label>
			@foreach ($products as $product)
				<div class="form-group">
					{{ Form::checkbox('products[]', $product->id) }}
					{{ Form::label($product->name_nl) }}
				</div>
			@endforeach
			
			<div class="form-group">
				{{ Form::submit('Save', ['class' => 'button orange']) }}
			</div>
		{!! Form::close() !!}
	</div>
</div>
@endsection