<?php

/**
* This page shows feedbacks. 
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
    <meta http-equiv="refresh" content="230">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
	.banner{
		height:auto;
		background-position:center;
		padding: 50px 0 100px;
	}
	.all{
		  width:100%;
		  height:auto;
		  background:grey;
	}
	.left-side{
		  float:left;
		  width:100%;
		  height:auto;
		  background:white;
		  border:0.1px solid lightblue;	  
	}
	.left-side h4 {
		  margin:2px;
		  padding:0px;
		  font-weight:700;
		  color:darkblue;
		  font-size:14px;
		  margin-left:10px;
	}
	.left-side p{
		  margin:0px;
		  font-weight:700;
		  color:black;
		  font-size:12px;
		  margin-left:10px;
	}
	</style>
</head>
<body>
	<section class="banner">
		<div class="container">
			<div class="container"  style="float:left">
			<hr style="border:2px solid orange;" />
			<br/>
				<div class="dukan">Feedbacks</div>
				<?php
				$query="select id,name,content,mobile,date from feedback order by id desc";
				$result = mysqli_query($conn,$query);
				$rowcount1=mysqli_num_rows($result);

				while($row2 = mysqli_fetch_assoc($result))
				{
				?>
				<br/>
				<div class="all">
					<div class="left-side">
						<p> ID : <?php echo htmlspecialchars($row2["id"], ENT_QUOTES, 'UTF-8'); ?></p>
						<h4>Name : <?php echo htmlspecialchars($row2["name"], ENT_QUOTES, 'UTF-8');?></h4>
						<p><?php echo htmlspecialchars($row2["content"], ENT_QUOTES, 'UTF-8');?></p>
						<p> Mobile : <?php echo htmlspecialchars($row2["mobile"], ENT_QUOTES, 'UTF-8'); ?></p>
						<p> Date : <?php echo htmlspecialchars($row2["date"], ENT_QUOTES, 'UTF-8'); ?></p>
					</div>
				</div>
				<div style="width:100%;float:left;margin-top:px;margin-bottom:px;"><hr/></div>
				<?php
				}
				?>
			</div>
		</div>
		</section>
</body>
</html>