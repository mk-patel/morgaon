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
	width:40px;
	height:45px;
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
  <a class="navbar-brand" href="#"><img src="morgaon.jpg" alt="Mor Gaon" title="Mor Gaon"/></a>

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
require 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$title = $mysqli->real_escape_string($_POST['name']);
	$content = $mysqli->real_escape_string($_POST['content']);
    $mobile = $mysqli->real_escape_string($_POST['mobile']);
	$dt2=date("Y-m-d H:i:s");
		
	$sql = "INSERT INTO registration(name,dob,mobile,date)"
                    . "VALUES('$title','$content','$mobile','$dt2')";	
	mysqli_query($conn,$sql);
    echo "<br>";
    echo "<center style='color:green;'>Thankyou For Your Feedback.</center>";	
    echo "<br>";
    echo "<br>";
}

?>
  <div class="container">
&#2309;&#2346;&#2344;&#2366; &#2360;&#2369;&#2333;&#2366;&#2357; / &#2358;&#2367;&#2325;&#2366;&#2351;&#2340; &#2361;&#2350;&#2375;&#2306; &#2349;&#2375;&#2332;&#2375;
<hr style="border:2px solid green">
  </div>

	 

<div class="d-flex justify-content-center">
<div class="container">
 <form class="form" action="feedback.php" method="post" enctype="multipart/form-data" autocomplete="off">

<div class="form-group">
<label for="text">Your Name :</label>
    <input type="text" class="form-control" id="username" placeholder="Your Name " name="name" required>
</div>
<div class="form-group">
<label for="comment">Feedback / Report :</label>
  <textarea class="form-control" rows="7" id="comment" name="content" required></textarea>
</div>

<div class="form-group">
<label for="text">Your Mobile Number :</label>
<input type="text" class="form-control" id="username" placeholder="Mobile Number " name="mobile" required>

</div>
  
<button type="submit" name="submit" class="btn btn-warning">Submit</button>

</form>
</div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>