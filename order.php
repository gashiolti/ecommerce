<?php

if(isset($_GET[$_SESSION['userID']])) {
    print_r($_SESSION['userID']);
}