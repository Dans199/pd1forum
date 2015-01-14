<?php

class ForumController extends BaseController
{
	public function index()
	{
		$groups = ForumGroup::all();
		$categories = ForumCategory::all();
		
		return View::make('forum.index')->with('groups', $groups)->with('categories', $categories);
	}

	public function category($id)
	{
		$category = ForumCategory::find($id);
		if ($category == null)
		{
			return Redirect::route('forum-home')->with('fail', "That category doesn't exist.");
		}
		$threads = $category->threads()->get();

		return View::make('forum.category')->with('category', $category)->with('threads', $threads);
	}

	public function thread($id)
	{
		$thread = ForumThread::find($id);
		if ($thread == null)
		{
			return Redirect::route('forum-home')->with('fail', "That thread doesn't exist.");
		}
		$author = $thread->author()->first()->username;

		return View::make('forum.thread')->with('thread', $thread)->with('author', $author);
	}