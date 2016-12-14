@extends('layouts.app')

<div class="content secondary-bg">
	<div class="main-content">
		<h1>Message</h1>
		<div class="admin-box">
			<div class="message {{ (!$message->seen ? 'unread' : '')}}">
				<span>From {{ $message->email}}</span>
				<p>{{$message->message}}</p>
			</div>
		</div>
		<div class="space"></div>
		<a href="{{url()->previous()}}">Back</a>
	</div>
</div>

@section('content')
@endsection