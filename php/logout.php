<?php

// Script to unset and destroy current users logged in SESSION and direct to login.php 

    session_start();
    
// If $_SESSION "user" is not set, direct to login.php
    if (!isset($_SESSION["user"])) {
        header("Location: login.php");
// Additional, if is set to SESSION "user" but is NOT equal to NULL (i.e - is a user), direct back to home.php
    } else if (isset($_SESSION["user"])!= "") {
        header("Location: home.php");
    }
    
// If <a>logout</a> is set, do this:
    if (isset($_GET["logout"])) {
        unset($_SESSION["user"]);       // Deletes the "user" data from global
        session_unset();                // Removes all session variables
        session_destroy();              // Destroy all data associated with session
        header("Location: login.php");  // Direct user to login page to verify logout
        exit;
    }

?>