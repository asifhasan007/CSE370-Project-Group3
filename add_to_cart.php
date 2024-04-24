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

$sqlc= "SELECT cart_id FROM cart WHERE user_id = '$id'";
$resultc = $connect->query($sqlc);
$rowc = $resultc->fetch_assoc();
$cart_id = $rowc['cart_id'];
$cart_id = (int)$cart_id;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $pid_query= "SELECT id FROM product WHERE name = '$name'";
    $pid_result = $connect->query($pid_query);
    $type_query = "SELECT type FROM product WHERE name = '$name'";
    $type_result = $connect->query($type_query);
    $tid_query= "SELECT id FROM tier WHERE price = '$price'";
    $tid_result = $connect->query($tid_query);
    $type_query2 = "SELECT type FROM tier WHERE type = '$name'";
    $type_result2 = $connect->query($type_query2);

    if ($type_result->num_rows > 0) {
        $row = $type_result->fetch_assoc();
        $type = $row['name'];
        $row2 = $pid_result->fetch_assoc();
        $pid = $row2['id'];
        $pid= (int)$pid;
        $sql11 = "INSERT INTO cart_items (name, price) VALUES ('$name', '$price')";
        $sql12= "INSERT INTO added_to(cart_id,product_id) VALUES ('$cart_id','$pid' )";
        if ($connect->query($sql11) === TRUE and $connect->query($sql12) === TRUE) {
            header("Location: cart.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $connect->error;
        }
    } 
    else if ($type_result2->num_rows > 0) {
        $row = $type_result2->fetch_assoc();
        $type = $row['type'];
        $row2 = $tid_result->fetch_assoc();
        $tid = $row2['id'];
        $tid= (int)$tid;
        $sql21 = "INSERT INTO cart_items (name, price) VALUES ('$name', '$price')";
        $sql22= "INSERT INTO added_to (cart_id,tier_id) VALUES ('$cart_id','$tid')";
        if ($connect->query($sql21) === TRUE and $connect->query($sql22) === TRUE) {
            header("Location: cart.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $connect->error;
        }
    }
    else {
        echo "No product/tier found with the given name.";
    }
}

$connect->close();
?>
