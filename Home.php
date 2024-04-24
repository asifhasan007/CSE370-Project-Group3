<?php
include('database_connection.php');
include('fetch_data.php');
session_start();
if (!empty($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM user WHERE id = '$id'";
    $res = mysqli_query($connect, $sql);
    $rowid = mysqli_fetch_assoc($res);
    }
else {
    header('Location: login.php');
    exit();
}

$sql = "SELECT * FROM product ORDER BY registration_date DESC LIMIT 3";
$result = mysqli_query($connect, $sql);

$sql2 = "SELECT * FROM tier ORDER BY price DESC LIMIT 3";
$result2 = mysqli_query($connect, $sql2);

?>


<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="Home.css">
    <link rel="shortcut icon" type="x-icon" href="photo.png">
</head>
<body>
    <header>
        <div class = "hero">        
            <nav>
                <a href="home.php"><img src="logo.png" class = "logo"></a>
                <ul>
                    <li><a href="Home.php">HOME</a></li>
                    <li><a href="index.php">PRODUCTS</a></li>
                    <li><a href="tiers.php">TIERS</a></li>
                    <li><a href="cart.php">CART</a></li>
                </ul>
                <a href="logout.php"><button type="button">Log Out</button></a>
            </nav>
        </div>
    </header>
    <div class="text">
            <p>Latest Products</p>
    </div>
</br>
    <main>
        <?php
            while($row = mysqli_fetch_assoc($result)){
        ?>
        <div class="container">
            <div class="image">
                <a href="product.php?id=<?php echo $row['Id']?>"><img src="image/<?php echo $row['image'] ?>" alt="product" class="img-responsive"></a>
            </div>
            <div class="caption">
                <p style='font-weight:bold;'><?php echo $row['name'] ?></p>
                <p style="color:#af3023;">৳<?php echo $row['price'] ?></p>
            </div>
        </div>
        <?php
            }
        ?>
</main>
    <div class="text">
            <p>Top Tiers</p>
    </div>

    <main2>
        <?php
            while($row2 = mysqli_fetch_assoc($result2)){
        ?>
        <div class="container">
            <div class="image">
                <a href="tier.php?id=<?php echo $row2['Id']?>"><img src="images1/<?php echo $row2['image'] ?>" alt="product" class="img-responsive"></a>
            </div>
            <div class="caption">
                <p style='font-weight:bold;'><?php echo $row2['type'] ?></p>
                <p style="color:#af3023;">৳<?php echo $row2['price'] ?></p>
            </div>
        </div>
        <?php
            }
        ?>
</main2>
</body>
</html>

                
