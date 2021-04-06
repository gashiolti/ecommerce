<?php


    if(isset($_GET['userid'])) {
        $userID = $_GET['userid'];
    }


    if(isset($_POST['submit'])) {

        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $address = $_POST['adress'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $postalCode = $_POST['postalcode'];
        $phoneNr = $_POST['pnumber'];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if(emptyInputUserDetails($age, $gender, $address, $city, $country, $postalCode, $phoneNr) !== false) {
            header("location: ../editpersonalinfo.php?userid=$userID&error=emptyinputs");
            exit();
        }

        updateUserDetails($conn, $age, $gender, $address, $city, $country, $postalCode, $phoneNr, $userID);

    }