<?php

/**
* This page shows details of a village. 
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
	p{
		font-size:14px;
		font-weight:500;
		color:grey;
	}
	stress{
		 font-weight:700;
		 color:darkorange;
	}
	h3{
		font-weight:800;
		color:darkorange;
		font-size:18px;
	}
	h4{
		font-weight:700;
		font-size:14px;
	}
	h5{
		font-size:12px;
		color:darkorange;
	}
</style>
</head>
<body>
	<?php 
	//including header navbar.
	include '../about/header_component.php';
	?>
	<br/>
	<div class="title-line">
		<?php echo htmlspecialchars($eid, ENT_QUOTES, 'UTF-8');?> के बारे में जानकारी...
		<hr/>
	</div>
	<?php
	$query1="select * from villagedetails where village='$eid'";
	$result1 = mysqli_query($conn, $query1);
	$rowcount=mysqli_num_rows($result1);
	while($row1 = mysqli_fetch_assoc($result1)){
		$text = htmlspecialchars($row1["samasya"], ENT_QUOTES, 'UTF-8');
	?>
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<p>मौसम : &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <stress> <?php echo htmlspecialchars($row1["weather"], ENT_QUOTES, 'UTF-8');?> </stress></p>
					<p>जिला : &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <stress> <?php echo htmlspecialchars($row1["jila"], ENT_QUOTES, 'UTF-8');?> </stress></p>
					<p>तहसील : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <stress> <?php echo htmlspecialchars($row1["tehsil"], ENT_QUOTES, 'UTF-8');?> </stress></p>
					<p>विकास खंड : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <stress> <?php echo htmlspecialchars($row1["block"], ENT_QUOTES, 'UTF-8');?> </stress></p>
					<p>पुलिस स्टेशन : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <stress> <?php echo htmlspecialchars($row1["polish"], ENT_QUOTES, 'UTF-8');?> </stress></p>
					<p>विधानसभा क्षेत्र : &nbsp;  &nbsp; &nbsp <stress> <?php echo htmlspecialchars($row1["vidhansabha"], ENT_QUOTES, 'UTF-8');?> </stress></p>
					<p>लोकसभा क्षेत्र : &nbsp; &nbsp; &nbsp; &nbsp;  <stress> <?php echo htmlspecialchars($row1["loksabha"], ENT_QUOTES, 'UTF-8');?> </stress></p>
					<p>विधायक : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <stress> <?php echo htmlspecialchars($row1["vidhayak"], ENT_QUOTES, 'UTF-8');?> </stress></p>
					<p>सांसद :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;  <stress> <?php echo htmlspecialchars($row1["sansad"], ENT_QUOTES, 'UTF-8');?> </stress></p>
					<p>डाकघर पिन कोड : &nbsp; <stress> <?php echo htmlspecialchars($row1["pincode"], ENT_QUOTES, 'UTF-8');?> </stress></p>
					<hr/>
					<h3> <?php echo $row1["sarpanch"];?> </h3>
					<h4> सरपंच, मोबाइल नंबर . <?php echo $row1["sarpanchmob"];?></h4>
					<h5> <?php echo $eid; ?> के मुखिया ( सरपंच )</h5>
					<hr/>
					<br/>
					<h3> <?php echo $row1["upsarpanch"];?> </h3>
					<h4>उपसरपंच, <?php echo $eid; ?></h4>
					<hr/>
					<br/>
					<p>मकानों की संख्या :  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - <stress> <?php echo htmlspecialchars($row1["houses"], ENT_QUOTES, 'UTF-8');?> </stress></p>
					<hr/>
					<p> कुल जनसंख्या  :  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - <stress> <?php echo htmlspecialchars($row1["population"], ENT_QUOTES, 'UTF-8');?> </stress></p>
					<hr/>
					<p>महिलाओं की संख्या :  &nbsp; &nbsp; &nbsp; -  <stress> <?php echo htmlspecialchars($row1["populationF"], ENT_QUOTES, 'UTF-8');?> </stress></p>
					<hr/>
					<p>पुरुषों की संख्या :  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - <stress> <?php echo htmlspecialchars($row1["populationM"], ENT_QUOTES, 'UTF-8');?> </stress></p>
					<hr/>
					<p>कुल वार्ड संख्या  : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - <stress> <?php echo htmlspecialchars($row1["ward"], ENT_QUOTES, 'UTF-8');?> </stress></p>
					<hr/>
				</div>
				<div class="col-sm-6">
					<p>स्कूल या कॉलेज : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - <stress> <?php echo htmlspecialchars($row1["school"], ENT_QUOTES, 'UTF-8');?> &#2340;&#2325; &#2361;&#2376; </stress></p>
					<hr/>
					<p style="font-weight:600;">दुकानों की संख्या : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; -  <stress> <?php echo htmlspecialchars($row1["shop"], ENT_QUOTES, 'UTF-8');?> </stress></p>
					<hr/>
					<p style="font-weight:600;">प्राथमिक/उपस्वास्थ्य केंद्र है - : <stress> 
						<?php
						if($row1["health"]=="Yes"){
							echo "हां है";
						}
						if($row1["health"]=="No"){
							echo "नहीं है";
						}
						?>
					</stress>
					</p>
					<hr/>
					<p>भू - जलस्तर  : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; -  <stress> <?php echo htmlspecialchars($row1["waterlevel"], ENT_QUOTES, 'UTF-8');?> </stress></p>
					<hr/>
					<p> तालाबों की संख्या : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <stress> <?php echo htmlspecialchars($row1["ponds"], ENT_QUOTES, 'UTF-8');?> </stress></p>
					<hr/>
					<p> गांव में समस्याएं : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;-<br><stress> <?php echo nl2br("$text\n");?> </stress> </p>
					<hr/>
				</div>
				<a href="update-village-details-interface.php"> <button type="button" class="btn btn-warning">जानकारी अपडेट करें</button></a>
			</div>
			<br/>
		</div>
	<?php
	}
	?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>