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
if(empty($user) || empty($password)){
       header("location: login.php");
         exit();
	}else{
if ($_SESSION["username"] == $row["username"])
	{
		echo "Welcome ! ";
	}else{
		header("location: login.php");
        exit();
	}
 if ($password == $row["password"])
 {
	 echo $row["username"];
    
 }else{
         header("location: login.php");
         exit();
 }
}	
?>
<?php
if(isset($_REQUEST["eid"]))
{
$eid=$_REQUEST["eid"];
$query="select * from users where id='$eid'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>



<div class="container">
<p style="color:red;text-align:center;">Are You Sure !! <br>
After Deletion You Will Not Able To Reactivate It, <br>
Every Posts And Shops Will Be Deleted.</p>
<p style="color:green;font-weight:700;text-align:center;">Thankyou For Using Our Service !!<br>
Please <a href="feedback.html">Send Us A Feedback</a> So We Can Improve Our Plateform To Provide A Better Experience.<br>
</p>
<p style="font-weight:700;text-align:center;">Click Bellow To Delete Your Account</p>
<div style="color:white;background:red;text-align:center;"><a href="delete.php?delid=<?php echo $row['id']; ?>"><button class="btn btn-danger">Delete Your Account</button></a></div>

</div>
<?php
if(isset($_REQUEST["delid"]))
{
	$delid = $_REQUEST["delid"];
	$sql = "DELETE FROM post WHERE user_id = '$delid'";
	$sql1 = "DELETE FROM khairjhitikalan WHERE user_id = '$delid'";
	$sql2 = "DELETE FROM khairjhitishop WHERE user_id = '$delid'";
	$sql2 = "DELETE FROM users WHERE id = '$delid'";
	mysqli_query($conn, $sql);
	mysqli_query($conn, $sql1);
	mysqli_query($conn, $sql2);
	mysqli_query($conn, $sql3);
    header('location:index.php');
	}
?>

</body>
</html>