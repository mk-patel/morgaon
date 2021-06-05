<?php

/**
* This page provides interface to edit and update post data.
*/

/**
* This ("identification.php") file contains User Authentication code.
* This ("identification.php") file contains Database Connection code.
* It checks the user existency in database .
*/
require_once '../control/identification.php';

// taking id from url.
if(isset($_REQUEST["eid"])){
	$eid = $_REQUEST["eid"];
}

// when update or submit button clicks, it will update the dada.
if(isset($_POST["submit"])){
	$title=$_POST["title"];
	$content= $_POST["content"];
	$village= $_POST["village"];
	$update_query="UPDATE post SET post_title='$title' , post_data='$content' , post_village='$village' where post_id='$eid'";
    mysqli_query($conn,$update_query);
	header('location:../userprofile/welcome.php');
}

// taking village names.
$village_query ="select village from villagedetails";
$village_result=mysqli_query($conn,$village_query);

// takin post data to display for update.
$query = "SELECT post_title,post_data,post_village FROM post where post_id='$eid' && user_id='$mid'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
?>
<html>
<head>
	<title>Mor Gaon : MyEVillage | Digital Village</title>
    <meta charset="UTF-8">
    <meta name="description" content="Ham hamesh aapko gaon me hone wali sundar ghatnao aur parivartano se avgat karate rahenge, MorGaon">
    <meta name="keywords" content="mor gaon, myevillage, mor gaon ki jankari, khairjhiti kala, gaon, dukano ka vivran, dukan,evillage, mor gaon me suchna kaise dale ">
    <meta name="author" content="Manish Patel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<br/>
		<h5>अपने पोस्ट को edit करें या बदले :</h3>
		<hr/>
		<form class="form" method="POST"  autocomplete="off">
			<div class="form-group">
				<label for="uname">Headline( शीर्षक ) :</label>
				<input class="form-control" type="text" name="title" value="<?php echo htmlspecialchars($row["post_title"], ENT_QUOTES, 'UTF-8');?>">
				<div class="valid-feedback">Valid.</div>
				<div class="invalid-feedback">Please fill out this field.</div>
			</div>
			<div class="form-group">
				<label for="uname">सूचना  :</label>
				<textarea class="form-control" name="content" rows="5"><?php echo htmlspecialchars($row["post_data"], ENT_QUOTES, 'UTF-8');?></textarea required>
				<div class="valid-feedback">Valid.</div>
				<div class="invalid-feedback">Please fill out this field.</div>
			</div>
			<div class="form-group">
				<label for="uname">गांव :</label>
				<select class="custom-select" name="village" required>
					<option selected><?php echo htmlspecialchars($row["post_village"], ENT_QUOTES, 'UTF-8');?></option>
					<?php
					while($village_row=mysqli_fetch_assoc($village_result)){
					?>
						<option value="<?php echo $village_row["village"]; ?>"><?php echo $village_row["village"]; ?></option>  
					<?php 
					}
					?>  
				</select>
				<div class="valid-feedback">Valid.</div>
				<div class="invalid-feedback">Please fill out this field.</div>
			</div>
			<input type="submit" name="submit" class="btn btn-primary" />
		</form>
	</div>
</body>
</html>