<?php

// Try and connect to the database. 
$connect = mysqli_connect ('localhost','root','root','bobbleshop');

    // If connection was not successful, handle the error. 
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

?>