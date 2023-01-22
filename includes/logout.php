<?php
    session_start();
    // Destroy session
    if(session_destroy()) {
        // Redirecting To User Login Page
        header("Location: ../login.php");
    }
?>