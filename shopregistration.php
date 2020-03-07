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
$id4=$row["id"];
if(empty($user) || empty($password)){
       header("location: login.php");
         exit();
	}else{
     if($_SESSION["username"] == $row["username"])
	
	{
		echo "Welcome ! ";
	}else{
		header("location: login.php");
        exit();
	}
     if($password == $row["password"])
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

.footer-but{
	color:white;
	font-size:16px;
	text-align:center;
	background:rgba(0,0,0,0.05);
	border-radius:4px;
	border:1px solid orange;
}
.footer-but a{
	color:darkorange;
	margin:1px;
}
@media screen and (max-width:700px){
.footer-but{
	width:100px;
	font-size:12px;
	text-align:center;
	background:rgba(0,0,0,0.05);
	border-radius:3px;
	border:1px solid orange;
	color:white;
	
}
.footer-but a{
	color:darkorange;
	width:100px;
	margin:1px;
}
.col-sm-6 h2{
	font-size:18px;
	color:grey;
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
        <a class="nav-link" href="ourgoal.php">उद्देश्य</a>
      </li>
      <li class="nav-item" style="font-weight:800;">
        <a class="nav-link" href="aboutmorgaon.php">हमारे बारे में</a>
      </li>
      	  <li class="nav-item" style="font-weight:800;">
        <a class="nav-link" href="contactofmoregaon.php">संपर्क करेंं</a>
      </li>
      <li class="nav-item" style="font-weight:800;">
        <a class="nav-link" href="privacymorgaon.php">गोपनीयता सुविधा</a>
      </li>
      
    </ul>
  </div> 
</nav>

     </header>
<br>

<?php
$shopstatus = "on";

if(isset($_POST["submit"])) {
		$puranam = $mysqli->real_escape_string($_POST['puranam']);
		$shopname = $mysqli->real_escape_string($_POST['shopname']);
		$shopdetails = $mysqli->real_escape_string($_POST['shopdetails']);
		$village = $mysqli->real_escape_string($_POST['village']);
		$mob = $mysqli->real_escape_string($_POST['mob']);
		$category = $mysqli->real_escape_string($_POST['category']);
		$pata = $mysqli->real_escape_string($_POST['pata']);
		$dt2=date("Y-m-d H:i:s");
		
		 $file = $_FILES['avatar'];
         
         $fileName = $_FILES['avatar']['name'];
         $fileTmpName = $_FILES['avatar']['tmp_name'];
         $fileSize = $_FILES['avatar']['size'];
         $fileError = $_FILES['avatar']['error'];
         $fileType = $_FILES['avatar']['type'];
         
         $fileExt = explode('.', $fileName);
         $fileActualExt = strtolower(end($fileExt));
         
         $allowed = array('jpg', 'png', 'jpeg','gif');
         
         if(in_array($fileActualExt, $allowed)){
             if($fileError === 0){
                 if($fileSize < 3139683){
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = 'images/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $sql = "INSERT INTO khairjhitishop(uname,shopkipper,shopname,category,details,pata,gaon,mobile,shopstatus,date,user_id,image)"
				    . "VALUES('$user','$puranam','$shopname','$category','$shopdetails','$pata','$village','$mob','$shopstatus','$dt2','$id4','$fileDestination')";
				    mysqli_query($conn, $sql);
                    echo "<br><hr/>";

                    echo "<center>&#2360;&#2347;&#2354;&#2340;&#2366;&#2346;&#2370;&#2352;&#2381;&#2357;&#2325; &#2342;&#2352;&#2381;&#2332; &#2325;&#2367;&#2351;&#2366; &#2327;&#2351;&#2366;&#2404;</center>";
             	    echo "<br>";
                    echo "<center><a style='color:darkorange;font-size:17px;font-weight:800;margin-left:20px;' href='welcome.php'> << &#2346;&#2368;&#2331;&#2375; &#2332;&#2366;&#2319;...</a></center>";
                    echo "<br><hr/><br>";
				}else{
                    echo "<br><br>";
                    echo "<center>Too Big Image, Please Upload Image Under 3MB Size.";
                    echo "<br><br>";
                 }
             }else{
                 echo "<br><br>";
                 echo "<center>Sorry! Something Went Wrong.</center>";
                 echo "<br><br>";
             }
         }else{
             echo "<br><br>";
             echo "<center>Warning ! You can not upload of this type of file.</center>";
             echo "<br><br>";
         }
        }  
?>
<?php 
$query0 ="select * from villagedetails";
$result = mysqli_query($conn, $query0);
$rowcount0=mysqli_num_rows($result);
?>
<div class="d-flex justify-content-center">
<div class="container">
  <div class="module">
    <h3 style="color:orange">&#2309;&#2346;&#2344;&#2366; &#2342;&#2369;&#2325;&#2366;&#2344; / &#2360;&#2366;&#2352;&#2381;&#2357;&#2332;&#2344;&#2367;&#2325; &#2325;&#2381;&#2359;&#2375;&#2340;&#2381;&#2352; &#2352;&#2332;&#2367;&#2360;&#2381;&#2335;&#2352; &#2325;&#2352;&#2375;&#2306; :</h3>
	<p>Note : कृपया फॉर्म English में भरें...</p>
    <form class="form" method="POST" enctype="multipart/form-data" autocomplete="on">
     <form class="needs-validation" novalidate>
	<div class="form-group">
    <label for="username">आपका/मालिक का पूरा नाम :</label>
    <input type="text" class="form-control" id="username" name="puranam" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  
  <div class="form-group">
    <label for="uname">&#2342;&#2369;&#2325;&#2366;&#2344; / &#2360;&#2366;&#2352;&#2381;&#2357;&#2332;&#2344;&#2367;&#2325; &#2360;&#2381;&#2341;&#2366;&#2344; &#2325;&#2366; &#2346;&#2370;&#2352;&#2366; &#2344;&#2366;&#2350; :</label>
    <input type="text" class="form-control" id="uname" name="shopname" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  
  
  <div class="form-group">
    <label for="uname">दुकान का प्रकार :</label>
    <select class="custom-select" name="category" required>
    <option selected>किराना स्टोर</option>
	<option> जनरल स्टोर</option>
    <option> बुक स्टोर</option>
    <option> ज्वेलरी शॉप</option>
    <option> खिलौना शॉप</option>
    <option> गिफ्ट स्टोर्स</option>
    <option> साड़ी स्टोर्स</option>
    <option> कपड़ा दुकान</option>
    <option> सिलाई कढ़ाई स्टोर्स</option>
    <option> चॉइस सेंटर</option>
    <option> ई- सेंटर</option>
    <option> फोटोकॉपी</option>
    <option> फोटोग्राफी</option>
    <option> इलेक्ट्रॉनिक स्टोर्स</option>
    <option> अनाज दुकान</option>
    <option> हार्डवेयर शॉप</option>
    <option> सॉफ्टवेयर शॉप</option>
    <option> फल / सब्जी</option>
    <option> सायकल स्टोर्स</option>
    <option> हेयर सैलून</option>
    <option> उचित मूल्य की दुकान</option>
    <option> होटल/रेस्टोरेंट</option>
    <option> मोबाइल शॉप</option>
    <option> चप्पल दुकान</option>
    <option> मिठाई दुकान</option>
    <option> शो रूम्स</option>
    <option> मेडिकल स्टोर्स</option>
    <option> रेपरिंग शॉप</option>
    <option> उपहार एवम् सेवाएं</option>
    <option> अन्य</option>
    
  </select>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  
  
  
  <div class="form-group">
    <label for="uname">&#2342;&#2369;&#2325;&#2366;&#2344; / &#2360;&#2366;&#2352;&#2381;&#2357;&#2332;&#2344;&#2367;&#2325; &#2360;&#2381;&#2341;&#2366;&#2344; &#2325;&#2368; &#2326;&#2364;&#2366;&#2360; &#2348;&#2366;&#2340;&#2375;&#2306; :</label>
    <textarea rows="5" class="form-control" id="uname" name="shopdetails" required></textarea>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  
  <div class="form-group">
    <label for="uname">पता :</label>
    <textarea rows="5" class="form-control" id="uname" name="pata" required></textarea>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  
  <div class="form-group">
    <label for="uname">गांव:</label>
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
  <div class="form-group">
    <label for="mob">मोबाइल नंबर:</label>
    <input type="int" class="form-control" id="uname" name="mob" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
   <hr style="border:2px solid orange" />
	  <p>ध्यान रहे वैरीफिकेशन के लिए<br>
          हम आपको इसी नंबर पर मैसेज या कॉल करेंगे ।</p>
	  <hr style="border:2px solid orange" />
  <div class="form-group">
    <label for="file">&#2342;&#2369;&#2325;&#2366;&#2344; / &#2360;&#2366;&#2352;&#2381;&#2357;&#2332;&#2344;&#2367;&#2325; &#2360;&#2381;&#2341;&#2366;&#2344; &#2325;&#2366; &#2347;&#2379;&#2335;&#2379; &#2337;&#2366;&#2354;&#2375;&#2306;</label>
    <input type="file" class="form-control" id="file" name="avatar" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
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


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>