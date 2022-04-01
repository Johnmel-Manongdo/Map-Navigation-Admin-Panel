<?php

include "db_conn.php";

$sql = "SELECT * FROM tbl_feedbacks ORDER BY feedbackID DESC";

$sort_option = "";
if (isset($_GET['sortType'])) {
    if ($_GET['sortType'] == "DESC") {
        $sql = "SELECT * FROM tbl_feedbacks ORDER BY feedbackDate DESC";
    } else if ($_GET['sortType'] == "ASC") {
        $sql = "SELECT * FROM tbl_feedbacks ORDER BY feedbackDate ASC";
    } else if ($_GET['sortType'] == "Rating Descending") {
        $sql = "SELECT * FROM tbl_feedbacks ORDER BY feedbackRating DESC";
    } else if ($_GET['sortType'] == "Rating Ascending") {
        $sql = "SELECT * FROM tbl_feedbacks ORDER BY feedbackRating ASC";
    }
}

$result = mysqli_query($conn, $sql);
