<?php

if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwdrepeat'];
    $fname = $_POST['name'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $adress = $_POST['adress'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $postalCode = $_POST['postalcode'];
    $phoneNumber = $_POST['pnumber'];
    $terms = $_POST['terms'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    //ERROR HANDLERS
    if(emptyInputSignup($email, $password, $passwordRepeat, $fname, $lastname, $age, $gender, $adress, $city, $country, $postalCode, $phoneNumber) !== false) 
    {
        header("location: ../signup.php?error=emptyinputs");
        exit();
    }

    if(invalidEmail($email) !== false)
    {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }

    if(pwdMatch($password, $passwordRepeat) !== false)
    {
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }

    if(pwdTooShort($password) !== false)
    {
        header("location: ../signup.php?error=passwordtooshort");
        exit();
    }

    if(userEmailExists($conn, $email) !== false)
    {
        header("location: ../signup.php?error=emailtaken");
        exit();
    }

    if(!isset($_POST['terms'])) {
        header("location: ../signup.php?error=youdidntaccepttermsandservices");
        exit();
    }

    createUser($conn, $email, $password, $fname, $lastname, $age, $gender, $adress, $city, $country, $postalCode, $phoneNumber);


}
else
{
    header("location: ../signup.php");
}

