<?php

/**
* This page shows admin dashboard. 
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
    <title>Mor Gaon : MyEVillage</title>
	<meta charset="UTF-8">
    <meta name="description" content="Ham hamesh aapko gaon me hone wali sundar ghatnao aur parivartano se avgat karate rahenge, MorGaon">
    <meta name="keywords" content="mor gaon, myevillage, mor gaon ki jankari, khairjhiti kala, gaon, dukano ka vivran, dukan, ">
    <meta name="author" content="Manish Patel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
    <meta http-equiv="refresh" content="20">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
	.banner{
		height:auto;
		background-position:center;
		padding: 50px 0 100px;
		
	}
	.dropdown{
		margin-top:20px;
		margin-left:20px;
	}
	.navbar-brand img{
		width:60px;
		height:40px;
	}
	.col-sm-6 h1{
		font-size:30px;
		color:darkorange;
	}
	@media screen and (max-width:700px){
	.col-sm-6 h1{
		font-size:24px;
		color:darkorange;
	}
	.col-sm-6 p{
		font-size:14px;
		color:grey;
	}
	}
	</style>
</head>
<body>
	<br/>
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<h1 style="font-weight:800;">मोर गांव</h1>
				<p><a href="../login/logout.php"><button type="button" class="btn btn-warning"  style="color:white;font-weight:800;" > Logout</button></a></p>
				<p>Check Everything Now...</p>
			</div>
		</div>
	</div>
    <div class="container">
		<a href="../userprofile/forgetpass_admin.php"><button type="button" class="btn btn-warning"  style="color:white;font-weight:800;" >View Password Change request</button></a><br><br>
		<a href="../post/allpost.php"><button type="button" class="btn btn-warning"  style="color:white;font-weight:800;" >View All Post</button></a><br><br>
		<a href="../userprofile/user.php"><button type="button" class="btn btn-warning"  style="color:white;font-weight:800;" >New User Registration</button></a><br><br>
		<a href="../villagedetails/vill.php"><button type="button" class="btn btn-warning"  style="color:white;font-weight:800;" >New Village Registration</button></a><br><br>
		<a href="../shop/shop.php"><button type="button" class="btn btn-warning"  style="color:white;font-weight:800;" >New Shop Registration</button></a><br><br>
		<a href="../about/feedback_admin.php"><button type="button" class="btn btn-warning"  style="color:white;font-weight:800;" >View FeedBacks</button></a><br><br>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>