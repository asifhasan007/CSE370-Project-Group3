<?php
    include('database_connection.php');

    include('database_connection.php');
session_start();
if (!empty($_SESSION['id'])) {
    $uid = $_SESSION['id'];
    $sql = "SELECT * FROM user WHERE id = '$uid'";
    $res = mysqli_query($connect, $sql);
    $rowid = mysqli_fetch_assoc($res);
    }
else {
    header('Location: login.php');
    exit();
}

    $id = "";
    $row = [];
    $productName = ""; 

    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        
        $sql = "SELECT * FROM product WHERE Id = '$id'";
        $result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $productName = $row['name'];
        }
    }

?>
<?php
    $sql2 = "SELECT * FROM review WHERE product_id = '$id'";
    $result2 = mysqli_query($connect, $sql2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $productName; ?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <link rel="shortcut icon" type="x-icon" href="photo.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/jquery-ui.css" rel="stylesheet">
    <link rel="stylesheet" href="products.css">
    <link rel="stylesheet" href="product.css">
</head>
<body>
    <header>
        <div class="hero">        
            <nav>
                <a href="home.php"><img src="photo.png" class="logo"></a>
                <ul>
                    <li><a href="Home.php">HOME</a></li>
                    <li><a href="index.php">PRODUCTS</a></li>
                    <li><a href="#">TIERS</a></li>
                    <li><a href="cart.php">CART</a></li>
                </ul>
                <a href="logout.php"><button type="button">Log Out</button></a>
            </nav>
        </div>
    </header>
    <main>
        <?php if (!empty($row)): ?>
            <div id="wrapper-div">
                <div id="main-div" class="clearfix">
                    <div id="image-box">
                        <img src="image/<?php echo $row['image']; ?>" style="width: 400px; height:400px"/>
                    </div>                                                  
                    <div id="name-box">
                        <p><?php echo $row['name']; ?></p>
                        <br />
                        <p style="color:red;">৳<?php echo $row['price']; ?></p>
                        <br />
                        <form action="add_to_cart.php" method="POST">
                            <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                            <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                            <button class="button-cart">Add To Cart</button>
                        </form>
                    </div>
                </div>
            </div>
            <div>
                <div id="editline">
                    <hr class="line-product">
                </div>
                <div id="wrapper-div2">
                    <div id="main-div2" class="clearfix2">
                        <div id="info-box">
                            <p align="center" style="font-size: 35px; font-weight: bold; padding-top:2%;"> Description <p>
                            <p style="font-size: 20px;"><?php echo $row['info']; ?></p>
                        </div>                                                  
                        <div id="rev-box" class ="revbox">
                            <p align="center" style="font-size: 35px; padding-top:2%;"> Reviews <p>
                                <?php
                                    $i=1;
                                    while($reviews = mysqli_fetch_assoc($result2))
                                    {
                                    ?>
                                    <p  style="font-size: 20px;"> <?php echo $i++ . ". " . $reviews['rating']; ?>
                                <?php
                                    }
                                ?>
                                <div class ="huddai">
                                    <form action="ins-rev.php" method="post">
                                        <input type="text" name="write-rev" placeholder="Write a Review">
                                        <input type="submit" name="Add a Review" value="Add Your Review" class="rev-btn">
                                        <input type="hidden" name="prod_id" value="<?php echo $id ?>">
                                        <input type="hidden" name="buyer" value="<?php echo $uid ?>">
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </main>
    <footer>
        
    </footer>
</body>
</html>
