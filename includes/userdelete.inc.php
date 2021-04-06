<?php


    if(isset($_GET['userid'])) {
        $userID = $_GET['userid'];
    }

    require_once 'dbh.inc.php';

    $query = "DELETE u.*, p.*
            FROM user_ u, personal_info p
            WHERE u.userID = ? AND u.userID = p.userID";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $query)) {
        echo "Statement failed";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $userID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../users.php?page=users&error=userdeletedsuccessfully");