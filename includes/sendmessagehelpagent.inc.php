<?php

    // if(isset($_POST['send'])) {

        if(!empty($_POST['message'])) {

            $sender = $_POST['sender'];
            $receiver = $_POST['receiver'];
            $message = $_POST['message'];
            $time = date("h:i:sa");
        

            require_once 'dbh.inc.php';
            require_once 'functions.inc.php';

            // echo $sender . ", " . $receiver . ", " . $message .  ", " . $time; 

            message($conn, $sender, $receiver, $message, $time);

        }
 
    // }