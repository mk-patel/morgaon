<?php

// Starting the session to keep the user logged in.
session_start();

// This ("db.php") file contains Database Connection code.
require_once 'db.php';

/**
* Taking username and password from session.
* Validating the user.
*/
$user = $_SESSION["username"];
$password = $_SESSION["password"];
$query = "select user_id,username,password from user where username='$user' and password='$password'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$mid = $row["user_id"];
if(empty($user) || empty($password)){
	header("location: ../index.php");
	exit();
	}
else if($_SESSION["username"] != $row["username"]){
	header("location: ../index.php");
	exit();
}
else if($password != $row["password"]){
	header("location: ../index.php");
	exit();
}
?>