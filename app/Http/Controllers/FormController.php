<?php

namespace App\Http\Controllers;

use App\Models\Event;

class FormController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    		
	public function showForm()
    {
		$frog = "ribbet!";
		
        return view('pages.form', [
           'frog'  => $frog
        ]);
    }

}//end class
