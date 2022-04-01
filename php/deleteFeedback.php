<?php

if (isset($_GET['feedbackID'])) {
   include "../db_conn.php";
   function validate($data)
   {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
   }

   $feedbackID = validate($_GET['feedbackID']);

   $sql = "DELETE FROM tbl_feedbacks WHERE feedbackID=$feedbackID";
   $result = mysqli_query($conn, $sql);
   if ($result) {
      header("Location: ../userFeedback.php?success=Successfully Deleted");
   } else {
      header("Location: ../userFeedback.php?error=unknown error occurred&$feedbackData");
   }
} else {
   header("Location: ../userFeedback.php");
}
