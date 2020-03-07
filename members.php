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
	padding: 50px 0 100px;
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

@media screen and (max-width:700px){	
.col-sm-6 h1{
	font-size:24px;
	color:darkorange;
}
.col-sm-6 h2{
	font-size:16px;
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
        <a class="nav-link" href="contactofmoregaon.php">संपर्क करें</a>
      </li>
      <li class="nav-item" style="font-weight:800;">
        <a class="nav-link" href="privacymorgaon.php">गोपनीयता सुविधा</a>
      </li>
      <li class="nav-item" style="font-weight:800;">
        <button type="button" class="btn btn-warning"><a style="color:white;font-weight:800;" href="login.php">  Login Kare</a> </button></a>
      </li>
	  
	  &nbsp; &nbsp;
      <li class="nav-item" style="font-weight:800;">
	  <button type="button" class="btn btn-warning"><a style="color:white;font-weight:800;" href="form.php">स्वयं को रजिस्टर करें</a> </button>
       </li>
	</ul>
  </div>
</nav>

     </header>
	 <br>
	 
<?php
require 'db.php';
$query0 = "select * from users order by id desc";
$result = mysqli_query($conn, $query0);
$rowcount0=mysqli_num_rows($result);
?>	 
	 <div class="container" style="Color:green;font-size:20px;font-weight:700;">मोर गांव ऐप यूजर्स :- </div>
<hr style="border:1px solid orange;"/>
<div class="container">
<?php
while($row0 = mysqli_fetch_assoc($result))
{
?>
<a href="showprofile.php?eid=<?php echo $row0["id"];?>"><div style="float:left;width:100%;">
	 <div style="float:left;width:160px;">
     <img style="border-radius:50%;width:120px;height:125px;" class="img-responsive img-thumbnail" src="<?php echo htmlspecialchars($row0["avatar"], ENT_QUOTES, 'UTF-8');?>"/>
     </div>
     <div style="margin-left:170px;width:190px;margin-top:2px;">
      <p style=" font-weight:600;color:darkorange"><?php echo htmlspecialchars($row0["name"], ENT_QUOTES, 'UTF-8');?></p>
	 <p style=" font-weight:600;color:grey"><?php echo htmlspecialchars($row0["dob"], ENT_QUOTES, 'UTF-8');?></p>
	 <p style=" font-weight:600;color:grey;">Village : <?php echo htmlspecialchars($row0["village"], ENT_QUOTES, 'UTF-8');?></p>
         <?php
     if($row0["vcode"] == "" || $row0["code"] == "" || $row0["vcode"] != $row0["code"] ){
         echo "<style>
         .none{
             display:none;
         }
         </style>";
     }
     ?>
     <p class="none" style='font-weight:700;color:green;font-size:12px;'><i>Verified</i></p>
 
     </div>
</div></a>
<hr style="float:left;width:100%;"/>
<?php
}
?>	 
</div> 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
</body>
</html>