@extends('layouts.master')

@section('head')
	@parent
	<title>Forum | {{ $thread->title }}</title>
@stop

@section('content')

	<div class="clearfix">
		<ol class="breadcrumb pull-left">
			<li><a href="{{ URL::route('forum-home') }}">Forums</a></li>
			<li><a href="{{ URL::route('forum-category', $thread->category_id) }}">{{ $thread->category->title }}</a></li>
			<li class="active">{{ $thread->title }}</li>

		</ol>
	</div>
	@if(Session::has('success'))
		<div class="alert alert-success">{{ Session::get('success') }}</div>
	@elseif (Session::has('fail'))
		<div class="alert alert-danger">{{ Session::get('fail') }}</div>
	@endif

	<div class="well well-lg">
		<h1>{{ $thread->title }}</h1>
		<h6>By: {{ $author }} on {{ $thread->created_at }}</h6>
		<hr>
		<p>{{ nl2br(BBCode::parse($thread->body)) }}</p> {{--lai attelotu  pareizi atstarpes un tekstu varetu koreģēt piemeram Bold utt--}}
	</div>

		@if(Auth::check() && Auth::user()->isAdmin())
			<a href="{{ URL::route('forum-delete-thread', $thread->id) }}" class="btn btn-danger">Delete {{ $thread->title }} </a>
		@endif
		<br>
		<br>

	@foreach ($thread->comments()->get() as $comment)
		<div class="well well-sm">
			<h4>By: {{ $comment->author->username }} on {{ $comment->created_at }}</h4>
			<hr>
			<p>{{ nl2br(BBCode::parse($comment->body)) }}</p>
			
		</div>
		@if (Auth::check() && Auth::user()->isAdmin())
			<a href="{{ URL::route('forum-delete-comment', $comment->id) }}" class="btn btn-warning">Delete Comment</a>
			<br>
			<br>
			@endif


	@endforeach

	@if(Auth::check())
		<form action="{{ URL::route('forum-store-comment', $thread->id) }}" method="post">
			<div class="form-group">
				<label for="body">Comment: </label>
				<textarea class="form-control" name="body" id="body"></textarea>
			</div>
			{{ Form::token() }}
			<div class="form-group">
				<input type="submit" value="Save Comment" class="btn btn-success">
			</div>
		</form>
	@endif




@stop