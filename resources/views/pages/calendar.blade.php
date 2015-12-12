
@extends('layouts.default')
@section('content')

@include('includes.add_event')

@include('includes.calendar_nav')

  <div class="calendar-list">
    <?php
        foreach ($calendar_list as $day)
		{?>
    		    
    		<p class="date_heading"><strong><?php echo $day['date']; ?></strong><br></p>
	
    		<div class="event-list">
	     <? foreach ($day['events'] as $event)
			{?>
				<p class="event_details">
                <a href="/event/<?php echo $event->id; ?>">
                <span class="event_title"><?php echo $event->title; ?></a></span>
                <span class="event_time"><?php echo date('g:i a', strtotime($event->eventtime)); ?></a></span>
                <br />
                </p>
                
		 <? }  ?>
		 
		   </div>
		 
	<?	} ?>
   </div>
@include('includes.calendar_nav')

@stop