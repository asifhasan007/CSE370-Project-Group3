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

if(isset($_POST["action"]))
{
	$query = "
		SELECT * FROM tier
	";
	if(isset($_POST["type"]))
	{
		$type_filter = implode("','", $_POST["type"]);
		$query .= "
		 WHERE type IN('".$type_filter."')
		";
	}
	$result = mysqli_query($connect,$query);
	$total_row = mysqli_num_rows($result);
	$output = '';
	if($total_row > 0)
	{
		while($row = mysqli_fetch_array($result))
		{
			$output .= '
				<div class="col-sm-4 col-lg-3 col-md-3">
					<div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:250px;">
						<a href="tier.php?id='. $row['Id'] .'"><img src="images1/'. $row['image'] .'" alt="" class="img-responsive"></a>
						<p align="center"><strong><a href="#">'.$row['type'].'</a></strong></p>
						<h4 style="text-align:center;" class="text-danger" >৳'.$row['price'].'</h4>
					</div>
				</div>
			';
		}
	}
	else
	{
		$output = '<h3>No Data Found</h3>';
	}
	echo $output;
}

?>