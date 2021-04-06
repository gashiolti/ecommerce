<?php


    if(isset($_GET['paymentid'])) {
        $paymentID = $_GET['paymentid'];
    }

    require_once 'dbh.inc.php';

    $query = "DELETE FROM payment WHERE payment_ID = ?";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $query)) {
        echo "Statement failed";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $paymentID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($conn);
    header("location: ../payment.php?page=payment&error=paymentdeletedsuccessfully");