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
$nu=$row['name'];
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
$type="all";
$mid=$row["id"];
 date_default_timezone_set('Asia/Calcutta');
 $dt1=date("d-m-Y");
 $dt2=date("H:i A");
if (isset($_POST['like'])){
		$id = $_POST['id'];
		$sql=mysqli_query($conn, "select user_id from post where id1='$id'");
$row=mysqli_fetch_assoc($sql);
$user_id = $row['user_id'];
		$query=mysqli_query($conn,"select * from `like_unlike` where postid='$id' and userid='$mid' and type='$type'") or die(mysqli_error());
 
		if(mysqli_num_rows($query)>0){
			mysqli_query($conn,"delete from `like_unlike` where userid='$mid' and postid='$id' and type='$type'");
			mysqli_query($conn, "delete from notification where user_id='$user_id' and post_id='$id' and type='likes' and post_type='showmoreall.php'");
		
		}
		else{
			mysqli_query($conn,"insert into `like_unlike` (userid,postid,type) values ('$mid', '$id','$type')");
			mysqli_query($conn, "insert into notification(name,user_id,post_id,type,post_type,date1,date2) values ('$nu','$user_id','$id','likes','showmoreall.php','$dt2','$dt1')");
		
		}
	}		
?>