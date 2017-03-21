<?php 

	$username = "";
	if(isset($_REQUEST['username'])) $username=$_REQUEST['username'];
        $reason = "";
        if(isset($_REQUEST['reason'])) $reason=$_REQUEST['reason'];
        $appt_date = "";
        if(isset($_REQUEST['appt_date'])) $appt_date=$_REQUEST['appt_date'];
        $appt_time = "";
        if(isset($_REQUEST['appt_time'])) $appt_time=$_REQUEST['appt_time'];

        $old_username = "";
        if(isset($_REQUEST['old_username'])) $old_username=$_REQUEST['old_username'];
        $old_appt_date = "";
        if(isset($_REQUEST['old_appt_date'])) $old_appt_date=$_REQUEST['old_appt_date'];
        $old_appt_time = "";
        if(isset($_REQUEST['old_appt_time'])) $old_appt_time=$_REQUEST['old_appt_time'];

	
	if (($username != "") and ($reason!="") and ($appt_date!="") and ($appt_time!="") and ($old_username!="") and ($old_appt_date!="") and ($old_appt_time!="")) {

		require_once(__DIR__.'/../config/config.php');
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME_DEMO);

		$qstr = 'delete from APPOINTMENTS where USERNAME="'.$old_username.'" and APPT_DATE="'.$old_appt_date.'" and APPT_TIME='.$old_appt_time;
		$delete_row = $mysqli->query($qstr);
		if ($delete_row == 0) die($delete_row);

		$qstr = 'insert into APPOINTMENTS(USERNAME, REASON, APPT_DATE, APPT_TIME) values ("'.$username.'",'.$reason.',"'.$appt_date.'",'.$appt_time.'  )';
		$insert_row = $mysqli->query($qstr);
		die($insert_row);
		
	} else die(0);

?>
