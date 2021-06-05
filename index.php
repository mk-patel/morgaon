<?php
require_once 'control/db.php';
session_start();
if(isset($_POST["submit"])){
	$un = mysqli_real_escape_string($conn, $_POST['username']);
    $un = trim($un);
	$pwdd = mysqli_real_escape_string($conn, $_POST['password']);
    $pwd = md5($pwdd);
    $pwd = sha1($pwd);
	if(empty($un) || empty($pwdd)){
        $_SESSION['message_login'] = "Username And Password Is Empty !!";
        header("location:login/login.php");
	}
	else{
		$sql="SELECT * FROM user WHERE username='$un'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck < 1){
			$_SESSION['message_login'] = "User Not Exist !!";
			header("location:login/login.php");
		}
		else{
            $row = mysqli_fetch_assoc($result);
			if($pwd != $row["password"]){
					$_SESSION['message_login'] = "Wrong Username or Password !!";
					header("location:login/login.php");
			}
			else if($pwd == $row["password"]){
				$_SESSION["username"] = $row["username"];
				$_SESSION["password"] = $row["password"];
				if(!empty($_POST["remember"])){
					setcookie ("username",$un,time()+(30 * 24 * 60 * 60));
					setcookie ("password",$pwdd,time()+(30 * 24 * 60 * 60));
				}
				else{
					if(isset($_COOKIE["username"])){
						setcookie ("username","");
					}
					if(isset($_COOKIE["password"])){
						setcookie ("password","");
					}
				}
				header("location: home/home.php");
			}
			else{
				 $_SESSION['message_login'] = "Wrong Username or Password !!";
				 header("location: login/login.php");
			}
		}
	}
}
else{
	if(isset($_COOKIE["username"]) && isset($_COOKIE["password"])){
		$un =$_COOKIE["username"];
        $un = trim($un);
	    $pwdd =$_COOKIE["password"];
        $pwd = md5($pwdd);
        $pwd = sha1($pwd);
	    if(empty($un) || empty($pwdd)){
        	$_SESSION['message_login'] = "Username And Password Is Empty !!";
			header("location:login/login.php");
	    }else{
			$sql="SELECT * FROM user WHERE username='$un'";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);
			if($resultCheck < 1){
				$_SESSION['message_login'] = "User Not Exist !!";
				header("location:login/login.php");
			}
			else{
				$row = mysqli_fetch_assoc($result);
				if($pwd != $row["password"]){
						$_SESSION['message_login'] = "Wrong Username or Password !!";
						header("location:login/login.php");
				}
				else if($pwd == $row["password"]){
					session_start();
					$_SESSION["username"] = $row["username"];
					$_SESSION["password"] = $row["password"];
					header("Location: home/home.php");
				}
				else{
					$_SESSION['message_login'] = "Please Login Carefully !!";
					header("location:login/login.php");
				}
			}
		}
	}
	else{
		$_SESSION['message_login'] = "Please Login Carefully !!";
		header("location:login/login.php");
	}
}
?>