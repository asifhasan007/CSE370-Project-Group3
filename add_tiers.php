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


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_tier'])) {
    $type = isset($_POST['type']) ? $_POST['type'] : '';
    $info = isset($_POST['info']) ? $_POST['info'] : '';
    $image_url = isset($_POST['image_url']) ? $_POST['image_url'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : '';

    $sql = "INSERT INTO tier (type, info, image, price) 
            VALUES ('$type', '$info', '$image_url', '$price')";

    if (mysqli_query($connect, $sql)) {
        echo "New record created successfully";
        header("Location: add_tiers.php");
        exit();
        
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }
}



$sql = "SELECT * FROM tier";
$result = mysqli_query($connect, $sql);

if (!$result) {
    echo "Error: " . mysqli_error($connect);
}



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_tier'])) {
    $tier_id = $_POST['tier_id'];

    $sql = "DELETE FROM tier WHERE Id = '$tier_id'";

    if (mysqli_query($connect, $sql)) {
        echo "tier deleted successfully!";
    } else {
        echo "Error deleting tier: " . mysqli_error($connect);
    }
    header("Location: add_tiers.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta Type="viewport" content="width=device-width, initial-scale=1.0">
<title>Add tier</title>
<link rel="shortcut icon" type="x-icon" href="photo.png">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="navbar.css"> 
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
    <div class="container">
        <div class="input-group">
            <form method="POST">
                <h3>Add tier</h3>
                <input type="text" name="type" placeholder="Type">
                <input type="text" name="info" placeholder="Info">
                <input type="text" name="image_location" placeholder="Image Location">
                <input type="text" name="price" placeholder="Price"><br>
                <button type="submit" class="button" name="add_tier">Confirm</button>
            </form>
        </div>
        <div class="divider-column"></div>
        <div class="product-list">
            <h3>Modify tier</h3>
            <div class="row">
                <div class="column">
                    <h5>Type</h5>
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
                echo "<div class='column'><h6>" . $row['type'] . "</h6></div>";
                echo "<div class='column'><h6>" . $row['price'] . "</h6></div>";
                echo "<div class='column'>";
                echo "<div class='action-buttons'>";
                echo "<a class='button-edit' href='modify_tier.php?id=" . $row['Id'] . "'>Edit</a>";
                echo "<form method='POST' action='add_tiers.php'>";
                echo "<input type='hidden' name='tier_id' value='" . $row['Id'] . "'>";
                echo "<button type='submit' class='button-delete' name='delete_tier'>Delete</button>";
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

