<?php

// this file will be used to connect the website to database

$DB_HOST = "localhost"; // or "127.0.0.1"
$DB_USERNAME = "root";
$DB_PASSWORD = "";
$DB_NAME = "devops";

// create the connection
$conn = mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

// $conn = mysqli_connect("localhost", "root", "", "devops");

// do checking if the connection fails
if (!$conn) {
  // die("Failed to connect to database ".mysqli_connect.error());
    echo "Failed to connect to database!";
} 
    // else {
//   echo "Successfully connected to database!<br/><br/><br/>";
// }



?>
