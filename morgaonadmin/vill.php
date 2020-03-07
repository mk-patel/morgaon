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
    <meta http-equiv="refresh" content="50">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
*{
      padding:0px;
	  margin:0px;
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



</style>

</head>
<body>
<div class="container">





<br><br>

<div style="color:darkorange;">Gaon Registration</div>
<br>
<?php


$query="select * from villagedetails order by id desc";
$result = mysqli_query($conn,$query);
$rowcount1=mysqli_num_rows($result);
if(isset($_REQUEST["delid3"]))
{
	$delid3 = $_REQUEST["delid3"];
	
	$success3 = "delete from villagedetails where id='$delid3'";
	$resultq = mysqli_query($conn,$success3);
	header('location:vill.php');
}

?>
<?php
while($row2 = mysqli_fetch_assoc($result))
	
{
?>
<div class="all">
      <div class="left-side">
	  <p>Last Edited By ID : <?php echo htmlspecialchars($row2["user_id"], ENT_QUOTES, 'UTF-8'); ?></p>
	  <p>Main ID : <?php echo htmlspecialchars($row2["id"], ENT_QUOTES, 'UTF-8'); ?></p>
	      <h4>Village Name : <?php echo htmlspecialchars($row2["village"], ENT_QUOTES, 'UTF-8');?></h4>
		  <p>PinCode : <?php echo htmlspecialchars($row2["pincode"], ENT_QUOTES, 'UTF-8'); ?></p>
		  <p>Block : <?php echo htmlspecialchars($row2["block"], ENT_QUOTES, 'UTF-8'); ?></p>
		  <p>Jila : <?php echo htmlspecialchars($row2["jila"], ENT_QUOTES, 'UTF-8'); ?></p>
		 
      </div>
<div class="l-side">
<p style="background:grey;color:white;"><a style="color:white;margin-left:20px;" href="vill.php?delid3=<?php echo $row2['id']; ?>">Delete</a></p>
</div>
		</div>
		
		
<?php
}
?>

</div>


