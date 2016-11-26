@extends('layouts.app')

@section('content')
        <img src="/img/logo.png" alt="logo" class="logo-image">
        <img src="/img/dog-1.png" alt="dog picture" class="carousel-image">
        <div class="col-md-10 col-md-offset-1">
            <h1>{{ trans('messages.welcome') }}</h1>
        </div>
@endsection
