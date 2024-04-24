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
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="home.css">
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

        .button-edit:hover {
            color: #0e5c23;
        }

        .button-delete:hover {
            color: #932114;
        }
        button{
            border: none;
            background: white;
            padding: 12px 30px;
            border-radius: 30px;
            color: black;
            font-weight: bold;
            font-size: 15px;
            transition: .4s;
        }
        button:hover{
            transform: scale(1.3);
            cursor: pointer;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px;
        }
        .input-group {
                width: 40%;
                text-align: center;
                align-self: center;
            }

        .input-group h3{
                font-size: 18px;
                text-align: center;
            }

        .input-group input {
                padding: 15px;
                width: 70%;
                margin: 10px auto;
                background-color: #3eb5994f;
                border: 1px solid transparent;
                border-radius: 25px;
                font-size: 14px;
                color: #000;
                text-align: center;
            }

           .input-group input::placeholder {
                color: #000;
            }
    </style>
</head>
<body>
    <header>
        <div class = "hero">        
            <nav>
                <a href="'#"><img src="a.png" class = "logo"></a>
                <ul>
                    <li><a href="admin_list.php">Home</a></li>
                    <li><a href="add_products.php">Add Products</a></li>
                    <li><a href="add_tiers.php">Add Tiers</a></li>
                    <li><a href="admin.php">Add Admins</a></li>
                </ul>
                <a href="logout.php"><button type="button">Log Out</button></a>
            </nav>
        </div>
    </header>
    <div class="container">
        <div class="input-group">
            <h2>Welcome to Admin Page</h2>
            
            <p>Please fill this form to add a new admin</p>
            
            <form action="add_admin.php" method="POST">
                <input type="text" id="name" name="name" placeholder="Name" required>
                <input type="email" id="email" name="email" placeholder="Email" required>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <input type="tel" id="phone" name="phone" placeholder="Phone Number" required>
                <input type="text" id="nid" name="nid" placeholder="NID" required> <br>
                <button type="submit" class="button" name="add admin">Confirm</button>
            </form>
        </div>
    </div>
</body>
</html>
