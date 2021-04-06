<?php


    if(isset($_GET['categoryid'])) {
        $catID = $_GET['categoryid'];
    }

    require_once 'dbh.inc.php';

    $query = "DELETE FROM category WHERE category_name = ?";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $query)) {
        echo "Statement failed";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $catID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($conn);
    header("location: ../category.php?page=category&error=categorydeletedsuccessfully");