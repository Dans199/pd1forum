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
	@if(Auth::check() && Auth::user()->isAdmin())
	<a href="{{ URL::route('get-new-event') }}" class="btn btn-primary btn-xs pull-right">Add New Event!</a>
	@endif
	</ol>

    <H1> Events ar  entered by admin</h1>
    <p>Send email to dans.grinsteins@gmail.com  to sign up :)
        <br>
        If u have interesting ideas for event  send  them to my email :)
     </p>
    <table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Title</td>
            <td>When</td>
            <td>Where</td>
            <td>Description</td>
            @if (Auth::check() && Auth::user()->isAdmin())
            <td>Button</td>
            @endif
        </tr>
    </thead>
    <tbody>
    @foreach($events as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->title }}</td>
            <td>{{ $value->when }}</td>
            <td>{{ $value->where }}</td>
            <td>{{ $value->description }}</td>
            @if (Auth::check() && Auth::user()->isAdmin())
            <td><a href="{{ URL::route('delete-event',$value->id) }}" class="btn btn-warning">Delete</a></td>
            @endif
            
        </tr>

    @endforeach
    </tbody>
</table>
@stop
