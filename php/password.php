<?php
session_start();

if (isset($_POST['op']) && isset($_POST['np']) && isset($_POST['cp'])) {
    include "../db_conn.php";
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $op = validate($_POST['op']);
    $np = validate($_POST['np']);
    $cp = validate($_POST['cp']);

    if (empty($op)) {
        header("Location: ../change_pass.php?error=Old Password is required");
    } else if (empty($np)) {
        header("Location: ../change_pass.php?error=New Password is required");
    } else if ($np !== $cp) {
        header("Location: ../change_pass.php?error=Confirmation Password does not match");
    } else {
        $adminID = $_SESSION['adminID'];

        $sql = "SELECT password FROM tbl_admin WHERE adminID='$adminID' AND password='$op'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $sql_2 = "UPDATE tbl_admin SET password='$np' WHERE adminID='$adminID'";
            mysqli_query($conn, $sql_2);
            header("Location: ../index.php?success=Password has been successfully changed");
        } else {
            header("Location: ../change_pass.php?error=Incorrect Old Password");
        }
    }
} else {
    header("Location: ../change_pass.php.php");
}
