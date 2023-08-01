<?php

//Get the information of the DB to get into the table:
$serverName = "";
$dbUsername = "";
$dbPassword = "";
$dbName = ""; 

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName); //Start a connection.

//If the connection couldn't start, then finish that try.
if (!$conn) {
    die("Connectiion failed: " . mysqli_connect_error());
}
