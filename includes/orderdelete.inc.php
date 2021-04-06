<?php

    if(isset($_GET['orderid'])) {
        $orderID = $_GET['orderid'];
    }

    require_once 'dbh.inc.php';

    $query = "DELETE FROM order_ WHERE orderID = ?";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $query)) {
        echo "Statement failed";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $orderID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($conn);
    header("location: ../ordertable.php?page=order&error=favouritelistdeletedsuccessfully");