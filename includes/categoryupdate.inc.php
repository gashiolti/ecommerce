<?php

    if(isset($_GET['categoryid'])) {
        $catID = $_GET['categoryid'];
    }

    if(isset($_POST['submit'])) {

        $newCategoryID = $_POST['category'];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';


        if(emptyInputCategoryUpdate($newCategoryID) !== false) {
            header("location: ../editcategory.php?categoryid=$catID&error=emptyinputs");
            exit();
        }

        updateCategory($conn, $newCategoryID, $catID);
    }