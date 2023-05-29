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

// Delete record from database
$id = $_GET['id'];
$sql = "DELETE FROM product WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: ./index.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
$conn->close();
