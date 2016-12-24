@extends('layouts.app')

@section('content')
<div class="content search-page secondary-bg">
	<div class="main-content">
		<a href="/admin/products">Back to overview</a>
		<h1>New product</h1>
		{!! Form::open(['url' => '/admin/products/create', 'files' => true]) !!}
			{{ Form::token() }}
			<div class="form-group">
				@if ($errors->first('name'))
					<div class="alert alert-danger">{{ $errors->first('name') }}</div>
				@endif
				{{ Form::label('name', 'Product name') }}
				{{ Form::text('name', '', ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				@if ($errors->first('price'))
					<div class="alert alert-danger">{{ $errors->first('price') }}</div>
				@endif
				{{ Form::label('price', 'Price (€)') }}
				{{ Form::text('price', '', ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				@if ($errors->first('description'))
					<div class="alert alert-danger">{{ $errors->first('description') }}</div>
				@endif
				{{ Form::label('description', 'Description') }}
				{{ Form::text('description', '', ['class' => 'form-control']) }}				
			</div>
			<div class="form-group">
				@if ($errors->first('technical_description'))
					<div class="alert alert-danger">{{ $errors->first('technical_description') }}</div>
				@endif
				{{ Form::label('technical_description', 'Technical description') }}
				{{ Form::text('technical_description', '', ['class' => 'form-control']) }}
			</div>

			<label>Tags this product belongs to: </label>
			@foreach ($tags as $tag)
				<div class="form-group">
					{{ Form::checkbox('tags[]', $tag->id) }}
					{{ Form::label($tag->name) }}
				</div>
			@endforeach

			@if ($errors->first('category'))
				<div class="alert alert-danger">{{ $errors->first('category') }}</div>
			@endif
			<label>Category this product belongs to:</label>
			@foreach ($categories as $category)
				<div class="form-group">
					{{ Form::radio('category', $category->id) }}
					{{ Form::label($category->name) }}
				</div>
			@endforeach
			
			<div id="imageupload-container">
				<div class="form-group" id="image-upload">
					@if ($errors->first('image'))
						<div class="alert alert-danger">{{ $errors->first('image') }}</div>
					@endif
					{{ Form::label('Upload images for this product: ') }}
					{{ Form::file('image[]')}}

					@if ($errors->first('imagedescription'))
						<div class="alert alert-danger">{{ $errors->first('imagedescription') }}</div>
					@endif
					<!-- https://github.com/laravel/framework/issues/2243 -->
					<label for="imagedescription[]">Image description</label>
					<input type="text" name="imagedescription[]" class="form-control">
				</div>
			</div>
			<button type="button" onclick="createForm();" id="addImage">Add another image</button>
			<div class="form-group">
				{{ Form::submit('Save', ['class' => 'button orange']) }}
			</div>
		{!! Form::close() !!}
	</div>
</div>
@endsection

@section('scripts')
<script src="/js/addimageuploadinput.js"></script>
@endsection