<?php

/**
* This page shows new notifications regarding posts. 
*/

/**
* This ("identification.php") file contains User Authentication code.
* This ("identification.php") file contains Database Connection code.
* It checks the user existency in database .
*/
require_once '../control/identification.php';


?>

<html>
<head>
	<title>MorGaon : MyEVillage | Digital Village</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<style>
	.l-side{
		  float:left;
		  width:100%;
		  height:auto;
		  background:white;
		  border-radius:2px;
		  border:0.7px solid rgba(0,0,0,0.09);
		  background:rgba(0,0,0,0.02);
	}
	.l-side p{
		  float:left;
		  width:90%;
		  height:auto;
		  margin-right:15px;
		  margin-bottom:6px;
		  margin-top:6px;
		  margin-left:20px;
		  font-size:14px;
		  border-radius:2px;
		  color:rgba(0,0,0,0.7);
	}
	.nt{
		padding:20px;
		color:black;
		font-size:20px;
		font-weight:700;
	}
	.navbar-brand img{
		width:50px;
		height:40px;
	}
	</style>
</head>
<body>
	<?php 
	//including header navbar.
	include '../about/header_component.php';
	?>
	<div class="nt">
		Notifications
	</div>
	<hr/>
	<div class="container">
		<?php
		$sql2 = "SELECT id,n.user_id,post_id,type,date1,date2,user_name FROM notification n inner join user u on n.user_id=u.user_id where owner_id=$mid order by id desc";
		$result = mysqli_query($conn, $sql2);
		$rowcount=mysqli_num_rows($result);
		$sql3=mysqli_query($conn, "update notification set user_seen='1' where owner_id='$mid'");
		if($rowcount <= 0){
			echo "<br>";
			echo "<br>";
			echo "<center>No New Notifications</center>";
			echo "<br>";
		}
		while($row=mysqli_fetch_array($result)){
		?>
			<div class="l-side"> 
				<a href="showprofile.php?eid=<?php echo $row["user_id"];?>"><p style="font-weight:700;"><?php echo $row['user_name'];?></a> <?php echo $row['type'];?> <a href="../post/expand-post-data.php?eid=<?php echo $row["post_id"];?>">your post .</p>
					<p style="font-size:12px;color:grey;">At <?php echo $row['date1'];?> On <?php echo $row['date2'];?>.</p>
				</a>
			</div>
			<div style="width:100%;float:left;margin-top:2px;margin-bottom:2px;"></div> 
		<?php
		}
		?>
	</div>
</body>
</html>