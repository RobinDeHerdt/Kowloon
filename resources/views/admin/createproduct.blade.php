@extends('layouts.app')

@section('content')
<div class="content search-page secondary-bg">
	<div class="main-content">
		<a href="/admin/products">Back to overview</a>
		<h1>New product</h1>
		{!! Form::open(['url' => '/admin/products/create', 'files' => true]) !!}
			{{ Form::token() }}
			<div class="form-group">
				@if ($errors->first('name_nl'))
					<div class="alert alert-danger">{{ $errors->first('name_nl') }}</div>
				@endif
				{{ Form::label('name_nl', 'Product name NL') }}
				{{ Form::text('name_nl', '', ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				@if ($errors->first('name_fr'))
					<div class="alert alert-danger">{{ $errors->first('name_fr') }}</div>
				@endif
				{{ Form::label('name_fr', 'Product name FR') }}
				{{ Form::text('name_fr', '', ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				@if ($errors->first('price'))
					<div class="alert alert-danger">{{ $errors->first('price') }}</div>
				@endif
				{{ Form::label('price', 'Price (€)') }}
				{{ Form::text('price', '', ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				@if ($errors->first('description_nl'))
					<div class="alert alert-danger">{{ $errors->first('description_nl') }}</div>
				@endif
				{{ Form::label('description_nl', 'Description NL') }}
				{{ Form::text('description_nl', '', ['class' => 'form-control']) }}	
			</div>
			<div class="form-group">
				@if ($errors->first('description_fr'))
					<div class="alert alert-danger">{{ $errors->first('description_fr') }}</div>
				@endif
				{{ Form::label('description_fr', 'Description FR') }}
				{{ Form::text('description_fr', '', ['class' => 'form-control']) }}	
			</div>
			<div class="form-group">
				@if ($errors->first('technical_description_nl'))
					<div class="alert alert-danger">{{ $errors->first('technical_description_nl') }}</div>
				@endif
				{{ Form::label('technical_description_nl', 'Technical description NL') }}
				{{ Form::text('technical_description_nl', '', ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				@if ($errors->first('technical_description_fr'))
					<div class="alert alert-danger">{{ $errors->first('technical_description_fr') }}</div>
				@endif
				{{ Form::label('technical_description_fr', 'Technical description FR') }}
				{{ Form::text('technical_description_fr', '', ['class' => 'form-control']) }}
			</div>
			<label>Tags this product belongs to: </label>
			@foreach ($tags as $tag)
				<div class="form-group">
					{{ Form::checkbox('tags[]', $tag->id) }}
					{{ Form::label($tag->name_nl) }}
				</div>
			@endforeach

			@if ($errors->first('category'))
				<div class="alert alert-danger">{{ $errors->first('category') }}</div>
			@endif
			<label>Category this product belongs to:</label>
			@foreach ($categories as $category)
				<div class="form-group">
					{{ Form::radio('category', $category->id) }}
					{{ Form::label($category->name_nl) }}
				</div>
			@endforeach
			
			<label for="colors[]">Select available colors for this product:</label>
			<div id="colorPicker"></div>
			<button type="button" onclick="createColor();" id="addColor">Add color</button>
			
			<div class="space"></div>

			<label for="dimensions[]">Describe available dimensions for this product:</label>
			<div id="dimensions"></div>
			<button type="button" onclick="createDimensions();" id="addDimensions">Add dimensions</button>
			<div class="space"></div>
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
					<label for="imagedescription_nl[]">Image description NL</label>
					<input type="text" name="imagedescription_nl[]" class="form-control">
					<label for="imagedescription_fr[]">Image description FR</label>
					<input type="text" name="imagedescription_fr[]" class="form-control">
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
<script src="/js/addinput.js"></script>
@endsection