<!-- Header Start -->
<?php
include './Header.php';
?>
<!-- Header End -->

<!--  -->
<?php
// session_start();
if (isset($_COOKIE['user_id']) && $_COOKIE['user_id'] != '') {
    header('Location: index.php');
    exit;
}
if (isset($_POST['submit'])) {
    $fullName = $_POST['fullName'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    if ($password != $confirm_password) {
        $error = 'Password and confirm password do not match';
    } else {
        // Connect to MySQL database
        $conn = mysqli_connect('localhost', 'root', '', 'mahditatemi');
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        // Insert user data into database
        $sql = "INSERT INTO users (fullName,username, password) VALUES ('$fullName','$username', '$password')";
        if (mysqli_query($conn, $sql)) {
            $user_id = mysqli_insert_id($conn);
            // var_dump($user_id);
            // die();
            setcookie('user_id', $user_id, time() + (86400 * 30), "/");
            header('Location: index.php');
            exit;
        } else {
            $error = "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
}
?>
<!--  -->



<!DOCTYPE html>
<html lang="fa">



<body>

    <div class="container">
        <?php if (isset($error)) { ?>
            <div><?php echo $error; ?></div>
        <?php } ?>
        <form action="" method="post" class="was-validated">
            <div class="form-group">
                <label for="uname">Full Name :</label>
                <input type="text" class="form-control" id="fullName" placeholder="Enter First Name" name="fullName" required />
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="uname"> User Name :</label>
                <input type="text" class="form-control" id="username" placeholder="Enter First Name" name="username" required />
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>

            <div class="form-group">
                <label for="uname">Password :</label>
                <input type="password" class="form-control" id="password" placeholder="Enter Number of password" name="password" required />
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="uname">Confirm password :</label>
                <input type="password" class="form-control" id="confirm_password" placeholder="Enter Number of Confirm password" name="confirm_password" required />
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