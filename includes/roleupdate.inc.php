<?php


    if(isset($_GET['roleid'])) {
        $roleID = $_GET['roleid'];
        echo $roleID;
    }

    if(isset($_POST['submit'])) {

        $newRoleName = $_POST['role'];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';


        if(emptyInputRole($newRoleName) !== false) {
            header("location: ../editrole.php?roleid=$roleID&error=emptyinputs");
            exit();
        }

        updateRole($conn, $newRoleName, $roleID);
    }