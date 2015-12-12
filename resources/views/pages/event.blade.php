
@extends('layouts.default')
@section('content')
@include('includes.add_event')

    <section class="event-detail">
        <p><a href="/calendar">back to calendar</a></p>
        <h2><?php echo $event->title; ?></h2><br>
        <p><strong><?php echo $display_time . " " . $event->dates ?></strong>  
        <br />
        <?php echo $event->locname . ", " . $event->address ?>  
        </p>  
        <p><?php echo $event->descr; ?></p>
        <p>Contact: <a href="mailto:<?php echo $event->email; ?>"><?php echo $event->name; ?></a></p>
        
    
        <div title="Add to Calendar" class="addeventatc">
            Add to Calendar
            <span class="start"><?php echo $add_start; ?></span> <!-- 12/23/2015 08:00 AM -->
            <span class="end"><?php echo $add_end; ?></span> <!-- 2 hours later -->
            <span class="timezone">America/Los_Angeles</span>
            <span class="title"><?php echo $event->title; ?></span>
            <span class="location"><?php echo $event->address; ?></span>
            <span class="date_format">MM/DD/YYYY</span>
       <!-- <span class="description">Description of the event</span>  -->
        </div>    
	</section>    
@stop