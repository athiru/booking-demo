<?php 

	$appt_date = "";
	if(isset($_REQUEST['appt_date'])) $appt_date=$_REQUEST['appt_date'];

	require_once(__DIR__.'/../config/config.php');
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME_DEMO);

	$avail_time = "";
		$sqlq = "select APPT_TIME from APPOINTMENTS where APPT_DATE='".$appt_date."'";
		$allpubcat = $mysqli->query($sqlq);
		while($onepubcat = $allpubcat->fetch_object()) {
			$insertval = $onepubcat->APPT_TIME;
			$avail_time .=  $insertval.","; 
		}
	echo $avail_time;

?>
