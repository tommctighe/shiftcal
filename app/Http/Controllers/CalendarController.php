<?php

namespace App\Http\Controllers;

use App\Models\Event;

class CalendarController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
	
	public function showDefaultCalendar()
    {	
		$range = 30;
		$start = strtotime('January 1, 2015');   // DEV, for production swap with date('Y-m-d')		 
        return $this->showCalendar($start, $range);
    }

    public function showCalendar($start, $range)
    {	
		//nav urls
		$previous = "/calendar/". strtotime("-$range day", $start) ."/".$range; 
		$future = "/calendar/". strtotime("+$range day", $start) ."/".$range;
		
		//calendar list
		$current_date = $start;
		$days_events = array();			
		$calendar_list = array();
		$events_in_range = Event::getEvents($start, $range);
		
		//create 2D array, each day has a date and list of the day's events
		foreach($events_in_range as $event) {
			if($current_date == strtotime($event->eventdate)) {
				array_push($days_events, $event); //roll up this day's events		
			} else {
				$display_date = date('l, F j', $current_date);
				array_push($calendar_list, array("date" => $display_date,
							   			          "events" => $days_events));
				$current_date = strtotime($event->eventdate);
				unset($days_events);
				$days_events = array();
				array_push($days_events, $event);
			}	
		}
					
		return view('pages.calendar', [
			'calendar_list' => $calendar_list,
			'previous' => $previous,
			'future' => $future
        ]);
    }
}