function CancelAppointment(username,appt_date,appt_time,appt_time_id) {
   var newDiv = $(document.createElement('div')); 
   newDiv.html("Appointment Details:<br><h83><i>"+username+", "+appt_date+", "+appt_time+"</i></h83><br><br><h52>Cancel Appointment?</h52>");
   newDiv.dialog({title: "Alert"}).prev(".ui-dialog-titlebar").css("background","Coral");
   newDiv.dialog({
	resizable: false,
    	modal: true,
    	buttons: {
           Cancel: function() {
          	$( this ).dialog( "close" );
           },
           "OK": function() {
		$( this ).dialog( "close" );
		$.post("php/book_appt_cancel.php", { username: username, appt_date:appt_date, appt_time:appt_time_id },
		function(data) {
		   if (data==1) {
	  		var newDiv = $(document.createElement('div')); 
	  		newDiv.html("Appointment has been cancelled.");
	  		newDiv.dialog({title: "Success"}).prev(".ui-dialog-titlebar").css("background","YellowGreen");
		   } else {
			var newDiv = $(document.createElement('div')); 
			newDiv.html("Opps, something is not right. Please try again.");
			newDiv.dialog({title: "Error"}).prev(".ui-dialog-titlebar").css("background","IndianRed");
		   }
		   newDiv.dialog({
      			resizable: false,
    			modal: true,
    			buttons: {
        		   "OK": function() {
			      window.location.href = '?tab=2';
			      $( this ).dialog( "close" );
        		   }
		   	}
		   });
		});
	   }
   	}
   });
}


