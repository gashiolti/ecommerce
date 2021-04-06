<?php

// session_start();
if(isset($_GET['userid'])) {
    $userID = $_GET['userid'];
}

if(isset($_POST['submit'])) {
    if(!isset($_POST['radio'])) {
        header("location: ../checkout.php?error=nocardselected");
        exit();
    }
    $cart = $_POST['radio'];
    $cardName = $_POST['cardname'];
    $cardNumber = $_POST['cardnumber'];
    $cardExp = $_POST['cardexp'];
    $cardCvv = $_POST['cardcvv'];
    $paid = 1;
    $status = 1;
    $date = date('Y-m-d H:i:s');
    //1 = New Order
    // 2 = Pending
    // 3 = Cancelled
    // 4 = Completed

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyCreditCard($cardName, $cardNumber, $cardExp, $cardCvv) !== false) {
        header("location: ../checkout.php?error=emptyinputs");
        exit();
    }

    if(creditCardLength($cardNumber) !== false) {
        header("location: ../checkout.php?error=cardlength");
        exit();
    }

    if(creditCardExpLength($cardExp) !== false) {
        header("location: ../checkout.php?error=cardexplength");
        exit();
    }

    if(creditCardCvvLength($cardCvv) !== false) {
        header("location: ../checkout.php?error=cardcvvlength");
        exit();
    }

    insertOrder($conn, $userID, $paid, $date, $cart, $status);

    
}