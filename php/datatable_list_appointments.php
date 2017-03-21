<?php

/*
read all appointments from DB and put it in a json encoded array. The array then is read by DataTable jQuery to populate the table
*/

	$data = array();

	require_once(__DIR__.'/../config/config.php');
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME_DEMO);
	

	$sqlq = "select * from TIME_SEGMENTS";
	$alltimesegments = $mysqli->query($sqlq);
	$timesegmentsarray = array();
	while($onetimesegment = $alltimesegments->fetch_object()) {
		$insertval = $onetimesegment->TIME_SEGMENTS;
		array_push($timesegmentsarray,$insertval);
	}

	$sqlq = "select * from REASONS_FOR_VISIT";
	$allreasons = $mysqli->query($sqlq);
	$reasonsarray = array();
	while($onereason = $allreasons->fetch_object()) {
		$insertval = $onereason->REASON;
		array_push($reasonsarray,$insertval);
	}
	
	$sqlq = "SELECT * FROM APPOINTMENTS";
	$allusers = $mysqli->query($sqlq);	
	while($oneuser = $allusers->fetch_object()) {
		
		$action = '<a class="iframe_presenterbox" href="update_appt_page.php?apptid='.$oneuser->USERNAME.'&apptdate='.$oneuser->APPT_DATE.'&appttime='.$oneuser->APPT_TIME.'&apptreason='.$oneuser->REASON.'"><span style=" float:left;position: relative; right:0px;" title="Update Appointment"><img src="http://www.eduprez.com/eduprez/images/icons/edit-new-icon-22.png" alt="Smiley face" height="24" width="24"></span></a>';

		$action .= '<span title="Delete Appointment">&nbsp;&nbsp;&nbsp;&nbsp;<a style="cursor:pointer;" onclick="CancelAppointment(&#34;'.$oneuser->USERNAME.'&#34;,&#34;'.$oneuser->APPT_DATE.'&#34;,&#34;'.$timesegmentsarray[$oneuser->APPT_TIME].'&#34;,&#34;'.$oneuser->APPT_TIME.'&#34;);" ><img src="http://www.eduprez.com/eduprez/images/icons/delete.png" alt="Smiley face" height="24" width="24"></a></span>';


		$tmparray = array();
		$tmparray['RegDate']= '<h83>'.date("Y-m-d", strtotime($oneuser->REG_DATE)).'</h83>';
		$tmparray['ApptDate']= '<h83>'.date("Y-m-d", strtotime($oneuser->APPT_DATE)).'</h83>';
		$tmparray['Time']= '<h83>'.$timesegmentsarray[$oneuser->APPT_TIME].'</h83>';
		$tmparray['Username']= '<h83>'.$oneuser->USERNAME.'</h83>';
		$tmparray['Action']= $action;
		$tmparray['Details']= '<h83 style="float:left; align: left;text-align:left;">Reason for visit: '.$reasonsarray[$oneuser->REASON].'</h83>';
		array_push($data, $tmparray);
	}


    $results = array(
	"sEcho" => 1,
        "iTotalRecords" => count($data),
        "iTotalDisplayRecords" => count($data),
        "aaData"=>$data);

    echo json_encode($results);
?>

	
