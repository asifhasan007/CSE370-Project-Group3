<?php
    session_start();
    include('database_connection.php');

    if (isset($_POST['login'])) {
        $Email = $_POST['Email'];
        $password = $_POST['password'];
        $password = md5($password);

        $sql = "SELECT * FROM user WHERE email = '$Email' AND password = '$password'";
        $result = mysqli_query($connect, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $id = (int)$row['id'];
            $sql_admin = "SELECT * FROM admin WHERE user_id = '$id'";
            $result_admin = mysqli_query($connect, $sql_admin);
            if (mysqli_num_rows($result_admin) > 0) {
                $_SESSION['login'] = true;
                $_SESSION['id'] = $id;
                header("Location: admin_list.php");
                exit();
            } else {
                $_SESSION['login'] = true;
                $_SESSION['id'] = $id;
                header("Location: home.php");
                exit();
            }
        } else {
            $error[]= "Invalid Email or Password";
        }
    }
?>
<!DOCTYPE html>
<html> 
<head>
    <title>Login Page</title>
    <link rel="shortcut icon" type="x-icon" href="photo.png">
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <div class = 'box'>
        <h2>New Here?</h2>
        <p>Sign up and discover great<br>amount of new opportunities!</p>
        <button type="button" onclick="window.location.href='Registration.php'">Sign Up</button>
    </div>
    <div class = 'box2'>
        <div class="logo">
            <img src="logo.png" alt="logo">
        </div>
        <h2> Login To Your Account</h2>
        <p>Enter your details below</p>
        <form action="login.php" method="post">
                    <input type="text" name="Email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <div class="error">
            <?php
                if (isset($error)) {
                    foreach ($error as $error) {
                        echo "<p style='color:red; align-items: center; font-size=10px'>$error</p>";
                    }
                }
            ?>
                    <input type="submit" name="login" value="Login" class="form-btn">
        </form>
    </div>
</body>
</html>

