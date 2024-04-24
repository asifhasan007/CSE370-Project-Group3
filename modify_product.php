<?php
include('database_connection.php');

if (isset($_GET['id'])) {

    $product_id = $_GET['id'];

    $sql = "SELECT * FROM product WHERE Id = '$product_id'";
    $result = mysqli_query($connect, $sql);

    if (!$result) {
        echo "Error: " . mysqli_error($connect);
    } else {
        $product = mysqli_fetch_assoc($result);
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_product'])) {

    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $brand = isset($_POST['brand']) ? $_POST['brand'] : '';
    $info = isset($_POST['info']) ? $_POST['info'] : '';
    $image_url = isset($_POST['image_url']) ? $_POST['image_url'] : '';
    $type = isset($_POST['type']) ? $_POST['type'] : '';
    $registration = isset($_POST['registration']) ? $_POST['registration'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : '';

    $sql = "UPDATE product SET 
            name = '$name', 
            brand = '$brand', 
            info = '$info', 
            image = '$image_url', 
            type = '$type', 
            registration_date = '$registration', 
            price = '$price' 
            WHERE Id = '$product_id'";

    if (mysqli_query($connect, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($connect);
    }

    header("Location: add_products.php?id=$product_id");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Product Management</title>
<link rel="shortcut icon" type="x-icon" href="photo.png">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="products.css">
</head>
<body>
<header>
        <div class = "hero">        
            <nav>
                <a href="admin_list.php"><img src="a.png" class = "logo"></a>
                <ul>
                    <li><a href="admin_list.php">HOME</a></li>
                    <li><a href="add_products.php">ADD PRODUCTS</a></li>
                    <li><a href="add_tiers.php">ADD TIERS</a></li>
                    <li><a href="admin.php">ADD ADMINS</a></li>
                </ul>
                <a href="logout.php"><button type="button">Log Out</button></a>
            </nav>
        </div>
    </header>
    <div class="container-2">
        <div class="input-group">
            <h3>Modify Product</h3>
            <form method="POST">
                <input type="text" name="name" placeholder="Name" value="<?php echo isset($product['name']) ? $product['name'] : ''; ?>">
                <input type="text" name="brand" placeholder="Brand" value="<?php echo isset($product['brand']) ? $product['brand'] : ''; ?>">
                <input type="text" name="info" placeholder="Info" value="<?php echo isset($product['info']) ? $product['info'] : ''; ?>">
                <input type="text" name="image_url" placeholder="Image URL" value="<?php echo isset($product['image']) ? $product['image'] : ''; ?>">
                <input type="text" name="type" placeholder="Type" value="<?php echo isset($product['type']) ? $product['type'] : ''; ?>">
                <input type="date" name="registration" placeholder="Registration Date" value="<?php echo isset($product['registration']) ? $product['registration'] : ''; ?>">
                <input type="text" name="price" placeholder="Price" value="<?php echo isset($product['price']) ? $product['price'] : ''; ?>"><br>
                <button type="submit" name='edit_product' class="button">Confirm</button>
            </form>
        </div>
    </div>
</body>
</html>
