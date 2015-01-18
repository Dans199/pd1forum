<?php

class EventController extends BaseController
{
	public function events()
	{ 
		
		return View::make('events.events');
	}
		public function newevents()
	{ 
		
		return View::make('events.newevents');
	}

	
}