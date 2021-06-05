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
		.dropdown{
			margin-top:20px;
			margin-left:20px;
		}
		.navbar-brand img{
			width:50px;
			height:40px;
		}
		.module h1{
			font-size:20px;
			font-weight:700;
		}
		@media screen and (max-width:700px){
		.module h1{
			font-size:20px;
		}
		}
	</style>
</head>
<body>
	<?php 
	//including header navbar.
	include '../about/header_component.php';?>
	?>
	<br/>
	<div class="container">
		<div class="module">
			<h1>क्या आप अपना पासवर्ड भूल गए!!!<br>
				अपना पासवर्ड जानने के लिए अपनी जानकारी दें।
			</h1>
			<hr/>
			<?php
			require 'db.php';
			if(isset($_POST['submit'])){
				$username = $mysqli->real_escape_string($_POST['username']);
				$mobile_no = $mysqli->real_escape_string($_POST['mob']);
				$village = $mysqli->real_escape_string($_POST['village']);
				$user_query = "select user_email,user_name from user where username='$username'";
				$user_result = mysqli_query($conn, $user_query);
				$user_row = mysqli_fetch_assoc($user_result);
				if($mobile_no == $user_row["user_email"]){
					$name = $user_row["user_name"];
					date_default_timezone_set('Asia/Calcutta');
					$date=date("Y-m-d H:i:s a");
					$insert_query = "INSERT INTO forget_password(name,username,village,mobile,date)"
					. "VALUES('$name','$username','$village','$mobile_no','$date')";
					mysqli_query($conn, $insert_query);
					echo "<br>";
					echo "<center  style='color:green;font-weight:700;'>Successfull, आपका पासवर्ड समय 6:00 PM तक भेज दिया जाएगा।</center>";
					echo "<br>";
				}
				else{
					echo "<br>";
					echo "<center style='color:red;font-weight:700;'> Mobile Number Not Matched ! Please Write Your Registered Mobile Nomber As You Had Entered In Your Profile.</center>";
					echo "<br>";
				}
			}
			$village_names_query ="select village from villagedetails";
			$village_names_result= mysqli_query($conn, $village_names_query);
			?>
			<br/>
			<form class="form" action="forgetpass.php" method="post" enctype="multipart/form-data" autocomplete="off">
				<div class="form-group">
					<label for="username">पूरा नाम :</label>
					<input type="text" class="form-control" id="username" placeholder="Full Name" name="name" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="uname">यूजरनेम (Enter Username ):</label>
					<input type="text" class="form-control" id="uname" placeholder="यूजरनेम ( Username )" name="username" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="uname">अपना रजिस्टर्ड मोबाइल नंबर डालें:</label>
					<input type="text" class="form-control" id="uname" placeholder="Registered Mobile No." name="mob" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="uname">गांव :</label>
					<select class="custom-select" name="village" required>
						<option selected>अपना गांव चुनें</option>
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
				<p>आपका पासवर्ड आपके रजिस्टर्ड मोबाइल नंबर में भेजा जाएगा...<br>कृपया धोखा - धड़ी से बचे ।</p>
				<hr/>

				<div class="form-group form-check">
					<label class="form-check-label"> <a href="../about/terms.html">कृपया नियम एवं शर्तों को एक बार पढ़ ले ।</a> </label><br>
					<input class="form-check-input" type="checkbox" name="remember" required> मै सहमत हूं |
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Check this checkbox to continue.</div>
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