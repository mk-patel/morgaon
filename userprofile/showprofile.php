<?php

/**
* This page shows user profile.. 
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
    <title>Mor Gaon : MyEVillage | Digital Village</title>
	<meta charset="UTF-8">
    <meta name="description" content="Ham hamesh aapko gaon me hone wali sundar ghatnao aur parivartano se avgat karate rahenge, MorGaon">
    <meta name="keywords" content="mor gaon, myevillage, mor gaon ki jankari, khairjhiti kala, gaon, dukano ka vivran, dukan, ">
    <meta name="author" content="Manish Patel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
	.navbar-brand img{
		width:50px;
		height:40px;
	}
	.showimg {
		width:100%;
		height:auto;
		background:white;
	}
	.showimg img {
		width:200px;;
		height:auto;
		background:white;
		border-radius:10px;
		border:3px solid orange;
	}
	.profile-details-1{
		padding:2px;
		border-radius:6px;
	}
	.profile-details-1 h3{
		font-size:15px;
		color:orange;
		font-weight:700;
	}
	.profile-details-1 h4{
		font-size:20px;
		font-weight:700;
		color:black;
		margin-top:10px;
	}
	.profile-details-1 p{
		font-size:14px;
		font-weight:700;
		color:black;
		margin-top:10px;
	}
</style>
</head>
<body>
	<?php 
	//including header navbar.
	include '../about/header_component.php';
	?>
	<br/>
	<?php
	if(isset($_REQUEST["eid"])){
		$eid=$_REQUEST["eid"];
		$query="select username,user_name,user_email,user_gender,user_village,user_about,user_image,user_dob,profile_views from user where user_id='$eid'";
		$sql = mysqli_query($conn, $query);
	}
	while($row = mysqli_fetch_assoc($sql)){
		$text =  htmlspecialchars($row["user_about"], ENT_QUOTES, 'UTF-8');
	?>
		<p><img src="../images/eye.png" width="35px" height="35px"> Views : <?php echo htmlspecialchars($row["profile_views"], ENT_QUOTES, 'UTF-8'); ?></p>
		<hr/>
		<div class="container">
			<div class="profile-details-1">
				<div class="showimg"><img class="img-responsive img-thumbnail" src="../<?php echo $row["user_image"];?>"></div>
				<div class="profile-details-1">
					<h4><?php echo htmlspecialchars($row["user_name"], ENT_QUOTES, 'UTF-8');?></h4>
					<br/>
					<h3><?php echo nl2br("$text\n"); ?></h3>
					<br/>
				</div>
				<div>
					<p>Village : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php echo htmlspecialchars($row["user_village"], ENT_QUOTES, 'UTF-8'); ?></p>
					<p>Date Of Birth :&nbsp; &nbsp; &nbsp;  <?php echo htmlspecialchars($row["user_dob"], ENT_QUOTES, 'UTF-8'); ?></p>
					<p>Gender :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php echo htmlspecialchars($row["user_gender"], ENT_QUOTES, 'UTF-8'); ?></p>
				</div>
			</div>
		</div>
		<?php	
		}
		?>
	<br/>
	<?php
	$query="select profile_views from user where user_id='$eid'";
	$result = mysqli_query($conn,$query);
	while($row = mysqli_fetch_assoc($result)){
		$count = $row["profile_views"];
		$newcount = $count + 1;
		$update ="update user set profile_views = '$newcount' where user_id='$eid'";
		mysqli_query($conn,$update);
	}
	?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>