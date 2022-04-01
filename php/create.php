<?php

if (isset($_POST['addEventBtn'])) {
	include "../db_conn.php";
	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$eventName = validate($_POST['eventName']);
	$eventStartDate = validate($_POST['eventStartDate']);
	$eventEndDate = validate($_POST['eventEndDate']);
	$eventStartTime = validate($_POST['eventStartTime']);
	$eventEndTime = validate($_POST['eventEndTime']);
	$eventPlace = validate($_POST['eventPlace']);
	$eventDesc = validate($_POST['eventDesc']);

	$eventData = '&eventName=' . $eventName . '&eventStartDate=' . $eventStartDate . '&eventEndDate=' . $eventEndDate .
		'&eventStartTime=' . $eventStartTime . '&eventEndTime=' . $eventEndTime . '&eventPlace=' . $eventPlace . '&eventDesc=' . $eventDesc;

	if (empty($eventName)) {
		header("Location: ../add_event.php?error=eventName is required&$eventData");
	} else if (empty($eventStartDate)) {
		header("Location: ../add_event.php?error=eventStartDate is required&$eventData");
	} else if (empty($eventEndDate)) {
		header("Location: ../add_event.php?error=eventEndDate is required&$eventData");
	} else if (empty($eventStartTime)) {
		header("Location: ../add_event.php?error=eventTime is required&$eventData");
	} else if (empty($eventEndTime)) {
		header("Location: ../add_event.php?error=eventTime is required&$eventData");
	} else if (empty($eventPlace)) {
		header("Location: ../add_event.php?error=eventPlace is required&$eventData");
	} else if (empty($eventDesc)) {
		header("Location: ../add_event.php?error=eventDesc is required&$eventData");
	} else {

		$sql = "INSERT INTO tbl_events(eventName, eventStartDate, eventEndDate, eventStartTime, eventEndTime, eventPlace, eventDesc) 
               VALUES('$eventName', '$eventStartDate', '$eventEndDate', '$eventStartTime', '$eventEndTime', '$eventPlace', '$eventDesc')";
		$result = mysqli_query($conn, $sql);
		if ($result) {
			header("Location: ../home.php?success=Successfully Created");
		} else {
			header("Location: ../add_event.php?error=unknown error occurred&$eventData");
		}
	}
}
