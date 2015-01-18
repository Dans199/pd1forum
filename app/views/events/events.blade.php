@extends('layouts.master')

@section('head')
	@parent
	<title>Events</title>
@stop


@section('content')

	@if(Session::has('success'))
		<div class="alert alert-success">{{ Session::get('success') }}</div>
	@elseif (Session::has('fail'))
		<div class="alert alert-danger">{{ Session::get('fail') }}</div>
	@endif

	<ol class="breadcrumb">
	<li><a href="{{ URL::route('home') }}">Home</a></li>
	@if(Auth::check())
	<a href="{{ URL::route('get-new-event') }}" class="btn btn-primary btn-xs pull-right">Add New Event!</a>
@endif
</ol>





@stop
