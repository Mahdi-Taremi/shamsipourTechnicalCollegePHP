<!-- Header Start -->
<?php
include './Header.php';
?>
<!-- Header End -->
<?php
if (!(isset($_COOKIE['user_id']) && $_COOKIE['user_id'] != '')) {
  header("Location: ./Login.php");
  // die();
}
?>
<!DOCTYPE html>
<html lang="fa">


<body>

  <div class="container">
    <form action="FormInsert.php" method="post" class="was-validated">
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

</body>

</html>