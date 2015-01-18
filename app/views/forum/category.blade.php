@extends('layouts.master')

@section('head')
	@parent
	<title>Forum | {{ $category->title }}</title>
@stop

@section('content')

<ol class="breadcrumb">
	<li><a href="{{ URL::route('forum-home') }}">Forums</a></li>
	<li class="active">{{ $category->title }}</li>
</ol>

@if(Auth::check())
	<a href="{{ URL::route('forum-get-new-thread', $category->id) }}" class="btn btn-default">Add Thread!</a>
@endif
<div class="panel panel-info">
	<div class="panel-heading">
		<div class="clearfix">
			<h3 class="panel-title pull-left">{{ $category->title }}</h3>
		</div>
	</div>
	<div class="panel-body panel-list-group">
		<div class="list-group">
			@foreach($threads as $thread)
				<a href="{{ URL::route('forum-thread', $thread->id) }}" class="list-group-item">{{ $thread->title }}</a>
			@endforeach
		</div>
	</div>
</div>
@stop

@section('javascript')
	@parent
	<script type="text/javascript" src="/js/aplikacijas.js"></script>
@stop