<?php
include './Header.php';
// Get form information
$xproductName = $_POST['productName'];
$xprice = $_POST['price'];
$xnumberOfProducts = $_POST['numberOfProducts'];
$xdescription = $_POST['description'];

$cookie_xproductName = "productName";
$cookie_xprice = "price";
$cookie_xnumberOfProducts = "numberOfProducts";
$cookie_xdescription = "description";
setcookie($cookie_xproductName, $cookie_xprice, $cookie_xnumberOfProducts, $cookie_xdescription, time() + (86400 * 30)); // 86400 = 1 day
//echo $_COOKIE["description"];
// if (!isset($_COOKIE[$cookie_xproductName])) {
//     echo "Cookie  '" . $cookie_xproductName . "' is not set!";
// } else {
//     echo $_COOKIE["username"];

//     echo "Cookie '" . $cookie_xproductName . "' is set!<br>";
//     echo "Value is: " . $_COOKIE[$cookie_xproductName];
// }
// Test ==> print_r($_POST);

// Sending form information to the database
$sql = "INSERT INTO product (productName,price,numberOfProducts,description) VALUES ('$xproductName','$xprice','$xnumberOfProducts', '$xdescription')";

if (mysqli_query($conn, $sql)) {
    header("Location: ./index.php");
    //echo "Information has been successfully added to the database";
} else {
    echo  "Error sending data to database" . mysqli_error($conn);
}

// Close the connection with the database
mysqli_close($conn);
?>



<?php
session_start();
if (!isset($_COOKIE['user_id']) || $_COOKIE['user_id'] == '') {
    header('Location: index.php');
    exit;
}
// Connect to MySQL database
$conn = mysqli_connect('localhost', 'root', '', 'mahditatemi');
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
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
<h1>Welcome <?php echo $username; ?></h1>