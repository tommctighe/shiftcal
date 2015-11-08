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
        // End date of calendar, today ex: 2015-11-8
        $end = date('Y-n-j');
        // Start date
        $start = date('d-m-Y', strtotime("-2 weeks"));
        return $this->showCalendar($start, $end);
    }
    public function showCalendar($start, $end)
    {
        $startDate = strtotime($start);
        $endDate = strtotime($end);
        $events = Event::take(30)->get();
        return view('calendar.all', [
            'start'  => $startDate,
            'end'    => $endDate,
            'events' => $events
        ]);
    }
}