<?php
include "db_conn.php";


$sql = "SELECT * FROM tbl_events ORDER BY eventID DESC";
$result = mysqli_query($conn, $sql);
