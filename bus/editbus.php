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

// taking services id.
if(isset($_REQUEST["eid"])){
	$eid=$_REQUEST["eid"];
}

// on update all the data from services table will be updated.
if (isset($_POST['submit'])) {
    $busname = $mysqli->real_escape_string($_POST['busname']);
    $busname = trim($busname);
    $bustime = $mysqli->real_escape_string($_POST['bustime']);
	$facilities = $mysqli->real_escape_string($_POST['facilities']);
	$village = $mysqli->real_escape_string($_POST['village']);
	$servtype = "bus";
	date_default_timezone_set('Asia/Calcutta');
	$dt3=date("Y-m-d H:i a");
	if(empty($busname) || empty($bustime) || empty($facilities) || empty($village) ){
		echo "<br>";
        echo "<center style='color:red;font-weight:700;'>Warning! Empty FIELDS not VALID !!!</center>";
        echo "<br>";
	}
	else{
        $sql1 = "UPDATE services SET village='$village',servtype='$servtype',servname='$busname',ontime='$bustime',facilities='$facilities',dt2='$dt3',user_id='$mid' WHERE id='$eid'";
        $result1 = mysqli_query($conn, $sql1);
		echo "<br>";
		echo "<center style='color:green;font-weight:700;'> Bus Service Is Updated Successfull <a href='bus_ad.php'>Go To Services</a></center>";
		echo "<br>";
	}
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
	</style>
</head>
<body>
	<br/>
	<?php
	$query3= "select servname,facilities,ontime,village from services where id='$eid'";
	$result3 = mysqli_query($conn, $query3);
	$rowcount=mysqli_num_rows($result3);
	while($row2=mysqli_fetch_assoc($result3)){
	?>
		<div class="container">
			<div class="module">
				<h5>बस सुविधा, अपडेट करें</h5>
				<hr/>
				<br/>
				<p>Note : कृपया फॉर्म English में भरें...</p>
				<form class="form" method="POST" enctype="multipart/form-data" autocomplete="off">
					<div class="form-group">
						<label for="uname">बस का नाम :</label>
						<input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row2["servname"], ENT_QUOTES, 'UTF-8');?>" name="busname" required>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<div class="form-group">
						<label for="uname">बस आने का समय :</label>
						<input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row2["ontime"], ENT_QUOTES, 'UTF-8');?>" name="bustime" required>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<div class="form-group">
						<label for="uname">आपके गांव से होकर बस कहा कहा जाती है :</label>
						<textarea class="form-control" id="uname" rows="3" name="facilities"><?php echo htmlspecialchars($row2["facilities"], ENT_QUOTES, 'UTF-8');?></textarea required>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<div class="form-group">
						<input type="hidden" class="form-control" id="uname" value="<?php echo $row2["village"]; ?>" name="village" required>
					</div>
					<div class="form-group form-check">
						<label class="form-check-label"> <a href="terms.html">&#2325;&#2371;&#2346;&#2351;&#2366; &#2344;&#2367;&#2351;&#2350; &#2319;&#2357;&#2306; &#2358;&#2352;&#2381;&#2340;&#2379;&#2306; &#2325;&#2379; &#2319;&#2325; &#2348;&#2366;&#2352; &#2346;&#2338;&#2364; &#2354;&#2375; &#2404;</a> </label><br>
						<input class="form-check-input" type="checkbox" name="remember" required> &#2350;&#2376; &#2360;&#2361;&#2350;&#2340; &#2361;&#2370;&#2306; |
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Check this checkbox to continue.</div>
					</div>
					<button type="submit" name="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	<?php
	}
	?>
	<br/>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>