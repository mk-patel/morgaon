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
$mid=$row["id"];
$nu=$row["name"];
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
 $type="allvillage";
    date_default_timezone_set('Asia/Calcutta');
 $dt1=date("d-m-Y");
 $dt2=date("H:i A");
if(isset($_POST['user_comm']) && isset($_POST['user_name']))
{
  $comment=$_POST['user_comm'];
  $name=$_POST['user_name'];
$sql=mysqli_query($conn, "select user_id from post where id1='$name'");
$row=mysqli_fetch_assoc($sql);
$user_id = $row['user_id'];
 $insert=mysqli_query($conn,"insert into comments (type,name,comment,post_id,user_id,date2,date1) values('$type','$nu','$comment','$name','$mid','$dt2','$dt1')");
  mysqli_query($conn, "insert into notification(name,user_id,post_id,type,post_type,date1,date2) values ('$nu','$user_id','$name','commented on','showmoreall.php','$dt2','$dt1')");
  $select=mysqli_query($conn,"select name,comment,user_id,date2,date1 from comments where name='$nu' and comment='$comment' and date2='$dt2' and date1='$dt1' and post_id='$name' and type='$type'");
  
  if($row=mysqli_fetch_array($select))
  {
	  $name=$row['name'];
	  $comment=$row['comment'];
      $time=$row['date2'];
	  $time1=$row['date1'];
	  $pro = $row["user_id"];
  ?>
      <div class="l-side"> 
	  <a href="showprofile.php?eid=<?php echo $pro;?>"><p style="font-size:15px;color:darkorange;font-weight:700;"><?php echo $name;?></p></a>
      <hr style="margin-top:35px;">
	  <p style="font-weight:700;"><?php echo $comment;?></p>	
	  <p style="font-size:10px;font-weight:700;color:grey;"><?php echo $time;?> . <?php echo $time1;?></p>
	
  </div>
 <div style="width:100%;float:left;margin-top:16px;margin-bottom:6px;"></div> 
  <?php
  }
exit;
}

?>