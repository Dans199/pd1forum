<?php

class EventController extends BaseController
{
	public function events()
	{ 
		
		return View::make('events.events');
	}

		public function event_id($id)
	{
		$event = event::find($id);
		if ($event == null)
		{
			return Redirect::route('event-home')->with('fail', "That thread doesn't exist.");
		}
		$author = $event->author()->first()->username; //diskusijam ir autors kas  janolasa  no db.

		return View::make('events.events')->with('events', $events)->with('author', $author);//
	}

}