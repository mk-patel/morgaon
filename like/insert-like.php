<?php

/**
* This page inserts like actions into database.
*/

/**
* This ("identification.php") file contains User Authentication code.
* This ("identification.php") file contains Database Connection code.
* It checks the user existency in database.
*/
require_once '../control/identification.php';

date_default_timezone_set('Asia/Calcutta');
$dt1=date("d-m-Y");
$dt2=date("H:i A");
if (isset($_POST['like'])){
	$id = $_POST['id'];
	$user_id_query="select user_id from post where post_id=$id";
	$user_id_result=mysqli_query($conn,$user_id_query);
	$user_id_row = mysqli_fetch_assoc($user_id_result);
	$user_id=$user_id_row['user_id'];
	$query=mysqli_query($conn,"select id from `like_unlike` where postid='$id' and userid='$mid'") or die(mysqli_error());
	if(mysqli_num_rows($query)>0){
		mysqli_query($conn,"delete from `like_unlike` where userid='$mid' and postid='$id'");
		mysqli_query($conn, "delete from notification where user_id='$mid' and post_id='$id' and type='likes'");
		mysqli_query($conn, "delete from notification where user_id='$mid' and post_id='$id' and type='likes'");
	}
	else{
		mysqli_query($conn,"insert into `like_unlike` (userid,postid) values ('$mid', '$id')");
		mysqli_query($conn, "insert into notification(user_id,post_id,owner_id,type,date1,date2) values ('$mid','$id','$user_id','likes','$dt2','$dt1')");
	}
}		
?>