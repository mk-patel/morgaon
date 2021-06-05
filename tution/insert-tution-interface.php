<?php

/**
* This page provide interface for insert a new service details. 
*/

/**
* This ("identification.php") file contains User Authentication code.
* This ("identification.php") file contains Database Connection code.
* It checks the user existency in database .
*/
require_once '../control/identification.php';

if (isset($_POST['submit'])) {
	$category = $mysqli->real_escape_string($_POST['category']);
    $tutionname = $mysqli->real_escape_string($_POST['tutionname']);
    $tutionname = trim($tutionname);
    $ontime = $mysqli->real_escape_string($_POST['ontime']);
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
	}else
	{
        $sql1 = "INSERT INTO services (village,servtype,servname,category,ontime,offtime,pata,facilities,notes,dt2,user_id) VALUES ( '$village', '$servtype','$tutionname','$category','$ontime','$offtime','$pata','$facilities','$notes','$dt3','$mid')";
        $result1 = mysqli_query($conn, $sql1);
				echo "<br>";
                echo "<center style='color:green;font-weight:700;'> Organization Registration Is Successfull <a href='../userprofile/welcome.php'>Go To Services</a></center>";
                echo "<br>";
	}
}
?>
<html>
<head>
    <title>MorGaon : MyEVillage | Digital Village</title>
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
	.left-side{
		  width:100%;
		  height:auto;
		  background:#fafafa;
		  border:2px solid rgba(0,0,0,0.1);	 
		  border-radius:9px;	  
	}
	.left-side h4 {
		  margin-left:10px;
		  margin-top:4px;
		  padding:5px;
		  font-weight:700;
		  color:orange;
		  font-size:15px;
	}
	.left-side p{
		margin-left:15px;
		font-size:13px;	  
	}
	.l-side{
		width:100%;
		height:auto;
		background:#fafafa;
		border:2px solid rgba(0,0,0,0.1); 
		border-radius:9px;
		margin-bottom:20px;
	}
	.l-side p{
		  width:90%;
		  height:auto;
		  padding:10px;
		  font-size:14px;
		  border-radius:4px;
	}
	</style>
</head>
<body>
	<?php 
	//including header navbar.
	include '../about/header_component.php';
	
	// for user village.
	$village_query = "select user_village from user where user_id=$mid";
	$village_result = mysqli_query($conn, $village_query);
	$village_row = mysqli_fetch_assoc($village_result);
	$village = $village_row['user_village'];
	?>
	<br/>
	<div class="container">
		<br/>
		<h5><?php echo $village; ?> गांव में शिक्षण सुविधाएं  :</h5>
		<hr/>
	<?php
	
	$query3= "select id,servname,category,facilities,ontime,offtime from services where servtype='tution' && village='$village' && user_id='$mid' order by id desc ";
	$result3 = mysqli_query($conn, $query3);
	$rowcount=mysqli_num_rows($result3);
	if($rowcount==0)
		echo "<center> No Services...</center>";
	if(isset($_REQUEST["delid"])){
		$delid = $_REQUEST["delid"];
		$aql = "delete from services where id='$delid'";
		$result = mysqli_query($conn,$aql);
		echo "<br>";
		echo "<br>";
		echo "<div class='container' style='font-weight:700;color:darkorange;'>Successfully Deleted , <a href='../userprofile/welcome.php'>Refresh Now</a></div>";
		echo "<br>";
		echo "<br>";
	}
	?>
	
		<?php
		while($row2=mysqli_fetch_assoc($result3)){
		?>
			<div class="allinone">
				<div class="all">
					<div class="left-side">
						<h4><?php  echo htmlspecialchars($row2["servname"], ENT_QUOTES, 'UTF-8');?></h4>
						<p><?php echo htmlspecialchars($row2["category"], ENT_QUOTES, 'UTF-8');?></p>
					</div>
				</div>
				<div class="l-side">
					<p>
						खुलने का समय : <b><?php echo htmlspecialchars($row2["ontime"], ENT_QUOTES, 'UTF-8');?></b> ~ बंद होने का समय : <b><?php echo htmlspecialchars($row2["offtime"], ENT_QUOTES, 'UTF-8');?></b>
						<br/>
						<br/>
						<?php echo htmlspecialchars($row2["facilities"], ENT_QUOTES, 'UTF-8');?>
					</p>
					<p>
						<a href="edittution.php?eid=<?php echo $row2["id"];?>"><button class="btn btn-success">Edit</button></a>
						<a href="insert-tution-interface.php?delid=<?php echo $row2["id"]; ?>"><button class="btn btn-danger">Delete</button></a>
					</p>
				</div>
			</div>
		<?php
		}
		?>
	</div>
	<hr/>
	<br/>
	<div class="container">
		<div class="module">
			<h5>अपने स्वयं के शिक्षण संस्थान/Tution Classes को अपलोड करें...</h5>
			<p>Note : कृपया फॉर्म English में भरें...</p>
			<hr/>
			<form class="form" action="insert-tution-interface.php" method="POST" enctype="multipart/form-data" autocomplete="off">
				<div class="form-group">
					<label for="uname">संस्थान का प्रकार :</label>
					<select class="custom-select" name="category" required>
						<option selected>Computer Coarse</option>
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
					<input type="text" class="form-control" id="uname" placeholder="उदाहरण : Shree Ram Tution Classes Khairjhiti Kala" name="tutionname" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="uname">खुलने का समय :</label>
					<input type="text" class="form-control" id="uname" placeholder="उदाहरण : 8:00 AM, 4:00 PM" name="ontime" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="uname">बंद होने का समय :</label>
					<input type="text" class="form-control" id="uname" placeholder="उदाहरण : 10:00 AM, 6:00 PM" name="offtime" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="uname">पता :</label>
					<textarea class="form-control" id="uname" rows="2" name="pata"></textarea required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="uname">सुविधाएं :</label>
					<textarea class="form-control" id="uname" rows="3" name="facilities"></textarea required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="uname">आवश्यक बातें :</label>
					<textarea class="form-control" id="uname" rows="3" name="notes"></textarea required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<input type="hidden" class="form-control" id="uname" value="<?php echo $village; ?>" name="village">
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>