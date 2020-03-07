<html>
<head>
    <title>Mor Gaon : MyEVillage</title>
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
	width:60px;
	height:40px;
}
.col-sm-6 h1{
	font-size:30px;
	color:darkorange;
}
.col-sm-6 h2{
	font-size:21px;
}

.col-sm-6 img{
	width:350px;
	height:250px;
}
.col-sm-6 h3{
	font-size:14px;
	color:orange;
	font-weight:700;
}
@media screen and (max-width:700px){
	
	
.col-sm-6 h1{
	font-size:24px;
	color:darkorange;
}
.col-sm-6 h2{
	font-size:16px;
	color:grey;
}
.col-sm-6 h3{
	font-size:14px;
	color:orange;
	font-weight:700;
}
.col-sm-6 p{
	font-size:16px;
	color:black;
}
}
</style>
</head>
<body>
<br>
     <div class="container">
     <div class="row">
	    <div class="col-sm-6">
	        <h1 style="font-weight:800;color:orange"> मोर गांव </h1>
			<h3>गांव हो तो कैसा, <i style="font-size:17px;">मोर गांव </i> जैसा</h3>
	        <h2>हम हमेशा आपको गांव में होने वाली <br>
			शुभ कार्यक्रमों, सुंदर घटनाओं, गांव की स्थिति और <br>
			गांव में हाल ही में होने वाले परिवर्तनों और <br>
			सुविधाओं से अवगत कराएंगे, धन्यवाद ।
			</h2>
			
	     </div>
		 <div class="col-sm-6">
	      
			
			<p style="font-weight:700;margin-left:10px;">Welcome Admin ! Login First</p>
	     </div>
	 </div>
  </div>
	 
	 
<div class="container">
<form action="process.php" method="POST">
  <div class="form-group">
    <label for="uname">Username:</label>
    <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"];}?>" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"];}?>" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
   <div class="form-check-inline">
    <input type="checkbox" class="form-check-input" name="remember" <?php if(isset($_COOKIE["username"])) {?> checked <?php } ?>>
	<label class="form-check-label" for="remember-me" style="font-weight:700;">Remember Me</label>
    <div class="valid-feedback">Valid.</div>
  </div>

  <button type="submit" name="submit" class="btn btn-primary">Login</button>
</form>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>