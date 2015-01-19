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
               
          $rules = array(
          	'title' => 'required|min:3|max:255',
          	'when'  => 'required|min:3|max:255',
          	'where'  => 'required|min:3|max:255',
          	'description' => 'required|min:3|max:255'
          	);

          $validator = Validator::make(Input::all(), $rules);

    // process the login
        if ($validator->fails())
        	{
               return Redirect::route('get-new-event')->with('fail', "Wrong  input data try agen .");;
        	} 
        else 
        	{
            // store

            	$event = new EventNow;
				$event->title = Input::get('title');
				$event->when =  Input::get('when');
				$event->where = Input::get('where');
				$event->description = Input::get('description');
				$event->author_id = Auth::user()->id;
				$event->save();

				if ($event->save())
				{
					return Redirect::route('event-home')->with('success', "Your event has been saved.");
				}
				else
				{
					return Redirect::route('get-new-event')->with('fail', "An error occured while saving your event.")->withInput();
				}
			}
	}

	   public function deleteEvent($id)
    {

        $event = EventNow::find($id);

		if ($event->delete())
		{
			return Redirect::route('event-home')->with('success', "The events  was deleted.");
		}
			else
			{
				return Redirect::route('event-home')->with('fail', "An error occured while deleting the event.");
			}

			
    }

}