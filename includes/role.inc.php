<?php


    if(isset($_POST['submit'])) {

        $rolename = $_POST['rolename'];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if(emptyInputRole($rolename) !== false) {
            header("location: ../addrole.php?error=emptyinputs");
            exit();
        }

        insertRole($conn, $rolename);
    }