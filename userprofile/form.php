<?php

// This ("db.php") file contains Database Connection code.
require '../control/db.php';

// After clicking submit it will insert all data to user table.
if(isset($_POST['submit'])){
    $username = $mysqli->real_escape_string($_POST['username']);
    $username = trim($username);
    $name = $mysqli->real_escape_string($_POST['name']);
	$village = $mysqli->real_escape_string($_POST['village']);
	$password = $mysqli->real_escape_string($_POST['pass']);
	$cpassword = $mysqli->real_escape_string($_POST['cpass']);
	$pwd = md5($password);
    $pwd = sha1($pwd);
    $avatar= "images/default.jpg";
	
	// Setting up default timezone.
	date_default_timezone_set('Asia/Calcutta');
	$date=date("Y-m-d H:i a");
	
	// Checking for empty entries.
	if(empty($username) || empty($name) || empty($village) || empty($password) || empty($cpassword) ){
		echo "<br>";
        echo "<center style='color:red;font-weight:700;'>Warning! Empty FIELDS not VALID !!!</center>";
        echo "<br>";
	}
	else if($password != $cpassword){
		echo "<br>";
        echo "<center style='color:red;font-weight:700;'>Warning! Password Not Matching !!!</center>";
        echo "<br>";
	}
	else{
		$sql="SELECT id FROM user WHERE username='$username'";
		$result = mysqli_query($conn, $sql);
		$resultCheck=mysqli_num_rows($result);
		if($resultCheck > 0){
			echo "<br>";
			echo "<center style='color:red;font-weight:700;'>Username Already Taken, Please Enter Another Username</center>";
			echo "<br>";
		}
		else{
			$pwd = md5($password);
			$pwd = sha1($pwd);
			$insert_sql = "INSERT INTO user (username,password,user_name,user_village,user_image,date) VALUES ('$username', '$pwd', '$name', '$village',  '$avatar','$date')";
			mysqli_query($conn, $insert_sql);
			session_start();
			$_SESSION["username"] = $username;
			$_SESSION["password"] = $pwd;
			if(!empty($_POST["remember"])){
				setcookie ("username",$username,time()+(30 * 24 * 60 * 60));
				setcookie ("password",$password,time()+(30 * 24 * 60 * 60));
			}
			else{
				if(isset($_COOKIE["username"])){
					setcookie ("username","");
				}
				if(isset($_COOKIE["password"])){
					setcookie ("password","");
				}
			}
			header("Location: ../home/home.php");
		}
	}
}
$village_names_query ="select village from villagedetails";
$village_names_result= mysqli_query($conn, $village_names_query);
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
		.module h1{
			font-size:20px;
			font-weight:700;
		}
	</style>
</head>
<body>
	<?php include '../about/header_component.php';?>
	<br/>
	<div class="container">
		<div class="module">
			<h1>नया यूजर अपने आप को रजिस्टर करें, ताकि आप भी सूचना डाल सकें</h1>
			<p>Note : कृपया फॉर्म English में भरें...</p>
			<form class="form" action="form.php" method="post" enctype="multipart/form-data" autocomplete="off">
				<div class="form-group">
					<label for="username">पूरा नाम :</label>
					<input type="text" class="form-control" id="username" placeholder="Full Name" name="name" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="uname">यूजरनेम बनाए ( Create Username ):</label>
					<input type="text" class="form-control" id="uname" placeholder="&#2351;&#2370;&#2332;&#2352;&#2344;&#2375;&#2350; &#2348;&#2344;&#2366;&#2319; ( Create Username )" name="username" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="uname">पासवर्ड बनाए (Create Password ):</label>
					<input type="text" class="form-control" id="uname" placeholder="&#2346;&#2366;&#2360;&#2357;&#2352;&#2381;&#2337; &#2348;&#2344;&#2366;&#2319; (Create Password )" name="pass" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="uname">पासवर्ड पुनः लिखे ( Re - Type Password ):</label>
					<input type="text" class="form-control" id="uname" placeholder="&#2346;&#2366;&#2360;&#2357;&#2352;&#2381;&#2337; &#2346;&#2369;&#2344;&#2307; &#2354;&#2367;&#2326;&#2375; ( Re - Type Password )" name="cpass" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
  
				<div class="form-group">
					<label for="uname">गांव ( Village):</label>
					<select class="custom-select" name="village" required>
					<option selected>&#2309;&#2346;&#2344;&#2366; &#2327;&#2366;&#2306;&#2357; &#2330;&#2369;&#2344;&#2375;&#2306;</option>
					<?php
					while($village_names_row=mysqli_fetch_assoc($village_names_result)){
					?>
						<option value="<?php echo $village_names_row["village"]; ?>"><?php echo $village_names_row["village"]; ?></option>	
					<?php 
					}
					?>  
					</select>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<hr/>
				<div>
					<p>क्या आपका गांव इस सूची में नहीं है...
						<br/>
						तो अभी रजिस्टर करें<b>: </b>
						<br/>
						<a href="../villagedetails/registervillage.php"><button type="button" class="btn btn-warning" style="color:white;font-weight:800;" >&#2309;&#2346;&#2344;&#2366; &#2327;&#2366;&#2306;&#2357; &#2352;&#2332;&#2367;&#2360;&#2381;&#2335;&#2352; &#2325;&#2352;&#2375;&#2306;</button></a></p>
				</div>
				<hr/>
				<div class="form-group form-check">
					<label class="form-check-label"> <a href="terms.html">कृपया नियम एवं शर्तों को एक बार पढ़ ले ।</a> </label><br>
					<input class="form-check-input" type="checkbox" name="remember" required>मै सहमत हूं |
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Check this checkbox to continue.</div>
					</label>
				</div>
				<button type="submit" name="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
	<br/>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>