@extends('layouts.app')

<div class="content secondary-bg">
	<div class="main-content">
		<h1>Dashboard</h1>
		@if(Session::has('hotitems_update_status'))
	    	<div class="alert alert-success"><span>{{ session('hotitems_update_status') }}</span></div>
		@endif
		@if ($errors->all())
			<div class="alert alert-warning"><span>Oops! Something went terribly wrong! Better check the form again.</span></div>
		@endif
		<div class="admin-box">
			<h3 class="title">Hot-items</h3>
			<form action="/admin/hotitems" method="POST">	
				{{ Form::token() }}
				@foreach ($hotitems as $item)
				<div class="hot-item-select">
					<h4>Hot item {{$item->id}}</h4>
					<select name="hotitem{{$item->id}}">
						@foreach ($products as $product)
<option value="{{$product->id}}" {{ ($item->product->id == $product->id ? "selected=selected" : "")}}>{{ $product->name }}</option>
						@endforeach
					</select>
				</div>
				@endforeach
				<div class="form-group">
					<input type="submit" class="button" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>

@section('content')
@endsection