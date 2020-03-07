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
      background:#fafafa;
      border:2px solid rgba(0,0,0,0.1);	 
      border-radius:9px;	  
}
.left-side h4 {
      margin-left:8px;
	  margin-top:4px;
	  padding:0px;
	  font-weight:700;
	  color:rgba(0,0,0,0.6);
	  font-size:15px;
}
.left-side p{
      margin-left:8px;
	  font-weight:700;
	  color:rgba(0,0,0,0.4);
	  font-size:11px;
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
.col-sm-6 h3{
	font-size:14px;
	color:orange;
	font-weight:700;
}
.showimg{
	width:100%;
	height:auto;
	text-align:center;
}
.showimg img{
	width:160px;
	height:165px;
	border-radius:50%;
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
        <a href="logout.php"><button style="color:white;font-weight:800;" type="button" class="btn btn-warning">Logout</button></a>
      </li>
	  
	 
	</ul>
  </div>
</nav>

     </header>
	 
<?php

if(isset($_REQUEST["delid1"]))
{
	$delid1 = $_REQUEST["delid1"];
	
	$sql = "delete from khairjhitishop where id='$delid1'";
	mysqli_query($conn, $sql);
}
$user4=$_SESSION["username"];
$query4="select * from users where username='$user4'";
$result4 = mysqli_query($conn, $query4);
$row4=mysqli_fetch_assoc($result4);
$id4=$row4["id"];
$vill = $row4["village"];
$query5="select * from khairjhitishop where user_id='$id4' order by id desc";
$result5 = mysqli_query($conn, $query5);
$rowcount=mysqli_num_rows($result5);


?>
<?php
if($row4["email"] == "")
{
echo "<div class='container' style='color:red;'>&#2310;&#2346;&#2325;&#2366; Account &#2348;&#2306;&#2342; &#2361;&#2379;&#2344;&#2375; &#2357;&#2366;&#2354;&#2366; &#2361;&#2376;,<br>
&#2325;&#2371;&#2346;&#2351;&#2366; &#2309;&#2346;&#2344;&#2366; &#2360;&#2361;&#2368; &#2350;&#2379;&#2348;&#2366;&#2311;&#2354; &#2344;&#2306;&#2348;&#2352; &#2342;&#2375;&#2306;,<br>&#2309;&#2346;&#2344;&#2375; Account &#2325;&#2379; Safe &#2325;&#2352;&#2344;&#2375; &#2325;&#2375; &#2354;&#2367;&#2319; Edit Profile &#2350;&#2375;&#2306; &#2332;&#2366;&#2319;&#2306;, Thank You.</div>";
}

?>	 
<!--Yaha Gaon KA Nam Dale-->
<?php 
$query0 = "select * from villagedetails";
$result0 = mysqli_query($conn, $query0);
$rowcount0=mysqli_num_rows($result0);

?>	 
<br>
  <div class="container">
     <div class="row">
	    <div class="col-sm-6">
	        <div class="showimg"><img class="img-responsive img-thumbnail" src="<?php echo $row["avatar"];?>"></div>
			<div style="text-align:center;margin-top:8px;">
			<p style="color:grey;font-size:15px;"><?php echo $row["name"];?></p>
			<p style="color:grey;font-size:15px;">( <?php echo $row["username"];?> )</p>
			<p><a href="profile.php?eid=<?php echo $row["id"];?>" style="color:white;"><button class="btn btn-primary"> Edit Profile</button></a></p>
			</div>
	     </div>
</div>
    <hr style="border:2px solid black" />
</div>
		
		
<div class="container">
<h1 style="font-size:16px;font-weight:700;color:white;margin-left:8px;margin-top:3px;background:grey;padding:8px;border-radius:10px;">सेवाएं ( Services )</h1>


<div class="row">
	    <div class="col-sm-6">
	        <hr style="border:1px solid black" />
			<h3 style="color:grey;font-weight:700;font-size:16px;text-align:center;">&#2309;&#2346;&#2344;&#2366; &#2342;&#2369;&#2325;&#2366;&#2344; &#2352;&#2332;&#2367;&#2360;&#2381;&#2335;&#2352; &#2325;&#2352;&#2375;&#2306;</h3>
	        <p style="font-weight:700;text-align:center;"> &nbsp; <a href="shopregistration.php" > <button type="button" class="btn btn-info"  style="color:white;font-weight:700;font-size:15px;">&#2309;&#2346;&#2344;&#2366; &#2342;&#2369;&#2325;&#2366;&#2344; &#2352;&#2332;&#2367;&#2360;&#2381;&#2335;&#2352; &#2325;&#2352;&#2375;&#2306;</button></a> 
			</p>
		  <p style="color:grey;font-weight:700;font-size:16px;text-align:center;">&#2309;&#2346;&#2344;&#2375; &#2327;&#2366;&#2306;&#2357; &#2325;&#2368; &#2332;&#2366;&#2344;&#2325;&#2366;&#2352;&#2368; &#2309;&#2346;&#2337;&#2375;&#2335; &#2325;&#2352;&#2375;&#2306;</p>
	        <p style="font-weight:700;text-align:center;"> &nbsp; <a href="insertvillagedetails.php?eid=<?php echo $row["id"];?>" > <button type="button" class="btn btn-info"  style="color:white;font-weight:700;font-size:15px;">&#2327;&#2366;&#2306;&#2357; &#2325;&#2368; &#2332;&#2366;&#2344;&#2325;&#2366;&#2352;&#2368; &#2309;&#2346;&#2337;&#2375;&#2335; &#2325;&#2352;&#2375;&#2306;</button></a> 
			</p>
			
			
			
			<h3 style="color:grey;font-weight:700;font-size:16px;text-align:center;">अपने गांव में बस सुविधा अपडेट करें</h3>
	        <p style="font-weight:700;text-align:center;"> &nbsp; <a href="bus_ad.php" > <button type="button" class="btn btn-success"  style="color:white;font-weight:700;font-size:15px;">बस सुविधा अपडेट करें</button></a> 
			</p>
		  <p style="color:grey;font-weight:700;font-size:16px;text-align:center;">अपने गांव में शिक्षण सुविधा अपडेट करें</p>
	        <p style="font-weight:700;text-align:center;"> &nbsp; <a href="tution_ad.php"> <button type="button" class="btn btn-success"  style="color:white;font-weight:700;font-size:15px;">शिक्षण सुविधा अपडेट करें</button></a> 
			</p>
			
			
			
			
		
			<hr style="border:1px solid black" />
	     </div>
		  <div class="col-sm-6" style="text-align:center">
		  <hr style="border:1px solid orange" />
		  <h3 style="color:grey;font-weight:700;font-size:16px;text-align:center;">&#2360;&#2349;&#2368; &#2327;&#2366;&#2306;&#2357;&#2379; &#2350;&#2375;&#2306; &#2360;&#2370;&#2330;&#2344;&#2366; &#2337;&#2366;&#2354;&#2375; </h3>
            <p style="font-weight:700;text-align:center;"> &nbsp; <a href="allpost.php" > <button type="button" class="btn btn-warning"  style="color:white;font-weight:700;font-size:15px;">&#2360;&#2349;&#2368; &#2327;&#2366;&#2306;&#2357;&#2379; &#2350;&#2375;&#2306; &#2360;&#2370;&#2330;&#2344;&#2366; &#2337;&#2366;&#2354;&#2375;</button></a> 
			</p>

 
	        <p style="color:grey;font-weight:700;font-size:16px;text-align:center;">&#2360;&#2367;&#2352;&#2381;&#2347; &#2319;&#2325; &#2327;&#2366;&#2306;&#2357; &#2350;&#2375;&#2306; &#2360;&#2370;&#2330;&#2344;&#2366; &#2337;&#2366;&#2354;&#2375; </p>
	        <p style="font-weight:700;text-align:center;"> &nbsp; <a href="khairjhitikalanpost.php" > <button type="button" class="btn btn-warning"  style="color:white;font-weight:700;font-size:15px;">&#2360;&#2367;&#2352;&#2381;&#2347; &#2319;&#2325; &#2327;&#2366;&#2306;&#2357; &#2350;&#2375;&#2306; &#2360;&#2370;&#2330;&#2344;&#2366; &#2337;&#2366;&#2354;&#2375;</button></a> 
			</p>
			<hr style="border:1px solid orange" />
	     </div>
</div>



<hr style="border:2px solid black" />	
	  <br>
</div>
<div class="container">
<div class="container" style="float:left;">
<p style="text-align:center;background:grey;height:23px;color:white;font-weight:700;border-radius:20px;">&#2310;&#2346;&#2325;&#2366; &#2342;&#2369;&#2325;&#2366;&#2344;/&#2360;&#2366;&#2352;&#2381;&#2357;&#2332;&#2344;&#2367;&#2325; &#2325;&#2381;&#2359;&#2375;&#2340;&#2381;&#2352; </p>
<br>
<?php
for($i=1;$i<=$rowcount;$i++)
{
	
	$row4=mysqli_fetch_assoc($result5);

?>

	 
<div class="allinone"> 
    <div class="left-side-left">
        <a href="welcome.php?delid1=<?php echo $row4["id"];?>"><p>Delete</p></a>
    </div>
<div class="all">
    <div class="left-side">
	<a href="showmoreshop.php?eid=<?php echo $row4["id"];?>"><h4><?php echo htmlspecialchars($row4["shopname"], ENT_QUOTES, 'UTF-8');?></h4></a>
	<p><?php echo htmlspecialchars(($row4["gaon"]), ENT_QUOTES, 'UTF-8');?> ~ 
	<a style="color:#6f73b0;" href="showmoreshop.php?eid=<?php echo $row4["id"];?>">&#2347;&#2379;&#2335;&#2379; &#2342;&#2375;&#2326;&#2375;&#2306;</a> . 
	<a style="color:#6f73b0;"  href="shopupdate.php?eid=<?php echo $row4["id"];?>">Edit</a></p>
    
    </div>
<div class="l-side">
<p style="font-size:13px;color:rgba(0,0,0,0.8);" ><i  style="font-size:11px;color:green;"><?php echo htmlspecialchars(($row4["category"]), ENT_QUOTES, 'UTF-8');?></i></br>
&#2310;&#2346;&#2325;&#2366; &#2342;&#2369;&#2325;&#2366;&#2344; &#2309;&#2349;&#2368; 
<?php 


if($row4["shopstatus"]=='off')

{
	echo "<b>&#2348;&#2306;&#2342; &#2361;&#2376;</b>";
}
if($row4["shopstatus"]=='on')

{
	echo "<b>&#2326;&#2369;&#2354;&#2366; &#2361;&#2376;</b>";
}


?>
<br><b><a  style="color:#6f73b0;"  href="updatekhairjhitishop.php?eid=<?php echo $row4["id"];?>">Update (&#2326;&#2369;&#2354;&#2366; &#2361;&#2376; / &#2348;&#2306;&#2342; &#2361;&#2376;)</a></b>
 </p>
</div>

</div>

</div>
<div style="width:100%;float:left;margin-top:15px;margin-bottom:15px;"></div>
<?php
}
?>
</div>
</div>
</div>
<div class="container">
<div class="container"  style="float:left;">
 <hr style="border:2px solid black" />
<h4 style="text-align:center;background:grey;height:23px;color:white;font-weight:700;border-radius:20px;font-size:18px;"> &#2360;&#2367;&#2352;&#2381;&#2347; &#2319;&#2325; &#2327;&#2366;&#2306;&#2357; &#2350;&#2375;&#2306; &#2337;&#2366;&#2354;&#2368; &#2327;&#2312; &#2360;&#2370;&#2330;&#2344;&#2366;&#2319;&#2306; :</h4><br>


<?php

$user2=$_SESSION["username"];
$query2= "select * from users where username='$user2'";
$result2 = mysqli_query($conn,$query2);
$row2=mysqli_fetch_assoc($result2);
$id2=$row2["id"];
$query3= "select * from khairjhitikalan where user_id='$id2' order by id1 desc ";
$result3 = mysqli_query($conn, $query3);
$rowcount=mysqli_num_rows($result3);


if(isset($_REQUEST["delid"]))
{
	$delid = $_REQUEST["delid"];
	
	$aql = "delete from khairjhitikalan where id1='$delid'";
	$result = mysqli_query($conn,$aql);
	echo "<br>";
    echo "<br>";
	echo "<div class='container' style='font-weight:700;color:darkorange;'>Successfully Deleted , <a href='welcome.php'>Refresh Now</a></div>";
    echo "<br>";
	echo "<br>";
}
?>
<?php

for($i=1;$i<=$rowcount;$i++)
{
$row2=mysqli_fetch_assoc($result3);
$text2 = htmlspecialchars($row2["data"], ENT_QUOTES, 'UTF-8');




?>

<div class="allinone">
    <div class="all">
        <div class="left-side">
                <a href="showmore.php?eid=<?php echo $row2["id1"];?>"><h4><?php  echo htmlspecialchars($row2["title"], ENT_QUOTES, 'UTF-8');?></h4></a>
        <p><?php echo htmlspecialchars($row2["gaon"], ENT_QUOTES, 'UTF-8');?> ~ 
		<?php echo htmlspecialchars($row2["date1"], ENT_QUOTES, 'UTF-8');?> ~ 
		<a style="color:#6f73b0;" href="khairjhitikalanupdate.php?eid=<?php echo $row2["id1"]; ?>">Edit</a>
		</p>
	    </div>
        <div class="left-side-left"> 
		<a href="welcome.php?delid=<?php echo $row2["id1"]; ?>"><p>Delete</p></a>
		
	    </div>
    </div>
	
	<div class="l-side">
	    
        <p><?php echo nl2br("$text2\n");?></p>
<p style="color:grey;"><?php echo htmlspecialchars($row2["date2"], ENT_QUOTES, 'UTF-8');?> ~ <img src="images/eye.png" width="30px" height="30px"> <?php echo htmlspecialchars($row2['pageviews'], ENT_QUOTES, 'UTF-8'); ?> ~ <a style="color:#6f73b0;font-size:12px;font-weight:700;" href="showmore.php?eid=<?php echo $row2["id1"];?>">&#2347;&#2379;&#2335;&#2379; &#2342;&#2375;&#2326;&#2375;&#2306;</a></p>
		
    
    </div>
</div>
<div style="width:100%;float:left;margin-top:15px;margin-bottom:15px;"></div>


<?php
}
?>
</div>
</div>
</div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>