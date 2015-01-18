@extends('layouts.master')

@section('head')
	@parent
	<title>Forums</title>
@stop

@section('content')


@foreach($groups as $group) 
 {{--katrai grupai savs panelis--}}  

<div class="panel panel-info">
		<div class="panel-heading">

			<h3 class="panel-title">{{ $group->title }}</h3>
		</div>
		<div class="panel-body panel-list-group">
			<div class="list-group">
				@foreach($categories as  $category) 

				{{--katrai kategorijai izdruka savu virsrakstus--}}  

					@if($category->group_id == $group->id) 	{{--parbauda vai esošā kategorija pieder grupai--}}   
					<a href="{{ URL::route('forum-category', $category->id) }}" class="list-group-item">{{ $category->title }}</a> {{--rooto uz  categorijas adresi kuru  norada ar category->id --}} 
					@endif
				@endforeach
			</div>
		</div>
	</div>
@endforeach
@stop

