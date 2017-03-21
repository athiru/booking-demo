<?php 

	$username = "";
	if(isset($_REQUEST['username'])) $username=$_REQUEST['username'];
        $reason = "";
        if(isset($_REQUEST['reason'])) $reason=$_REQUEST['reason'];
        $appt_date = "";
        if(isset($_REQUEST['appt_date'])) $appt_date=$_REQUEST['appt_date'];
        $appt_time = "";
        if(isset($_REQUEST['appt_time'])) $appt_time=$_REQUEST['appt_time'];

	if (($username != "") and ($reason!="") and ($appt_date!="") and ($appt_time!="")) {
		require_once(__DIR__.'/../config/config.php');
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME_DEMO);
		$qstr = 'insert into APPOINTMENTS(USERNAME, REASON, APPT_DATE, APPT_TIME) values ("'.$username.'",'.$reason.',"'.$appt_date.'",'.$appt_time.'  )';
		$insert_row = $mysqli->query($qstr);
		die($insert_row);
	} else  die(0);

?>
