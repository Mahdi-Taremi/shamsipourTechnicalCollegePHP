<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/dist/css/Styles.css" rel="stylesheet">
    <link href="./assets/dist/css/headers.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/headers/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>Mahdi Taremi</title>
</head>

<?php
session_start();
include "Config.php";
?>
<!-- Header Start -->
<!-- <div class="b-example-divider"></div> -->
<header class="p-3 mb-3 border-bottom">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="#" class="d-block link-dark text-decoration-none" aria-expanded="false">
                <img src="./assets/dist/img/home.png" alt="mdo" width="25" height="25">
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li>
                    <a href="./index.php" class="nav-link px-2 link-secondary">Home</a>
                </li>
                <li><a href="#" class="nav-link px-2 link-dark">Info</a></li>
                <?php
                if (isset($_COOKIE['user_id']) && $_COOKIE['user_id'] != '') {
                    echo '<li><a href="./FormInsertData.php" class="nav-link px-2 link-dark">Products</a></li>';
                }
                ?>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
            </form>
            <nav class="py-2 bg-light border-bottom">
                <div class="container d-flex flex-wrap">
                    <ul class="nav me-auto">
                        <ul class="nav">
                            <?php
                            if (isset($_COOKIE['user_id']) && $_COOKIE['user_id'] != '') {
                            } else {
                                echo '<li class="nav-item"><a href="./Login.php" class="btn btn-outline-primary px-2 me-2">Login</a></li>';
                                echo ' <li class="nav-item"><a href="./SignUpTest.php" class="btn btn-outline-secondary px-2">Sign up</a></li>';
                            }
                            ?>


                        </ul>
                    </ul>
                </div>
            </nav>

            <?php
            if (isset($_COOKIE['user_id']) && $_COOKIE['user_id'] != '') {
                echo '<div class="dropdown text-end">';
                echo '<a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">';
                echo  '<img src="./assets/dist/img/MT.jpg" alt="mdo" width="32" height="32" class="rounded-circle">';
                echo ' </a>';
                echo '<ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">';
                echo      '<li><a class="dropdown-item" href="#">Settings</a></li>';
                echo    '<li><a class="dropdown-item" href="#">Profile</a></li>';
                echo      '<li>';
                echo          '<hr class="dropdown-divider">';
                echo      '</li>';
                echo       '<li><a class="dropdown-item" href="logout.php">Sign out</a></li>';
                echo   '</ul>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</header>
<!-- Header End -->
<!-- Bootstrap core JS -->
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>