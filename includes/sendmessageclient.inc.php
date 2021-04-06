<?php

// session_start();
// header("Content-Type: application/json", true);

    // if(isset($_POST['submit'])) {
        if(!empty($_POST['message'])) {

            $userID = $_POST['userid'];
            $message = $_POST['message'];
            $time = date("h:i:sa");
        

            require_once 'dbh.inc.php';
            require_once 'functions.inc.php';

            insertMessage($conn, $userID, $message, $time);

        }
    // }
