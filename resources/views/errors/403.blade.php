@extends('layouts.app')

@section('content')
<a href="/home"><img src="/img/logo.png" alt="Kowloon logo" class="logo-image"></a>
<div class="content">
	<div class="main-content">
		<span class="page-not-found-msg">403 {{ trans('messages.unauthorized') }}</span>
	</div>
</div>
@endsection