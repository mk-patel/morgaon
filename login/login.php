<?php
session_start();
if(empty($_SESSION['message_login'])){
	$msg= "Login";
}
else{
	$msg = $_SESSION['message_login'];
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
    <meta charset="UTF-8"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="header_component.html" rel="import" />
	<style>
	.navbar-toggler{
		background:#ffe6d4;
	}
	.navbar-brand img{
		width:40px;
		height:40px;
		border-radius:50%;
		border:2px solid white;
	}
	.nav-link{
		font-weight:700;
	}
	.login-message{
		font-size:20px;
		color:purple;
		font-weight:700;
	}
	.col-sm-6 h1{
		font-size:30px;
		color:darkorange;
		font-weight:700;
	}
	.col-sm-6 h2{
		font-size:20px;
		color:black;
		margin-bottom:30px;
	}
	.col-sm-6 p{
		font-size:20px;
		color:black;
		font-weight:700;
	}
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
	@media screen and (max-width:700px){
	.col-sm-6 h1{
		font-size:25px;
	}
	.col-sm-6 h2{
		font-size:15px;
	}
	.col-sm-6 p{
		font-size:15px;
		margin-bottom:50px;
	}
	}
	</style>
</head>
<body>
	<div id="strip-1">
	</div>
	<div id="strip-2">
	</div>
	<?php 
	
	//including header navbar.
	include '../about/header_component.php';
	?>
	<hr/>
    <div class="container">
		<div class="row">
			<div class="col-sm-6">
				<h1> मोर गांव </h1>
				<h2>हम टेक्नोलॉजी के माध्यम से सभी गांवो को एक दूसरे से जोड़ना चाह रहे हैं।</h2>
				<hr/>
				<p>
					नया यूजर, अपने आप को रजिस्टर करें <b>: </b>
					<br/>
					<br/>
					<a href="../userprofile/form.php"> 
						<button type="button" class="btn btn-warning">Register</button>
					</a> 
				</p>
			</div>
			<div class="col-sm-6">
				<div class="login-message">
					<?php
					echo $msg;
					session_destroy();
					?>
				</div>
				<hr/>
				<form action="../index.php" id="setupform" method="POST" autocomplete="on">
					<div class="form-group">
						<label for="uname"style="font-weight:700;">Username:</label>
						<input type="text" class="form-control" id="username" placeholder="Enter username" name="username" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"];}?>" required>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<div class="form-group">
						<label for="pwd" style="font-weight:700;">Password:</label>
						<input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"];}?>" required>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<div class="form-check-inline">
						<input type="checkbox" class="form-check-input" name="remember" <?php if(isset($_COOKIE["username"])) {?> checked <?php } ?>>
						<label class="form-check-label" for="remember-me">Remember me</label>
						<div class="valid-feedback">Valid.</div>
					</div>
					<br>
					<br>
					<button type="submit" name="submit" class="btn btn-primary">Login</button>
				</form>
				<div>
					<a href="../userprofile/forgetpass.php">क्या आप अपना पासवर्ड भूल गए!!!</a>
				</div>
				<br>		
			 </div>
		</div>
	</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
