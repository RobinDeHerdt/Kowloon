@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <img src="/img/logo.png" alt="logo" class="logo-image">
        <img src="/img/dog-1.png" alt="dog picture" class="carousel-image">
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {{ trans('messages.welcome') }}
        </div>
    </div>
</div>
@endsection
