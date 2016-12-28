@extends('layouts.app')

@section('content')
<div class="content search-page secondary-bg">
	<div class="main-content">
		<a href="/admin/products">Back to overview</a>
		<h1>Update product</h1>
		@if (session('product_update_error'))
	    <div class="alert alert-danger">
	        {{ session('product_update_error') }}
	    </div>
		@endif
		{!! Form::open(['url' => '/admin/products/'.$product->id.'/edit', 'files' => true]) !!}
			{{ Form::token() }}
			<div class="form-group">
				{{ Form::label('name_nl', 'Product name NL') }}
				{{ Form::text('name_nl', $product->name_nl, ['class' => 'form-control']) }}
				@if ($errors->first('name_nl'))
					{{ $errors->first('name_nl') }}
				@endif
			</div>
			<div class="form-group">
				{{ Form::label('name_fr', 'Product name FR') }}
				{{ Form::text('name_fr', $product->name_fr, ['class' => 'form-control']) }}
				@if ($errors->first('name_fr'))
					{{ $errors->first('name_fr') }}
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
				{{ Form::label('description_nl', 'Description NL') }}
				{{ Form::text('description_nl', $product->description_nl, ['class' => 'form-control']) }}
				@if ($errors->first('description_nl'))
					{{ $errors->first('description_nl') }}
				@endif
			</div>
			<div class="form-group">
				{{ Form::label('description_fr', 'Description FR') }}
				{{ Form::text('description_fr', $product->description_fr, ['class' => 'form-control']) }}
				@if ($errors->first('description_fr'))
					{{ $errors->first('description_fr') }}
				@endif
			</div>
			<div class="form-group">
				{{ Form::label('technical_description_nl', 'Technical description NL') }}
				{{ Form::text('technical_description_nl', $product->technical_description_nl, ['class' => 'form-control']) }}
				@if ($errors->first('technical_description_nl'))
					{{ $errors->first('technical_description_nl') }}
				@endif
			</div>
			<div class="form-group">
				{{ Form::label('technical_description_fr', 'Technical description FR') }}
				{{ Form::text('technical_description_fr', $product->technical_description_fr, ['class' => 'form-control']) }}
				@if ($errors->first('technical_description_fr'))
					{{ $errors->first('technical_description_fr') }}
				@endif
			</div>
			<label>Tags this product belongs to: </label>
			@foreach ($tags as $tag)
				<div class="form-group">
					{{ Form::checkbox('tags[]', $tag->id, ($product->tags->contains($tag->id) ? 'true' : '')) }}
					{{ Form::label($tag->name_nl) }}
				</div>
			@endforeach

			<label>Category this product belongs to:</label>

			@foreach ($categories as $category)
				<div class="form-group">
					{{ Form::radio('category', $category->id, ($product->category->id == $category->id ? true : '')) }}
					{{ Form::label($category->name_nl) }}
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
					<img src="/img/products/{{$image->image_url}}" class="mini-thumbnail">
					{{ Form::label($image->description_nl) }}
				</div>
			@endforeach
	
			<div id="imageupload-container">
				<div class="form-group" id="image-upload">
					{{ Form::label('Upload new images: ') }}
					{{ Form::file('image[]')}}
					{{ Form::label('imagedescription_nl[]', 'Image description NL') }}
					{{ Form::text('imagedescription_nl[]', '', ['class' => 'form-control']) }}
					{{ Form::label('imagedescription_fr[]', 'Image description FR') }}
					{{ Form::text('imagedescription_fr[]', '', ['class' => 'form-control']) }}
				</div>
			</div>
			<button type="button" onclick="createForm();">Add another image</button>
			<div class="space"></div>
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