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
$n = $row["name"];
$id = $row["id"];
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

<?php
require 'db.php';
if (isset($_POST['submit'])) {
	$category = $mysqli->real_escape_string($_POST['category']);
    $tutionname = $mysqli->real_escape_string($_POST['tutionname']);
    $tutionname = trim($tutionname);
    $ontime = $mysqli->real_escape_string($_POST['ontime']);
	$offtime = $mysqli->real_escape_string($_POST['offtime']);
	$pata = $mysqli->real_escape_string($_POST['pata']);
	$facilities = $mysqli->real_escape_string($_POST['facilities']);
	$notes = $mysqli->real_escape_string($_POST['notes']);
	$village = $mysqli->real_escape_string($_POST['village']);
	$servtype = "tution";
	date_default_timezone_set('Asia/Calcutta');
	$dt3=date("Y-m-d H:i a");
	if(empty($tutionname) || empty($ontime) || empty($offtime) || empty($pata) || empty($facilities) || empty($notes) || empty($village)){
		echo "<br>";
        echo "<center style='color:red;font-weight:700;'>Warning! Empty FIELDS not VALID !!!</center>";
        echo "<br>";
	}else
	{
        $sql1 = "INSERT INTO services (username,village,servtype,servname,category,ontime,offtime,pata,facilities,notes,dt2,user_id) VALUES ('$n', '$village', '$servtype','$tutionname','$category','$ontime','$offtime','$pata','$facilities','$notes','$dt3','$id')";
        $result1 = mysqli_query($conn, $sql1);
				echo "<br>";
                echo "<center style='color:green;font-weight:700;'> Organization Registration Is Successfull <a href='tution_ad.php'>Go To Services</a></center>";
                echo "<br>";
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
      background:#fafafa;
      border:2px solid rgba(0,0,0,0.1);	 
      border-radius:9px;	  
}
.left-side h4 {
      margin-left:8px;
	  margin-top:4px;
	  padding:0px;
	  font-weight:700;
	  font-size:15px;
}
.left-side p{
      margin-left:8px;
	  font-weight:700;
	  color:orange;
	  font-size:12px;
}

.left-side-left{
      float:right;
	  width:20%;
	  height:auto;
	  background:grey;
      border:2px solid rgba(0,0,0,0.1); 
      border-radius:9px; 	  
}
.left-side-left p{
      background:grey;
	  padding:10px;
	  text-align:center;
}
.left-side-left a p{
      text-decoration:none;
	  color:white;
	  height:auto;
	  width:100%;  
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
	  background:#fafafa;
	  border:2px solid rgba(0,0,0,0.1); 
      border-radius:9px; 
}
.l-side p{
      float:left;
	  width:90%;
	  height:auto;
	  margin-left:10px;
	  margin-right:10px;
	  margin-bottom:0px;
	  margin-top:5px;
	  font-size:14px;
	  border-radius:4px;
	 
}
.navbar-brand img{
	width:60px;
	height:40px;
}


.col-sm-6 h1{
	font-size:30px;
	color:darkorange;
}
.col-sm-6 h4{
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

.col-sm-6 h4{
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

<br>

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
	      <h1 style="font-weight:800;">मोर गांव</h1>
			<h3> गांव हो तो कैसा, मोर गांव जैसा</h3>
	        <h4>हम हमेशा आपको गांव में होने वाली <br>
			शुभ कार्यक्रमों, सुंदर घटनाओं, गांव की स्थिति और <br>
			गांव में हाल ही में होने वाले परिवर्तनों और <br>
			सुविधाओं से अवगत कराएंगे, धन्यवाद ।
			</h4>
</div></div></div>


<?php

$user2=$_SESSION["username"];
$query2= "select * from users where username='$user2'";
$result2 = mysqli_query($conn,$query2);
$row1=mysqli_fetch_assoc($result2);
$village=$row1["village"];
$query3= "select * from services where servtype='tution' && village='$village' && user_id='$id' order by id desc ";
$result3 = mysqli_query($conn, $query3);
$rowcount=mysqli_num_rows($result3);


if(isset($_REQUEST["delid"]))
{
	$delid = $_REQUEST["delid"];
	
	$aql = "delete from services where id='$delid'";
	$result = mysqli_query($conn,$aql);
	echo "<br>";
    echo "<br>";
	echo "<div class='container' style='font-weight:700;color:darkorange;'>Successfully Deleted , <a href='tution_ad.php'>Refresh Now</a></div>";
    echo "<br>";
	echo "<br>";
}
?>
<section>
<div class="container">
 <hr style="border:2px solid black" />
<h4 style="text-align:center;background:grey;height:23px;color:white;font-weight:700;border-radius:20px;font-size:18px;"><?php echo $village; ?> गांव में शिक्षण सुविधाएं  :</h4><br>

<?php
while($row2=mysqli_fetch_assoc($result3))
{
?>

<div class="allinone">
    <div class="all">
        <div class="left-side">
        <a href="edittution.php?eid=<?php echo $row2["id"];?>"><h4><?php  echo htmlspecialchars($row2["servname"], ENT_QUOTES, 'UTF-8');?>   &nbsp ~ Edit</h4></a>
        <p><?php echo htmlspecialchars($row2["category"], ENT_QUOTES, 'UTF-8');?></p>
	    </div>
        <div class="left-side-left"> 
		<a href="tution_ad.php?delid=<?php echo $row2["id"]; ?>"><p>Delete</p></a>
		
	    </div>
    </div>
	
	<div class="l-side">
	<p><?php echo htmlspecialchars($row2["facilities"], ENT_QUOTES, 'UTF-8');?></p>
<p style="color:grey;">खुलने का समय : <b><?php echo htmlspecialchars($row2["ontime"], ENT_QUOTES, 'UTF-8');?></b> ~ बंद होने का समय : <b><?php echo htmlspecialchars($row2["offtime"], ENT_QUOTES, 'UTF-8');?></b></p>
		
    
    </div>
</div>
<div style="width:100%;float:left;margin-top:15px;margin-bottom:15px;"></div>


<?php
}
?>
</div>
</section>



<section style="width:100%;float:left;">
<hr style="border:2px solid orange" />
<br>
<div class="container">
  <div class="module">
    <h1>अपने स्वयं के शिक्षण संस्थान/Tution Classes को अपलोड करें...</h1>
	<p>Note : &#2325;&#2371;&#2346;&#2351;&#2366; &#2347;&#2377;&#2352;&#2381;&#2350; English &#2350;&#2375;&#2306; &#2349;&#2352;&#2375;&#2306;...</p>
    <form class="form" action="tution_ad.php" method="POST" enctype="multipart/form-data" autocomplete="off">

  <div class="form-group">
    <label for="uname">संस्थान का प्रकार :</label>
    <select class="custom-select" name="category" required>
    <option selected>Computer Coarse</option>
	<option> Tution Classes</option>
    <option> Training</option>
    <option> Skill Delopment</option>
    <option> Coaching Classes</option>
  </select>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
	
  <div class="form-group">
    <label for="uname"> संस्थान का नाम :</label>
    <input type="text" class="form-control" id="uname" placeholder="उदाहरण : Shree Ram Tution Classes Khairjhiti Kala" name="tutionname" required>
	<div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  
  <div class="form-group">
    <label for="uname">खुलने का समय :</label>
    <input type="text" class="form-control" id="uname" placeholder="उदाहरण : 8:00 AM, 4:00 PM" name="ontime" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  
  <div class="form-group">
    <label for="uname">बंद होने का समय :</label>
    <input type="text" class="form-control" id="uname" placeholder="उदाहरण : 10:00 AM, 6:00 PM" name="offtime" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>

  <div class="form-group">
    <label for="uname">पता :</label>
    <textarea class="form-control" id="uname" rows="2" name="pata"></textarea required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  
  <div class="form-group">
    <label for="uname">सुविधाएं :</label>
    <textarea class="form-control" id="uname" rows="3" name="facilities"></textarea required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  
  <div class="form-group">
    <label for="uname">आवश्यक बातें :</label>
    <textarea class="form-control" id="uname" rows="3" name="notes"></textarea required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  
  <div class="form-group">
    <input type="hidden" class="form-control" id="uname" value="<?php echo $row["village"]; ?>" name="village">
  </div>

   
  
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

</section>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>