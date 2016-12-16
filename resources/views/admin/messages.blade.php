@extends('layouts.app')

@section('content')
<div class="content search-page secondary-bg">
	<div class="main-content">
		<a href="/admin/dashboard">Back to dashboard</a>
		<h1>Messages</h1>
		<div class="admin-box">
		@if($messages->count())
			@foreach ($messages as $message)
				<div class="message {{ (!$message->seen ? 'unread' : '')}}">
					<span>{{ $message->email}}</span>
					<p>{{$message->message}}</p>
					<a href="/admin/message/{{$message->id}}">View message</a>
				</div>
			@endforeach
		@else
			<span>There are no messages</span>
		@endif
		</div>
	</div>
</div>
@endsection