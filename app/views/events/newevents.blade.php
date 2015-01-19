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

{{ Form::open(array('route' => 'store-event')) }}

    <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('when', 'When:') }}
        {{Form::text('when', Input::old('when'),  array('class' => 'form-control')) }}
    </div>
      <div class="form-group">
        {{Form::label('where', 'Where:') }}
        {{Form::text('where', Input::old('where'), array('class' => 'form-control')) }}
    </div>

     <div class="form-group">
        {{ Form::label('description', 'Description:') }}
        {{Form::text('description', Input::old('description'), array('class' => 'form-control')) }}
    </div>
    {{ Form::submit('Create Event!', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}

@stop