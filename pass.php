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
<html>
<head>
    <title>Mor Gaon : MyEVillage</title>
	<meta charset="UTF-8">
    <meta name="description" content="Ham hamesh aapko gaon me hone wali sundar ghatnao aur parivartano se avgat karate rahenge, MorGaon">
    <meta name="keywords" content="mor gaon, myevillage, mor gaon ki jankari, khairjhiti kala, gaon, dukano ka vivran, dukan, ">
    <meta name="author" content="Manish Patel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<?php
if(isset($_POST["submit2"]))
{
$eid=$_REQUEST["id"];
    $password = $mysqli->real_escape_string($_POST['pass']);
	$cpassword = $mysqli->real_escape_string($_POST['cpass']);
	if(empty($password) || empty($cpassword)){
        header("Location: welcome.php");
          exit();

	}else{
	if($password == $cpassword){
		$pass = $mysqli->real_escape_string($_POST['pass']);
		$psw=md5($pass);
		$sh=sha1($psw);
		
		$sql = "UPDATE users SET password='$sh' where id='$eid'";
		mysqli_query($conn, $sql);
		echo "<br>";
		echo "<br>";
		echo "<div style='text-align:center;font-weight:700;'>New Password is  $pass </div>";
		echo "<br>";
		echo "<div style='text-align:center;font-weight:700;'><p>Successful, Password has benn changed</p></div>";
		echo "<p style='text-align:center;'><a style='text-align:center;color:red;font-size:20px;font-weight:700;' href='welcome.php'>Back</a></p>";
		echo "<br>";
	}else{
		echo "<div style='text-align:center;font-weight:700;'><p>Fail, Password Not Changed</p></div>";
		echo "<p style='text-align:center;'><a style='text-align:center;color:red;font-size:20px;font-weight:700;' href='welcome.php'>Back</a></p>";
	}
}
}else{
    echo "Please Try Again";
}
?>
</body>
</html>