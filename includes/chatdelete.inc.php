<?php

    if(isset($_GET['chatid'])) {
        $chatID = $_GET['chatid'];
    }

    require_once 'dbh.inc.php';

    $query = "DELETE FROM chat WHERE chatID = ?";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $query)) {
        echo "Statement failed";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $chatID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($conn);
    header("location: ../chat.php?page=chat&error=chatdeletedsuccessfully");