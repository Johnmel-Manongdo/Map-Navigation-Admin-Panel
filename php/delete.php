<?php

if (isset($_GET['eventID'])) {
   include "../db_conn.php";
   function validate($data)
   {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
   }

   $eventID = validate($_GET['eventID']);

   $sql = "DELETE FROM tbl_events WHERE eventID=$eventID";
   $result = mysqli_query($conn, $sql);
   if ($result) {
      header("Location: ../home.php?success=Successfully Deleted");
   } else {
      header("Location: ../home.php?error=unknown error occurred&$eventData");
   }
} else {
   header("Location: ../home.php");
}
