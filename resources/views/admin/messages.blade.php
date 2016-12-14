@extends('layouts.app')

<div class="content secondary-bg">
	<div class="main-content">
		<a href="/admin/dashboard">Back to dashboard</a>
		<h1>Messages</h1>
		<div class="admin-box">
			@foreach ($messages as $message)
				<div class="message {{ (!$message->seen ? 'unread' : '')}}">
					<span>{{ $message->email}}</span>
					<p>{{$message->message}}</p>
					<a href="/admin/message/{{$message->id}}">View message</a>
				</div>
			@endforeach
		</div>
	</div>
</div>

@section('content')
@endsection