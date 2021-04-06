<?php

if(isset($_GET['userid'])) {
    $userid = $_GET['userid'];
}

if(isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $role = $_POST['role'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['adress'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $postalCode = $_POST['postalcode'];
    $phoneNumber = $_POST['pnumber'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    //ERROR HANDLERS
    if(emptyInputSignup($email, $password, $fname, $lname, $role, $age, $gender, $address, $city, $country, $postalCode, $phoneNumber) !== false) 
    {
        header("location: ../edituser.php?userid=$userid&error=emptyinputs");
        exit();
    }

    if(invalidEmail($email) !== false)
    {
        header("location: ../edituser.php?userid=$userid&error=invalidemail");
        exit();
    }

    if(pwdTooShort($password) !== false)
    {
        header("location: ../edituser.php?userid=$userid&error=passwordtooshort");
        exit();
    }

    // if(userEmailExists($conn, $email) !== false)
    // {
    //     header("location: ../edituser.php?userid=$userid?error=emailtaken");
    //     exit();
    // }

    updateUser($conn, $userid, $email, $password, $fname, $lname, $role, $age, $gender, $address, $city, $country, $postalCode, $phoneNumber);
}