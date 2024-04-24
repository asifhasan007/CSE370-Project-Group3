<?php 
$connect = mysqli_connect("localhost", "root", "", "PcShop");
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
?>