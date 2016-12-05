@extends('layouts.app')

@section('content')
	<div class="content">
		<div class="main-content top-margin">
		<img src="/img/logo.png" alt="Kowloon logo" class="logo-image">
		<h1>Productdetail {{ $product->name }}</h1>
		</div>
	</div>
@endsection
