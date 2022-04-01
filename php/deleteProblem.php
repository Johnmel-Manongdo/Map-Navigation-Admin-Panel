<?php

if (isset($_GET['problemID'])) {
   include "../db_conn.php";
   function validate($data)
   {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
   }

   $problemID = validate($_GET['problemID']);

   $sql = "DELETE FROM tbl_problems WHERE problemID=$problemID";
   $result = mysqli_query($conn, $sql);
   if ($result) {
      header("Location: ../userProblem.php?success=Successfully Deleted");
   } else {
      header("Location: ../userProblem.php?error=unknown error occurred&$problemData");
   }
} else {
   header("Location: ../userProblem.php");
}
