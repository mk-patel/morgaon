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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>

*{
      padding:0px;
	  margin:0px;
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

.banner{
	
	height:auto;
	
	background-position:center;
	padding: 10px 0 150px;
	
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
@media screen and (max-width:700px){
	
	
.col-sm-6 h1{
	font-size:24px;
	color:darkorange;
}
.col-sm-6 h2{
	font-size:16px;
	color:grey;
}
.col-sm-6 p{
	font-size:16px;
	color:black;
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
        <a href="logout.php"><button style="color:white;font-weight:800;" type="button" class="btn btn-warning">Logout </button></a>
      </li>
	  
	  
	</ul>
  </div>
</nav>

     </header>
	 
	 
<br>
<div style="color:darkorange;font-size:18px;font-weight:800;margin-left:15px;">&#2360;&#2349;&#2368; &#2327;&#2366;&#2306;&#2357; &#2350;&#2375;&#2306; &#2360;&#2370;&#2330;&#2344;&#2366; &#2337;&#2366;&#2354;&#2375;&#2306; :</div>

<hr style="border:2px solid green"/>
<!--Yaha Gaon KA Nam Dale-->
<?php 

$sql = "SELECT * FROM villagedetails";
$result = mysqli_query($conn, $sql);
$rowcount=mysqli_num_rows($result);
?>
<section class="banner">
    <div class="container">
     
 


<div class="d-flex justify-content-start">
<form class="form" action="insertallpost.php" method="POST" enctype="multipart/form-data" autocomplete="on">

<div class="form-group">
<label for="text">Headline( शीर्षक ) :</label>
    <input type="text" class="form-control" id="username" placeholder="Headline( शीर्षक )" name="title">
</div>
<div class="form-group">
<label for="comment">सूचना :</label>
  <textarea class="form-control" rows="7" id="comment" name="content" required></textarea>
</div>

<div class="form-group">
<label for="text"> गांव चुनें : </label>
<select class="custom-select" name="village" required>
<?php
while($row0=mysqli_fetch_assoc($result))
{
?>
    <option value="<?php echo htmlspecialchars($row0["village"], ENT_QUOTES, 'UTF-8');?>"><?php echo htmlspecialchars($row0["village"], ENT_QUOTES, 'UTF-8');?></option>
    
<?php 
}
?>  
 </select>
</div>
  <div class="form-group">
    <label for="file">फोटो डाले :</label>
    <input type="file" class="form-control" id="file" name="avatar">
    
  </div>
<button type="submit" name="submit" class="btn btn-warning">Submit</button>

<p style="margin-top:5px;">Submit करने के बाद प्रतीक्षा करें।</p>
</form>

</div>
<br><br>
<?php

if(isset($_REQUEST["delid"]))
{
$delid = $_REQUEST["delid"];
	
$query="delete from post where id1='$delid'";
mysqli_query($conn,$query);
}
$user1=$_SESSION["username"];
$query1="select * from users where username='$user1'";
$result = mysqli_query($conn,$query1);
$row1=mysqli_fetch_assoc($result);
$id1=$row1["id"];
$query2="select * from post where user_id='$id1' order by id1 desc";
$result = mysqli_query($conn,$query2);
$rowcount=mysqli_num_rows($result);


?>

<div style="color:grey;font-size:18px;font-weight:800;">&#2310;&#2346;&#2325;&#2375; &#2342;&#2381;&#2357;&#2366;&#2352;&#2366; &#2360;&#2349;&#2368; &#2327;&#2366;&#2306;&#2357; &#2350;&#2375;&#2306; &#2337;&#2366;&#2354;&#2368; &#2327;&#2312; &#2360;&#2370;&#2330;&#2344;&#2366;&#2319;&#2306; :</div>
<hr style="border:1px solid black"/>


<?php
for($i=1;$i<=$rowcount;$i++)
{
	$row2=mysqli_fetch_assoc($result);
	$text2 = htmlspecialchars($row2["content"], ENT_QUOTES, 'UTF-8');

?>

<div class="allinone">
    <div class="all">
        <div class="left-side">
        <h4><?php  echo htmlspecialchars($row2["title"], ENT_QUOTES, 'UTF-8');?></h4>
        <p><?php echo htmlspecialchars($row2["village"], ENT_QUOTES, 'UTF-8');?> ~ 
		<?php echo htmlspecialchars($row2["dt1"], ENT_QUOTES, 'UTF-8');?> ~  
		<a style="color:#6f73b0;" href="allpostupdate.php?eid=<?php echo $row2["id1"]; ?>">Edit</a></p>
	    </div>
        <div class="left-side-left"> 
		<a href="allpost.php?delid=<?php echo $row2["id1"]; ?>"><p>Delete</p></a>
		
	    </div>
    </div>
	
	<div class="l-side">
	    
        <p><?php echo nl2br("$text2\n");?></p>
<p style=""><?php echo htmlspecialchars($row2["dt2"], ENT_QUOTES, 'UTF-8');?> ~ <img src="images/eye.png" width="30px" height="30px"> <?php echo htmlspecialchars($row2['pageviews'], ENT_QUOTES, 'UTF-8'); ?> ~ <a style="color:#6f73b0;font-size:12px;font-weight:700;" href="showmoreall.php?eid=<?php echo $row2["id1"];?>">&#2347;&#2379;&#2335;&#2379; &#2342;&#2375;&#2326;&#2375;&#2306;</a></p>
		
    
    </div>
</div>
<div style="width:100%;float:left;margin-top:20px;margin-bottom:20px;"></div>

<?php
}
?>


</body>
</html>
		  
		  </div>
		
	  
		  
</section>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>