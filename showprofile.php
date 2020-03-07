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




.showimg {
	
	width:100%;
	height:auto;
	background:white;
	text-align:center;
}
.showimg img {
	width:150px;;
	height:170px;
	background:white;
	
    border-radius:50%;
	
	
}
.col-sm-6 h3{
	font-size:14px;
	color:orange;
	font-weight:700;
}
.col-sm-6 h4{
	font-size:17px;
	color:orange;
	font-weight:700;
}
.name{
     margin-left:160px;
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
	
}

.col-sm-6 h4{
	font-size:17px;
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

<?php
require 'db.php';
if(isset($_REQUEST["eid"]))
{
$eid=$_REQUEST["eid"];
$query="select * from users where id='$eid'";
$sql = mysqli_query($conn, $query);

}
?>
<?php
while($row = mysqli_fetch_assoc($sql))
	
{
  $text =  htmlspecialchars($row["about"], ENT_QUOTES, 'UTF-8');
?>



<p style="font-size:16px; font-weight:700;"><img src="images/eye.png" width="35px" height="35px"> <?php echo htmlspecialchars($row["pageviews1"], ENT_QUOTES, 'UTF-8'); ?></p>
<hr>
      
<div class="container">
   <div class="row">
	  <div class="col-sm-6">
        <div style="text-align:center;" class="showimg"><img class="img-responsive img-thumbnail" src="<?php echo $row["avatar"];?>"></div>
     
        <div style="text-align:center;background:#f5f5f5;padding:2px;border-radius:6px;">
        <h4 style="color:black;margin-top:10px;"><?php echo htmlspecialchars($row["name"], ENT_QUOTES, 'UTF-8');?></h4>
        <hr>
        <p style="color:black;"><?php echo nl2br("$text\n"); ?></p>
        <hr>
</div>
	  </div>
	  
	  
<div class="col-sm-6" >
	<div style="padding:3px;border-radius:6px;">
    <p><p style="color:grey;margin-top:10px;background:#ededed;padding:2px;">Village : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php echo htmlspecialchars($row["village"], ENT_QUOTES, 'UTF-8'); ?></p></p>
    <p style="color:grey;background:#ededed;padding:2px;">Date Of Birth :&nbsp; &nbsp; &nbsp;  <?php echo htmlspecialchars($row["dob"], ENT_QUOTES, 'UTF-8'); ?></p>
	<p style="color:grey;background:#ededed;padding:2px;">Gender :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php echo htmlspecialchars($row["gender"], ENT_QUOTES, 'UTF-8'); ?></p>
		</div>
		</div>
		
		
		</div>
		
		</div>
<?php	
}
?>
</div>
<br>
<?php
$query="select * from users where id='$eid'";
$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_assoc($result)){
	$count = $row["pageviews1"];
	$newcount = $count + 1;
    $update ="update users set pageviews1 = '$newcount' where id='$eid'";
    mysqli_query($conn,$update);
	
}

?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>