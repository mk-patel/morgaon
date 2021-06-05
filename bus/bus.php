<?php

/**
* This page shows roadways services. 
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
	#strip-1{
		background:#ff9b4a;
		width:100%;
		height:10px;
	}
	#strip-2{
		background:black;
		width:100%;
		height:5px;
	}
	.navbar-brand img{
		width:50px;
		height:40px;
	}
	.title-line{
		font-size:20px;
		font-weight:700;
		color:black;
		padding:10px;
		margin-left:10px;
		width:100%;
	}
	.title-line-2{
		font-size:18px;
		font-weight:700;
		color:black;
		padding:10px;
		width:100%;
	}
	.all{
		  width:100%;
		  height:auto;
		  background:grey;
	}
	.left-side{
		  width:100%;
		  height:auto;
		  background:#fafafa;
		  border:2px solid rgba(0,0,0,0.1);	 
		  border-radius:5px;	  
	}
	.left-side h4 {
		  margin-left:8px;
		  margin-top:4px;
		  padding:0px;
		  font-weight:700;
		  color:rgba(0,0,0,0.6);
		  font-size:15px;
	}
	.left-side p{
		  margin-left:8px;
		  font-weight:700;
		  color:rgba(0,0,0,0.4);
		  font-size:11px;
	}

	.right-side{
		  width:100%;
		  height:auto;
		  background:grey;
		  margin-top:5px;	  
	}
	.l-side{
		  width:100%;
		  height:auto;
		  background:#fafafa;
		  border:2px solid rgba(0,0,0,0.1); 
		  border-radius:5px; 
	}
	.l-side p{
		  width:90%;
		  height:auto;
		  margin-left:10px;
		  margin-right:10px;
		  margin-bottom:0px;
		  margin-top:5px;
		  font-size:14px;
		  border-radius:4px;
		 
	}
	</style>
</head>
<body>
	<div id="strip-1">
	</div>
	<div id="strip-2">
	</div>
	<?php
	if(isset($_REQUEST["eid"])){
		$eid=$_REQUEST["eid"];
	}
	$query3= "select servname,facilities,ontime from services where servtype='bus' && village='$eid' order by id desc ";
	$result3 = mysqli_query($conn, $query3);
	$rowcount=mysqli_num_rows($result3);
	if($rowcount==0){
		echo "<center> No Services...</center>";
	}
	?>
	<br/>
	<div class="title-line">
		बस सुविधाएं :
	</div>
	<hr/>
	<div class="container">
		<h4 class="title-line-2"><?php  echo $eid; ?> गांव में बस सुविधाएं :</h4><br>
		<?php
		while($row2=mysqli_fetch_assoc($result3)){
		?>
			<div class="allinone">
				<div class="all">
					<div class="left-side">
					<h4>बस का नाम : <?php  echo htmlspecialchars($row2["servname"], ENT_QUOTES, 'UTF-8');?></h4></a>
					</div>
				</div>
				<div class="l-side">
					<p><?php echo $eid; ?> गांव से <?php echo htmlspecialchars($row2["facilities"], ENT_QUOTES, 'UTF-8');?> जाती है.</p>
					<p><b><?php  echo $eid;?></b> में बस आने का समय :<?php echo htmlspecialchars($row2["ontime"], ENT_QUOTES, 'UTF-8');?>
					</p>
					<br/>   
				</div>
			</div>
		<?php
		}
		?>
	</div>
	<div class="container">
		<div class="title-line">
			<br/>
			दूसरे गावों में बस सुविधाएं ...
			<br/>
			<br/>
		</div>
		<?php
		$query= "select servname,facilities,ontime from services where servtype='bus' && village != '$eid' order by id desc ";
		$result = mysqli_query($conn, $query);
		$rowcount=mysqli_num_rows($result);
		if($rowcount==0){
			echo "<center> No Services...</center>";
		}
		while($row = mysqli_fetch_assoc($result)){
		?>
			<div class="allinone">
				<div class="all">
					<div class="left-side">
					<h4>बस का नाम : <?php  echo htmlspecialchars($row["servname"], ENT_QUOTES, 'UTF-8');?></h4></a>
					</div>
				</div>
				<div class="l-side">
					<p><?php echo $eid; ?> गांव से <?php echo htmlspecialchars($row["facilities"], ENT_QUOTES, 'UTF-8');?> जाती है.</p>
					<p style="color:grey;padding:5px;"><b><?php  echo $eid;?></b> में बस आने का समय :<?php echo htmlspecialchars($row["ontime"], ENT_QUOTES, 'UTF-8');?>
					</p>
					<br/>   
				</div>
			</div>
		<?php
		}
		?>
	</div>
	<div class="title-line">
		<br/><a href="../about/feedback.php">सेवा में किसी भी तरह की बदलाव के लिए कृपया अपना सुझाव देवें...</a>
		<br/>
		<br/>
	</div>
</body>
</html>