<?php
class EventNow extends Eloquent
{
		protected $table = 'events_now';

		public function author()
		{
		return $this->belongsTo('User', 'author_id');
		}
}