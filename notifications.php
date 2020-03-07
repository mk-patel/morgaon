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
$gaon1 = $row["village"];
$mid = $row["id"];
if(empty($user) || empty($password)){
       header("location: login.php");
         exit();
	}else{
if ($_SESSION["username"] == $row["username"])
	
	{
		
	}else{
		header("location: login.php");
        exit();
	}
 if ($password == $row["password"])
 {
	 
    
 }else{
         header("location: login.php");
         exit();
 }
}	
?>

<html>
<head>
 <title>MorGaon : MyEVillage | Digital Village</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<style>
.l-side{
      float:left;
	  width:100%;
	  height:auto;
	  background:white;
	  border-radius:2px;
	  border:0.7px solid rgba(0,0,0,0.09);
	  background:rgba(0,0,0,0.02);
}
.l-side p{
      float:left;
	  width:90%;
	  height:auto;
	  margin-right:15px;
	  margin-bottom:6px;
	  margin-top:6px;
	  margin-left:20px;
	  font-size:14px;
	  border-radius:2px;
	  color:rgba(0,0,0,0.7);
}
.nt{
	width:150px;
	text-align:center;
	padding:5px;
	background:orange;
	color:white;
	border-radius:10px;
}
.navbar-brand img{
	width:60px;
	height:40px;
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
<div class="container">
<br>
<div class="nt">
Notifications
</div>
<br>
<hr>

<?php

$sql2 = "SELECT * FROM notification where user_id='$mid' order by id desc";
$result = mysqli_query($conn, $sql2);
$rowcount=mysqli_num_rows($result);
$sql3=mysqli_query($conn, "update notification set user_seen='1' where user_id='$mid'");
?>
<?php
if($rowcount <= 0){
	echo "<br>";
	echo "<br>";
	echo "<center>No New Notifications</center>";
	echo "<br>";
}
?>
<?php 
while($row=mysqli_fetch_array($result))
    {
?>

	  <div class="l-side"> 
	  <a href="showprofile.php?eid=<?php echo $row["user_id"];?>"><p style="font-weight:700;"><?php echo $row['name'];?></a> <?php echo $row['type'];?> <a href="<?php echo $row['post_type'];?>?eid=<?php echo $row["post_id"];?>">your post .</p>
	  <p style="font-size:12px;color:grey;">At <?php echo $row['date1'];?> On <?php echo $row['date2'];?>.
	  
	  </p></a>
	
  </div>
  <div style="width:100%;float:left;margin-top:2px;margin-bottom:2px;"></div> 
    <?php
    }
    ?>

</div>
</body>
</html>