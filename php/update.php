<?php

if (isset($_GET['eventID'])) {
        include "db_conn.php";

        function validate($data)
        {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
        }

        $eventID = validate($_GET['eventID']);

        $sql = "SELECT * FROM tbl_events WHERE eventID=$eventID";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
        } else {
                header("Location: read.php");
        }
} else if (isset($_POST['updateEventBtn'])) {
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
        $eventID = validate($_POST['eventID']);

        if (empty($eventName)) {
                header("Location: ../update_event.php?error=eventName is required&$eventData");
        } else if (empty($eventStartDate)) {
                header("Location: ../update_event.php?error=eventStartDate is required&$eventData");
        } else if (empty($eventEndDate)) {
                header("Location: ../update_event.php?error=eventEndDate is required&$eventData");
        } else if (empty($eventStartTime)) {
                header("Location: ../update_event.php?error=eventStartTime is required&$eventData");
        } else if (empty($eventEndTime)) {
                header("Location: ../update_event.php?error=eventEndTime is required&$eventData");
        } else if (empty($eventPlace)) {
                header("Location: ../update_event.php?error=eventPlace is required&$eventData");
        } else if (empty($eventDesc)) {
                header("Location: ../update_event.php?error=eventDesc is required&$eventData");
        } else {

                $sql = "UPDATE tbl_events SET eventName='$eventName', eventStartDate='$eventStartDate', 
                eventEndDate='$eventEndDate', eventStartTime='$eventStartTime', eventEndTime='$eventEndTime',  
                eventPlace='$eventPlace', eventDesc='$eventDesc' WHERE eventID=$eventID ";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                        header("Location: ../home.php?success=Successfully Updated");
                } else {
                        header("Location: ../update_event.php?eventID=$eventID&error=unknown error occurred&$eventData");
                }
        }
} else {
        header("Location: home.php");
}
