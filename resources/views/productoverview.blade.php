@extends('layouts.app')

@section('content')
       @include('includes.carousel')

		<div class="content">
			<div class="main-content">
				@foreach ($products as $product)
					{{ $product->name }}
					{{ $product->price }}
				@endforeach
			</div>
		</div>
@endsection
