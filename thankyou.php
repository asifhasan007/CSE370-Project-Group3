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

$sql = "DELETE FROM cart_items";
$sql2 = "DELETE FROM added_to";
$result = $connect->query($sql);
$result2 = $connect->query($sql2);

?>

<!DOCTYPE html>
<head>
    <title>Thank You</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #1a1a1a;
            text-align: center;
            padding: 50px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
        }
        h1 {
            color: #3eb599;
        }
        p {
            margin-bottom: 20px;
            color: #1a1a1a;
            
        }
        a {
            color: #3eb599;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Thank You for Your Purchase!</h1>
        <p>Your order has been successfully placed.</p>
        <p>Thank you for choosing us!</p>
        <p><a href="home.php">Continue Shopping</a></p>
    </div>
</body>
</html>