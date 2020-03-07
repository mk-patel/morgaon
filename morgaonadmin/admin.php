<?php
session_start();
require 'db.php';
$user=$_SESSION["username"];
$password=$_SESSION["password"];
$query="select * from adminusers where username='$user' and password='$password'";
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
	<meta charset="UTF-8">
    <meta http-equiv="refresh" content="20">
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
	font-size:14px;
	color:grey;
}

	
}
</style>


</head>
<body>

<br>


  <div class="container">
     <div class="row">
	    <div class="col-sm-6">
	        <h1 style="font-weight:800;">मोर गांव</h1>
			<h3>गांव हो तो कैसा, <i style="font-size:17px;">मोर गांव </i> जैसा</h3>
	        <h2>हम हमेशा आपको गांव में होने वाली <br>
			शुभ कार्यक्रमों, सुंदर घटनाओं, गांव की स्थिति और <br>
			गांव में हाल ही में होने वाले परिवर्तनों और <br>
			सुविधाओं से अवगत कराएंगे, धन्यवाद ।
			</h2>
			
	     </div>
		  <div class="col-sm-6">
		   <p><a href="logout.php"><button type="button" class="btn btn-warning"  style="color:white;font-weight:800;" > Logout</button></a></p>
      <br>
		  <p style="font-weight:800;font-size:18px;color:orange;"><?php
           echo "Welcome $user Check Everything Now ! "
		  ?></p>
		  </div>
		 </div>
		 </div>

    <div class="container">

	<a href="forgetpass_admin.php"><button type="button" class="btn btn-warning"  style="color:white;font-weight:800;" >View Password Change request</button></a><br><br>
	<a href="villagepost.php"><button type="button" class="btn btn-warning"  style="color:white;font-weight:800;" >View Village Post</button></a><br><br>
	
	<a href="allpost.php"><button type="button" class="btn btn-warning"  style="color:white;font-weight:800;" >View All Post</button></a><br><br>
	<a href="user.php"><button type="button" class="btn btn-warning"  style="color:white;font-weight:800;" >New User Registration</button></a><br><br>
	<a href="vill.php"><button type="button" class="btn btn-warning"  style="color:white;font-weight:800;" >New Village Registration</button></a><br><br>
	<a href="shop.php"><button type="button" class="btn btn-warning"  style="color:white;font-weight:800;" >New Shop Registration</button></a><br><br>
    <a href="feedback_admin.php"><button type="button" class="btn btn-warning"  style="color:white;font-weight:800;" >View FeedBacks</button></a><br><br>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>