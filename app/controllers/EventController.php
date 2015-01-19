<?php

class EventController extends BaseController
{
		public function index()
	{
		 $events = EventNow::all();

		return View::make('events.events',array('events' => $events));
    }

    			public function newevents()
	{

		return View::make('events.newevents');
    }

    	public function storeEvent()
	{

		$data = Input::all();
               
                $rules = $rules = array(
			'title' => 'required|min:3|max:255',
			'when'  => 'required|min:10|max:255',
			'where'  => 'required|min:10|max:255',
			'description' => 'required|min:10|max:65000',
                );

          $validator = Validator::make($data, $rules);

			if ($validator->passes())
             {

				$event = new EventNow();
				$event->title = $data['title'];
				$event->when =  $data['when'];
				$event->where = $data ['where'];
				$event->description = $data['description'];
				$event->author_id = Auth::user()->id;
				$event->save();
				

				if ($event->save())
				{
					return Redirect::route('event-home')->with('success', "Your event has been saved.");
				}
				else
				{
					return Redirect::route('get-new-event')->with('fail', "An error occured while saving your thread.")->withInput();
				}
			}
	}

}