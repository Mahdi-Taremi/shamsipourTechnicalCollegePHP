<!-- Header Start -->
<?php
include './Header.php';
?>
<!-- Header End -->

<!--  -->
<?php
// session_start();
// if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') {
//     header('Location: index.php');
//     exit;
// }
if (isset($_COOKIE['user_id']) && $_COOKIE['user_id'] != '') {
    header('Location: index.php');
    exit;
}
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Connect to MySQL database
    $conn = mysqli_connect('localhost', 'root', '', 'mahditatemi');
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // Check if user exists in database
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            // $_SESSION['user_id'] = $row['id'];
            setcookie('user_id', $row['id'], time() + (86400 * 30), "/");
            header('Location: index.php');
            echo "id: " . $row["id"] . " - Name: " . $row["username"] . " " . $row["password"] . "<br>";
        }
    } else {
        echo "0 results";
    }
    // $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    // $result = mysqli_query($conn, $sql);
    // var_dump($result);
    // die();
    // if (mysqli_num_rows($result) > 0) {
    //     $row = mysqli_fetch_assoc($result);
    //     // $_SESSION['user_id'] = $row['id'];
    //     setcookie('user_id', $user_id, time() + (86400 * 30), "/");

    //     header('Location: index.php');
    //     exit;
    // } else {
    //     $error = 'Invalid username or password';
    // }
    mysqli_close($conn);
}
?>
<!--  -->


<!DOCTYPE html>
<html lang="fa">



<body>

    <div class="container">
        <?php if (isset($error)) {
            echo $error;
        }
        ?>

        <form action="" method="post" class="was-validated">
            <div class="form-group">
                <label for="uname">User Name :</label>
                <input type="text" class="form-control" id="username" placeholder="Enter First Name" name="username" required />
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="uname">Password :</label>
                <input type="password" class="form-control" id="password" placeholder="Enter Number of products" name="password" required />
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Bootstrap core JS -->
    <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>