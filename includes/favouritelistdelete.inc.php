<?php

    if(isset($_GET['favouritelistid'])) {
        $flID = $_GET['favouritelistid'];
    }

    require_once 'dbh.inc.php';

    $query = "DELETE FROM favouritelist WHERE flID = ?";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $query)) {
        echo "Statement failed";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $flID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($conn);
    header("location: ../favouritelist.php?page=favouritelist&error=favouritelistdeletedsuccessfully");