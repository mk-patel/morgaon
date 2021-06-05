<?php

/**
* This page provide interface for uploading user profile picture. 
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
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
	.navbar-brand img{
		width:50px;
		height:40px;
	}
	.showimg {
		width:100%;
		height:auto;
		background:white;
		text-align:center;
	}
	.showimg img {
		
		width:160px;
		height:165px;
		text-align:center;
		border-radius:50%;
	}
	.safe{
		text-align:center;
		color:blue;
		font-weight:700;
	}
	label{
		color:orange;
		font-weight:700;
	}
	.pass-p{
		color:green;
		font-size:16px;
		font-weight:700;
	}
	@media screen and (max-width:700px){
		.showimg {
			width:100%;
			height:auto;
			background:white;
			text-align:center;
		}
		.showimg img {
			width:160px;
			height:165px;
			background:white;
			text-align:center;
			border-radius:50%;
		}
		.col-sm-6 h4{
			font-size:17px;
			color:orange;
			font-weight:700;
		}
		showimg .safe{
			width:40px;
		}
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
	if (isset($_POST['submit'])){
		$about = $mysqli->real_escape_string($_POST['about']);
		$name = $mysqli->real_escape_string($_POST['name']);
		$username = $mysqli->real_escape_string($_POST['username']);
		$dob = $mysqli->real_escape_string($_POST['dob']);
		$gender = $mysqli->real_escape_string($_POST['gender']);
		$email = $mysqli->real_escape_string($_POST['email']);
		$code = $mysqli->real_escape_string($_POST['code']);
		$sql = "UPDATE user SET user_name='$name' , username='$username', user_dob='$dob', user_gender='$gender' , user_email='$email' , code='$code', user_about='$about' where user_id='$mid'";
		mysqli_query($conn, $sql);
		header('location:welcome.php');
	}
	
	$query="select username,user_name,user_email,user_gender,user_village,user_about,user_image,user_dob,vcode,code from user where user_id='$mid'";
	$sql1 = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($sql1)){
		if(empty($row["code"] || $row["vcode"] || $row["user_email"]) || $row["code"] != $row["vcode"] ){
			echo "<div class='container' style='color:red;font-weight:700;'>Warning! <br>आपका Account बंद होने वाला है,<br>
				कृपया अपना सही मोबाइल नंबर दें,<br>
				नीचे दिए गए Mobile Number फील्ड में अपना मोबाइल नंबर डाले और हमारे द्वार verification code भेजे जाने तक प्रतीक्षा करें, Code कुछ घंटो पश्चात मिल जाएगा,<br>
				verification code मिलने पर तुरंत उसे Enter Verification Code फील्ड में डाले, धन्यवाद।</div><br>";
			echo "<style>
				.safe{
					display:none;
				}
				</style>";
		}
		if(!empty($row["email"])){
			echo "<style>
				.mob{
					display:none;
				}
				</style>";
		}
		if(empty($row["code"] || $row["vcode"]) || $row["code"] != $row["vcode"] ){
			echo "<style>
				.code{
					display:block;
				}
				</style>";
		}
		else{
			echo "<style>
				.code{
					display:none;
				}
				</style>";
		}
	?>
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<form class="form" action="picupload.php" method="POST" enctype="multipart/form-data" autocomplete="on">
					<div class="showimg"><img class="img-responsive img-thumbnail" src="../<?php echo $row["user_image"];?>"></div>
					<div class="safe"><img title="safe" alt="safe" src="safe.png" width="25px" height="25px"> </div>
					<div class="form-group">
						<label for="file">Change Display Picture:</label>
						<input type="file" class="form-control" id="file" name="user_image">
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<button class="btn btn-primary" type="submit" name="submit">Upload</button>
				</form>
				<form class="form" action="profile.php" method="POST" enctype="multipart/form-data" autocomplete="on">
					<div class="form-group">
						<label> अपने बारे में कुछ लिखें (200 Letters) :</label>
						<textarea rows="4" class="form-control" name="about"><?php echo htmlspecialchars($row["user_about"], ENT_QUOTES, 'UTF-8');?></textarea>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<div class="form-group">
						<label> नाम बदलें :</label>
						<input type="text" class="form-control" value="<?php echo htmlspecialchars($row["user_name"], ENT_QUOTES, 'UTF-8');?>" name="name" required>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<div class="form-group">
						<label> Username बदलें :</label>
						<input type="text" class="form-control" value="<?php echo htmlspecialchars($row["username"], ENT_QUOTES, 'UTF-8');?>" name="username" required>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<div class="form-group">
						<label> जन्मतिथि बदलें :</label>
						<input type="text" class="form-control" value="<?php echo htmlspecialchars($row["user_dob"], ENT_QUOTES, 'UTF-8'); ?>" name="dob">
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<div class="form-group">
						<label> Change Gender :</label>
						<input type="text" class="form-control" value="<?php echo htmlspecialchars($row["user_gender"], ENT_QUOTES, 'UTF-8'); ?>" name="gender">
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
				</div>
				<div class="col-sm-6" style="text-align:center">
					<hr/>
					<div class="mob">
						<p>** कृपया अपना सही मोबाइल नंबर दें,<br>
							अन्यथा आपके लिए सुविधा बंद कर दी जाएगी और आपका Account बंद कर दिया जाएगा।
                        </p>
					</div>
					<div class="form-group">
						<label> Mobile Number *</label>
						<input type="text" class="form-control" value="<?php echo htmlspecialchars($row["user_email"], ENT_QUOTES, 'UTF-8');?>" name="email">
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>	
					<div class="code">
						<p>** हम कुछ समय पश्चात आपको आपके द्वारा दिए गए नंबर पर Verification Code भेजेंगे जिसे नीचे दिए गए फील्ड में डालें।</p>
					</div>
					<div class="form-group">
						<label> Enter Verification Code *</label>
						<input type="text" class="form-control" value="<?php echo htmlspecialchars($row["code"], ENT_QUOTES, 'UTF-8');?>" name="code">
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<hr/>
					<br/>
					<button class="btn btn-primary" type="submit" name="submit">Submit</button>
				</form>
				<br/>	
				<form class="form" action="update_password.php" method="POST" enctype="multipart/form-data" autocomplete="on">
					<div>
						<br/>
						<p class="pass-p">Change Password</p>
						<div class="form-group">
							<label>New Password :</label>
							<input type="text" class="form-control" value="" name="pass" required>
							<div class="valid-feedback">Valid.</div>
							<div class="invalid-feedback">Please fill out this field.</div>
						</div>
						<div class="form-group">
							<label>Re-Type New Password :</label>
							<input type="text" class="form-control" value="" name="cpass" required>
							<div class="valid-feedback">Valid.</div>
							<div class="invalid-feedback">Please fill out this field.</div>
						</div>
					</div>
					<div>
						<button class="btn btn-primary" type="submit" name="submit2">Submit</button>
					</div>
					<br/>
				</form>
				<br/><br/>
				<div><a href="delete.php?mid=<?php echo $mid; ?>"><button class="btn btn-danger">Permanently Delete My Account</button></a></div>
			</div>
		</div>
		<hr/>
	</div>
		
<?php	
}
?>
</div>
<br>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>