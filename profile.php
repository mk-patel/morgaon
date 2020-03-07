<?php
session_start();
require 'db.php';
$user=$_SESSION["username"];
$password=$_SESSION["password"];
$query="select * from users where username='$user' and password='$password'";
$result = mysqli_query($conn, $query);
$row=mysqli_fetch_assoc($result);
$un = $row["username"];
$pass = $row["password"];
if(empty($user) || empty($password)){
       header("location: login.php");
         exit();
	}else{
if ($_SESSION["username"] == $row["username"])
	
	{
		echo "Welcome ! ";
	}else{
		header("location: login.php");
        exit();
	}
 if ($password == $row["password"])
 {
	 echo $row["username"];
    
 }else{
         header("location: login.php");
         exit();
 }
}	
?>
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


*{
      padding:0px;
	  margin:0px;
}
 
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
	color:grey;
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
.col-sm-6 h3{
	font-size:14px;
	color:orange;
	font-weight:700;
}
.col-sm-6 h4{
	font-size:17px;
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

<header class="header">
	 <nav class="navbar navbar-expand-md bg-primary navbar-light">
  <!-- Brand -->
  <a class="navbar-brand" href="#"><img src="images/home.png" alt="Mor Gaon" title="Mor Gaon"/></a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item" style="font-weight:1000;">
        <a class="nav-link" href="index.php"><b>&#2361;&#2379;&#2350;</b></a>
      </li>
      <li class="nav-item" style="font-weight:800;">
        <a class="nav-link" href="form.php">&#2352;&#2332;&#2367;&#2360;&#2381;&#2335;&#2352;</a>
      </li>
     
      <li class="nav-item" style="font-weight:800;">
        <a class="nav-link" href="ourgoal.html">&#2313;&#2342;&#2381;&#2342;&#2375;&#2358;&#2381;&#2351;</a>
      </li>
      <li class="nav-item" style="font-weight:800;">
        <a class="nav-link" href="aboutus.html">&#2361;&#2350;&#2366;&#2352;&#2375; &#2348;&#2366;&#2352;&#2375; &#2350;&#2375;&#2306;</a>
      </li>
      	  <li class="nav-item" style="font-weight:800;">
        <a class="nav-link" href="contactus.html">&#2360;&#2306;&#2346;&#2352;&#2381;&#2325; &#2325;&#2352;&#2375;&#2306;&#2306;</a>
      </li>
      <li class="nav-item" style="font-weight:800;">
        <a class="nav-link" href="privacypolicy.html">&#2327;&#2379;&#2346;&#2344;&#2368;&#2351;&#2340;&#2366; &#2360;&#2369;&#2357;&#2367;&#2343;&#2366;</a>
      </li>
    
	</ul>
  </div>
</nav>

     </header>
<br>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $about = $mysqli->real_escape_string($_POST['about']);
    $name = $mysqli->real_escape_string($_POST['name']);
	$username = $mysqli->real_escape_string($_POST['username']);
    $village = $mysqli->real_escape_string($_POST['village']);
	$dob = $mysqli->real_escape_string($_POST['dob']);
	$gender = $mysqli->real_escape_string($_POST['gender']);
	$email = $mysqli->real_escape_string($_POST['email']);
	$code = $mysqli->real_escape_string($_POST['code']);
	$eid = $mysqli->real_escape_string($_POST['id']);
	
	$sql = "UPDATE users SET name='$name' , username='$username',village = '$village', dob='$dob', gender='$gender' , email='$email' , code='$code',about='$about' where id='$eid'";
		mysqli_query($conn, $sql);
		header('location:welcome.php');
	}


?>




<?php
if(isset($_REQUEST["eid"]))
{
$eid=$_REQUEST["eid"];
}
$query="select * from users where id='$eid'";
$sql1 = mysqli_query($conn, $query);

?>

<?php
while($row = mysqli_fetch_assoc($sql1))
	
{
?>

<?php 
if(empty($row["code"] || $row["vcode"] || $row["email"]) || $row["code"] != $row["vcode"] ){
    echo "<div class='container' style='color:red;font-weight:700;'>Warning! <br>&#2310;&#2346;&#2325;&#2366; Account &#2348;&#2306;&#2342; &#2361;&#2379;&#2344;&#2375; &#2357;&#2366;&#2354;&#2366; &#2361;&#2376;,<br>
&#2325;&#2371;&#2346;&#2351;&#2366; &#2309;&#2346;&#2344;&#2366; &#2360;&#2361;&#2368; &#2350;&#2379;&#2348;&#2366;&#2311;&#2354; &#2344;&#2306;&#2348;&#2352; &#2342;&#2375;&#2306;,<br>
&#2344;&#2368;&#2330;&#2375; &#2342;&#2367;&#2319; &#2327;&#2319; Mobile Number &#2347;&#2368;&#2354;&#2381;&#2337; &#2350;&#2375;&#2306; &#2309;&#2346;&#2344;&#2366; &#2350;&#2379;&#2348;&#2366;&#2311;&#2354; &#2344;&#2306;&#2348;&#2352; &#2337;&#2366;&#2354;&#2375; &#2324;&#2352; &#2361;&#2350;&#2366;&#2352;&#2375; &#2342;&#2381;&#2357;&#2366;&#2352; verification code &#2349;&#2375;&#2332;&#2375; &#2332;&#2366;&#2344;&#2375; &#2340;&#2325; &#2346;&#2381;&#2352;&#2340;&#2368;&#2325;&#2381;&#2359;&#2366; &#2325;&#2352;&#2375;&#2306;, Code &#2325;&#2369;&#2331; &#2328;&#2306;&#2335;&#2379; &#2346;&#2358;&#2381;&#2330;&#2366;&#2340; &#2350;&#2367;&#2354; &#2332;&#2366;&#2319;&#2327;&#2366;,<br>
verification code  &#2350;&#2367;&#2354;&#2344;&#2375; &#2346;&#2352; &#2340;&#2369;&#2352;&#2306;&#2340; &#2313;&#2360;&#2375; Enter Verification Code &#2347;&#2368;&#2354;&#2381;&#2337; &#2350;&#2375;&#2306; &#2337;&#2366;&#2354;&#2375;, &#2343;&#2344;&#2381;&#2351;&#2357;&#2366;&#2342;&#2404;</div><br>";
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
}else{
    echo "<style>
.code{
	display:none;
}
</style>";
}
?>
<?php 
$query0 ="select * from villagedetails";
$result= mysqli_query($conn, $query0);
$rowcount0=mysqli_num_rows($result);

?>
  <div class="container">


<form class="form" action="picupload.php?eid=<?php echo $eid; ?>" method="POST" enctype="multipart/form-data" autocomplete="on">
<div class="container">
   <div class="row">
	  <div class="col-sm-6">

	    <div class="showimg"><img class="img-responsive img-thumbnail" src="<?php echo $row["avatar"];?>"></div>
		<div class="safe" style="text-align:center;color:blue;font-weight:700;"><img title="safe" alt="safe" src="safe.png" width="25px" height="25px"> </div>
		<div class="form-group">
        <label for="file" style="color:orange;font-weight:700;">Change Display Picture:</label>
        <input type="file" class="form-control" id="file" name="avatar">
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
       </div>
	   <input type="hidden" name="id" value="<?php echo $eid; ?>">
	   <button class="btn btn-primary" type="submit" name="submit">Upload</button>
</form>
<form class="form" action="profile.php" method="POST" enctype="multipart/form-data" autocomplete="on">
		<div class="form-group">
         <label style="color:orange;font-weight:700;"> अपने बारे में कुछ लिखें (200 Letters) :</label>
		 <textarea rows="4" class="form-control" name="about"><?php echo htmlspecialchars($row["about"], ENT_QUOTES, 'UTF-8');?></textarea>
		 <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
		</div>
        <div class="form-group">
         <label style="color:orange;font-weight:700;"> नाम बदलें :</label>
		 <input type="text" class="form-control" value="<?php echo htmlspecialchars($row["name"], ENT_QUOTES, 'UTF-8');?>" name="name" required>
		 <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
		</div>
		  
		<div class="form-group">
         <label style="color:orange;font-weight:700;"> Username बदलें :</label>
		 <input type="text" class="form-control" value="<?php echo htmlspecialchars($row["username"], ENT_QUOTES, 'UTF-8');?>" name="username" required>
		 <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
	    </div>
        <div class="form-group">
         <label style="color:orange;font-weight:700;"> अपना गांव बदलें :</label>
		 <select class="custom-select" name="village" required>
    <option selected><?php echo htmlspecialchars($row["village"], ENT_QUOTES, 'UTF-8');?> </option>
<?php
while($row0=mysqli_fetch_assoc($result))
{
?>
    <option value="<?php echo $row0["village"]; ?>"><?php echo $row0["village"]; ?></option>
    
<?php 
}
?>  
  </select>
		 <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
	    </div>
			<div class="form-group">
         <label style="color:orange;font-weight:700;"> जन्मतिथि बदलें :</label>
		 <input type="text" class="form-control" value="<?php echo htmlspecialchars($row["dob"], ENT_QUOTES, 'UTF-8'); ?>" name="dob">
		 <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
	</div>
	<div class="form-group">
         <label style="color:orange;font-weight:700;"> Change Gender :</label>
		 <input type="text" class="form-control" value="<?php echo htmlspecialchars($row["gender"], ENT_QUOTES, 'UTF-8'); ?>" name="gender">
		 <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
	</div>
		
	  </div>
	
<div class="col-sm-6" style="text-align:center">
<hr style="border:1px solid red"/>
        <div class="mob">
            <p style="color:red">** &#2325;&#2371;&#2346;&#2351;&#2366; &#2309;&#2346;&#2344;&#2366; &#2360;&#2361;&#2368; &#2350;&#2379;&#2348;&#2366;&#2311;&#2354; &#2344;&#2306;&#2348;&#2352; &#2342;&#2375;&#2306;,<br>
                               &#2309;&#2344;&#2381;&#2351;&#2341;&#2366; &#2310;&#2346;&#2325;&#2375; &#2354;&#2367;&#2319; &#2360;&#2369;&#2357;&#2367;&#2343;&#2366; &#2348;&#2306;&#2342; &#2325;&#2352; &#2342;&#2368; &#2332;&#2366;&#2319;&#2327;&#2368; &#2324;&#2352; &#2310;&#2346;&#2325;&#2366; Account &#2348;&#2306;&#2342; &#2325;&#2352; &#2342;&#2367;&#2351;&#2366; &#2332;&#2366;&#2319;&#2327;&#2366;&#2404;</p>
        </div>
         <div class="form-group">
         <label style="color:orange;font-weight:700;"> Mobile Number *</label>
		 <input type="text" class="form-control" value="<?php echo htmlspecialchars($row["email"], ENT_QUOTES, 'UTF-8');?>" name="email">
		 <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
	    </div>
		
		
<div class="code">
<p style="color:red">** &#2361;&#2350; &#2325;&#2369;&#2331; &#2360;&#2350;&#2351; &#2346;&#2358;&#2381;&#2330;&#2366;&#2340; &#2310;&#2346;&#2325;&#2379; &#2310;&#2346;&#2325;&#2375; &#2342;&#2381;&#2357;&#2366;&#2352;&#2366; &#2342;&#2367;&#2319; &#2327;&#2319; &#2344;&#2306;&#2348;&#2352; &#2346;&#2352; Verification Code &#2349;&#2375;&#2332;&#2375;&#2306;&#2327;&#2375; &#2332;&#2367;&#2360;&#2375; &#2344;&#2368;&#2330;&#2375; &#2342;&#2367;&#2319; &#2327;&#2319; &#2347;&#2368;&#2354;&#2381;&#2337; &#2350;&#2375;&#2306; &#2337;&#2366;&#2354;&#2375;&#2306;&#2404;</p>
</div>
         <div class="form-group">
         <label style="color:orange;font-weight:700;"> Enter Verification Code *</label>
		 <input type="text" class="form-control" value="<?php echo htmlspecialchars($row["code"], ENT_QUOTES, 'UTF-8');?>" name="code">
		 <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
	</div>
	<hr style="border:1px solid red"/>
	<br>
<input type="hidden" name="id" value="<?php echo $eid; ?>">
		<button class="btn btn-primary" type="submit" name="submit">Submit</button>
		  </form>
		  <div>
		
		</div>
		<br>
		
<form class="form" action="pass.php" method="POST" enctype="multipart/form-data" autocomplete="on">
		<div>
		<p style="color:green;font-size:16px;font-weight:700;">Change Password</p>
		<div class="form-group">
         <label style="color:orange;font-weight:700;">New Password :</label>
		 <input type="text" class="form-control" value="" name="pass" required>
		 <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
	    </div>
		<div class="form-group">
         <label style="color:orange;font-weight:700;">Re-Type New Password :</label>
		 <input type="text" class="form-control" value="" name="cpass" required>
		 <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
	    </div>
		<input type="hidden" name="id" value="<?php echo $eid; ?>">
		</div>
		<div>
		<button class="btn btn-primary" type="submit" name="submit2">Submit</button>
		</div>
		<br>
		
		</form>
        <br><br>
<div style="color:white;" bg-danger><button style="color:white;" class="btn btn-danger"><a style="color:white;"  href="delete.php?eid=<?php echo $eid; ?>">Permanently Delete My Account</a></button></div>
		
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