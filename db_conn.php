<?php

// $sname = "localhost";
// $uname = "root";
// $password = "";
// $db_name = "dbadmin";

$sname = "remotemysql.com";
$uname = "V3ndi3eExB";
$password = "ZJZC97BCe5";
$db_name = "V3ndi3eExB";

$conn  = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}