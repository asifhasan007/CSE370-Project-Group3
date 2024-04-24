<?php   
include('database_connection.php');
    if(isset($_POST['register'])){
        $Name = $_POST['Name'];
        $Email = $_POST['Email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $SSN = $_POST['SSN'];
        $Address = $_POST['Address'];
        if($password == $password2){
            $password = md5($password);
            $sql = "INSERT INTO user(name, email, password) VALUES('$Name', '$Email', '$password')";
            mysqli_query($connect, $sql);
            $getID = "SELECT id FROM user WHERE email = '$Email'";
            $result = mysqli_query($connect, $getID);
            $row = mysqli_fetch_assoc($result);
            $id = $row['id'];
            $id = (int)$id;
            $sql2 = "INSERT INTO buyer(ssn, user_id, shipping_address) VALUES('$SSN', '$id', '$Address')";
            $sql3 = "INSERT INTO cart(user_id, buyer_ssn) VALUES('$id', '$SSN')";
            mysqli_query($connect, $sql2);
            mysqli_query($connect, $sql3);
            header("location: Login.php");
        }else{
            $_error[] = "The two passwords do not match";
        }
    }
?>
<!Doctype HTML>
<html>
<head>
    <title>Registration Page</title>
    <link rel="shortcut icon" type="x-icon" href="photo.png">
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <div class = 'box'>
        <h2>Have an account?</h2>
        <p>Sign in and discover great<br>amount of new opportunities!</p>
        <button type="button" onclick="window.location.href='Login.php'">Sign In</button>
    </div>
    <div class = 'box2'>
        <div class="logo">
            <img src="logo.png" alt="logo">
        </div>
        <h2> Register Your Account</h2>
        <p>Enter your details below</p>
        <form action="registration.php" method="post">
                    <input type="text" name="Name" placeholder="Name" required>
                    <input type="text" name="Email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="password" name="password2" placeholder="Confirm Password" required>
                    <input type="text" name="SSN" placeholder="SSN" required>
                    <input type="text" name="Address" placeholder="Address" required>
                    <input type="submit" name="register" value="Register" class="form-btn">
                    <div class="error">
            <?php
                if (isset($_error)) {
                    foreach ($_error as $_error) {
                        echo "<p style='color:red; align-items: center; font-size=10px'>$_error</p>";
                    }
                }
            ?>
        </form>
    </div>
</body>
</html>