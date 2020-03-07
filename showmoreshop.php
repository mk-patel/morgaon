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
    <title>Mor Gaon : MyEVillage | Digital Village</title>
	<meta charset="UTF-8">
    <meta name="description" content="Ham hamesh aapko gaon me hone wali sundar ghatnao aur parivartano se avgat karate rahenge, Mor Gaon : MyEVillage | Digital Village">
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

.banner{
	height:auto;
	background-position:center;
	padding: 50px 0 100px;
	
}
.all{
      width:100%;
	  height:auto;
	  background:grey;
}
.left-side{
      float:left;
	  width:100%;
	  height:auto;
      background:white;
      border:0.1px solid lightblue;	  
}
.left-side h4 {
      margin:2px;
	  padding:0px;
	  font-weight:700;
	  color:darkblue;
	  font-size:16px;
	  margin-left:10px;
	  
}
.left-side p{
      margin:0px;
	  font-weight:700;
	  color:grey;
	  font-size:12px;
	  margin-left:10px;
}



.l-side{
      float:left;
	  width:100%;
	  height:auto;
	  background:rgba(0,0,0,0.03);
	  border-radius:2px;
	  border:0.7px solid rgba(0,0,0,0.09);
	  
}
.l-side p{
      float:left;
	  width:100%;
	  height:auto;
	  margin-right:15px;
	  margin-bottom:6px;
	  margin-top:6px;
	  margin-left:20px;
	  font-size:14px;
	  border-radius:2px;
	  font-weight:650;
	  color:rgba(0,0,0,0.7);
}

.navbar-brand img{
	width:60px;
	height:40px;
}




.dukan{
	font-size:18px;
	font-weight:800;
	margin-bottom:13px;
	text-align:center;
	color:darkorange
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
.showimg {
	width:100%;
	height:auto;
	background:white;
	text-align:center;
}
.showimg img {
	width:auto;
	height:50%;
	background:white;
	text-align:center;
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

.showimg {
	width:100%;
	height:auto;
	background:white;
	text-align:center;
}
.showimg img {
	width:90%;
	height:auto;
	background:white;
	text-align:center;
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

<?php
require 'db.php';
if(isset($_REQUEST["eid"]))
{
$eid=$_REQUEST["eid"];
}
$query="select * from khairjhitishop where id='$eid'";
$result=mysqli_query($conn,$query);
$rowcount = mysqli_num_rows($result);
?>
<?php
while($row = mysqli_fetch_assoc($result))
{
    $text2 =  htmlspecialchars($row["details"], ENT_QUOTES, 'UTF-8');
?>
  <div class="container">
<h2 style="color:darkorange;font-size:18px;font-weight:700;">&#2342;&#2369;&#2325;&#2366;&#2344; &#2351;&#2366; &#2360;&#2366;&#2352;&#2381;&#2357;&#2332;&#2344;&#2367;&#2325; &#2360;&#2381;&#2341;&#2366;&#2344; &#2325;&#2366; &#2357;&#2367;&#2357;&#2352;&#2339;...</h2>
<hr style="border:2px solid green"/>
<br>
<p style="border:2px solid grey;border-radius:5px;font-size:14px; font-weight:700; width300px;text-align:center;"> &#2310;&#2346;&#2325;&#2366; &#2342;&#2369;&#2325;&#2366;&#2344;/&#2360;&#2366;&#2352;&#2381;&#2357;&#2332;&#2344;&#2367;&#2325; &#2325;&#2381;&#2359;&#2375;&#2340;&#2381;&#2352; : <?php echo htmlspecialchars($row["pageviews"], ENT_QUOTES, 'UTF-8'); ?> &#2348;&#2366;&#2352; &#2342;&#2375;&#2326;&#2366; &#2327;&#2351;&#2366;|</p>
<div class="showimg"> <?php echo "<p>" ?> <img class="img-responsive img-thumbnail" src="<?php echo $row["image"];?>" ><?php echo "</p>" ?></div>
<div class="all">
  <div class="left-side">
	      <h4 style="margin-top:11px;margin-left:10px;"> <?php echo htmlspecialchars($row["shopname"], ENT_QUOTES, 'UTF-8');?></h4>
		  <p style="margin-top:5px;margin-left:20px;">Owner : <?php echo htmlspecialchars($row["shopkipper"], ENT_QUOTES, 'UTF-8');?></p>
		  <hr/>
		  <h5 style="margin-left:20px;margin-top:0px;color:black;font-size:14px;"><?php echo nl2br("$text2\n");?></h5>
          <p style="margin-left:20px;margin-bottom:10px;">पता : <?php $text3 = htmlspecialchars($row["pata"], ENT_QUOTES, 'UTF-8');
		            echo nl2br("$text3\n");?>
		  </p>
		  </div>
<div class="l-side">  
        <div class="l-side1">  
        <p> &#2309;&#2349;&#2368; 

<?php

if($row["shopstatus"]=='off')

{
	echo "&#2348;&#2306;&#2342; &#2361;&#2376; .";
}
if($row["shopstatus"]=='on')

{
	echo "&#2326;&#2369;&#2354;&#2366; &#2361;&#2376; .";
}
?>
		
		</p>
        
    </div>
<div><br><hr/>
<br>
<br>
</div>	
		
		</div>


<?php
}
?>

</div>

</div>
<?php
$query2="select * from khairjhitishop where id='$eid'";
$result2 = mysqli_query($conn, $query2);
while($row2 = mysqli_fetch_assoc($result2)){
    $count = $row2["pageviews"];
    $newcount = $count + 1;
    $update ="update khairjhitishop set pageviews = '$newcount' where id='$eid'";    
    $result1 = mysqli_query($conn, $update);
}
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>