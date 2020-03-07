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
    <meta name="keywords" content="mor gaon, myevillage, mor gaon ki jankari, khairjhiti kala, gaon, dukano ka vivran, dukan, ">
    <meta name="author" content="Manish Patel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8"/>
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
}}
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
     <li class="nav-item" style="font-weight:800;">
        <button type="button" class="btn btn-warning"><a style="color:white;font-weight:800;" href="logout.php">  Logout</a> </button></a>
      </li>
	</ul>
  </div>
</nav>

     </header>
<?php
$sql = "SELECT * FROM villagedetails";
$result1 = mysqli_query($conn, $sql);
$rowcount=mysqli_num_rows($result1);
?>
<br>
<div style="color:darkorange;font-size:18px;font-weight:800;margin-left:15px;">&#2310;&#2346; &#2360;&#2367;&#2352;&#2381;&#2347; &#2319;&#2325; &#2327;&#2366;&#2306;&#2357; &#2350;&#2375;&#2306; &#2360;&#2370;&#2330;&#2344;&#2366; &#2337;&#2366;&#2354; &#2352;&#2361;&#2375;&#2306; &#2361;&#2376;&#2306; ...</div>

<hr style="border:2px solid green"/>
<section class="banner">
    <div class="container">
     

<div class="container">

<div class="d-flex justify-content-start">
<form class="form" action="insertkhairjhitikalan.php" onsubmit="addNewLines()" method="post" enctype="multipart/form-data" autocomplete="off">

<div class="form-group">
<label for="text">Headline( &#2358;&#2368;&#2352;&#2381;&#2359;&#2325; ) :</label>
    <input type="text" class="form-control" id="username" placeholder="Headline" name="title1">
</div>
<div class="form-group">
<label for="comment">&#2360;&#2370;&#2330;&#2344;&#2366; :</label>
  <textarea class="form-control" rows="7" id="comment" name="content1" required></textarea>
</div>
<div class="form-group">
    <label for="file">&#2347;&#2379;&#2335;&#2379; &#2337;&#2366;&#2354;&#2375; :</label>
    <input type="file" class="form-control" id="file" name="avatar">
  
  </div>
 <div class="form-group">
    <label for="text">&#2327;&#2366;&#2306;&#2357; :</label>
    <select class="custom-select" name="village" required>
<?php
while($row0=mysqli_fetch_assoc($result1))
{
?>
    <option selected value="<?php echo htmlspecialchars($row0["village"], ENT_QUOTES, 'UTF-8');?>"><?php echo htmlspecialchars($row0["village"], ENT_QUOTES, 'UTF-8');?></option>
    
<?php 
}
?>  
 </select>
  </div>


<button type="submit" class="btn btn-warning">Submit</button>
<p style="margin-top:5px;">Submit करने के बाद प्रतीक्षा करें।</p>
</form>
</div>




</div>
</div>
</section>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

