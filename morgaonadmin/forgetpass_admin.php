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
    <meta http-equiv="refresh" content="230">
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
	  font-size:14px;
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
</style>
</head>
<body>
<div class="container">
 <div class="module">
    <form class="form" action="passsend.php" method="post" enctype="multipart/form-data" autocomplete="off">
     
    
<div class="form-group">
    <label>Send Verification Code : </label>
    <input type="text" class="form-control" id="uname" placeholder="New Password" name="password" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <div class="form-group">
    <label>Enter ID : </label>
    <input type="text" class="form-control" id="uname" placeholder="ID" name="id" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
<div class="form-group">
    <label>Enter Mobile No. : </label>
    <input type="text" class="form-control" id="uname" placeholder="Mobile No." name="username" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>


</form>
</div>
<section class="banner">
    <div class="container">


<div class="container"  style="float:left">
<hr style="border:2px solid orange;" />
<br>

<div class="dukan">Paasword change Request</div>
<?php
$query="select * from registervillage order by id desc";
$result = mysqli_query($conn,$query);
$rowcount1=mysqli_num_rows($result);
?>
<?php
while($row2 = mysqli_fetch_assoc($result))
	
{
?>
<br>
<div class="all">
      <div class="left-side">
	  <p> ID : <?php echo htmlspecialchars($row2["id"], ENT_QUOTES, 'UTF-8'); ?></p>
	      <h4>Username : <?php echo htmlspecialchars($row2["name"], ENT_QUOTES, 'UTF-8');?></h4>
          <h4>Name : <?php echo htmlspecialchars($row2["dob"], ENT_QUOTES, 'UTF-8');?></h4>
		  
		  <p> Mobile : <?php echo htmlspecialchars($row2["mobile"], ENT_QUOTES, 'UTF-8'); ?></p>
		  
		  <p> Date : <?php echo htmlspecialchars($row2["date"], ENT_QUOTES, 'UTF-8'); ?></p>
		  <br>
           <p> Status : <?php echo htmlspecialchars($row2["block"], ENT_QUOTES, 'UTF-8'); ?></p>
      </div>

		</div>
		
		<div style="width:100%;float:left;margin-top:px;margin-bottom:px;"><hr/></div>
<?php
}
?>

</div>
</div>
</section>
</body>
</html>