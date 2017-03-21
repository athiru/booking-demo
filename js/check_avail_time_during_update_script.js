function InitCustomTime() {
   var currentapptdate = apptdate;
   var currentappttime = appttime;
   var radios = document.getElementsByName('appt_time');
   for (var i = 0; i< radios.length;  i++){
   	radios[i].disabled = false;
	document.getElementById("r"+i).style.color = "rgb(0, 0, 0)";
   }
	
   $.post("php/book_appt_check_avail_time.php", { appt_date: currentapptdate},
   function(data) {
	var fields = data.split(',');
	var arraycnt= fields.length -1;
	if (arraycnt != 0) {
	   for (i = 0; i < arraycnt; i++) {
		var fval = fields[i];
		if (currentappttime!= fval) { 
   		   radios[fval].disabled = true;
		   document.getElementById("r"+fval).style.color = "rgb(200, 200, 200)";
		}
	   }
	radios[currentappttime].checked = true;
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
        defaultDate: apptdate, //'<?php echo $apptdate; ?>',
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

