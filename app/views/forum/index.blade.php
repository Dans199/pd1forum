@extends('layouts.master')

@section('head')
	@parent
	<title>Forums</title>
@stop

@section('content')


@foreach($groups as $group) 
 {{--katrai grupai savs panelis--}}  


 	<h3 class="panel-title">{{ $group->title }}:</h3>

 	    <ul class="list-group">
 	@foreach($categories as  $category) {{--katrai kategorijai izdruka savu virsrakstus--}}  
 			@if($category->group_id == $group->id)
					<li class="list-group-item"><a href="{{ URL::route('forum-category', $category->id) }}">{{ $category->title }}</a></li> {{--rooto uz  categorijas adresi kuru  norada ar category->id --}} 
									@endif
				@endforeach

      </ul>
@endforeach
@stop

