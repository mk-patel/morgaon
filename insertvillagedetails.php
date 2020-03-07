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
       header("location: index.php");
         exit();
	}else{
if ($_SESSION["username"] == $row["username"])
	
	{
		echo "Welcome ! ";
	}else{
		header("location: index.php");
        exit();
	}
 if ($password == $row["password"])
 {
	 echo $row["username"];
    
 }else{
         header("location: index.php");
         exit();
 }
}	
?>
<html>

<head>
<title>Mor Gaon : MyEVillage</title>
    <meta charset="UTF-8">
    <meta name="description" content="Ham hamesh aapko gaon me hone wali sundar ghatnao aur parivartano se avgat karate rahenge, MorGaon">
    <meta name="keywords" content="mor gaon, myevillage, mor gaon ki jankari, khairjhiti kala, gaon, dukano ka vivran, dukan,evillage, mor gaon me suchna kaise dale ">
    <meta name="author" content="Manish Patel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>


*{
      padding:0px;
	  margin:0px;
}

.banner{
	
	height:auto;

	background-position:center;
	padding: 30px 0 100px;
	
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

.name_m{
	margin-left:10px;
	font-size:22px;
	font-weight:800;
	padding:0px;
}
.input_i{
	background:#F0FFFF;
	width:300px;
	height:50px;
}
.cont_t{
	margin-top:10px;
	background:#F0FFFF;
	width:300px;
	height:200px;
	margin-bottom:10px;
}
.sub_t{
	margin-top:20px;
	width:200px;
	height:40px;
	margin-left:80px;
	margin-bottom:10px;
	background:orange;
	color:white;
	font-weight:800;
}

.allinone{
  
}
.all{
      width:100%;
	  height:auto;
	  background:grey;
}
.left-side{
      float:left;
	  width:80%;
	  height:auto;
      background:rgb(0, 255, 255);
      border:1px solid lightblue;	  
}
.left-side h4 {
      margin:3px;
	  padding:0px;
	  font-weight:700;
	  color:rgb(153, 0, 51);
	  font-size:18px;
	  
}
.left-side p{
      margin-left:5px;
	  font-weight:700;
	  color:rgb(153, 0, 51);
	  font-size:12px;
	  
}

.left-side-left{
      float:right;
	  width:20%;
	  height:75px;
	  background:black;
      border:1px solid green;  	  
}
.left-side-left p{
      background:blue;
	  margin:10px;
	  text-align:center;
}
.left-side-left a p{
      text-decoration:none;
	  color:white;
	  width:80%;
	  
}
.right-side{
      float:left;
	  width:100%;
	  height:auto;
      background:grey;
      margin-top:5px;	  
}
.l-side{
      float:left;
	  width:100%;
	  height:auto;
	  background:rgba(0,0,0,0.06);
	  border-radius:5px;
	  border:1px solid red;
}
.l-side p{
      float:left;
	  width:100%;
	  height:auto;
	  margin-left:15px;
	  margin-right:10px;
	  margin-bottom:10px;
	  margin-top:10px;
	  
	  font-size:16px;
	  border-radius:4px;
	  font-weight:700;
}
.col-sm-6 h3{
	font-size:14px;
	color:orange;
	font-weight:700;
}
@media screen and (max-width:700px){
	
	
.col-sm-6 h1{
	font-size:25px;
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
      <li class="nav-item" style="font-weight:800;">
        <button type="button" class="btn btn-warning"><a style="color:white;font-weight:800;" href="logout.php">  Logout</a> </button></a>
      </li>
	  
	 
	</ul>
  </div>
</nav>

     </header>
<br>		
<?php

if(isset($_REQUEST["eid"]))
{   $eid=$_REQUEST["eid"];
    $user=$_SESSION["username"];
    $query1="select * from users where id='$eid'";
    $result=mysqli_query($conn,$query1);
    $row1=mysqli_fetch_assoc($result);
    $village1 = $row1["village"];
    $id = $row1["id"];
    $query="select * from villagedetails where village='$village1'";
    $result1=mysqli_query($conn,$query); 
}
	?>	
<?php 
while($row=mysqli_fetch_assoc($result1))
{
?>
<div class="d-flex justify-content-center">
<div class="container">
  <div class="module">
    <h5 style="color:orange">&#2309;&#2346;&#2344;&#2375; &#2327;&#2366;&#2306;&#2357; &#2325;&#2375; &#2348;&#2366;&#2352;&#2375; &#2350;&#2375;&#2306; &#2332;&#2366;&#2344;&#2325;&#2366;&#2352;&#2368; &#2309;&#2346;&#2337;&#2375;&#2335; &#2325;&#2352;&#2375;&#2306; :</h5>
	<hr style="border:2px solid orange" />
    <br>
    <p>Note : कृपया फॉर्म English में भरें...</p>
    <form class="form" action="updatevillagedetails.php" method="POST" enctype="multipart/form-data" autocomplete="off">
     <form class="needs-validation" novalidate>
     <div class="form-group">
    <label for="mob">&#2350;&#2380;&#2360;&#2350; : </label>
    <input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row['weather'], ENT_QUOTES, 'UTF-8');?>"  placeholder="&#2350;&#2380;&#2360;&#2350;" name="weather" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
	<div class="form-group">
    <label for="username">सरपंच :</label>
    <input type="text" class="form-control" id="username" value="<?php echo htmlspecialchars($row['sarpanch'], ENT_QUOTES, 'UTF-8'); ?>" placeholder="Pura Nam" name="sarpanch" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <div class="form-group">
    <label for="username">&#2313;&#2346;&#2360;&#2352;&#2346;&#2306;&#2330; :</label>
    <input type="text" class="form-control" id="username" value="<?php echo htmlspecialchars($row['upsarpanch'], ENT_QUOTES, 'UTF-8'); ?>" placeholder="Pura Nam" name="upsarpanch" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <div class="form-group">
    <label for="uname">सरपंच जी का मोबाइल नंबर :</label>
    <input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row['sarpanchmob'], ENT_QUOTES, 'UTF-8'); ?>"  placeholder="Mobile Number" name="sarpanchmob" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <div class="form-group">
    <label for="uname">कुल वार्ड संख्या :</label>
    <input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row['ward'], ENT_QUOTES, 'UTF-8'); ?>"  placeholder="Ward Sankhya" name="ward" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
   <div class="form-group">
    <label for="uname">मकानों की संख्या :</label>
    <input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row['houses'], ENT_QUOTES, 'UTF-8'); ?>"  placeholder="Makano ki Sankhya" name="houses" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  
  <div class="form-group">
    <label for="uname">कुल जनसंख्या :</label>
    <input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row['population'], ENT_QUOTES, 'UTF-8');?>"  placeholder="Jansankhya" name="population" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  
  <div class="form-group">
    <label for="uname">महिलाओं की संख्या :</label>
    <input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row['populationF'], ENT_QUOTES, 'UTF-8');?>"  placeholder="Mahila" name="populationF" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <div class="form-group">
    <label for="uname">पुरुषों की संख्या :</label>
    <input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row['populationM'], ENT_QUOTES, 'UTF-8');?>"  placeholder="Purush" name="populationM" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  
  <div class="form-group">
    <label for="uname">भू - जलस्तर :</label>
    <input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row['waterlevel'], ENT_QUOTES, 'UTF-8');?>"  placeholder="Water Lavel" name="waterlevel" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <div class="form-group">
    <label for="mob">तालाबों की संख्या :</label>
    <input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row['ponds'], ENT_QUOTES, 'UTF-8');?>"  placeholder="Talab" name="ponds" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <div class="form-group">
    <label for="mob">गांव में समस्याएं :</label>
    <textarea rows="10" class="form-control" id="uname" placeholder="Samasya Likhen" name="samasya" required> <?php echo htmlspecialchars($row["samasya"], ENT_QUOTES, 'UTF-8');?></textarea>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  
  
  
  
  
  <div class="form-group" style="margin-left:20px;">
    <label for="mob">&#2310;&#2346;&#2325;&#2375; &#2327;&#2366;&#2306;&#2357; &#2350;&#2375;&#2306; &#2325;&#2361;&#2366; &#2340;&#2325; &#2360;&#2381;&#2325;&#2370;&#2354; &#2351;&#2366; &#2325;&#2377;&#2354;&#2375;&#2332; &#2361;&#2376; -</label>
    <br>
    <input type="radio" class="form-check-input" name="school" value="none"
    <?php if($row["school"] == "none")
    echo "checked";
    ?>
    > &#2344;&#2361;&#2368;&#2306; &#2361;&#2376; <br>
    <input type="radio" class="form-check-input" name="school" value="5"
    <?php if($row["school"] == "5")
    echo "checked";
    ?>
    > 5&#2357;&#2368; &#2340;&#2325; &#2361;&#2376; <br>
    <input type="radio" class="form-check-input" name="school" value="8"
    <?php if($row["school"] == "8")
    echo "checked";
    ?>
    > 8&#2357;&#2368; &#2340;&#2325; &#2361;&#2376; <br>
    <input type="radio" class="form-check-input" name="school" value="10"
    <?php if($row["school"] == "10")
    echo "checked";
    ?>
    > 10&#2357;&#2368; &#2340;&#2325; &#2361;&#2376; <br>
    <input type="radio" class="form-check-input" name="school" value="12"
    <?php if($row["school"] == "12")
    echo "checked";
    ?>
    > 12&#2357;&#2368; &#2340;&#2325; &#2361;&#2376; <br>
    <input type="radio" class="form-check-input" name="school" value="College"
    <?php if($row["school"] == "college")
    echo "checked";
    ?>
    > Graduation &#2340;&#2325; &#2361;&#2376; <br>
    <input type="radio" class="form-check-input" name="school" value="Post Graduation"
    <?php if($row["school"] == "Post Graduation")
    echo "checked";
    ?>
    > Post Graduation &#2340;&#2325; &#2361;&#2376;<br>
    
    
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  
  <div class="form-group">
    <label for="mob">&#2342;&#2369;&#2325;&#2366;&#2344;&#2379;&#2306; &#2325;&#2368; &#2360;&#2306;&#2326;&#2381;&#2351;&#2366; : </label>
    <input type="text" class="form-control" id="uname" placeholder="Dukano Ki Sankhya" name="shop" value="<?php echo htmlspecialchars($row['shop'], ENT_QUOTES, 'UTF-8');?>" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <div class="form-group" style="margin-left:20px;">
    <label for="mob">&#2346;&#2381;&#2352;&#2366;&#2341;&#2350;&#2367;&#2325;/&#2313;&#2346;&#2360;&#2381;&#2357;&#2366;&#2360;&#2381;&#2341;&#2381;&#2351; &#2325;&#2375;&#2306;&#2342;&#2381;&#2352; &#2361;&#2376; -</label><br>
    <input type="radio" class="form-check-input" name="health" value="Yes"
    <?php
    if($row["health"] == "Yes")
    echo "checked";
    ?>
    > &#2361;&#2366;&#2306; &#2361;&#2376; <br><input type="radio" class="form-check-input" name="health" value="No"
    <?php
    if($row["health"] == "No")
    echo "checked";
    ?>
    > &#2344;&#2361;&#2368;&#2306; &#2361;&#2376;
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>

  <div class="form-group">
    <label for="mob">&#2332;&#2367;&#2354;&#2366; : </label>
    <input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row['jila'], ENT_QUOTES, 'UTF-8');?>"  placeholder="&#2332;&#2367;&#2354;&#2366;" name="jila" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div> 
  <div class="form-group">
    <label for="mob">&#2340;&#2361;&#2360;&#2368;&#2354; : </label>
    <input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row['tehsil'], ENT_QUOTES, 'UTF-8');?>"  placeholder="&#2340;&#2361;&#2360;&#2368;&#2354;" name="tehsil" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>  
  <div class="form-group">
    <label for="mob">&#2346;&#2369;&#2354;&#2367;&#2360; &#2360;&#2381;&#2335;&#2375;&#2358;&#2344; : </label>
    <input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row['polish'], ENT_QUOTES, 'UTF-8');?>"  placeholder="&#2346;&#2369;&#2354;&#2367;&#2360; &#2360;&#2381;&#2335;&#2375;&#2358;&#2344;" name="polish" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <div class="form-group">
    <label for="mob">&#2357;&#2367;&#2325;&#2366;&#2360; &#2326;&#2306;&#2337; : </label>
    <input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row['block'], ENT_QUOTES, 'UTF-8');?>"  placeholder="&#2357;&#2367;&#2325;&#2366;&#2360; &#2326;&#2306;&#2337;" name="block" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <div class="form-group">
    <label for="mob">&#2354;&#2379;&#2325;&#2360;&#2349;&#2366; &#2325;&#2381;&#2359;&#2375;&#2340;&#2381;&#2352; : </label>
    <input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row['loksabha'], ENT_QUOTES, 'UTF-8');?>"  placeholder="&#2354;&#2379;&#2325;&#2360;&#2349;&#2366; &#2325;&#2381;&#2359;&#2375;&#2340;&#2381;&#2352;" name="loksabha" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <div class="form-group">
    <label for="mob">&#2357;&#2367;&#2343;&#2366;&#2344;&#2360;&#2349;&#2366; &#2325;&#2381;&#2359;&#2375;&#2340;&#2381;&#2352; : </label>
    <input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row['vidhansabha'], ENT_QUOTES, 'UTF-8');?>"  placeholder="&#2357;&#2367;&#2343;&#2366;&#2344;&#2360;&#2349;&#2366; &#2325;&#2381;&#2359;&#2375;&#2340;&#2381;&#2352;" name="vidhansabha" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <div class="form-group">
    <label for="mob">&#2357;&#2367;&#2343;&#2366;&#2351;&#2325; : </label>
    <input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row['vidhayak'], ENT_QUOTES, 'UTF-8');?>"  placeholder="&#2357;&#2367;&#2343;&#2366;&#2351;&#2325;" name="vidhayak" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <div class="form-group">
    <label for="mob">&#2360;&#2366;&#2306;&#2360;&#2342; : </label>
    <input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row['sansad'], ENT_QUOTES, 'UTF-8');?>"  placeholder="&#2360;&#2366;&#2306;&#2360;&#2342;" name="sansad" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>  
  <div class="form-group">
    <label for="mob">डाकघर पिन कोड : </label>
    <input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row['pincode'], ENT_QUOTES, 'UTF-8');?>"  placeholder="डाकघर पिन कोड" name="pincode" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>  
  
  
  <div class="form-group">
    
    <input type="hidden" class="form-control" id="uname" value="<?php echo htmlspecialchars($row1['id'], ENT_QUOTES, 'UTF-8');?>"  placeholder="Enter Mobile Number" name="userid" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <div class="form-group">
    
    <input type="hidden" class="form-control" id="uname" value="<?php echo htmlspecialchars($row1['village'], ENT_QUOTES, 'UTF-8');?>"  placeholder="Enter Mobile Number" name="uservillage" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
 
 
  <div class="form-group form-check">
    <label class="form-check-label"> <a href="#">कृपया शर्तों को एक बार पढ़ ले ।</a> </label><br>
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

<?php
}
?>

<div>
</body>
<script>

     function addNewLines()
	 {
		
		 text = text.replace(/  /g, "[sp][sp]");
		 text = text.replace(/\n/g, "[nl]");
		 return false;
	 }

</script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>