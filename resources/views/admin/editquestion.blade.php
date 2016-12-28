@extends('layouts.app')

@section('content')
<div class="content search-page secondary-bg">
	<div class="main-content">
		<a href="/admin/questions">Back to overview</a>
		<h1>Update question</h1>
		{!! Form::open(['url' => '/admin/questions/'.$question->id.'/edit']) !!}
				{{ Form::token() }}
				<div class="form-group">
					{{ Form::label('question_nl', 'Question NL') }}
					{{ Form::text('question_nl', $question->question_nl, ['class' => 'form-control']) }}
					@if ($errors->first('question_nl'))
						{{ $errors->first('question_nl') }}
					@endif
				</div>
				<div class="form-group">
					{{ Form::label('question_fr', 'Question FR') }}
					{{ Form::text('question_fr', $question->question_fr, ['class' => 'form-control']) }}
					@if ($errors->first('question_fr'))
						{{ $errors->first('question_fr') }}
					@endif
				</div>
				<div class="form-group">
					{{ Form::label('answer_nl', 'Answer NL') }}
					{{ Form::text('answer_nl', $question->answer_nl, ['class' => 'form-control']) }}
					@if ($errors->first('answer_nl'))
						{{ $errors->first('answer_nl') }}
					@endif
				</div>
				<div class="form-group">
					{{ Form::label('answer_fr', 'Answer FR') }}
					{{ Form::text('answer_fr', $question->answer_fr, ['class' => 'form-control']) }}
					@if ($errors->first('answer_fr'))
						{{ $errors->first('answer_fr') }}
					@endif
				</div>
				<span>This question belongs to the following products: (to create a question for the 'about' page, leave these fields blank) </span>
				@foreach ($products as $product)
					<div class="form-group">
						{{ Form::checkbox('products[]', $product->id, ($question->products->contains($product->id) ? 'true' : ''))}}
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