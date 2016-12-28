@extends('layouts.app')

@section('content')
<a href="/home"><img src="/img/logo.png" alt="Kowloon logo" class="logo-image"></a>
<div class="content">
	<div class="main-content">
		<span class="page-not-found-msg">404 {{ trans('messages.page_not_found') }}</span>
	</div>
</div>
@endsection