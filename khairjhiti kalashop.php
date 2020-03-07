<html>
<head>
    <title>Mor Gaon : MyEVillage | Digital Village</title>
	<meta charset="UTF-8">
    <meta name="description" content="Ham hamesh aapko gaon me hone wali sundar ghatnao aur parivartano se avgat karate rahenge, Mor Gaon : MyEVillage | Digital Village">
    <meta name="keywords" content="mor gaon, myevillage, mor gaon ki jankari, khairjhiti kala, gaon, dukano ka vivran, dukan, ">
    <meta name="author" content="Manish Patel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="refresh" content="40">
	<meta charset="UTF-8"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
<style>


*{
      padding:0px;
	  margin:0px;
	  font-family: 'Ubuntu', sans-serif;


}
body{
background:#F8F8F8;
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
	color:darkorange;	
}

.showimg img{
	width:130px;
	height:150px;
	
}
.row1{
	float:left;
	width:150px;
	height:150px;
}
.row2{
	margin-left:140px;
	height:150px;
}
.container{
	background:white;
	box-shadow:1px 1px 10px rgba(0,0,0,0.1);
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
        <a href="login.php"><button type="button" style="color:white;font-weight:800;" class="btn btn-warning">Login Kare</button></a>
      </li>	  
	  &nbsp; &nbsp;
      <li class="nav-item" style="font-weight:800;">
	  <a href="form.php"><button type="button" class="btn btn-warning" style="color:white;font-weight:800;">&#2360;&#2381;&#2357;&#2351;&#2306; &#2325;&#2379; &#2352;&#2332;&#2367;&#2360;&#2381;&#2335;&#2352; &#2325;&#2352;&#2375;&#2306;</button></a>
       </li>
	</ul>
  </div>
</nav>
</header>
<br>
<?php
if(isset($_REQUEST["eid"]))
{
$eid=$_REQUEST["eid"];
}
?>
<?php
require 'db.php';
$query ="select * from khairjhitishop where gaon='$eid' order by id desc";
$query1=mysqli_query($conn,$query);
$rowcount=mysqli_num_rows($query1);
?>


<div class="dukan"><?php echo $eid; ?> &#2350;&#2375;&#2306; &#2342;&#2369;&#2325;&#2366;&#2344; / &#2360;&#2366;&#2352;&#2381;&#2357;&#2332;&#2344;&#2367;&#2325; &#2360;&#2381;&#2341;&#2366;&#2344; &#2325;&#2368; &#2360;&#2381;&#2341;&#2367;&#2340;&#2367;..</div>
<hr style="border:2px solid orange;" />
<?php
for($i=1;$i<=$rowcount;$i++)
{
$row=mysqli_fetch_assoc($query1);
?>

<div class="container">
<div class="row1">
	<a href="showmoreshop.php?eid=<?php echo $row["id"];?>"><div class="showimg"><img class="img-responsive img-thumbnail" src="<?php echo $row["image"];?>" /></div></a>

</div>
<div class="row2">
<h4 style="font-size:15px;padding:19px;"><a style="color:black;font-weight:700;" href="showmoreshop.php?eid=<?php echo $row["id"];?>"><?php echo htmlspecialchars($row["shopname"], ENT_QUOTES, 'UTF-8');?></h4></a>
<p style="margin-left:30px"> <a style="color:grey;font-size:13px;font-weight:700;" style="color:black;" href="showmoreshop.php?eid=<?php echo $row["id"];?>"><?php echo $row["category"];?></a><br>
<a  style="color:grey;font-size:13px;font-weight:700;" href="showmoreshop.php?eid=<?php echo $row["id"];?>"> <?php echo htmlspecialchars($row["shopkipper"], ENT_QUOTES, 'UTF-8');?> , <?php echo htmlspecialchars($row["mobile"], ENT_QUOTES, 'UTF-8');?></a>
<br>
<?php

if($row["shopstatus"]=='off')

{
	echo "<button style='background:grey;color:white;font-size:13px;border:2px solid grey;border-radius:10px;width:60px;'> &#2348;&#2306;&#2342; &#2361;&#2376; </button>";
}
if($row["shopstatus"]=='on')

{
	echo "<button style='background:darkorange;color:white;font-size:13px;border:2px solid darkorange;border-radius:10px;width:60px;'> &#2326;&#2369;&#2354;&#2366; &#2361;&#2376; </button>";
}
?>
		
		</p>
</div>
</div>
<br>
<?php
}
?>

<div style="float:left;margin-left:20px;margin-right:20px;color:grey;">

<p>
   <b style="font-size:16px;">अपना दुकान रजिस्टर करे और सभी गांव में दिखाए...</b>
</p>
<p style="font-size:16px;margin-left:10px;">रजिस्टर करने के लिए...<br>
      1. अपने प्रोफ़ाइल के नीचे <a href="shopregistration.php">अपना दुकान रजिस्टर करे</a> लिंक पर क्लिक करें |
</p>
<p style="font-size:17px;"><b>फायदे</b><br></p>
<p style="font-size:15px;margin-left:10px;">
1. आपका दुकान/सार्वजनिक स्थान सभी गांव में दिखने लगेगा।<br>
2. आप अपने दुकान का फोटो अपलोड कर सकते है।<br>
3. सभी गांव में दिखने से लोगों को आपके दुकान के बारे में पता चलेगा।<br> 
उदाहरण :- आपके दुकान में कौन - कौन सा समान मिलता है, आपका दुकान कहा है , ऐसी बहुत सी सुविधाएं आपको मिलती है।<br>
4. आप अपने दुकान/सार्वजनिक स्थान में मिल रहे आकर्षक समान के बारे में लोगों को जानकारी दे सकते है।<br>
5. आप अपनी दुकान की लाइव स्थिति अर्थात चालू होने और बंद होने की जानकारी तुरंत डाल सकते हो।<br>
उदाहरण :- अभी दुकान <b>बंद </b>है।
अभी दुकान <b>खुला</b> है।<br>
6. सभी गांव में आपकी दुकान की जानकारी बढ़ने से आपकी ग्राहक की संख्या बढ़ जाएगी और आपका दुकान एक  E-Shop बन जाएगा।<br>
</p>



</div> 

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>