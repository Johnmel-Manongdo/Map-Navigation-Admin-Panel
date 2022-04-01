<?php

include "db_conn.php";
$sql = "SELECT * FROM tbl_problems ORDER BY problemID DESC";


$sort_option = "";
if (isset($_GET['sortType'])) {
    if ($_GET['sortType'] == "DESC") {
        $sql = "SELECT * FROM tbl_problems ORDER BY problemDate DESC";
    } else if ($_GET['sortType'] == "ASC") {
        $sql = "SELECT * FROM tbl_problems ORDER BY problemDate ASC";
    } else if ($_GET['sortType'] == "Bugs") {
        $sql = "SELECT * FROM tbl_problems WHERE problemType = 'Bugs' ORDER BY problemID DESC";
    } else if ($_GET['sortType'] == "Inaccuracy") {
        $sql = "SELECT * FROM tbl_problems WHERE problemType = 'Inaccuracy' ORDER BY problemID DESC";
    } else if ($_GET['sortType'] == "Design") {
        $sql = "SELECT * FROM tbl_problems WHERE problemType = 'Design' ORDER BY problemID DESC";
    } else if ($_GET['sortType'] == "Others") {
        $sql = "SELECT * FROM tbl_problems WHERE problemType = 'Others' ORDER BY problemID DESC";
    } else if ($_GET['sortType'] == "Done") {
        $sql = "SELECT * FROM tbl_problems WHERE problemStatus = 'Done' ORDER BY problemID DESC";
    } else if ($_GET['sortType'] == "Pending") {
        $sql = "SELECT * FROM tbl_problems WHERE problemStatus = 'Pending' ORDER BY problemID DESC";
    }
}

if (isset($_GET['sortType'])) {
    if ($_GET['sortType'] == "all") {
        $sql = "SELECT * FROM tbl_problems ORDER BY problemID DESC";
    }
}
$result = mysqli_query($conn, $sql);
