function BookAppointment() {
   var username = $("#username").val();
   var reason = $("#reason").val();
   var appt_date = $("#appt_date").val();
   var appt_time_str = $("#appt_time:checked").val();
   if (appt_time_str!= null) {
   	var appt_time_array = appt_time_str.split("@#"); 
   	var appt_time = appt_time_array[0];
   	var appt_time_txt = appt_time_array[1];
   }

   var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;

   if (username == '' || !re.test(username )) {
	var newDiv = $(document.createElement('div')); 
	newDiv.html("Please enter a valid email address.");
	newDiv.dialog({title: "Error"}).prev(".ui-dialog-titlebar").css("background","IndianRed");
	return false;
   } else  if (appt_date == null) {
	var newDiv = $(document.createElement('div')); 
	newDiv.html("Please select a date.");
	newDiv.dialog({title: "Error"}).prev(".ui-dialog-titlebar").css("background","IndianRed");
    	return false;
   } else if (appt_time == null) {
	var newDiv = $(document.createElement('div')); 
	newDiv.html("Please select a time.");
	newDiv.dialog({title: "Error"}).prev(".ui-dialog-titlebar").css("background","IndianRed");
    	return false;
   } else {
	   var newDiv = $(document.createElement('div')); 
	   newDiv.html("Appointment Details:<br><h83><i>"+username+", "+appt_date+", "+appt_time_txt+"</i></h83><br><br><h52>Continue with the booking?</h52>");
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
		 	$.post("php/book_appt_add.php", { username: username, reason:reason, appt_date:appt_date, appt_time:appt_time },
			function(data) {
			   if (data==1) {
			   	var newDiv = $(document.createElement('div')); 
	  		   	newDiv.html("Appointment confirmed successfully.");
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
          			   $( this ).dialog( "close" );
				   window.location.href = '?tab=1';
			   	}
			   }
			 });
		      });
		   }
		}
	   });
	}
}




