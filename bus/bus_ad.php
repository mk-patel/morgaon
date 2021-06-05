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

//on submit it will insert the data into services table.
if (isset($_POST['submit'])) {
    $busname = $mysqli->real_escape_string($_POST['busname']);
    $busname = trim($busname);
    $bustime = $mysqli->real_escape_string($_POST['bustime']);
	$gone = $mysqli->real_escape_string($_POST['gone']);
	$village = $mysqli->real_escape_string($_POST['village']);
	$servtype = "bus";
	date_default_timezone_set('Asia/Calcutta');
	$dt3=date("Y-m-d H:i a");
	if(empty($busname) || empty($bustime) || empty($gone) || empty($village) ){
		echo "<br>";
        echo "<center style='color:red;font-weight:700;'>Warning! Empty FIELDS not VALID !!!</center>";
        echo "<br>";
	}
	else{
		$n = $_SESSION["username"];
        $sql1 = "INSERT INTO services (village,servtype,servname,ontime,facilities,dt2,user_id) VALUES ('$village', '$servtype', '$busname','$bustime','$gone','$dt3','$mid')";
        $result1 = mysqli_query($conn, $sql1);
				echo "<br>";
                echo "<center style='color:green;font-weight:700;'> Bus Registration Is Successfull <a href='../userprofile/welcome.php'>Go To Services</a></center>";
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
	.left-side{
		  float:left;
		  width:80%;
		  height:auto;
		  background:#fafafa;
		  border:2px solid rgba(0,0,0,0.1);	 
		  border-radius:9px;	  
	}
	.left-side h4 {
		  margin-left:8px;
		  margin-top:4px;
		  padding:5px;
		  font-weight:700;
		  color:orange;
		  font-size:15px;
	}
	.left-side-left{
		  float:right;
		  width:20%;
		  height:auto;
		  background:grey;
		  border:2px solid rgba(0,0,0,0.1); 
		  border-radius:9px; 	  
	}
	.left-side-left p{
		  background:grey;
		  padding:0px;
		  text-align:center;
	}
	.left-side-left a p{
		  text-decoration:none;
		  color:white;
		  height:auto;
		  width:100%;  
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
		  margin-left:20px;
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
	<br/>
	<?php
	// for user village.
	$village_query = "select user_village from user where user_id=$mid";
	$village_result = mysqli_query($conn, $village_query);
	$village_row = mysqli_fetch_assoc($village_result);
	$village = $village_row['user_village'];
	
	$service_query = "select id,servname,facilities,ontime,s.user_id,username,user_village from services s inner join user u ON s.user_id=u.user_id where servtype='bus' && village='$village' order by id desc ";
	$service_result = mysqli_query($conn, $service_query);
	if(isset($_REQUEST["delid"])){
		$delid = $_REQUEST["delid"];
		$aql = "delete from services where id='$delid'";
		$result = mysqli_query($conn,$aql);
		echo "<br>";
		echo "<br>";
		echo "<div class='container' style='font-weight:700;color:darkorange;'>Successfully Deleted , <a href='bus_ad.php'>Refresh Now</a></div>";
		echo "<br>";
		echo "<br>";
	}
	?>
	<div class="container">
		<br/>
		<h5><?php echo $village; ?> में बस सुविधा :</h5>
		<hr/>
		<?php
		while($row2=mysqli_fetch_assoc($service_result)){
		?>
			<div class="allinone">
				<div class="all">
					<div class="left-side">
						<a href="editbus.php?eid=<?php echo $row2["id"];?>"><h4><?php  echo htmlspecialchars($row2["servname"], ENT_QUOTES, 'UTF-8');?> &nbsp~Edit</h4></a>
					</div>
					<div class="left-side-left"> 
						<a href="bus_ad.php?delid=<?php echo $row2["id"]; ?>"><p>Delete</p></a>
					</div>
				</div>
				<div class="l-side">
					<p> अंतिम बदलाव : <b><a href="../userprofile/showprofile.php?eid=<?php echo $row2["user_id"]; ?>"><?php echo htmlspecialchars($row2["username"], ENT_QUOTES, 'UTF-8');?></b></a> के द्वारा किया गया.</p>
					<p>
						<?php echo $row2["facilities"]; ?>
						<br/>
						<b><?php  echo $village;?></b> में बस आने का समय : <b><?php echo htmlspecialchars($row2["ontime"], ENT_QUOTES, 'UTF-8');?></b></p>
				</div>
			</div>
		<?php
		}
		?>
	</div>
	<br/>
	<hr/>
	<br/>
	<div class="container">
		<div class="module">
			<h5>अपने गांव से होकर जाने वाली बसों ( Buses ) को  जोड़ें</h5>
			<p>Note : कृपया फॉर्म English में भरें...</p>
			<hr/>
			<form class="form" action="bus_ad.php" method="post" enctype="multipart/form-data" autocomplete="off">
				<div class="form-group">
					<label for="uname">बस का नाम :</label>
					<input type="text" class="form-control" id="uname" placeholder="उदाहरण : jaishree, Lakshmi, Garib Nawaj" name="busname" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="uname">बस आने का समय :</label>
					<input type="text" class="form-control" id="uname" placeholder="उदाहरण : 7:45 AM, 3:25 PM" name="bustime" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="uname">आपके गांव से होकर बस कहा कहा जाती है :</label>
					<textarea class="form-control" id="uname" rows="3" name="gone">Kavardha , Raipur, Berla, Saja, Bemetara.</textarea required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<input type="hidden" class="form-control" id="uname" value="<?php echo $village; ?>" name="village" required>
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
	<br/>
	<br/>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>