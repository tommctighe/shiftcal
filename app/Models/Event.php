<?php

# app/Models/Event.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use DB;

final class Event extends Model
{		
	protected $table = 'calevent';
			
	public static function getEvents($start, $range) {  //2015-02-01
	
		$end = date('Y-m-d', strtotime("+$range day", $start));
		$start = date('Y-m-d', $start);
		
		return DB::select("SELECT calevent.id, title, eventtime, eventdate FROM calevent, caldaily 
					   	   WHERE calevent.id=caldaily.id 
						   AND eventstatus<>\"E\" AND eventstatus<>\"S\" 
					       AND eventdate BETWEEN '$start' AND '$end' 
                       	   ORDER BY eventdate, eventtime");
	}

}