<?php

/**
* This page expands the village shop details. 
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
    <meta name="description" content="Ham hamesh aapko gaon me hone wali sundar ghatnao aur parivartano se avgat karate rahenge, Mor Gaon : MyEVillage | Digital Village">
    <meta name="keywords" content="mor gaon, myevillage, mor gaon ki jankari, khairjhiti kala, gaon, dukano ka vivran, dukan, ">
    <meta name="author" content="Manish Patel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
	.left-side{
		  width:100%;
		  height:auto;
		  background:white;
		  border:0.1px solid lightblue;	  
	}
	.left-side h5 {
		  padding:10px;
		  font-weight:700;
		  color:darkblue;
		  font-size:15px;
	}
	.left-side h6 {
		  padding:10px;
		  color:black;
		  font-size:15px;
	}
	.left-side p{
		  font-weight:700;
		  color:grey;
		  font-size:12px;
		  margin-left:10px;
	}
	.l-side{
		  width:100%;
		  height:auto;
		  border:0.7px solid rgba(0,0,0,0.09);
	}
	.l-side p{
		  width:100%;
		  height:auto;
		  padding:10px;
		  font-size:14px;
		  border-radius:2px;
		  font-weight:650;
		  color:rgba(0,0,0,0.7);
	}
	.navbar-brand img{
		width:50px;
		height:40px;
	}
	.showimg {
		width:100%;
		height:auto;
		background:white;
		text-align:center;
	}
	.showimg img {
		width:auto;
		height:50%;
		background:white;
		text-align:center;
	}
	</style>
</head>
<body>
	
	<?php 
	//including header navbar.
	include '../about/header_component.php';
	?>
	<br/>
	<div class="container">
		<?php
		if(isset($_REQUEST["eid"])){
		$eid=$_REQUEST["eid"];
		}
		$query="select shop_id,shopkipper,shop_name,shop_category,shop_details,shop_status,shop_address,shop_mobile,shop_image,shop_views from shop where shop_id='$eid'";
		$result=mysqli_query($conn,$query);
		$rowcount = mysqli_num_rows($result);
		while($row = mysqli_fetch_assoc($result)){
			$text2 =  htmlspecialchars($row["shop_details"], ENT_QUOTES, 'UTF-8');
		?>
			<h5>दुकान या सार्वजनिक स्थान का विवरण...</h5>
			<hr/>
			<p>आपका दुकान/सार्वजनिक क्षेत्र : <?php echo htmlspecialchars($row["shop_views"], ENT_QUOTES, 'UTF-8'); ?> बार देखा गया</p>
			<hr/>
			<br/>
			<div class="showimg"> <?php echo "<p>" ?> <img class="img-responsive img-thumbnail" src="../<?php echo $row["shop_image"];?>" ><?php echo "</p>" ?></div>
			<div class="all">
				<div class="left-side">
					<h5> <?php echo htmlspecialchars($row["shop_name"], ENT_QUOTES, 'UTF-8');?></h5>
					<p>Owner : <?php echo htmlspecialchars($row["shopkipper"], ENT_QUOTES, 'UTF-8');?></p>
					<hr/>
					<h6><?php echo nl2br("$text2\n");?></h6>
					<p>पता : <?php $text3 = htmlspecialchars($row["shop_address"], ENT_QUOTES, 'UTF-8');
						echo nl2br("$text3\n");?>
					</p>
				</div>
				<div class="l-side">  
					<p> अभी
						<?php
						if($row["shop_status"]=='off'){
							echo "बंद है .";
						}
						if($row["shop_status"]=='on'){
							echo "खुला है";
						}
						?>
					</p>
				</div>
			</div>
		<?php
		}
		?>
	</div>
	<?php
	$query2="select shop_views from shop where shop_id='$eid'";
	$result2 = mysqli_query($conn, $query2);
	while($row2 = mysqli_fetch_assoc($result2)){
		$count = $row2["shop_views"];
		$newcount = $count + 1;
		$update ="update shop set shop_views = '$newcount' where shop_id='$eid'";    
		$result1 = mysqli_query($conn, $update);
	}
	?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>