<html>
<head>
    <title>Mor Gaon : MyEVillage | Digital Village</title>
	<meta charset="UTF-8">
    <meta name="description" content="Ham hamesh aapko gaon me hone wali sundar ghatnao aur parivartano se avagat karate rahenge, Mor Gaon : MyEVillage | Digital Village">
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
	padding: 20px 0 100px;
	
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
.left{
	background:lightblue;
	border-radius:5px;
}
.right{
	border:1px solid grey;
	border-radius:5px;
	padding:2px;
	
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
}
</style>


</head>
<body>
<?php
if(isset($_REQUEST["eid"]))
{
$eid=$_REQUEST["eid"];
}
?>
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
<br>

<?php
require 'db.php';
$query = "select * from villagedetails";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$query1="select * from villagedetails where village='$eid'";
$result1 = mysqli_query($conn, $query1);
$rowcount=mysqli_num_rows($result1);

?>

	        <h1 style="font-weight:800;color:darkorange;font-size:18px;margin-left:15px;"><u><?php echo htmlspecialchars($eid, ENT_QUOTES, 'UTF-8');?> &#2325;&#2375; &#2348;&#2366;&#2352;&#2375; &#2350;&#2375;&#2306; &#2332;&#2366;&#2344;&#2325;&#2366;&#2352;&#2368;...</u></h1>
			<hr style="border:2px solid green;margin-left:15px;margin-right:15px;"/>
<div style="margin-bottom:10px;margin-left:15px;font-weight:700;font-size:12px;"><a href="khairjhitidetails.php">&#2340;&#2366;&#2332;&#2366; &#2325;&#2352;&#2375;&#2306; (Refresh)<img src="images/refresh.png" width="20px" height="20px"></a></div>
		<br>
		<?php
while($row1 = mysqli_fetch_assoc($result1))
	

{
	$text = htmlspecialchars($row1["samasya"], ENT_QUOTES, 'UTF-8');


$text2 = htmlspecialchars($row1["panch"], ENT_QUOTES, 'UTF-8');
$newtext2= wordwrap($text2, 40, "\n" , true);


	
	?>
		  <div class="container">
     <div class="row">
	    <div class="col-sm-6">
        
        <p style="font-size:15px;">&#2350;&#2380;&#2360;&#2350; : &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <stress style="font-weight:700;color:red;"> <?php echo htmlspecialchars($row1["weather"], ENT_QUOTES, 'UTF-8');?> </stress></p>
        <p style="font-size:13px;">&#2332;&#2367;&#2354;&#2366; :&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <stress style="font-weight:700;color:darkorange;"> <?php echo htmlspecialchars($row1["jila"], ENT_QUOTES, 'UTF-8');?> </stress></p>
        <p style="font-size:13px;">&#2340;&#2361;&#2360;&#2368;&#2354; : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <stress style="font-weight:700;color:darkorange;"> <?php echo htmlspecialchars($row1["tehsil"], ENT_QUOTES, 'UTF-8');?> </stress></p>
        <p style="font-size:13px;">&#2357;&#2367;&#2325;&#2366;&#2360; &#2326;&#2306;&#2337; :  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <stress style="font-weight:700;color:darkorange;"> <?php echo htmlspecialchars($row1["block"], ENT_QUOTES, 'UTF-8');?> </stress></p>
        <p style="font-size:13px;">&#2346;&#2369;&#2354;&#2367;&#2360; &#2360;&#2381;&#2335;&#2375;&#2358;&#2344; :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <stress style="font-weight:700;color:darkorange;"> <?php echo htmlspecialchars($row1["polish"], ENT_QUOTES, 'UTF-8');?> </stress></p>
        <p style="font-size:13px;">&#2357;&#2367;&#2343;&#2366;&#2344;&#2360;&#2349;&#2366; &#2325;&#2381;&#2359;&#2375;&#2340;&#2381;&#2352; :&nbsp;  &nbsp; &nbsp <stress style="font-weight:700;color:darkorange;"> <?php echo htmlspecialchars($row1["vidhansabha"], ENT_QUOTES, 'UTF-8');?> </stress></p>
        <p style="font-size:13px;">&#2354;&#2379;&#2325;&#2360;&#2349;&#2366; &#2325;&#2381;&#2359;&#2375;&#2340;&#2381;&#2352; : &nbsp; &nbsp; &nbsp; &nbsp;  <stress style="font-weight:700;color:darkorange;"> <?php echo htmlspecialchars($row1["loksabha"], ENT_QUOTES, 'UTF-8');?> </stress></p>
        <p style="font-size:13px;">&#2357;&#2367;&#2343;&#2366;&#2351;&#2325; : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <stress style="font-weight:700;color:darkorange;"> <?php echo htmlspecialchars($row1["vidhayak"], ENT_QUOTES, 'UTF-8');?> </stress></p>
        <p style="font-size:13px;">&#2360;&#2366;&#2306;&#2360;&#2342; :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;  <stress style="font-weight:700;color:darkorange;"> <?php echo htmlspecialchars($row1["sansad"], ENT_QUOTES, 'UTF-8');?> </stress></p>
        <p style="font-size:13px;">डाकघर पिन कोड : &nbsp; <stress style="font-weight:700;color:darkorange;"> <?php echo htmlspecialchars($row1["pincode"], ENT_QUOTES, 'UTF-8');?> </stress></p>
	        <h3 style="font-weight:800;color:darkorange;font-size:18px;"> <?php echo $row1["sarpanch"];?> </h3>
            <h4 style="font-weight:700;font-size:14px;"> सरपंच, मोबाइल नंबर . <?php echo $row1["sarpanchmob"];?></h4>
            <h5 style="font-size:12px;;color:darkorange;"> <?php echo $eid; ?> के मुखिया ( सरपंच )</h5>
			<hr/>
            <br>
            <h3 style="font-weight:800;color:darkorange;font-size:16px;"> <?php echo $row1["upsarpanch"];?> </h3>
    		<h4 style="font-weight:700;font-size:14px;">&#2313;&#2346;&#2360;&#2352;&#2346;&#2306;&#2330;, <?php echo $eid; ?></h4>
<hr/>
            <br>
			<p style="font-weight:600;">मकानों की संख्या :  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - <stress style="font-weight:800;color:darkorange;"> <?php echo htmlspecialchars($row1["houses"], ENT_QUOTES, 'UTF-8');?> </stress>
                  </p>
                  <hr/>
			<p style="font-weight:600;"> कुल जनसंख्या  :  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - <stress style="font-weight:800;color:darkorange;"> <?php echo htmlspecialchars($row1["population"], ENT_QUOTES, 'UTF-8');?> </stress>
                  </p>
                  <hr/>
				  <p style="font-weight:600">महिलाओं की संख्या :  &nbsp; &nbsp; &nbsp; -  <stress style="font-weight:800;color:darkorange;"> <?php echo htmlspecialchars($row1["populationF"], ENT_QUOTES, 'UTF-8');?> </stress>
                  </p>
                  <hr/>
				  <p style="font-weight:600;">पुरुषों की संख्या :  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - <stress style="font-weight:800;color:darkorange;"> <?php echo htmlspecialchars($row1["populationM"], ENT_QUOTES, 'UTF-8');?> </stress>
                  </p>
                  <hr/>
			<p style="font-weight:600;">कुल वार्ड संख्या  : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - <stress style="font-weight:800;color:darkorange;"> <?php echo htmlspecialchars($row1["ward"], ENT_QUOTES, 'UTF-8');?> </stress>
                  </p>
                  <hr/>
	     </div>
		  <div class="col-sm-6">
          <p style="font-weight:600;">&#2360;&#2381;&#2325;&#2370;&#2354; &#2351;&#2366; &#2325;&#2377;&#2354;&#2375;&#2332; : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - <stress style="font-weight:800;color:darkorange;"> <?php echo htmlspecialchars($row1["school"], ENT_QUOTES, 'UTF-8');?> &#2340;&#2325; &#2361;&#2376; </stress>
                  </p>
                  <hr/>
                  <p style="font-weight:600;">&#2342;&#2369;&#2325;&#2366;&#2344;&#2379;&#2306; &#2325;&#2368; &#2360;&#2306;&#2326;&#2381;&#2351;&#2366;  : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; -  <stress style="font-weight:800;color:darkorange;"> <?php echo htmlspecialchars($row1["shop"], ENT_QUOTES, 'UTF-8');?> </stress>
                  </p>
                  <hr/>
                  <p style="font-weight:600;">&#2346;&#2381;&#2352;&#2366;&#2341;&#2350;&#2367;&#2325;/&#2313;&#2346;&#2360;&#2381;&#2357;&#2366;&#2360;&#2381;&#2341;&#2381;&#2351; &#2325;&#2375;&#2306;&#2342;&#2381;&#2352; &#2361;&#2376; - : <stress style="font-weight:800;color:darkorange;"> 
                  <?php
                  if($row1["health"]=="Yes"){
                  echo "&#2361;&#2366;&#2306; &#2361;&#2376;";
                  }
                  if($row1["health"]=="No"){
                  echo "&#2344;&#2361;&#2368;&#2306; &#2361;&#2376;";
                  }
                  ?>
                  </stress>
                  </p>
                  <hr/>
	      <p style="font-weight:600;">भू - जलस्तर  : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; -  <stress style="font-weight:800;color:darkorange;"> <?php echo htmlspecialchars($row1["waterlevel"], ENT_QUOTES, 'UTF-8');?> </stress>
                  </p>
                  <hr/>
			<p style="font-weight:600"> तालाबों की संख्या : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <stress style="font-weight:800;color:darkorange;"> <?php echo htmlspecialchars($row1["ponds"], ENT_QUOTES, 'UTF-8');?> </stress>
                  </p>
                  <hr/>
				  <p style="font-weight:600;"> गांव में समस्याएं : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;-<br><stress style="font-weight:800;color:darkorange;"> <?php echo nl2br("$text\n");?> </stress> 
                  </p>
                  <hr/>
	     </div>
         
         <a href="login.php"> <button type="button" class="btn btn-warning" style="color:white;font-weight:800;">&#2332;&#2366;&#2344;&#2325;&#2366;&#2352;&#2368; &#2309;&#2346;&#2337;&#2375;&#2335; &#2325;&#2352;&#2375;&#2306;</button></a>
         
</div><br></div>


  <?php
}
?>




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

