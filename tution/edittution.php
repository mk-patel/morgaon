<?php

/**
* This page provide interface for updating service details. 
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
if (isset($_POST['submit'])) {
    $tutionname = $mysqli->real_escape_string($_POST['tutionname']);
    $tutionname = trim($tutionname);
    $ontime = $mysqli->real_escape_string($_POST['ontime']);
	$category = $mysqli->real_escape_string($_POST['category']);
	$offtime = $mysqli->real_escape_string($_POST['offtime']);
	$pata = $mysqli->real_escape_string($_POST['pata']);
	$facilities = $mysqli->real_escape_string($_POST['facilities']);
	$notes = $mysqli->real_escape_string($_POST['notes']);
	$village = $mysqli->real_escape_string($_POST['village']);
	$servtype = "tution";
	date_default_timezone_set('Asia/Calcutta');
	$dt3=date("Y-m-d H:i a");
	if(empty($tutionname) || empty($ontime) || empty($offtime) || empty($pata) || empty($facilities) || empty($notes) || empty($village)){
		echo "<br>";
        echo "<center style='color:red;font-weight:700;'>Warning! Empty FIELDS not VALID !!!</center>";
        echo "<br>";
	}
	else{
        $sql1 = "UPDATE services SET village='$village',servtype='$servtype',servname='$tutionname',ontime='$ontime',offtime='$offtime',category='$category',pata='$pata',facilities='$facilities',notes='$notes',dt2='$dt3',user_id='$mid' WHERE id='$eid' && user_id='$mid'";
        $result1 = mysqli_query($conn, $sql1);
		echo "<br>";
        echo "<center style='color:green;font-weight:700;'> Organization Service Is Updated Successfull <a href='../userprofile/welcome.php'>Go To Services</a></center>";
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
	$query3= "select servname,category,facilities,village,ontime,offtime,pata,notes from services where id='$eid' && user_id='$mid'";
	$result3 = mysqli_query($conn, $query3);
	$rowcount=mysqli_num_rows($result3);
	while($row2=mysqli_fetch_assoc($result3)){
	?>
		<div class="container">
			<div class="module">
				<h5>शिक्षण संस्थान, अपडेट करें...</h5>
				<hr/>
				<br/>
				<p>Note : कृपया फॉर्म English में भरें...</p>
				<form class="form" method="POST" enctype="multipart/form-data" autocomplete="off">
					<div class="form-group">
						<label for="uname">संस्थान का प्रकार :</label>
						<select class="custom-select" name="category" required>
							<option selected><?php  echo htmlspecialchars($row2["category"], ENT_QUOTES, 'UTF-8');?></option>
							<option>Computer Coarse</option>
							<option> Tution Classes</option>
							<option> Training</option>
							<option> Skill Delopment</option>
							<option> Coaching Classes</option>
						</select>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<div class="form-group">
						<label for="uname"> संस्थान का नाम :</label>
						<input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row2["servname"], ENT_QUOTES, 'UTF-8');?>" name="tutionname" required>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<div class="form-group">
						<label for="uname">खुलने का समय :</label>
						<input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row2["ontime"], ENT_QUOTES, 'UTF-8');?>" name="ontime" required>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<div class="form-group">
						<label for="uname">बंद होने का समय :</label>
						<input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row2["offtime"], ENT_QUOTES, 'UTF-8');?>" name="offtime" required>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<div class="form-group">
						<label for="uname">पता :</label>
						<textarea class="form-control" id="uname" rows="2" name="pata"><?php echo htmlspecialchars($row2["pata"], ENT_QUOTES, 'UTF-8');?></textarea required>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<div class="form-group">
						<label for="uname">सुविधाएं :</label>
						<textarea class="form-control" id="uname" rows="3" name="facilities">v<?php echo htmlspecialchars($row2["facilities"], ENT_QUOTES, 'UTF-8');?></textarea required>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<div class="form-group">
						<label for="uname">आवश्यक बातें :</label>
						<textarea class="form-control" id="uname" rows="3" name="notes"><?php echo htmlspecialchars($row2["notes"], ENT_QUOTES, 'UTF-8');?></textarea required>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<div class="form-group">
						<input type="hidden" class="form-control" id="uname" value="<?php echo $row2["village"]; ?>" name="village" required>
					</div>
						<div class="form-group form-check">
						<label class="form-check-label"> <a href="../about/terms.html">&#2325;&#2371;&#2346;&#2351;&#2366; &#2344;&#2367;&#2351;&#2350; &#2319;&#2357;&#2306; &#2358;&#2352;&#2381;&#2340;&#2379;&#2306; &#2325;&#2379; &#2319;&#2325; &#2348;&#2366;&#2352; &#2346;&#2338;&#2364; &#2354;&#2375; &#2404;</a> </label><br>
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