<?php
/*
Update Appointment Page
*/
?>

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<link rel="stylesheet" type="text/css" href="./css/form_style.css" />
<link rel="stylesheet" type="text/css" href="./css/gf_demo_style.css" />


<?php
	//  read current appointment details
	if(isset($_REQUEST['apptid'])) $apptid=$_REQUEST['apptid']; else $apptid=-1;
	if(isset($_REQUEST['apptdate'])) $apptdate=$_REQUEST['apptdate']; else $apptdate=-1;
	if(isset($_REQUEST['appttime'])) $appttime=$_REQUEST['appttime']; else $appttime=-1;
	if(isset($_REQUEST['apptreason'])) $apptreason=$_REQUEST['apptreason']; else $apptreason=-1;
?>


<!-- based on current appointment date and time, load calaender and check time availability -->
<script type="text/javascript"> 
	var apptdate = "<?php echo $apptdate ?>"; 
	var appttime = "<?php echo $appttime ?>";
</script>
<script type="text/javascript" src="js/check_avail_time_during_update_script.js"></script>
<script type="text/javascript"> InitCustomTime(); </script>


<!-- do front-end UPDATE booking validation and call UPDATE SQL operation -->
<script type="text/javascript" src="js/update_appt_script.js"></script>


<?php

        require_once(__DIR__.'/config/config.php');
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME_DEMO);
        if ($mysqli->connect_errno) {
                printf("Connect failed: %s\n", $mysqli->connect_error);
                exit();
        }

        // initialization: read appointment reasons and time segments from DB
        include './php/book_appt_init_reasons_and_bookingtime.php';


	//**************************************************************************
	// load current appointment details into the form

	echo '<div  class="form-style-51">';   

	echo '<form id="update_form" id="update_form" action="" method="post" style="padding:0px;margin-bottom:0px;">'; 
	
	echo '<input type="hidden" name="old_username" id="old_username" value="'.$apptid.'""/>'; 
	echo '<input type="hidden" name="old_appt_date" id="old_appt_date" value="'.$apptdate.'"/>'; 
	echo '<input type="hidden" name="old_appt_time" id="old_appt_time" value="'.$appttime.'"/>'; 

	echo '<table style="width:100%;">';

	echo '<tr><td></td><td></td></tr>';

	echo '<tr><td style="width:25%; text-align: left"><h9>Patient username</h9></td>';
	echo '<td style="width:75%; text-align: left"><input type="email" placeholder="Enter a valid email address" id="username" name="username" value="'.$apptid.'"/></td>';
	echo '</tr>';


	echo '<tr>';
	echo '<td style="width:25%; text-align: left"><h9>Reason for visit</h9></td>';
	echo '<td style="width:75%; text-align: left">';
	echo '<select style="width:100%;font-size:14px" name="reason" id="reason" class="required">';
	for ($j = 0; $j < $allreasoncnt; $j++) {
		$seltext='';
		$listarrayvalue = explode("@#", $allreasonarray[$j]);
		$idvalue = $listarrayvalue[0];
		$titlevalue = $listarrayvalue[1];
		if($idvalue==$apptreason) $seltext='selected="selected"';
      			echo '<option value="'.$idvalue.'" '.$seltext.'>'.$titlevalue.'</option>';
	}           
	echo '</select>';

	echo '</td>';
	echo '</tr>';
	echo '</table>';

	echo '<div class="cleaner h20"></div>';
	echo '<div class="w3-row" style="padding:0px;">';
		echo '<div class="w3-half w3-container" style="padding:0px;">';
			echo '<div id="appt_date"></div>';
		echo '</div>';

		echo '<div class="w3-half w3-container" style="padding:0px;">';
		echo '<table style="max-width:450px;">';
		echo '<tr><td></td><td></td></tr>';

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
		echo '<div class="cleaner h30"></div>';
		echo '<input style="position: relative; left:0px; top:0px;" type="submit" id="submit-btn" onclick="UpdateAppointment(); return false;" value="Update Appointment" />&nbsp';
   	   echo '</form>';
	echo '</div>';

	//**************************************************************************

?>
