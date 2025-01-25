<?php

// Connect to the MySQL database (localhost, username "root", no password, and the "blog" database)
$con = mysqli_connect("localhost", "root", "", "blog");

// Check if the connection was successful
if(!$con){
    // If the connection failed, stop the script and show an error message
    die('Connection Failed: ' . mysqli_connect_error());
}

// If the connection is successful, the code continues here
?>
