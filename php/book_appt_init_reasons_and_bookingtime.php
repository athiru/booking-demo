<?php

		$sqlq = "select * from REASONS_FOR_VISIT";
		$allreason = $mysqli->query($sqlq);
		$allreasonarray = array();
		while($onereason = $allreason->fetch_object()) {
			$insertval = $onereason->ID.'@#'.$onereason->REASON;
			array_push($allreasonarray,$insertval);
		}
		$allreasoncnt = count($allreasonarray);

		$sqlq = "select * from TIME_SEGMENTS";
		$alltimesegment = $mysqli->query($sqlq);
		$alltimesegmentarray = array();
		while($onetimesegment = $alltimesegment->fetch_object()) {
			$insertval = $onetimesegment->ID.'@#'.$onetimesegment->TIME_SEGMENTS;
			array_push($alltimesegmentarray,$insertval);
		}
		$alltimesegmentcnt = count($alltimesegmentarray);
?>
