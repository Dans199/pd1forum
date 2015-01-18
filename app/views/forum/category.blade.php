@extends('layouts.master')

@section('head')
	@parent
	<title>Forum | {{ $category->title }}</title>
@stop

@section('content')

<ol class="breadcrumb">
	<li><a href="{{ URL::route('forum-home') }}">Forums</a></li>
	<li class="active">{{ $category->title }}</li>
	@if(Auth::check())
	<a href="{{ URL::route('forum-get-new-thread', $category->id) }}" class="btn btn-primary btn-xs pull-right">Add New Thread!</a>
@endif
</ol>

	@if(Session::has('success'))
		<div class="alert alert-success">{{ Session::get('success') }}</div>
	@elseif (Session::has('fail'))
		<div class="alert alert-danger">{{ Session::get('fail') }}</div>
	@endif

    			<h4 >{{ $category->title }}:</h4>

    			<ul class="list-group">
    		@foreach($threads as $thread)
				<li class="list-group-item"><a href="{{ URL::route('forum-thread', $thread->id) }}">{{ $thread->title }}</a> </li>
			@endforeach
			 	</ul>

@stop

@section('javascript')
	@parent
	<script type="text/javascript" src="/js/aplikacijas.js"></script>
@stop