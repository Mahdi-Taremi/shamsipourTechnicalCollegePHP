<?php
session_start();
include "Config.php";

if (!isset($_COOKIE['user_id']) || $_COOKIE['user_id'] == '') {
    header('Location: index.php');
    exit;
}
// // Connect to MySQL database
// $conn = mysqli_connect('localhost', 'root', '', 'mahditatemi');
// // Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }
$user_id = $_COOKIE['user_id'];
// Get user data from database
$sql = "SELECT * FROM users WHERE id = '$user_id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
} else {
    header('Location: index.php');
    exit;
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
</head>

<body>
    <h1>Welcome <?php echo $username; ?></h1>
    <a href="logout.php">Logout</a>
</body>

</html>