<?php
include('database_connection.php');

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

$review = $_POST['write-rev'];
$buyer = $_POST['buyer'];
$pid = $_POST['prod_id'];


$existing_review_query = "SELECT * FROM review WHERE buyer_ssn = (
    SELECT ssn FROM buyer WHERE user_id = '$buyer'
) AND product_id = '$pid'";
$result = mysqli_query($connect, $existing_review_query);

if (mysqli_num_rows($result) > 0) {
    echo "You have already reviewed this product.";
    echo "<br><a href='product.php?id=$pid'>Go back</a>";
} else {
    $sql = "INSERT INTO review (buyer_ssn, product_id, rating) VALUES (
        (SELECT ssn FROM buyer WHERE user_id = '$buyer'), '$pid', '$review'
    )";
    if (mysqli_query($connect, $sql)) {
        header("Location: product.php?id=$pid");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }
}

mysqli_close($connect);
?>