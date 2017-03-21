<?php
/*
Doctor Appointment Booking Demo
*/
?>

<!-- CSS -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="http://www.eduprez.com/eduprez/js/colorbox-master/example4/colorbox.css" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<link rel="stylesheet" type="text/css" href="./css/form_style.css" />
<link rel="stylesheet" type="text/css" href="./css/datatable_style.css" />
<link rel="stylesheet" type="text/css" href="./css/gf_demo_style.css" />
<link rel="stylesheet" type="text/css" href="./css/jquery.dataTables.min.css">

<!-- jQuery scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

<!-- light-box script  -->
<script src="js/jquery.colorbox.js"></script>

<!-- dataTtable script to provide flexibility in handling html table -->
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>

<!-- custom script to do front-end validation and call appropriate SQL operations -->
<!--
<script type="text/javascript" src="js/book_appt_add_cancel_script.js"></script>
-->

<?php

	require_once(__DIR__.'/config/config.php');
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME_DEMO);
	if ($mysqli->connect_errno) {
   		printf ("Connect failed: %s\n", $mysqli->connect_error);
    		exit();
	}

	// initialization: read appointment reasons and time segments from DB
	include './php/book_appt_init_reasons_and_bookingtime.php';


	// HTML  page design
	//**********************************************************
	if(isset($_REQUEST['tab'])) $tab=$_REQUEST['tab']; else $tab=1;
	$but_col1 = "white";
	$but_col2 = "white";
	switch ($tab) {
		case 2:  // list-update-remove appointments
			$but_col2 = "khaki";
			break;
		default: // book appointment
			$but_col1 = "khaki";
	}

	echo '<div class="cleaner h20"></div>';
	echo '<div class="center">';
	   echo '<h961>Doctor Appointment Booking Management</h961>';
	   echo '<div class="cleaner h10"></div>';

	   echo '<div class="w3-panel w3-sand" style="position:relative; top:-20px; padding:10px; ">';
		echo '<div class="w3-row">';
		   echo '<a href="?tab=1">';
	   	   echo '<button class="w3-btn w3-'.$but_col1.' w3-border w3-border-yellow w3-round">Book Appointment</button>';
		   echo '</a>';
		   echo '&nbsp;&nbsp;';
		   echo '<a href="?tab=2">';
		   echo '<button class="w3-btn w3-'.$but_col2.' w3-border w3-border-yellow w3-round">List / Update / Cancel Appointments</button>';
		   echo '</a>';
		echo '</div>';
	   echo '</div>';

	   switch ($tab) {
		case 2: // list-update-remove appointments
			include 'list_all_appt_page.php'; break; 
		default: // book appointment
			include 'add_appt_page.php';
	   }
	   echo '<div class="cleaner h20"></div>';
	echo '</div>';
	//**********************************************************
	// end HTML  page

?>

