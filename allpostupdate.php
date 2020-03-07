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
$tid = $row["id"];
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
<?php
if(isset($_REQUEST["eid"]))
{
$eid=$_REQUEST["eid"];
}
$query="SELECT * FROM post where id1='$eid' && user_id='$tid'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);

if(isset($_POST["submit"]))
{
	$title=$_POST["title"];
	$content= $_POST["content"];
	$village= $_POST["village"];
	$query1="UPDATE post SET title='$title' , content='$content' , village='$village' where id1='$eid'";
    $result2=mysqli_query($conn,$query1);
	header('location:allpost.php');
}
?>
<?php 
$gaon1 = 'khairjhiti kala';
$query0 ="select * from villagedetails";
$result3=mysqli_query($conn,$query0);
$rowcount0=mysqli_num_rows($result3);

?>
<html>
<head>
  <title>Mor Gaon : MyEVillage</title>
    <meta charset="UTF-8">
    <meta name="description" content="Ham hamesh aapko gaon me hone wali sundar ghatnao aur parivartano se avgat karate rahenge, MorGaon">
    <meta name="keywords" content="mor gaon, myevillage, mor gaon ki jankari, khairjhiti kala, gaon, dukano ka vivran, dukan,evillage, mor gaon me suchna kaise dale ">
    <meta name="author" content="Manish Patel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">
<h3 style="color:white;font-size:17px;background:grey;border-radius:5px;padding:5px">&#2309;&#2346;&#2344;&#2375; &#2346;&#2379;&#2360;&#2381;&#2335; &#2325;&#2379; edit &#2325;&#2352;&#2375;&#2306; &#2351;&#2366; &#2348;&#2342;&#2354;&#2375; :</h3><br>
<form class="form" method="POST"  autocomplete="off">

  <div class="form-group">
    <label for="uname">Headline( शीर्षक ) :</label>
    <input class="form-control" type="text" name="title" value="<?php echo htmlspecialchars($row["title"], ENT_QUOTES, 'UTF-8');?>">
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>

<div class="form-group">
    <label for="uname">सूचना  :</label>
    <textarea class="form-control" name="content" rows="5"><?php echo htmlspecialchars($row["content"], ENT_QUOTES, 'UTF-8');?></textarea required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>


   <div class="form-group">
    <label for="uname">गांव :</label>
    <select class="custom-select" name="village" required>
    <option selected><?php echo htmlspecialchars($row["village"], ENT_QUOTES, 'UTF-8');?></option>
   <?php
while($row0=mysqli_fetch_assoc($result3))
{
?>
    <option value="<?php echo $row0["village"]; ?>"><?php echo $row0["village"]; ?></option>
    
<?php 
}
?>  
  </select>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
</div>
<input type="submit" name="submit" class="btn btn-primary" >

</form>
</div>
</body>
</html>