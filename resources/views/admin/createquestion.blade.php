@extends('layouts.app')

@section('content')
<div class="content search-page secondary-bg">
	<div class="main-content">
		<a href="/admin/overview">Back to overview</a>
		<h1>New question</h1>
		{!! Form::open(['url' => '/admin/questions/create']) !!}
				{{ Form::token() }}
				<div class="form-group">
					{{ Form::label('title', 'Question') }}
					{{ Form::text('title', '', ['class' => 'form-control']) }}
					@if ($errors->first('title'))
						{{ $errors->first('title') }}
					@endif
				</div>
				<div class="form-group">
					{{ Form::label('body', 'Answer') }}
					{{ Form::text('body', '', ['class' => 'form-control']) }}
					@if ($errors->first('body'))
						{{ $errors->first('body') }}
					@endif
				</div>
				
				<div>
					<span>Belongs to ... product (dropdown here)</span>
				</div>
				
				<div class="form-group">
					{{ Form::submit('Save', ['class' => 'button orange']) }}
				</div>
			{!! Form::close() !!}
	</div>
</div>
@endsection