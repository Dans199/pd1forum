<!doctype html>
<html lang="en">
<head>
	@section('head')
	<meta charset="UTF-8">
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	
	@show
</head>
<body>
	<div  class="navbar navbar-default ">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="{{ URL::route('home') }}" class="navbar-brand">TSG Home page</a>
			</div>
			<div class="navbar-collapse collapse navbar-responsive-collapse">
			<ul class="nav navbar-nav">
				<li><a href="{{ URL::route('forum-home') }}">Forums</a></li>
				<li><a href="{{ URL::route('event-home') }}">Events</a></li>
				

		

				@if(!Auth::check())
					<li><a href="{{ URL::route('getCreate') }}">Register</a></li>
					<li><a href="{{ URL::route('getLogin') }}">Login</a></li>
				@else 
					<li><a href="{{ URL::route('getLogout') }}">Logout</a></li>
				@endif
			</ul>
				
				<ul class="nav navbar-nav navbar-right">
					<form class="navbar-form navbar-left" role="search">
					  <div class="form-group">
					    <input type="text" class="form-control" placeholder="Search">
					  </div>
					  <button type="submit" class="btn btn-default">Submit</button>
					</form>
			</ul>
		</div>
		</div>
	</div>

	<div class="container">@yield('content')</div>
	@section('javascript')
		<script src="http://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	@show
</body>
</html>
