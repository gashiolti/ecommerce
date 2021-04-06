<?php

    if(isset($_GET['orderid'])) {
        $orderID = $_GET['orderid'];
    }

    if(isset($_POST['submit'])) {

        $status = $_POST['status'];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';


        if(emptyInputUpdateTracking($status) !== false) {
            header("location: ../edittracking.php?orderid=$orderID&error=emptyinputs");
            exit();
        }

        updateTrackingStatus($conn, $status, $orderID);
    }