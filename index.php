<!DOCTYPE html>
<html lang="fa">

<body>
    <?php
    include './Header.php';
    ?>


    <h1>Products</h1>

    <table class="table">
        <tr>
            <th scope="col">id</th>
            <th scope="col">Product Name</th>
            <th scope="col">Price</th>
            <th scope="col">Number of products</th>
            <th scope="col">Description</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        <?php

        $sql = "SELECT id,productName,price,numberOfProducts,description FROM product";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<tbody>';
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["productName"] . "</td>";
                echo "<td>" . $row["price"] . "</td>";
                echo "<td>" . $row["numberOfProducts"] . "</td>";
                echo "<td>" . $row["description"] . "</td>";
                //echo '<td><input type="button" value="Edit" class="btn btn-light" /></td>';
                echo "<td><a href='edit.php?id=" . $row["id"] . "'>Edit</a> | <a href='delete.php?id=" . $row["id"] . "'>Delete</a></td>";
                //echo '<td><input type="button" value="Delete" class="btn btn-danger" /></td>';
                echo "</tr>";
            }
            echo '</tbody>';
        } else {
            echo "0 Total";
        }
        $conn->close();
        ?>
    </table>
</body>

</html>