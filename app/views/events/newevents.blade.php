@extends('layouts.master')

@section('head')
	@parent
	<title>New Event</title>
@stop

@section('content')
	<h1>New Event</h1>

		@if(Session::has('success'))
		<div class="alert alert-success">{{ Session::get('success') }}</div>
	@elseif (Session::has('fail'))
		<div class="alert alert-danger">{{ Session::get('fail') }}</div>
	@endif

<form action="{{ URL::route('store-event') }}" method="post">
		<div class="form-group">
			<label for="title">Title: </label>
			<input type="text" class="form-control" name="title" id="title">
		</div>

		<div class="form-group">
			<label for="when">when: </label>
			<input type="text" class="form-control" name="when" id="when">
		</div>

		<div class="form-group">
			<label for="where">where: </label>
			<input type="text" class="form-control" name="where" id="where">
		</div>


		<div class="form-group">
			<label for="description">description: </label>
			<textarea class="form-control" name="description" id="description"></textarea>
		</div>
		{{ Form::token() }}
		<div class="form-group">
			<input type="submit" value="Save Event" class="btn btn-primary">
		</div>
	</form>
@stop