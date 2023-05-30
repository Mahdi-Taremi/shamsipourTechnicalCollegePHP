<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mahditatemi";

// Database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Checking the connection with the database
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
