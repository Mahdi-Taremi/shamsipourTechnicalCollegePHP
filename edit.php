<!-- Header Start -->
<?php
include './Header.php';
?>
<!-- Header End -->
<?php

$id = $_GET['id'];
$sql = "SELECT * FROM product WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Updating information in the DB

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $xproductName = $_POST['productName'];
    $xprice = $_POST['price'];
    $xnumberOfProducts = $_POST['numberOfProducts'];
    $xdescription = $_POST['description'];

    $sql = "UPDATE product SET productName='$xproductName', price='$xprice', numberOfProducts='$xnumberOfProducts',description='$xdescription' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: ./index.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fa">


<body>
    <h1>Update information </h1>

    <div class="container">
        <form method="post" class="was-validated" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=" . $id; ?>">
            <div class="form-group">
                <label for="uname">Product Name:</label>
                <input type="text" class="form-control" id="productName" placeholder="Enter First Name" name="productName" required />
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="uname">Price :</label>
                <input type="number" class="form-control" id="price" placeholder="Enter price" name="price" required />
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="uname">Number of products :</label>
                <input type="number" class="form-control" id="numberOfProducts" placeholder="Enter Number of products" name="numberOfProducts" required />
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="uname">Description :</label>
                <textarea class="form-control" id="description" placeholder="Enter description" name="description" required></textarea>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>

            <!-- <div class="form-group form-check">
          <label class="form-check-label">
            <input
              class="form-check-input"
              type="checkbox"
              name="conditions"
              required
            />
            I agree with the terms and conditions.
          </label>
        </div> -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Bootstrap core JS -->
    <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>