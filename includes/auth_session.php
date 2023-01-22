<?php
    //Checking for active session from user login form
    session_start();
    if(!isset($_SESSION["username"])) {
        //If current session doesn't have a username, forward to login form
        header("Location: login.php");
        exit();
    }
?>