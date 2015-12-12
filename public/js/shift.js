$( document ).ready(function() {
   
   "use strict";
   
    if ($('div.event-list:first').text().trim() === ""  ){
  		$( "div.event-list:first" ).html( "<p><em>No rides scheduled yet</em>.</p>" );
	}

});

