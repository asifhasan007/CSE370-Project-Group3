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
?>
<!DOCTYPE html>
<head>
    <title>Admin List</title>
    <link rel="stylesheet" type="text/css" href="home.css">
    <link rel="shortcut icon" type="x-icon" href="photo.png">
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin-top: 20px;
        }
        th, td {
            border: 0px solid #3eb599;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: rgba(62, 181, 153, 0.3);
            
        }
   
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

    </style>
</head>
<body>
<header>
    <div class="hero">
        <nav>
            <a href="admin_list.php"><img src="a.png" class="logo"></a>
            <ul>
                    <li><a href="admin_list.php">HOME</a></li>
                    <li><a href="add_products.php">ADD PRODUCTS</a></li>
                    <li><a href="add_tiers.php">ADD TIERS</a></li>
                    <li><a href="admin.php">ADD ADMINS</a></li>
            </ul>
            <a href="logout.php"><button type="button">Log Out</button></a>
        </nav>
    </div>
</header>
<div class="container">
    <h2>Admin List</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>NID</th>
        </tr>
        <?php
            $sql = "SELECT u.name, u.email, a.phone_number, a.NID FROM user u, admin a WHERE u.id = a.user_id";
            $result = $connect->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) 
                {
                    echo "<tr>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["phone_number"] . "</td>";
                    echo "<td>" . $row["NID"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No admins found</td></tr>";
            }
        ?>
    </table>
</div>
</body>
</html>
