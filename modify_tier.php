<?php
include('database_connection.php');

session_start();
if (!empty($_SESSION['id'])) {
    $uid = $_SESSION['id'];
    $sq = "SELECT * FROM user WHERE id = '$uid'";
    $res = mysqli_query($connect, $sq);
    $rowid = mysqli_fetch_assoc($res);
    }
else {
    header('Location: login.php');
    exit();
}
if (isset($_GET['id'])) {

    $tier_id = $_GET['id'];

    $sql = "SELECT * FROM tier WHERE Id = '$tier_id'";
    $result = mysqli_query($connect, $sql);

    if (!$result) {
        echo "Error: " . mysqli_error($connect);
    } else {
        $tier = mysqli_fetch_assoc($result);
    }
}



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_tier'])) {

    $type = isset($_POST['type']) ? $_POST['type'] : '';
    $info = isset($_POST['info']) ? $_POST['info'] : '';
    $image_url = isset($_POST['image_url']) ? $_POST['image_url'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : '';

    $sql = "UPDATE tier SET 
            type = '$type', 
            info = '$info', 
            image = '$image_url', 
            price = '$price' 
            WHERE Id = '$tier_id'";

    if (mysqli_query($connect, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($connect);
    }

    header("Location: add_tiers.php?id=$tier_id");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tier Management</title>
<link rel="shortcut icon" type="x-icon" href="photo.png">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="products.css">
</head>
<body>
    <nav>
        <div>
            <img src="photo.png" alt="Logo">
        </div>
        <ul>
            <li><a href="admin_list.php">HOME</a></li>
            <li><a href="add_products.php">ADD PRODUCTS</a></li>
            <li><a href="add_tiers.php">ADD TIERS</a></li>
            <li><a href="admin.php">ADD ADMINS</a></li>
        </ul>
        <div>
            <a href="logout.php"><button type="button">Log Out</button></a>
        </div>
    </nav>
    <div class="container-2">
        <div class="input-group">
            <h3>Modify tier</h3>
            <form method="POST">
                <input type="text" name="type" placeholder="Type" value="<?php echo isset($tier['type']) ? $tier['type'] : ''; ?>">
                <input type="text" name="info" placeholder="Info" value="<?php echo isset($tier['info']) ? $tier['info'] : ''; ?>">
                <input type="text" name="image_url" placeholder="Image URL" value="<?php echo isset($tier['image']) ? $tier['image'] : ''; ?>">
                <input type="text" name="price" placeholder="Price" value="<?php echo isset($tier['price']) ? $tier['price'] : ''; ?>"><br>
                <button type="submit" name='edit_tier' class="button">Confirm</button>
            </form>
        </div>
    </div>
</body>
</html>

