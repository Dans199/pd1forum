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


<div class="panel panel-primary">
	<div class="panel-heading">
		@if(Auth::check() && Auth::user()->isAdmin())
		<div class="clearfix">
			<h3 class="panel-title pull-left">{{ $category->title }}</h3>
			<a id="{{ $category->id }}" href="#" data-toggle="modal" data-target="#category_delete" class="btn btn-danger btn-xs pull-right delete_category">Delete</a>
		</div>
		@else
		<div class="clearfix">
			<h3 class="panel-title pull-left">{{ $category->title }}</h3>
		</div>
		@endif
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
	<script type="text/javascript" src="/js/app.js"></script>
@stop