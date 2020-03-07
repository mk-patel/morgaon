<?php
require 'db.php';
if(isset($_COOKIE["username"]) && isset($_COOKIE["password"])){
    $unn =$_COOKIE["username"];
    $un = trim($unn);
	$pwdd =$_COOKIE["password"];
    $pwd = md5($pwdd);
    $pwd = sha1($pwd);
	if(empty($un) || empty($pwdd)){
        	header('location:login.php');
			exit();
	}
	else{
		$sql="SELECT * FROM users WHERE username='$un'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck < 1){
			header('location:login.php');
			exit();
		}
		else{
            $row = mysqli_fetch_assoc($result);
			if($pwd !== $row["password"]){
					header('location:login.php');
			exit();
				}
				else if($pwd == $row["password"]){
					session_start();
					$_SESSION["username"] = $row["username"];
					$_SESSION["password"] = $row["password"];
					header("Location: welcome.php");
				}
				else{
					header('location:login.php');
			exit();
				}
			}
			
		}
}else{
	header('location:login.php');
exit();
}
		?>