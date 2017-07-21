@extends('main')

@section('title' , '| Delete Post')

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Delete Comment</h1>

			<p>
				<strong>Name:</strong>{{ $comment->name }}
				<strong>Email:</strong>{{ $comment->email }}
				<strong>Comment:</strong>{{ $comment->comment }}
			</p>

			{{ Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE']) }}

				{{ Form::submit('Yes delete comment', ['class'=> 'btn btn-block btn-danger']) }}

			{{ Form::close() }}
		</div>
	</div>

@endsection