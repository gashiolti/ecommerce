<?php

    if(isset($_GET['companyid'])) {
        $companyID = $_GET['companyid'];
    }

    if(isset($_POST['submit'])) {

        $newID = $_POST['category'];
        $fileName = "";

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if(emptyInputCompanyUpdate($newID) !== false) {
            header("location: ../editcompany.php?companyid=$companyID&error=emptyinputs");
            exit();
        }

        updateCompany($conn, $newID, $fileName, $companyID);

    }