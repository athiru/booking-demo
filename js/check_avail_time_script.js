function InitTime() {
   var today = new Date();
   var dd = today.getDate();
   var mm = today.getMonth()+1; //January is 0!
   var yyyy = today.getFullYear();

   if(dd<10) {
   	dd='0'+dd
   } 

   if(mm<10) {
   	mm='0'+mm
   } 

   today  = yyyy+'-'+mm+'-'+dd;
   var radios = document.getElementsByName('appt_time');
   for (var i = 0; i< radios.length;  i++){
   	radios[i].disabled = false;
	document.getElementById("r"+i).style.color = "rgb(0, 0, 0)";
   }
	 
   $.post("php/book_appt_check_avail_time.php", { appt_date: today },
   function(data) {
	var fields = data.split(',');
	var arraycnt= fields.length -1;
	if (arraycnt != 0) {
	   for (i = 0; i < arraycnt; i++) { 
		var fval = fields[i];
   		radios[fval].disabled = true;
		document.getElementById("r"+fval).style.color = "rgb(200, 200, 200)";
	   }
	   return false;
	} 
   });
}

// jQuery date picker function
$( function() {
   var date = new Date();
   var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
   $("#appt_date").datepicker({
	minDate: today,
	beforeShowDay: $.datepicker.noWeekends,
	dateFormat: "yy-mm-dd",
    	onSelect: function(dateText, inst) {
	   var appt_date = $(this).val();
	   var radios = document.getElementsByName('appt_time');
	   for (var i = 0; i< radios.length;  i++){
    		radios[i].disabled = false;
		document.getElementById("r"+i).style.color = "rgb(0, 0, 0)";
	   }
	   $.post("php/book_appt_check_avail_time.php", { appt_date: appt_date},
	   function(data) {
		var fields = data.split(',');
		var arraycnt= fields.length;
		if (arraycnt != 0) {
		   for (i = 0; i < arraycnt; i++) { 
			var fval = fields[i];
			radios[fval].disabled = true;
			document.getElementById("r"+fval).style.color = "rgb(200, 200, 200)";
		   }
		   return false;
		} 
	   });
	}
   });
} );

