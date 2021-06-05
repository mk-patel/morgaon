<?php

/**
* This page provide interface deleting own account. 
*/

/**
* This ("identification.php") file contains User Authentication code.
* This ("identification.php") file contains Database Connection code.
* It checks the user existency in database .
*/
require_once '../control/identification.php';

if(isset($_REQUEST["eid"])){
$eid=$_REQUEST["eid"];

}
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
	h4{
		color:red;
		text-align:center;
		font-size:15px;
	}
	h5{
		color:green;
		font-weight:700;
		text-align:center;
		font-size:15px
	}
	h6{
		font-weight:700;
		text-align:center;
		font-size:14px
	}
	.del-btn{
		color:white;
		background:red;
		text-align:center;
	}
	</style>
</head>
<body>
	<div class="container">
		<br/>
		<h4>Are You Sure !! <br>
			After Deletion You Will Not Be Able To Reactivate It, <br>
			Every Posts And Shops Will Be Deleted.
		</p>
		<h5>Thankyou For Using Our Service !!<br>
			Please <a href="feedback.html">Send Us A Feedback</a> So We Can Improve Our Plateform To Provide A Better Experience.<br>
		</p>
		<h6>Click Bellow To Delete Your Account</p>
		<div class="del-btn"><a href="delete.php?delid=<?php echo $mid ; ?>"><button class="btn btn-danger">Delete Your Account</button></a></div>
	</div>
	<?php
	if(isset($_REQUEST["delid"])){
		$delid = $_REQUEST["delid"];
		$sql = "DELETE FROM post WHERE user_id = '$delid'";
		$sql1 = "DELETE FROM khairjhitikalan WHERE user_id = '$delid'";
		$sql2 = "DELETE FROM khairjhitishop WHERE user_id = '$delid'";
		$sql2 = "DELETE FROM users WHERE id = '$delid'";
		mysqli_query($conn, $sql);
		mysqli_query($conn, $sql1);
		mysqli_query($conn, $sql2);
		mysqli_query($conn, $sql3);
		header('location:../index.php');
		}
	?>
</body>
</html>