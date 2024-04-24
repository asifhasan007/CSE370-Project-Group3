<?php 

include('database_connection.php');

session_start();
if (!empty($_SESSION['id'])) {
    $uid = $_SESSION['id'];
    $sqla = "SELECT * FROM user WHERE id = '$uid'";
    $res = mysqli_query($connect, $sqla);
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
    <title> Tiers </title>      
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <link rel="shortcut icon" type="x-icon" href="photo.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href = "css/jquery-ui.css" rel = "stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="tiers.css">
    <link rel="stylesheet" href="styles.css">
    
    
</head>
<body>
    <header>
        <div class = "hero">        
            <nav>
                <a href="home.php"><img src="photo.png" class = "logo"></a>
                <ul>
                    <li><a href="home.php">HOME</a></li>
                    <li><a href="index.php">PRODUCTS</a></li>
                    <li><a href="tiers.php">TIERS</a></li>
                    <li><a href="cart.php">CART</a></li>
                </ul>
                <a href="logout.php"><button type="button">Log Out</button></a>
            </nav>
        </div>
    </header>

    <main>        
        <div class="container">
            <div class="row">
        	    <br />
        	    <h2 align="center">Our Tiers</h2>
        	    <br />
                <div class="custom">
                    <div class="col-md-3" style="background-color: rgba(62, 181, 153, 0.3);border-radius:25px;">			
                        <div class="list-group">
                            <h3 align="center" style="color: #1a1a1a;">Filter Tiers</h3>
                            <div style="height: auto; overflow-y: auto; overflow-x: hidden; color:#1a1a1a;">
					        <?php

                            $query = "SELECT DISTINCT(type) FROM tier ORDER BY Id DESC";
                            $result = mysqli_query($connect, $query);
                            foreach($result as $row)
                            {
                            ?>
                            <div class="list-group-item checkbox" style="background-color: rgba(62, 181, 153, 0.3);">
                                <label><input type="checkbox" class="common_selector type" value="<?php echo $row['type']; ?>"  > <?php echo $row['type'];   ?></label>
                            </div>
                            <?php
                            }

                            ?>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-9">
            	    <br />
                    <div class="row filter_data">

                    </div>
                </div>
            </div>

        </div>

    </main>
<style>
#loading
{
	text-align:center; 
	background: url('loader.gif') no-repeat center; 
	height: 150px;
}
</style>
<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data_for_tiers';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var type = get_filter('type');
        $.ajax({
            url:"fetch_data_for_tiers.php",
            method:"POST",
            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, type:type},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });


});
</script>
</body>
</html>