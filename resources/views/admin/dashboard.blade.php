@extends('layouts.app')

@section('content')
<div class="content search-page secondary-bg">
	<div class="main-content">
		<div class="admin-right">
			<a href="{{ url('/logout') }}"
		        onclick="event.preventDefault();
		                 document.getElementById('logout-form').submit();">
		        Logout
		    </a>
		    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
		        {{ csrf_field() }}
		    </form>
		</div>
		<h1>Dashboard</h1>
		@if(Session::has('hotitems_update_status'))
	    	<div class="alert alert-success"><span>{{ session('hotitems_update_status') }}</span></div>
		@endif
		@if ($errors->all())
			<div class="alert alert-warning"><span>Oops! Something went terribly wrong! Better check the form again.</span></div>
		@endif
		<div class="admin-box">
		<h3 class="title">New messages</h3>
		@if ($unseenmessages->count())
			@foreach ($unseenmessages as $message)
				<div class="message unread">
					<span>From: {{$message->email}}</span>
					<p>{{$message->message}}</p>
				</div>
			@endforeach
		@else
			<div class="message unread">
					<span>No new messages</span>
				</div>
		@endif
			<a href="/admin/messages">View all messages</a>
		</div>

		<div class="admin-box">
			<h3 class="title">Hot-items</h3>
			<form action="/admin/hotitems" method="POST">	
				{{ Form::token() }}
				@foreach ($hotitems as $item)
				<div class="hot-item-select">
					<h4>Hot item {{$item->id}}</h4>
					<select name="hotitems[]">
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
		<div class="admin-box">
			<h3 class="title">Products</h3>
			<a href="/admin/products">View all products</a>
		</div>
		<div class="admin-box">
			<h3 class="title">Faq</h3>
			<a href="/admin/questions">View all questions</a>
		</div>
	</div>
</div>
@endsection