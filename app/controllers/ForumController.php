<?php

class ForumController extends BaseController
{
	public function index()
	{ 
		$groups = ForumGroup::all();    //dabun visus datus  no tas datubazes
		$categories = ForumCategory::all();    //dabun visus datus  no tas datubazes
		
		return View::make('forum.index')->with('groups', $groups)->with('categories', $categories);
	}

	public function category($id)
	{
		$category = ForumCategory::find($id); //atradis kategoriju ar konkretu id
		if ($category == null)
		{
			return Redirect::route('forum-home')->with('fail', "That category doesn't exist.");
		}
		$threads = $category->threads()->get(); // kategorijai pieder vairakas diskusijas pec modelu attiecibam 

		return View::make('forum.category')->with('category', $category)->with('threads', $threads);
	}

	public function thread($id)
	{

	}
}