<?php

/**
* This page shows user details. 
*/

/**
* This ("identification.php") file contains User Authentication code.
* This ("identification.php") file contains Database Connection code.
* It checks the user existency in database .
*/
require_once '../control/identification.php';


if(isset($_REQUEST["delid"]))
{
	$delid = $_REQUEST["delid"];
	$success = "delete from user where user_id='$delid'";
    $fhgdh = mysqli_query($conn, $success);
	header('location:members.php');
}

?>
<html>
<head>
    <title>Mor Gaon : MyEVillage</title>
	<meta charset="UTF-8">
    <meta name="description" content="Ham hamesh aapko gaon me hone wali sundar ghatnao aur parivartano se avgat karate rahenge, MorGaon">
    <meta name="keywords" content="mor gaon, myevillage, mor gaon ki jankari, khairjhiti kala, gaon, dukano ka vivran, dukan, ">
    <meta name="author" content="Manish Patel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
	.banner{
		height:auto;
		background-position:center;
		padding: 50px 0 100px;
	}
	.navbar-brand img{
		width:60px;
		height:40px;
	}
	.col-sm-6 h1{
		font-size:30px;
		color:darkorange;
	}
	.col-sm-6 h2{
		font-size:21px;
		color:grey;
	}
	.dukan{
		font-size:18px;
		font-weight:800;
		margin-bottom:13px;
		text-align:center;
		color:darkorange
	}
	.footer-but{
		color:white;
		font-size:16px;
		text-align:center;
		background:rgba(0,0,0,0.05);
		border-radius:4px;
		border:1px solid orange;
	}
	.footer-but a{
		color:darkorange;
		margin:1px;
	}
	@media screen and (max-width:700px){
	.col-sm-6 h1{
		font-size:24px;
		color:darkorange;
	}
	.col-sm-6 h2{
		font-size:16px;
		color:grey;
	}
	}
	</style>
</head>
<body> 
<?php
$query0 ="select user_id,username,user_name,user_email,user_village,vcode from user order by user_id desc";
$result = mysqli_query($conn, $query0);
$rowcount0=mysqli_num_rows($result);
?>	 
	<div class="container" style="Color:red ;font-size:23px; font-weight:700;">मोर गांव सदस्य</div><br><br>
	<div class="container">
	<?php
	while($row0 = mysqli_fetch_assoc($result))
	{
	?>
		<div>
			<p style=" font-weight:600;"><?php echo htmlspecialchars($row0["user_id"], ENT_QUOTES, 'UTF-8');?> . <?php echo htmlspecialchars($row0["username"], ENT_QUOTES, 'UTF-8');?> , <?php echo htmlspecialchars($row0["user_email"], ENT_QUOTES, 'UTF-8');?></p>
			<p style=" font-weight:600;">Name : <?php echo htmlspecialchars($row0["user_name"], ENT_QUOTES, 'UTF-8');?></p>
			<p style=" font-weight:600;">Village : <?php echo htmlspecialchars($row0["user_village"], ENT_QUOTES, 'UTF-8');?></p>
			<p style=" font-weight:600;">Verification Code : <?php echo htmlspecialchars($row0["vcode"], ENT_QUOTES, 'UTF-8');?></p>
			<p><a href="members.php?delid=<?php echo $row0["user_id"]; ?>"><p>Delete</p></a></p>
		</div>
	 <hr/>
	 <br/>
	<?php
	}
	?>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>