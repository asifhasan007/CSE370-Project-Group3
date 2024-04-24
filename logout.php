<?php
include('database_connection.php');
session_start();
session_destroy();
header("Location: login.php");
exit();
?>
