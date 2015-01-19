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

	public function newThread($id)
	{
		return View::make('forum.newthread')->with('id', $id);
	}

	public function storeThread($id)
	{
		$category = ForumCategory::find($id);
		if ($category == null)
			Redirect::route('forum-get-new-thread')->with('fail', "You posted to an invalid category.");

		$validator = Validator::make(Input::all(), array(
			'title' => 'required|min:3|max:255',
			'body'  => 'required|min:10|max:65000'
		));

		if ($validator->fails())
		{
			return Redirect::route('forum-get-new-thread', $id)->withInput()->withErrors($validator)->with('fail', "Your input doesn't match the requirements");
		}
		else
		{
			$thread = new ForumThread;
			$thread->title = Input::get('title');
			$thread->body = Input::get('body');
			$thread->category_id = $id;
			$thread->group_id = $category->group_id;
			$thread->author_id = Auth::user()->id;

			if ($thread->save())
			{
				return Redirect::route('forum-thread', $thread->id)->with('success', "Your thread has been saved.");
			}
			else
			{
				return Redirect::route('forum-get-new-thread', $id)->with('fail', "An error occured while saving your thread.")->withInput();
			}
		}
	}

	public function deleteThread($id)
	{
		$thread = ForumThread::find($id);
		if ($thread == null)
			return Redirect::route('forum-home')->with('fail', "That thread doesn't exist");

		$category_id = $thread->category_id;
		$comments = $thread->comments;
		if ($comments->count() > 0)
		{

				return Redirect::route('forum-thread', $id)->with('fail', "Delete comments  before  deleting the thread.");
		}
		else
		{
			if ($thread->delete())
				return Redirect::route('forum-category', $category_id)->with('success', "The thread was deleted.");
			else
				return Redirect::route('forum-category', $category_id)->with('fail', "An error occured while deleting the thread.");
		}
	}

	public function storeComment($id)
	{
		$thread = ForumThread::find($id);
		if ($thread == null)
			Redirect::route('forum')->with('fail', "That thread does not exist.");

		$validator = Validator::make(Input::all(), array(
			'body' => 'required|min:5'
		));

		if ($validator->fails())
			return Redirect::route('forum-thread', $id)->withInput()->withErrors($validator)->with('fail', "Please fill in the form correctly.");
		else
		{
			$comment = new ForumComment();
			$comment->body = Input::get('body');
			$comment->author_id = Auth::user()->id;
			$comment->thread_id = $id;
			$comment->category_id = $thread->category->id;
			$comment->group_id = $thread->group->id;

			if ($comment->save())
				return Redirect::route('forum-thread', $id)->with('success', "The comment was saved.");
			else
				return Redirect::route('forum-thread', $id)->with('fail', "An error occured wile saving.");
		}
	}

	public function deleteComment($id)
	{
		$comment = ForumComment::find($id);
		if ($comment == null)
			return Redirect::route('forum')->with('fail', "That comment does not exist.");

		$threadid = $comment->thread->id;
		if ($comment->delete())
			return Redirect::route('forum-thread', $threadid)->with('success', "The comment was deleted.");
		else
			return Redirect::route('forum-thread', $threadid)->with('fail', "An error occured while deleting the comment.");
	}
}