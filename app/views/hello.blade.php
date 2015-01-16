@extends ('layouts.master')

@section ('head')
	@parent
	<title>Home Page</title>
@stop

@section ('content')
<body class="container">
    <div class="row">
  <div class="col-md-8 col-md-offset-2">

		 <h2>Welcome to  our new Forum web page. </h2>
		 <br>
			<h3>Participate in our community discussions, have your voice heard!</h3>
			<br>
        <img src="http://media1.gameinformer.com/filestorage/CommunityServer.Components.SiteFiles/imagefeed/featured/mlg/MLGPAX610.jpg" alt="Pro gaming pic"> 
    	<p>This web page was created by Dans Grīnšteins (dg13030). Props to him :) !!!</p>
    </div>
</body>




		@if(Session::has('success'))
		<div class="alert alert-success">{{ Session::get('success') }}</div>
	@elseif (Session::has('fail'))
		<div class="alert alert-danger">{{ Session::get('fail') }}</div>
	@endif
@stop