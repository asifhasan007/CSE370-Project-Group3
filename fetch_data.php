<?php

include('database_connection.php');

if(isset($_POST["action"]))
{
	$query = "
		SELECT * FROM product 
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
						<a href="product.php?id='. $row['Id'] .'"><img src="image/'. $row['image'] .'" alt="" class="img-responsive"></a>
						<p align="center"><strong><a href="#">'.$row['name'].'</a></strong></p>
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