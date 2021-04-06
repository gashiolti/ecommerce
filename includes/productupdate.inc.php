<?php

    if(isset($_GET['productid'])) {
        $productID = $_GET['productid'];
    }

    if(isset($_POST['submit'])) {

        $prdName = $_POST['productname'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $category = $_POST['category'];
        $company = $_POST['company'];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';


        if(emptyInputUpdateProduct($prdName, $price, $quantity) !== false) {
            header("location: ../editproduct.php?productid=$productID&error=emptyinputs");
            exit();
        }

        updateProduct($conn, $prdName, $price, $quantity, $category, $company, $productID);
    }