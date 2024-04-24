<?php
include('database_connection.php');



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_product'])) {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $brand = isset($_POST['brand']) ? $_POST['brand'] : '';
    $info = isset($_POST['info']) ? $_POST['info'] : '';
    $image_url = isset($_POST['image_url']) ? $_POST['image_url'] : '';
    $type = isset($_POST['type']) ? $_POST['type'] : '';
    $registration = isset($_POST['registration']) ? $_POST['registration'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : '';

    $sql = "INSERT INTO product (name, brand, info, image, type, registration, price) 
            VALUES ('$name', '$brand', '$info', '$image_url', '$type', '$registration', '$price')";

    if (mysqli_query($connect, $sql)) {
        echo "New record created successfully";
        header("Location: add_product.php");
        exit();
        
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }
}



$sql = "SELECT * FROM product";
$result = mysqli_query($connect, $sql);

if (!$result) {
    echo "Error: " . mysqli_error($connect);
}



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_product'])) {
    $product_id = $_POST['product_id'];

    $sql = "DELETE FROM product WHERE Id = '$product_id'";

    if (mysqli_query($connect, $sql)) {
        echo "Product deleted successfully!";
    } else {
        echo "Error deleting product: " . mysqli_error($connect);
    }
    header("Location: add_product.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta Type="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Product</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav>
        <div>
            <img src="image/att.D_oqBNdZveaflYCCdQcOSGMfttW-Nud_HirlOVjBJ08.png" alt="Logo">
        </div>
        <ul>
                    <li><a href="Home.php">HOME</a></li>
                    <li><a href="index.php">PRODUCTS</a></li>
                    <li><a href="'#">TIERS</a></li>
                    <li><a href="'#">CART</a></li>
        </ul>
        <div>
            <a href="logout.php">Logout</a>
        </div>
    </nav>

    <div class="container">
        <div class="input-group">
            <form method="POST">
                <h3>Add Product</h3>
                <input type="text" name="name" placeholder="Name">
                <input type="text" name="brand" placeholder="Brand">
                <input type="text" name="info" placeholder="Info">
                <input type="text" name="image_url" placeholder="Image URL">
                <input type="text" name="type" placeholder="Type">
                <input type="date" name="registration" placeholder="Registration Date">
                <input type="text" name="price" placeholder="Price"><br>
                <button type="submit" class="button" name="add_product">Confirm</button>
            </form>
        </div>
        <div class="divider-column"></div>
        <div class="product-list">
            <h3>Modify Product</h3>
            <div class="row">
                <div class="column">
                    <h5>Name</h5>
                </div>
                <div class="column">
                    <h5>Price</h5>
                </div>
                <div class="column">
                    <h5>Action</h5>
                </div>
            </div>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='row'>";
                echo "<div class='column'><h6>" . $row['name'] . "</h6></div>";
                echo "<div class='column'><h6>" . $row['price'] . "</h6></div>";
                echo "<div class='column'>";
                echo "<div class='action-buttons'>";
                echo "<a class='button-edit' href='modify_product.php?id=" . $row['Id'] . "'>Edit</a>";
                echo "<form method='POST' action='add_product.php'>";
                echo "<input type='hidden' name='product_id' value='" . $row['Id'] . "'>";
                echo "<button type='submit' class='button-delete' name='delete_product'>Delete</button>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "<div class='divider-row'></div>";
            }
            ?>
        </div>
    </div>
</body>
</html>

