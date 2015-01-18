@extends ('layouts.master')

@section ('head')
	@parent
	<title>Home Page</title>
@stop

@section ('content')

    <div class="row">
  <div class="col-md-8 col-md-offset-2">

		 <h2>Welcome to  our new Forum web page. </h2>
		 <br>
			<h3>Participate in our community discussions, have your voice heard!</h3>
			<br>
        <img width="560" height="315" src="http://media1.gameinformer.com/filestorage/CommunityServer.Components.SiteFiles/imagefeed/featured/mlg/MLGPAX610.jpg" alt="Pro gaming pic"> 
    	<br> 
    	<br>
    	<h4> Chekc out  one of  our  member  youtube chanels :)</h4>
    		<iframe width="560" height="315" src="//www.youtube.com/embed/w_SHZNFn27o" frameborder="0" allowfullscreen></iframe>
    	<p>This web page was created by Dans Grīnšteins (dg13030). Props to him :) !!!</p>
    </div>
   </div>


   





		@if(Session::has('success'))
		<div class="alert alert-success">{{ Session::get('success') }}</div>
	@elseif (Session::has('fail'))
		<div class="alert alert-danger">{{ Session::get('fail') }}</div>
	@endif
@stop