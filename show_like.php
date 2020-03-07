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
$name=$row["name"];
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

<?php
   $mid=$row["id"];
   $type="own";
	if (isset($_POST['showlike'])){
		$id = $_POST['id'];
		$query2=mysqli_query($conn,"select * from `like_unlike` where postid='$id' and type='$type'");
		echo mysqli_num_rows($query2);	
	}
?>