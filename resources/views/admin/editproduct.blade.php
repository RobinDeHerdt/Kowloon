@extends('layouts.app')

@section('content')
<div class="content search-page secondary-bg">
	<div class="main-content">
		<a href="/admin/products">Back to overview</a>
		<h1>Update product</h1>
		{!! Form::open(['url' => '/admin/products/'.$product->id.'/edit', 'files' => true]) !!}
			{{ Form::token() }}
			
			<div class="form-group">
				{{ Form::label('name', 'Product name') }}
				{{ Form::text('name', $product->name, ['class' => 'form-control']) }}
				@if ($errors->first('name'))
					{{ $errors->first('name') }}
				@endif
			</div>
			<div class="form-group">
				{{ Form::label('price', 'Price (€)') }}
				{{ Form::text('price', $product->price, ['class' => 'form-control']) }}
				@if ($errors->first('price'))
					{{ $errors->first('price') }}
				@endif
			</div>
			<div class="form-group">
				{{ Form::label('description', 'Description') }}
				{{ Form::text('description', $product->description, ['class' => 'form-control']) }}
				@if ($errors->first('description'))
					{{ $errors->first('description') }}
				@endif
			</div>
			<div class="form-group">
				{{ Form::label('technical_description', 'Technical description') }}
				{{ Form::text('technical_description', $product->technical_description, ['class' => 'form-control']) }}
				@if ($errors->first('technical_description'))
					{{ $errors->first('technical_description') }}
				@endif
			</div>

			<label>Tags this product belongs to: </label>

			@foreach ($tags as $tag)
				<div class="form-group">
					{{ Form::checkbox('tags[]', $tag->id, ($product->tags->contains($tag->id) ? 'true' : '')) }}
					{{ Form::label($tag->name) }}
				</div>
			@endforeach

			<label>Category this product belongs to:</label>

			@foreach ($categories as $category)
				<div class="form-group">
					{{ Form::radio('category', $category->id, ($product->category->id == $category->id ? true : '')) }}
					{{ Form::label($category->name) }}
				</div>
			@endforeach
			
			<label for="colors[]">Select available colors for this product:</label>
			<div id="colorPicker">
			@foreach($colors as $key=>$color)
				<div class=" colorContainer" id="colorId{{$key+1}}">
					<input type="color" name="colors[]" value="{{$color->hex}}">
					<button type="button" id="deleteColor{{$key+1}}" onclick="deleteColor(this);">Remove</button>
				</div>
			@endforeach
			</div>
			<input type="hidden" value="{{$colors->count()}}" id="colorCount">
			<button type="button" onclick="createColor();" id="addColor">Add color</button>
			
			<div class="space"></div>

			<label for="dimensions[]">Describe available dimensions for this product:</label>
			<div id="dimensions">
			@foreach($dimensions as $key=>$dimension)
				<div class=" dimensions" id="dimensionsId{{$key+1}}">
					<input type="text" name="dimensions[]" value="{{$dimension->body}}">
					<button type="button" id="deleteDimensions{{$key+1}}" onclick="deleteDimensions(this);">Remove</button>
				</div>
			@endforeach
			</div>
			<input type="hidden" value="{{$dimensions->count()}}" id="dimensionsCount">
			<button type="button" onclick="createDimensions();" id="addDimensions">Add dimensions</button>
			
			<div class="space"></div>

			<label>Uploaded images</label>
			@foreach ($product->productimages as $image)
				<div class="form-group">
					{{ Form::checkbox('uploadedimages[]', $image->id, true)}}
					<img src="/img/{{$image->image_url}}" class="mini-thumbnail">
					{{ Form::label($image->description) }}
				</div>
			@endforeach
	
			<div id="imageupload-container">
				<div class="form-group" id="image-upload">
					{{ Form::label('Upload new images: ') }}
					{{ Form::file('image[]')}}
					{{ Form::label('imagedescription[]', 'Image description') }}
					{{ Form::text('imagedescription[]', '', ['class' => 'form-control']) }}
				</div>
			</div>
			<button type="button" onclick="createForm();">Add another image</button>
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