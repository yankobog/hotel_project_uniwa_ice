<?php
    //Checking for active session from admin login form
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: admin_login.php");
        exit();
    }
?>