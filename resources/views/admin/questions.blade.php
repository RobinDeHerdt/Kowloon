@extends('layouts.app')

@section('content')
<div class="content search-page secondary-bg">
	<div class="main-content">
		<a href="/admin/dashboard">Back to dashboard</a>
		<a href="/admin/questions/create" class="admin-right">Create question</a>
		<h1>Questions</h1>
		@if (session('question_create_status'))
	    <div class="alert alert-success">
	        {{ session('question_create_status') }}
	    </div>
		@endif
		@if($questions->count())
		<table class="table table-striped">
		    <thead>
		      	<tr>
			        <th>Question</th>
			        <th>Answer</th>
			        <th>Update</th>
			        <th>Delete</th>
		      	</tr>
		    </thead>
		    <tbody>
		    	@foreach ($questions as $question)
		      	<tr>
			        <td>{{$question->title}}</td>
			        <td>{{$question->body}}</td>
			        <td><a href="/admin/questions/edit/{{$question->id}}">Update</a></td>
			        <td>
				        <form action="/admin/questions/{{$question->id}}/delete" method="POST">
				        	{{ Form::token() }}
				        	<input type="submit" value="Delete">
				        </form>
			        </td>
		      	</tr>
		      	@endforeach
		    </tbody>
	  	</table>
	  	@else
			<h3>There are no questions.</h3>
    	@endif
	</div>
</div>
@endsection