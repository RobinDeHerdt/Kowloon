@extends('layouts.app')

@section('content')
<div class="content search-page secondary-bg">
	<div class="main-content">
		<a href="/admin/questions">Back to overview</a>
		<h1>Update question</h1>
		{!! Form::open(['url' => '/admin/questions/'.$question->id.'/edit']) !!}
				{{ Form::token() }}
				<div class="form-group">
					{{ Form::label('question', 'Question') }}
					{{ Form::text('question', $question->question, ['class' => 'form-control']) }}
					@if ($errors->first('question'))
						{{ $errors->first('question') }}
					@endif
				</div>

				<div class="form-group">
					{{ Form::label('answer', 'Answer') }}
					{{ Form::text('answer', $question->answer, ['class' => 'form-control']) }}
					@if ($errors->first('answer'))
						{{ $errors->first('answer') }}
					@endif
				</div>
				<span>This question belongs to the following products: (to create a question for the 'about' page, leave these fields blank) </span>
				@foreach ($products as $product)
					<div class="form-group">
						{{ Form::checkbox('products[]', $product->id, ($question->products->contains($product->id) ? 'true' : ''))}}
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