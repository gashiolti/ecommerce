<?php


    if(isset($_GET['companyid'])) {
        $companyID = $_GET['companyid'];
    }

    require_once 'dbh.inc.php';

    $query = "DELETE FROM company WHERE name = ?";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $query)) {
        echo "Statement failed";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $companyID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($conn);
    header("location: ../company.php?page=company&error=companydeletedsuccessfully");