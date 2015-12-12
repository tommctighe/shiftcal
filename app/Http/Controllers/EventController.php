<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    		
	public function showEvent($id)
    {
		//get event object
		$event = Event::where('id', $id)->first();
		
		//format time and date
		$display_time = date('g:i a', strtotime($event->eventtime));
		$today_date = getdate();
	    $today_year = date('Y', strtotime($today_date['year']));
		$event_year = $today_year;
		$today_month = strtotime($today_date['month']);
		$event_month = strtotime($event->dates);
		if($event_month <= $today_month) { 
			$event_year = $event_year + 1;
		}
		$m_d_y = date('m/d', strtotime($event->dates)) . "/" . $event_year;
		$h_m_s = date('h:i A', strtotime($event->eventtime));
		$add_start = $m_d_y . " " . $h_m_s;
		$add_end = date('m/d/Y h:i A', strtotime("$add_start + 2 hours"));
		
        return view('pages.event', [
           'event'  => $event,
		   'display_time' => $display_time,
		   'add_start' => $add_start,
		   'add_end' => $add_end
        ]);
    }

}//end class
