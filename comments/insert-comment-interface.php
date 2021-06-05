<?php

/**
* This page inserts comments of the posts. 
*/

/**
* This ("identification.php") file contains User Authentication code.
* This ("identification.php") file contains Database Connection code.
* It checks the user existency in database .
*/
require_once '../control/identification.php';

// Setting up time zone.
date_default_timezone_set('Asia/Calcutta');
$dt1=date("d-m-Y");
$dt2=date("H:i A");

// When user submitted a comment then this will insert the data into comments table.
if(isset($_POST['user_comm'])){
	$comment=$_POST['user_comm'];
	$id=$_POST['post_id'];
	$sql=mysqli_query($conn, "select user_id from post where post_id='$id'");
	$row=mysqli_fetch_assoc($sql);
	$user_id = $row['user_id'];
	$insert=mysqli_query($conn,"insert into comments (comment,post_id,user_id,date2,date1) values('$comment','$id','$user_id','$dt2','$dt1')");
	mysqli_query($conn, "insert into notification(user_id,post_id,owner_id,type,date1,date2) values ('$mid', '$id', '$user_id', 'commented on','$dt2','$dt1')");
	$select=mysqli_query($conn,"select comment,c.user_id,date1,date2,user_name from comments c inner join user u on c.user_id=u.user_id where comment='$comment' and date2='$dt2' and date1='$dt1' and post_id='$id'");
	if($row=mysqli_fetch_array($select)){
		$name=$row['user_name'];
		$comment=$row['comment'];
		$time=$row['date2'];
		$time1=$row['date1'];
		$pro = $row["user_id"];
	?>
		<div class="comment-sec"> 
			<a href="showprofile.php?eid=<?php echo $pro;?>">
				<h3><?php echo $name;?></h3>
			</a>
			<p><?php echo $comment;?></p>	
			<p><?php echo $time;?> . <?php echo $time1;?></p>
		</div>
		<hr/>
	<?php
	}
	exit;
}
?>