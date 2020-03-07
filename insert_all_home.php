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
require 'db.php';
$query="select * from users where username='$user'";
$result = mysqli_query($conn, $query);
$row=mysqli_fetch_assoc($result);
$id=$row["id"];
if(isset($_POST['user_comm'])){
	$content = $mysqli->real_escape_string($_POST['user_comm']);
	$village = $mysqli->real_escape_string($_POST['village']);
    date_default_timezone_set('Asia/Calcutta');
	$dt2=date("d-m-Y");
	$dt1=date("H:i A");
    $image = "images/default.jpg";
    $sql = "INSERT INTO post(uname,content,village,dt1,dt2,user_id,image)"
         . "VALUES('$user','$content','$village','$dt1','$dt2','$id','$image')";
            mysqli_query($conn,$sql);
}
?>