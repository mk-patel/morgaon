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
.all{
      width:100%;
	  height:auto;
	  background:grey;
}
.left-side{
      float:left;
	  width:100%;
	  height:auto;
      background:#7FDBFF;
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
	  width:90%;
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
<br><br>
<div class="dukan">हाल ही में ( वर्तमान में )</div>
<hr style="border:2px solid orange;" />


<?php

$query="select * from khairjhitikalan order by id1 desc";
$result = mysqli_query($conn,$query);
$rowcount1=mysqli_num_rows($result);
if(isset($_REQUEST["delid"]))
{
	$delid = $_REQUEST["delid"];
	$success = "delete from khairjhitikalan where id1='$delid'";
    mysqli_query($conn,$success);
	header('location:villagepost.php');
}
?>
<?php
while($row2 = mysqli_fetch_assoc($result))
	
{
?>
<div class="all">
      <div class="left-side">
	      <h4>ID :<?php echo htmlspecialchars($row2["id1"], ENT_QUOTES, 'UTF-8');?></h4>
          <h4>Name : <?php echo htmlspecialchars($row2["uname"], ENT_QUOTES, 'UTF-8');?></h4>
		  <p><?php echo htmlspecialchars($row2["gaon"], ENT_QUOTES, 'UTF-8'); ?></p>
      </div>
<div class="l-side">  
        <p style="font-size:12px;"> Posted By : <?php echo htmlspecialchars($row2["uname"], ENT_QUOTES, 'UTF-8');?> >> At : <?php echo htmlspecialchars($row2["date2"], ENT_QUOTES, 'UTF-8');?></p>
        <p><?php echo htmlspecialchars($row2["title"], ENT_QUOTES, 'UTF-8');?></p>
        <p><?php

		
	    $text2 = htmlspecialchars($row2["data"], ENT_QUOTES, 'UTF-8');

		echo nl2br("$text2\n");

		?></p>
		<p><a href="villagepost.php?delid=<?php echo $row2["id1"]; ?>"><p>Delete</p></a></p>
		</div>
		</div>
		
		<div style="width:100%;float:left;margin-top:px;margin-bottom:px;"><hr/></div>
<?php
}
?>

</div>
</body>
</html>