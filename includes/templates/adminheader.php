<?php

session_start();

require_once 'includes/dbh.inc.php';
require_once 'includes/templates/productdisplay.php';
require_once 'includes/functions.inc.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>

    <header>
        <div class="firstpart-header" onclick="location.href='ahome.php'" style="cursor:pointer;">
            <span><i class="fas fa-user-shield"></i></span>
            <span>Dashboard</span>
        </div>

        <div class="secondpart-bottom">
            <div class="fh-wrapper">
                <span><i class="fas fa-envelope"></i></span>
                <span><i class="fas fa-bell"></i></span>
                <a href="includes/logout.inc.php"><span><i class="fas fa-sign-out-alt"></i> LOGOUT</i></span></a>
            </div>
        </div>
    </header>