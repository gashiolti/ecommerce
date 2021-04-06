<?php

    if(isset($_POST['submit'])) {
        
        $companyName = $_POST['name'];
        // $filename = $_POST['file'];
        $file = "";

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if(emptyInputCompany($companyName) !== false) {
            header("location: ../addcompany.php?error=emptyinputs");
            exit();
        }

        addcompany($conn, $companyName, $file);
    }