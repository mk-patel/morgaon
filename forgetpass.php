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
	color:grey;
}


.module h1{
	font-size:20px;
	font-weight:700;
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
	
}

</style>


</head>
<body>

<header class="header">
	 <nav class="navbar navbar-expand-md bg-primary navbar-light">
  <!-- Brand -->
  <a class="navbar-brand" href="index.php"><img src="images/home.png" alt="home" title="home"/></a>
  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item" style="font-weight:1000;">
        <a class="nav-link" href="index.php"><b>होम</b></a>
      </li>
      <li class="nav-item" style="font-weight:800;">
        <a class="nav-link" href="form.php">रजिस्टर</a>
      </li>
     
      <li class="nav-item" style="font-weight:800;">
        <a class="nav-link" href="ourgoal.html">उद्देश्य</a>
      </li>
      <li class="nav-item" style="font-weight:800;">
        <a class="nav-link" href="aboutus.html">हमारे बारे में</a>
      </li>
      	  <li class="nav-item" style="font-weight:800;">
        <a class="nav-link" href="contactus.html">संपर्क करेंं</a>
      </li>
      <li class="nav-item" style="font-weight:800;">
        <a class="nav-link" href="privacypolicy.html">गोपनीयता सुविधा</a>
      </li>
      
    </ul>
  </div> 
</nav>

     </header>
<br>

  <div class="container">
     <div class="row">
	    <div class="col-sm-6">
	        <h1 style="font-weight:800;">मोर गांव</h1>
			<h3>गांव हो तो कैसा, <i style="font-size:17px;">मोर गांव </i>&nbsp; जैसा |</h3>
	        <h2>हम हमेशा आपको गांव में होने वाली <br>
			शुभ कार्यक्रमों, सुंदर घटनाओं, गांव की स्थिति और <br>
			गांव में हाल ही में होने वाले परिवर्तनों और <br>
			सुविधाओं से अवगत कराएंगे, धन्यवाद।
			</h2>
	     </div>
		 <div class="col-sm-6">
	      
	     </div>
	 </div>
  </div>
<?php
require 'db.php';
if (isset($_POST['submit'])) {
	$mob = $mysqli->real_escape_string($_POST['mob']);
	$username = $mysqli->real_escape_string($_POST['username']);
	$sql = "select * from users where username='$username'";
	$result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $resultCheck = mysqli_num_rows($result);
	if($mob == $row["email"]){
		$username = $mysqli->real_escape_string($_POST['username']);
		$village = $mysqli->real_escape_string($_POST['village']);
		$mob = $mysqli->real_escape_string($_POST['mob']);
		date_default_timezone_set('Asia/Calcutta');
		$dt2=date("Y-m-d H:i:s a");
		$sql1 = "INSERT INTO registervillage(name,dob,village,mobile,date)"
    	. "VALUES('$name','$username','$village','$mob','$dt2')";
	    $result1 = mysqli_query($conn, $sql1);
        echo "<br>";
        echo "<center  style='color:green;font-weight:700;'>Successfull, आपका पासवर्ड समय 6:00 PM तक भेज दिया जाएगा।</center>";
        echo "<br>";

}else{
	echo "<br>";
    echo "<center style='color:red;font-weight:700;'>Not Mached ! Please Write Your Registered Mobile Nomber As You Had Entered In Your Profile.</center>";
    echo "<br>";
}
}
?>
<!--Yaha Gaon KA Nam Dale-->
<?php 
$query0 ="select * from villagedetails";
$result2= mysqli_query($conn, $query0);
$rowcount0=mysqli_num_rows($result2);

?>

<hr style="border:2px solid orange" />
<br>

<div class="d-flex justify-content-center">
<div class="container">
  <div class="module">
    <h1>क्या आप अपना पासवर्ड भूल गए!!!<br>
अपना पासवर्ड जानने के लिए अपनी जानकारी दें।</h1>
	
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
while($row0=mysqli_fetch_assoc($result2))
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
 
   <hr style="border:2px solid orange" />
	  <p>आपका पासवर्ड आपके रजिस्टर्ड मोबाइल नंबर में भेजा जाएगा...<br>कृपया धोखा - धड़ी से बचे ।
	  </p>
	  <hr style="border:2px solid orange" />
  
  <div class="form-group form-check">
    <label class="form-check-label"> <a href="terms.html">कृपया नियम एवं शर्तों को एक बार पढ़ ले ।</a> </label><br>
      <input class="form-check-input" type="checkbox" name="remember" required> मै सहमत हूं |
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Check this checkbox to continue.</div>
    </label>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>
 
</div>
</div>





<br>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>