<?php 

	$username = "";
	if(isset($_REQUEST['username'])) $username=$_REQUEST['username'];
        $appt_date = "";
        if(isset($_REQUEST['appt_date'])) $appt_date=$_REQUEST['appt_date'];
        $appt_time = "";
        if(isset($_REQUEST['appt_time'])) $appt_time=$_REQUEST['appt_time'];


	require_once(__DIR__.'/../config/config.php');
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME_DEMO);

	$qstr = 'delete from APPOINTMENTS where USERNAME="'.$username.'" and APPT_DATE="'.$appt_date.'" and APPT_TIME='.$appt_time;
	$delete_row = $mysqli->query($qstr);
	die($delete_row);

?>
