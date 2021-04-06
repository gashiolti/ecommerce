<?php


    if(isset($_GET['roleid'])) {
        $roleID = $_GET['roleid'];
    }

    require_once 'dbh.inc.php';

    $query = "DELETE FROM role_ WHERE id = ?";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $query)) {
        echo "Statement failed";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $roleID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../role.php?page=role&error=roledeletedsuccessfully");