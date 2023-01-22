<?php
    session_start();
    //Destroy session
    if(session_destroy()) {
        //Redirecting To Admin Login Page
        header("Location: ../admin_login.php");
    }
?>