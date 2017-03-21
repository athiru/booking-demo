<?php
/*
This page enables user to book an appointment.
*/
?>


<!-- load calender and check time availability -->
<script type="text/javascript" src="js/check_avail_time_script.js"></script>
<script type="text/javascript">InitTime(); </script>

<!-- do front-end ADD booking validation and call INSERT SQL operation -->
<script type="text/javascript" src="js/book_appt_script.js"></script>


<?php

echo '<div  class="form-style-51">';
   echo '<form id="dr_appt_form" id="dr_appt_form" action="" method="post" style="padding:0px;margin-bottom:0px;">';

	echo '<table style="width:100%;">';
	
	echo '<tr><td style="width:20%; text-align: left"><h9>Patient username</h9></td>';
	echo '<td style="width:80%; text-align: left"><input type="email" placeholder="Enter a valid email address" id="username" name="username"/></td>';
	echo '</tr>';

	echo '<tr>';
	echo '<td style="width:20%; text-align: left"><h9>Reason for visit</h9></td>';
	echo '<td style="width:80%; text-align: left">';
	echo '<select style="width:100%;font-size:14px" name="reason" id="reason" class="required">';

	for ($j = 0; $j < $allreasoncnt; $j++) {
		$seltext='';
		$listarrayvalue = explode("@#", $allreasonarray[$j]);
		$idvalue = $listarrayvalue[0];
		$titlevalue = $listarrayvalue[1];
		echo '<option value="'.$idvalue.'" '.$seltext.'>'.$titlevalue.'</option>';
		
	}           

	echo '</select>';

	echo '</td>';
	echo '</tr>';
	echo '</table>';

	echo '<div class="cleaner h10"></div>';

	echo '<div class="w3-row">';
		echo '<div class="w3-third w3-container">';
			echo '<div id="appt_date"></div>';
		echo '</div>';

		echo '<div class="w3-rest w3-container">';
			echo '<table style="max-width:400px;">';
	
	for ($j = 0; $j < $alltimesegmentcnt/2; $j++) {
		$m = $j*2;
		$n = $m+1;
		echo '<tr height="30">';
		$listarrayvalue = explode("@#", $alltimesegmentarray[$m]);
		$idvalue = $listarrayvalue[0];
		$titlevalue = $listarrayvalue[1];
		$radioid = 'r'.$idvalue;
		echo '<td style="width:50%; text-align: left">';
		echo '<input type="radio" name="appt_time" id="appt_time" value="'.$alltimesegmentarray[$m].'"> <span id="'.$radioid.'" class="able">'.$titlevalue.'</span>';
		echo '</td>';
				
		$listarrayvalue = explode("@#", $alltimesegmentarray[$n]);
		$idvalue = $listarrayvalue[0];
		$titlevalue = $listarrayvalue[1];
		$radioid = 'r'.$idvalue;
		echo '<td style="width:50%; text-align: left">';
		echo '<input type="radio" name="appt_time" id="appt_time" value="'.$alltimesegmentarray[$n].'"> <span id="'.$radioid.'" class="able">'.$titlevalue.'</span>';
		echo '</td>';

		echo '</tr>';

	}        

			echo '</table>';
 		echo '</div>';
	echo '</div>';

	echo '<div class="cleaner h20"></div>';

	echo '<input style="position: relative; left:0px; top:0px;" type="submit" id="submit-btn" onclick="BookAppointment(); return false;" value="Book An Appointment" />';

   echo '</form>';
echo '</div>';
	
?>

