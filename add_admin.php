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

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password = md5($password);
$phone = $_POST['phone'];
$nid = $_POST['nid'];
$sql = "INSERT INTO user(name, email, password) VALUES('$name', '$email', '$password')";
mysqli_query($connect, $sql);
$getID = "SELECT id FROM user WHERE email = '$email'";
$result = mysqli_query($connect, $getID);
$row = mysqli_fetch_assoc($result);
$id = $row['id'];
$id = (int)$id;
$sql2 = "INSERT INTO admin (NID, user_id, phone_number) VALUES('$nid', '$id', '$phone')";
mysqli_query($connect, $sql2);
header("Location: moreadmin.php");
?>

