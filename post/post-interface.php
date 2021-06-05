<?php

/**
* This page provides interface to input post data.
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
	<meta charset="UTF-8">
    <meta name="description" content="Ham hamesh aapko gaon me hone wali sundar ghatnao aur parivartano se avgat karate rahenge, MorGaon">
    <meta name="keywords" content="mor gaon, myevillage, mor gaon ki jankari, khairjhiti kala, gaon, dukano ka vivran, dukan, ">
    <meta name="author" content="Manish Patel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8"/>
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
	#title-line{
		font-size:20px;
		font-weight:700;
		color:orange;
		padding:10px;
		margin-left:10px;
	}
	</style>
</head>
<body>

	
	<?php
	
	// Taking village names.
	$village_name_query = "SELECT village FROM villagedetails";
	$village_name_result = mysqli_query($conn, $village_name_query);
	?>
	<div id="strip-1">
	</div>
	<div id="strip-2">
	</div>
	<div id="title-line">
		Post A News
	</div>
	<hr/>
	<div class="container">
		<form class="form" action="insert-post-interface.php" onsubmit="addNewLines()" method="post" enctype="multipart/form-data" autocomplete="off">
			<div class="form-group">
				<label for="text">Headline( शीर्षक ) :</label>
				<input type="text" class="form-control" id="username" placeholder="Headline" name="post_title">
			</div>
			<div class="form-group">
				<label for="comment">सूचना :</label>
				<textarea class="form-control" rows="7" id="comment" name="post_data" required></textarea>
			</div>
			<div class="form-group">
				<label for="text">गांव :</label>
				<select class="custom-select" name="post_village" required>
				<?php
				while($village_name_row=mysqli_fetch_assoc($village_name_result))
				{
				?>
					<option selected value="<?php echo htmlspecialchars($village_name_row["village"], ENT_QUOTES, 'UTF-8');?>"><?php echo htmlspecialchars($village_name_row["village"], ENT_QUOTES, 'UTF-8');?></option>
					
				<?php 
				}
				?>  
				</select>
			</div>
			<div class="form-group">
				<label for="file">फोटो :</label>
				<input type="file" class="form-control" id="file" name="post_image">
			</div>
			<button type="submit" class="btn btn-warning">Submit</button>
			<p>Submit करने के बाद प्रतीक्षा करें।</p>
		</form>
	</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

