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
		@if (session('question_update_status'))
	    <div class="alert alert-success">
	        {{ session('question_update_status') }}
	    </div>
		@endif
		@if (session('question_delete_status'))
	    <div class="alert alert-success">
	        {{ session('question_delete_status') }}
	    </div>
		@endif
		@if($questions->count())
		<table class="table table-striped">
		    <thead>
		      	<tr>
			        <th>Question</th>
			        <th>Answer</th>
			        <th>View</th>
			        <th>Update</th>
			        <th>Delete</th>
		      	</tr>
		    </thead>
		    <tbody>
		    	@foreach ($questions as $question)
		      	<tr>
			        <td>{{$question->question_nl}}</td>
			        <td>{{$question->answer_nl}}</td>
			        <th><a href="/admin/questions/{{$question->id}}">View</a></th>
			        <td><a href="/admin/questions/{{$question->id}}/edit">Update</a></td>
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
	  	{{ $questions->links() }}
	  	@else
			<h3>There are no questions. <a href="/admin/questions/create">Create question</a>.</h3>
    	@endif
	</div>
</div>
@endsection