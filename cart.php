<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <link rel="stylesheet" type="text/css" href="Home.css">
    <link rel="shortcut icon" type="x-icon" href="photo.png">
    <style>
        .button {
            background-color: #3eb599;
            color: #fff;
            margin: 10px auto;
            padding: 7px 50px;
            cursor: pointer;
            border: 1px solid transparent;
            border-radius: 25px;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #105749;
        }
        .button-edit {
            font-size: 14px;
            color: #21873b;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s ease;
        }
        .button-delete {
            font-size: 14px;
            color: #af3023;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s ease;
        }
        .button-delete:hover {
            color: #932114;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px;
            padding: 20px;
            gap : 30px;
        }
        .table {
            width: 75%;
            border: 0px solid;
        }
        .table th, .table td {
            border-bottom-style: ridge;
            border-bottom-color: 1a1a1a;
            border-bottom-width: 1px;
            text-align: center;
            padding: 20px;
        }
        tr:hover {background-color: #62dec1;}
        .text-right {
            margin-top: 50px;
            text-align: right;
        }

    </style>
</head>
<body>
<header>
    <div class="hero">
        <nav>
            <a href="home.php"><img src="a.png" class="logo"></a>
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
<div class="container">
    <h2>Cart <img src="cart.png" class="logo"></h2>

    <table class="table">
        <thead>
        <tr>
            <th>Product/Tier</th>
            <th>Price</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        include('database_connection.php');
        
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

     
        $sql = "SELECT * FROM cart_items";
        $result = $connect->query($sql);

       
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["price"] . " BDT</td>";
                echo "<td>";
                ?>
                <form action="cart.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="submit" class="button" value="x" onclick="return confirm('Are you sure you want to remove this item from the cart?')">
                </form>
                <?php
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No items in the cart</td></tr>";
        }

    
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
            $itemId = $connect->real_escape_string($_POST['id']);
            $fetch_product_name_sql = "SELECT name FROM cart_items WHERE id = '$itemId'";
            $result = $connect->query($fetch_product_name_sql);
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $productName = $row['name'];
        
                $delete_cart_item_sql = "DELETE FROM cart_items WHERE id = '$itemId'";
                if ($connect->query($delete_cart_item_sql) === TRUE) {
                    
                    $delete_added_to_sql = "DELETE FROM added_to WHERE product_id = (
                        SELECT id FROM product WHERE name = '$productName' LIMIT 1
                    )";
                    $delete_added_to_sql2 = "DELETE FROM added_to WHERE tier_id = (
                        SELECT id FROM tier WHERE type = '$productName' LIMIT 1
                    )";
                    if ($connect->query($delete_added_to_sql) === TRUE and $connect->query($delete_added_to_sql2) === TRUE){
                        header("Location: cart.php");
                        exit();
                    } else {
                        echo "Error deleting record from added_to: " . $connect->error;
                    }
                } else {
                    echo "Error deleting record from cart_items: " . $connect->error;
                }
            } else {
                echo "No product found with the given ID.";
            }
        }

        ?>
        </tbody>
    </table>

    <div class="text-center">
        <?php
        
        $sql = "SELECT COUNT(*) AS total_items, SUM(price) AS total_price FROM cart_items";
        $result = $connect->query($sql);
        $row = $result->fetch_assoc();?>
        <table class="table">
            <thead>
            <tr>
                <th>Total Items</th>
                <th>Total Price</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?php echo $row['total_items'];?></td>
                <td><?php echo $row['total_price']; ?> BDT</td>
            </tr>
            </tbody>
        </table>


        <a href="thankyou.php"><button class="button">Confirm</button></a>
        <a href="home.php"><button class="button">Continue Shopping</button></a>
    </div>
</div>
</body>
</html>
