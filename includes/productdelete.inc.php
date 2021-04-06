<?php


    if(isset($_GET['productid'])) {
        $productID = $_GET['productid'];
    }

    require_once 'dbh.inc.php';

    $query = "DELETE FROM product WHERE productID = ?";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $query)) {
        echo "Statement failed";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $productID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($conn);
    header("location: ../producttable.php?page=product&error=productdeletedsuccessfully");