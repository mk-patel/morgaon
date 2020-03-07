<?php
require 'db.php';
if (isset($_POST['submit'])) {
    $username = $mysqli->real_escape_string($_POST['username']);
    $username = trim($username);
    $name = $mysqli->real_escape_string($_POST['name']);
	$village = $mysqli->real_escape_string($_POST['village']);
	$password = $mysqli->real_escape_string($_POST['pass']);
	$cpassword = $mysqli->real_escape_string($_POST['cpass']);
    $avatar= "images/default.jpg";
	date_default_timezone_set('Asia/Calcutta');
	$dt3=date("Y-m-d H:i a");
	if(empty($username) || empty($name) || empty($village) || empty($password) || empty($cpassword) ){
		echo "<br>";
        echo "<center style='color:red;font-weight:700;'>Warning! Empty FIELDS not VALID !!!</center>";
        echo "<br>";
	}
	else if($password !== $cpassword){
		echo "<br>";
        echo "<center style='color:red;font-weight:700;'>Warning! Password Not Matching !!!</center>";
        echo "<br>";
	}
	else{
		$sql="SELECT * FROM users WHERE username='$username'";
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
				$sql1 = "INSERT INTO users (username,village,password,avatar,name,dt3) VALUES ('$username', '$village', '$pwd', '$avatar','$name','$dt3')";
                $result1 = mysqli_query($conn, $sql1);
				session_start();
					$_SESSION["username"] = $username;
					$_SESSION["password"] = $pwd;
					if(!empty($_POST["remember"])){
		                setcookie ("username",$username,time()+(10 * 365 * 24 * 60 * 60));
		                setcookie ("password",$password,time()+(10 * 365 * 24 * 60 * 60));
	                }
					else{
		                if(isset($_COOKIE["username"])){
			                setcookie ("username","");
						}
		                if(isset($_COOKIE["password"])){
			                setcookie ("password","");
		                }
	                }
					header("Location: home.php");
		    }
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

  <div class="container">
     <div class="row">
	    <div class="col-sm-6">
	        <h1 style="font-weight:800;">&#2350;&#2379;&#2352; &#2327;&#2366;&#2306;&#2357;</h1>
			<h3>&#2327;&#2366;&#2306;&#2357; &#2361;&#2379; &#2340;&#2379; &#2325;&#2376;&#2360;&#2366;, <i style="font-size:17px;">&#2350;&#2379;&#2352; &#2327;&#2366;&#2306;&#2357; </i>&nbsp; &#2332;&#2376;&#2360;&#2366; |</h3>
	        <h2>&#2361;&#2350; &#2361;&#2350;&#2375;&#2358;&#2366; &#2310;&#2346;&#2325;&#2379; &#2327;&#2366;&#2306;&#2357; &#2350;&#2375;&#2306; &#2361;&#2379;&#2344;&#2375; &#2357;&#2366;&#2354;&#2368; <br>
			&#2358;&#2369;&#2349; &#2325;&#2366;&#2352;&#2381;&#2351;&#2325;&#2381;&#2352;&#2350;&#2379;&#2306;, &#2360;&#2369;&#2306;&#2342;&#2352; &#2328;&#2335;&#2344;&#2366;&#2323;&#2306;, &#2327;&#2366;&#2306;&#2357; &#2325;&#2368; &#2360;&#2381;&#2341;&#2367;&#2340;&#2367; &#2324;&#2352; <br>
			&#2327;&#2366;&#2306;&#2357; &#2350;&#2375;&#2306; &#2361;&#2366;&#2354; &#2361;&#2368; &#2350;&#2375;&#2306; &#2361;&#2379;&#2344;&#2375; &#2357;&#2366;&#2354;&#2375; &#2346;&#2352;&#2367;&#2357;&#2352;&#2381;&#2340;&#2344;&#2379;&#2306; &#2324;&#2352; <br>
			&#2360;&#2369;&#2357;&#2367;&#2343;&#2366;&#2323;&#2306; &#2360;&#2375; &#2309;&#2357;&#2327;&#2340; &#2325;&#2352;&#2366;&#2319;&#2306;&#2327;&#2375;, &#2343;&#2344;&#2381;&#2351;&#2357;&#2366;&#2342;&#2404;
			</h2>
	     </div>
		 <div class="col-sm-6">
	      
	     </div>
	 </div>
  </div>

<!--Yaha Gaon KA Nam Dale-->
<?php
$query0 ="select * from villagedetails";
$result= mysqli_query($conn, $query0);
$rowcount0=mysqli_num_rows($result);

?>

<hr style="border:2px solid orange" />
<br>

<div class="d-flex justify-content-center">
<div class="container">
  <div class="module">
    <h1>&#2344;&#2351;&#2366; &#2351;&#2370;&#2332;&#2352; &#2309;&#2346;&#2344;&#2375; &#2310;&#2346; &#2325;&#2379; &#2352;&#2332;&#2367;&#2360;&#2381;&#2335;&#2352; &#2325;&#2352;&#2375;&#2306;, &#2340;&#2366;&#2325;&#2367; &#2310;&#2346; &#2349;&#2368; &#2360;&#2370;&#2330;&#2344;&#2366; &#2337;&#2366;&#2354; &#2360;&#2325;&#2375;&#2306;</h1>
	<p>Note : &#2325;&#2371;&#2346;&#2351;&#2366; &#2347;&#2377;&#2352;&#2381;&#2350; English &#2350;&#2375;&#2306; &#2349;&#2352;&#2375;&#2306;...</p>
    <form class="form" action="form.php" method="post" enctype="multipart/form-data" autocomplete="off">
	 <div class="form-group">
    <label for="username">&#2346;&#2370;&#2352;&#2366; &#2344;&#2366;&#2350; :</label>
    <input type="text" class="form-control" id="username" placeholder="Full Name" name="name" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <div class="form-group">
    <label for="uname">&#2351;&#2370;&#2332;&#2352;&#2344;&#2375;&#2350; &#2348;&#2344;&#2366;&#2319; ( Create Username ):</label>
    <input type="text" class="form-control" id="uname" placeholder="&#2351;&#2370;&#2332;&#2352;&#2344;&#2375;&#2350; &#2348;&#2344;&#2366;&#2319; ( Create Username )" name="username" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  
  <div class="form-group">
    <label for="uname">&#2346;&#2366;&#2360;&#2357;&#2352;&#2381;&#2337; &#2348;&#2344;&#2366;&#2319; (Create Password ):</label>
    <input type="text" class="form-control" id="uname" placeholder="&#2346;&#2366;&#2360;&#2357;&#2352;&#2381;&#2337; &#2348;&#2344;&#2366;&#2319; (Create Password )" name="pass" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  
  <div class="form-group">
    <label for="uname">&#2346;&#2366;&#2360;&#2357;&#2352;&#2381;&#2337; &#2346;&#2369;&#2344;&#2307; &#2354;&#2367;&#2326;&#2375; ( Re - Type Password ):</label>
    <input type="text" class="form-control" id="uname" placeholder="&#2346;&#2366;&#2360;&#2357;&#2352;&#2381;&#2337; &#2346;&#2369;&#2344;&#2307; &#2354;&#2367;&#2326;&#2375; ( Re - Type Password )" name="cpass" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  
  <div class="form-group">
    <label for="uname">&#2327;&#2366;&#2306;&#2357; :</label>
    <select class="custom-select" name="village" required>
    <option selected>&#2309;&#2346;&#2344;&#2366; &#2327;&#2366;&#2306;&#2357; &#2330;&#2369;&#2344;&#2375;&#2306;</option>
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
  <hr style="border:2px solid orange" />
  <div><p>&#2325;&#2381;&#2351;&#2366; &#2310;&#2346;&#2325;&#2366; &#2327;&#2366;&#2306;&#2357; &#2311;&#2360; &#2360;&#2370;&#2330;&#2368; &#2350;&#2375;&#2306; &#2344;&#2361;&#2368;&#2306; &#2361;&#2376;...<br>
                  &#2340;&#2379; &#2309;&#2349;&#2368; &#2352;&#2332;&#2367;&#2360;&#2381;&#2335;&#2352; &#2325;&#2352;&#2375;&#2306;<b>: </b>&nbsp; &nbsp; &nbsp; &nbsp; <a href="registervillage.php"><button type="button" class="btn btn-warning" style="color:white;font-weight:800;" >&#2309;&#2346;&#2344;&#2366; &#2327;&#2366;&#2306;&#2357; &#2352;&#2332;&#2367;&#2360;&#2381;&#2335;&#2352; &#2325;&#2352;&#2375;&#2306;</button></p></div></a>  <hr style="border:2px solid orange" />


   
  
  <div class="form-group form-check">
    <label class="form-check-label"> <a href="terms.html">&#2325;&#2371;&#2346;&#2351;&#2366; &#2344;&#2367;&#2351;&#2350; &#2319;&#2357;&#2306; &#2358;&#2352;&#2381;&#2340;&#2379;&#2306; &#2325;&#2379; &#2319;&#2325; &#2348;&#2366;&#2352; &#2346;&#2338;&#2364; &#2354;&#2375; &#2404;</a> </label><br>
      <input class="form-check-input" type="checkbox" name="remember" required> &#2350;&#2376; &#2360;&#2361;&#2350;&#2340; &#2361;&#2370;&#2306; |
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
<br>

<br>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>