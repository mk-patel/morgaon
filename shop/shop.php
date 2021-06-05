<?php

/**
* This page shows the village shop. 
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
	<meta http-equiv="refresh" content="40">
	<meta charset="UTF-8"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
	body{
		background:#F8F8F8;
	}
	.navbar-brand img{
		width:50px;
		height:40px;
	}
	#title-line{
		font-size:18px;
		font-weight:800;
		margin-bottom:13px;
		text-align:center;
		color:darkorange;	
	}
	.thumbnail{
		padding:10px;
		border:5px solid rgba(0,0,0,0.1);
		background:white;
		box-shadow:1px 1px 10px 1px rgba(0,0,0,0.1);
	}
	.caption h4{
		font-size:15px;
		padding:20px;
		color:black;
	}
	.caption p{
		color:grey;
		margin-left:20px;
	}
	.details-sec{
		margin-left:20px;
		margin-right:20px;
		color:black;
		margin-top:30px;
		padding:10px;
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
	if(isset($_REQUEST["eid"]))
	{
	$eid=$_REQUEST["eid"];
	}
	?>
	<div id="title-line"><?php echo $eid; ?> में दुकान / सार्वजनिक स्थान की स्थिति...</div>
	<hr/>
	<?php
	
	$query ="select shop_id,shopkipper,shop_name,shop_category,shop_status,shop_mobile,shop_image from shop where shop_village ='$eid' order by shop_id desc";
	$query1=mysqli_query($conn,$query);
	if($rowcount=mysqli_num_rows($query1)==0)
		echo "<center>No shops available here...<br/><br/></center>";
	?>
	<div class="container">
		<div class="row">
		<?php
		while($row=mysqli_fetch_assoc($query1)){
		?>
		<div class="col-md-4">
			<div class="thumbnail">
				<a href="showmoreshop.php?eid=<?php echo $row["shop_id"];?>">
				<div class="caption">
						<h4><?php echo htmlspecialchars($row["shop_name"], ENT_QUOTES, 'UTF-8');?></h4>
						<p><?php echo $row["shop_category"];?><br/>
							<?php echo htmlspecialchars($row["shopkipper"], ENT_QUOTES, 'UTF-8');?> , <?php echo htmlspecialchars($row["shop_mobile"], ENT_QUOTES, 'UTF-8');?>
						</p>
						<?php
						if($row["shop_status"]=='off'){
							echo "<button style='background:grey;color:white;font-size:14px;border:2px solid grey;border-radius:10px;width:60px;margin-bottom:15px;margin-lrft:20px;'> &#2348;&#2306;&#2342; &#2361;&#2376; </button>";
						}
						if($row["shop_status"]=='on'){
							echo "<button style='background:darkorange;color:white;font-size:14px;border:2px solid darkorange;border-radius:10px;width:60px;margin-bottom:15px;margin-left:20px;'> &#2326;&#2369;&#2354;&#2366; &#2361;&#2376; </button>";
						}
						?>
					</div>
					<img src="../<?php echo $row["shop_image"];?>" alt="Shop Image" style="width:100%">
					
				</a>
			</div>
		</div>
		<?php
		}
		?>
		</div> 
	</div> 
	<div class="details-sec" style="">
		<p><b style="font-size:16px;">अपना दुकान रजिस्टर करे और सभी गांव में दिखाए...</b></p>
		<p style="font-size:16px;margin-left:10px;">रजिस्टर करने के लिए...<br>
			  1. अपने प्रोफ़ाइल के नीचे <a href="shopregistration.php">अपना दुकान रजिस्टर करे</a> लिंक पर क्लिक करें |
		</p>
		<p style="font-size:17px;"><b>फायदे</b><br></p>
		<p style="font-size:15px;margin-left:10px;">
			1. आपका दुकान/सार्वजनिक स्थान सभी गांव में दिखने लगेगा।<br>
			2. आप अपने दुकान का फोटो अपलोड कर सकते है।<br>
			3. सभी गांव में दिखने से लोगों को आपके दुकान के बारे में पता चलेगा।<br> 
			उदाहरण :- आपके दुकान में कौन - कौन सा समान मिलता है, आपका दुकान कहा है , ऐसी बहुत सी सुविधाएं आपको मिलती है।<br>
			4. आप अपने दुकान/सार्वजनिक स्थान में मिल रहे आकर्षक समान के बारे में लोगों को जानकारी दे सकते है।<br>
			5. आप अपनी दुकान की लाइव स्थिति अर्थात चालू होने और बंद होने की जानकारी तुरंत डाल सकते हो।<br>
			उदाहरण :- अभी दुकान <b>बंद </b>है।
			अभी दुकान <b>खुला</b> है।<br>
			6. सभी गांव में आपकी दुकान की जानकारी बढ़ने से आपकी ग्राहक की संख्या बढ़ जाएगी और आपका दुकान एक  E-Shop बन जाएगा।<br>
		</p>
	</div> 

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>