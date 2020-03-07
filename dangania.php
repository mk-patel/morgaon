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
$gaon1 = $row["village"];
$mid = $row["id"];
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
<html>
<head>
  <title>MorGaon : MyEVillage | Digital Village</title>
	<meta charset="UTF-8">
    <meta name="description" content="Ham hamesh aapko gaon me hone wali sundar ghatnao aur parivartano se avgat karate rahenge, MorGaon : MyEVillage | Digital Village">
    <meta name="keywords" content="mor gaon, myevillage, mor gaon ki jankari, khairjhiti kala, gaon, dukano ka vivran, dukan,evillage, mor gaon me suchna kaise dale,khairjhiti kalan,mor gaon news">
    <meta name="author" content="Manish Patel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="100">
    <meta name="google-site-verification" content="CP0yURNQf3rrO3ySzuzJyxSFrfrwpNZgWkWl9PjezaQ" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-124860852-3"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-124860852-3');
    </script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<style>

*{
    padding:0px;
	margin:0px;  
}

.banner{
	height:auto;
	background-position:center;
	padding: 0px 0 100px;
}
body{
    background:white;
}
.row{
	background:white;
}
.all{
    width:100%;
	height:auto;
    box-shaddow:1px 2px 5px;	
}
.left-side{
    float:left;
	width:100%;
	height:auto;
    background:#fcfcfc;
    border-radius:8px solid white;	  
}
.left-side h4 {
      margin:2px;
	  padding:0px;
	  font-weight:700;
	  color:rgb(153, 0, 51);
	  font-size:14px;
	  margin-left:10px;  
}
.left-side p{
      margin:0px;
	  font-weight:700;
	  color:grey;
	  font-size:12px;
	  margin-left:10px;
	  background:#fcfcfc;
}
.l-side{
      float:left;
	  width:100%;
	  height:auto;
	  background:#fcfcfc;
	  border-radius:2px;
	  border-radius:8px solid white;  
}
.l-side p{
      background:#fcfcfc;
	  width:90%;
	  height:auto;
	  margin-right:15px;
	  margin-bottom:6px;
	  margin-top:0px;
	  margin-left:20px;
	  font-size:14px;
	  border-radius:2px;
	  font-weight:650;
	  color:rgba(0,0,0,0.7);
}
.dropdown{
	
}
.navbar-brand img{
	width:60px;
	height:40px;
}
.col-sm-6 h1{
	font-size:30px;
	color:darkorange;
}
.col-sm-6 h4{
	font-size:21px;
	color:grey;
}
.dukan{
	font-size:16px;
	font-weight:800;
	margin-bottom:1px;
	text-align:center;
	color:darkorange;
}
.footer-but{
	color:rgba(0,0,0,0.8);
	font-size:14px;
	text-align:center;
	background:#FFFFFF;
	border-radius:4px;	
}
.footer-but a{
	color:rgba(0,0,0,0.5);
	margin:1px;
}
.col-sm-6 h{
	font-size:14px;
	color:orange;
	font-weight:700;
}
.showimg img{
	width:60px;
	height:60px;
	border-radius:50%;
	float:left;
}
.like{
	width:60px;
	background:white;
	border:1px solid grey;
	border-radius:15px;
	font-size:12px;
	font-weight:700;
	color:grey;
	padding:3px;
}
.unlike{
	width:60px;
	background:white;
	border:1px solid grey;
	border-radius:15px;
	font-size:12px;
	font-weight:700;
	color:#7db7f5;
	padding:4px;
}
.like1{
	width:60px;
	background:white;
	border:1px solid grey;
	border-radius:15px;
	font-size:12px;
	font-weight:700;
	color:grey;
	padding:3px;
}
.unlike1{
	width:60px;
	background:white;
	border:1px solid grey;
	border-radius:15px;
	font-size:12px;
	font-weight:700;
	color:#7db7f5;
	padding:4px;
}
.comm{
	background:white;
	width:60px;
	border:1px solid grey;
	border-radius:15px;
	font-size:12px;
	font-weight:700;
	color:grey;
	padding:3px;
}
.likenum{
	color:grey;
	font-weight:700;
}
.instant{
	padding:8px;
}
.instant #comment{
	width:100%;
	padding:5px;
}
.instant #submit{
	width:60px;
	background:lightblue;
	border:1px solid grey;
	border-radius:15px;
	font-size:12px;
	font-weight:700;
	color:grey;
	padding:3px;

}
.instant #comment1{
	width:100%;
	padding:5px;
}
.instant #submit1{
	width:60px;
	background:lightblue;
	border:1px solid grey;
	border-radius:15px;
	font-size:12px;
	font-weight:700;
	color:grey;
	padding:3px;

}
@media screen and (max-width:700px){
.col-sm-6 h1{
	float:left;
	font-size:23px;
	color:darkorange;
}
.col-sm-6 h4{
	font-size:14px;
	color:grey;
}
.col-sm-6 h2{
	float:right;
	font-size:13px;
	color:orange;
	font-weight:700;
}
.col-sm-6 p{
	font-size:13px;
	color:black;
}
.footer-but{
	width:95px;
	font-size:10px;
	text-align:center;
    background:#FFFFFF;
	color:rgba(0,0,0,0.6);
}
.footer-but a{
    color:rgba(0,0,0,0.6);
    background:#FFFFFF;
}
}
</style>
</head>
<body>
<?php
$sql0 = "SELECT * FROM notification where user_id='$mid'";
$result0 = mysqli_query($conn, $sql0);
$rowcount0=mysqli_num_rows($result0);
$sql1 = "SELECT * FROM notification where user_id='$mid' and user_seen='1'";
$result1 = mysqli_query($conn, $sql1);
$rowcount1=mysqli_num_rows($result1);
$row=mysqli_fetch_array($result1);
if($rowcount0 == $rowcount1){
	$commnt="commnothas.png";
}
else{
	$commnt="commhas.jpg";
}
?>
<?php
require 'db.php';
if(isset($_REQUEST["eid"]))
{
$eid=$_REQUEST["eid"];
}
?>
<?php

$sql = "SELECT * FROM villagedetails";
$result1 = mysqli_query($conn, $sql);
$rowcount=mysqli_num_rows($result1);
?>


<div class="container">

   <div class="row">
   <div style="width:100%;float:left;margin-top:5px;margin-bottom:10px;"></div>
	  <div class="col-sm-6">
	      <h1 style="font-weight:800;"><span>मोर गांव  &nbsp;
<button style="font-size:12px;" type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
       Search Village <b>:</b>
</button>
<div class="dropdown-menu">         
<?php
while($row0=mysqli_fetch_assoc($result1))
{
?>
   <a class="dropdown-item" href="dangania.php?eid=<?php echo $row0["village"]; ?>"><?php echo $row0["village"]; ?></a>
<?php 
}
?>
 
</div><a style="background:white;margin-bottom:px;border-radius:10px;font-weight:700;font-size:12px;padding:0px;" href="notifications.php"><img src="images/<?php echo $commnt; ?>" width="30px" height="30px"></a>
</span></h1>
		  <h2><a href="welcome.php"><button style="font-size:12px;" type="button" class="btn btn-info">Profile</button></a></h2>
		  

	       
         
</div>


	<div class="col-sm-6">


<div class="d-flex justify-content-between" style="width:100%;height:auto;margin-top:10px;font-size:10px;">
      <div class="footer-but" style="width:20%;font-weight:800;margin-top:10px;margin-bottom:10px;">    
       <a href="khairjhiti kalashop.php?eid=<?php echo $eid; ?>"><img src="images/shop1.jpg" alt="shop" width="40px" height="40px"><br>दुकान<br>( Shop ) </a> 
      </div>
      <div class="footer-but" style="width:20%;font-weight:800;margin-top:10px;margin-bottom:10px;">    
       <a href="tution.php?eid=<?php echo $eid; ?>"><img src="images/tution.jpg" alt="tution" width="40px" height="40px"><br>शिक्षण सुविधा<br>( Tution )</a> 
      </div>
      <div class="footer-but" style="width:20%;font-weight:800;margin-top:10px;margin-bottom:10px;">    
       <a href="bus.php?eid=<?php echo $eid; ?>"><img src="images/bus.jpg" alt="Bus" width="40px" height="40px"><br>बस सुविधा<br>( Bus )</a> 
      </div>
     <div class="footer-but" style="width:20%;font-weight:800;margin-top:10px;margin-bottom:10px;">
        <a href="khairjhitidetails.php?eid=<?php echo $eid; ?>" ><img src="images/village.jpg" alt="village" width="40px" height="40px"><br>जानकारी<br>( Village Info )</a>
      </div>
</div>



    </div>	
<div style="width:100%;float:left;margin-top:5px;margin-bottom:15px;"></div>	
</div>

</div>

<div class="container">

<div class="dukan" style="background:orange; width:100%;height:30px;line-height:30px;border-radius:7px;color:white;">हाल ही में ( वर्तमान में ) <?php echo $eid ?> में</div>

<div class="container">
<div class="instant">
<form class="form" action=""  onsubmit="return post();" method="post" enctype="multipart/form-data" autocomplete="off">

<div class="form-group">
  <textarea class="form-control" rows="2" id="comment" name="content1" placeholder="Type Something..." required></textarea>
  <button type="submit" id="submit" >Post</button>
</div>

<input type="hidden" id="vill" value="<?php echo $eid; ?>">
</form>
<hr style="border:1px solid grey">
</div>
</div>
<script type="text/javascript">
function post()
{
  var comment = document.getElementById("comment").value;
  var village = document.getElementById("vill").value;
  if(comment)
  {
    $.ajax
    ({
      type: 'post',
      url: 'insert_vill_home.php',
      data: 
      {
         user_comm:comment,
		 village:village
		 },
      success: function (response) 
      {
	    document.getElementById("comment").value="";
		location.reload();
      }
    });
  }
  
  return false;
}
</script>



<?php
$gaon1='Khairjhiti Kala';
$query = "select * from khairjhitikalan inner join users on khairjhitikalan.user_id=users.id where khairjhitikalan.gaon='$eid' order by khairjhitikalan.id1 desc limit 0,4";
$query7=mysqli_query($conn, $query);
$rowcount1 = mysqli_num_rows($query7);

?>

<?php
while($row2 = mysqli_fetch_assoc($query7))
{$post_id=$row2["id1"];
$type = "ownvillage";
$type1 = "own";
$sql1 = "SELECT * FROM comments WHERE post_id='$post_id' && type='$type'";
$result09 = mysqli_query($conn, $sql1);
$count = mysqli_num_rows($result09);

?>
<div class="all">
      <div class="left-side">
	<a href="showprofile.php?eid=<?php echo $row2["user_id"];?>"><div class="showimg"><img class="img-responsive img-thumbnail" src="<?php echo $row2["avatar"]; ?>" /></div>
    <h4 style="color:rgb(153, 0, 51);margin-left:67px; font-size:14px;line-height:20px;"><?php echo htmlspecialchars($row2["name"], ENT_QUOTES, 'UTF-8');?></h4></a>
		  <p style="margin-left:67px;"><?php echo htmlspecialchars($row2["village"], ENT_QUOTES, 'UTF-8'); ?><br>
		  <?php echo htmlspecialchars($row2["date1"], ENT_QUOTES, 'UTF-8'); ?> . <?php echo htmlspecialchars($row2["date2"], ENT_QUOTES, 'UTF-8'); ?></p>
          <hr style="margin-top:8px"/>
      </div>
<div class="l-side">  
        <a href="showmore.php?eid=<?php echo $row2["id1"];?>"><p style="color:green;font-size:14px;font-weight:700"><?php echo htmlspecialchars($row2["title"], ENT_QUOTES, 'UTF-8');?></p> 
        <p style="font-size:15px;font-weight:500;margin-bottom:10px;"><?php
	    $text2 = htmlspecialchars($row2["data"], ENT_QUOTES, 'UTF-8');
		echo nl2br("$text2\n");
		?></p></a>
		<hr/>
				<p>
 
						<?php
							$query1=mysqli_query($conn,"select * from `like_unlike` where postid='".$row2['id1']."' and type='$type1' and userid='$mid'");
							if (mysqli_num_rows($query1)>0){
								?>
								<button  value="<?php echo $row2['id1']; ?>" class="unlike">Liked</button>
								<?php
							}
							else{
								?>
								<button value="<?php echo $row2['id1']; ?>" class="like">Like</button>
								<?php
							}
						?>
					<span id="show_like<?php echo $row2['id1']; ?>" class="likenum">
						<?php
							$query3=mysqli_query($conn,"select * from `like_unlike` where postid='".$row2['id1']."' and type='$type1'");
							echo mysqli_num_rows($query3);
						?>
					</span> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; <a href="showmore.php?eid=<?php echo $row2["id1"];?>"><button class="comm"><img style="width:17px;height:16px;" src="images/comm.jpg"> <?php echo $count; ?></button></a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; <button class="comm"> <a style="color:grey" href="whatsapp://send?text=<?php echo $row2['data']; ?>">Share</a> </button>

		</p>
		</div>
		</div>
		<div style="width:100%;float:left;margin-top:10px;margin-bottom:10px;"></div>
<?php
}
?>
<a href="showallkhairjhitikala.php?eid=<?php echo $eid; ?>"><button type="button" class="btn btn-warning" style="color:white;font-weight:800;">सभी देखें</button></a>
</div><br>
<script type = "text/javascript">
	$(document).ready(function(){
 
		$(document).on('click', '.like', function(){
			var id=$(this).val();
			var $this = $(this);
			$this.toggleClass('like');
			if($this.hasClass('like')){
				$this.text('Like'); 
			} else {
				$this.text('Liked');
				$this.addClass("unlike"); 
			}
				$.ajax({
					type: "POST",
					url: "like.php",
					data: {
						id: id,
						like: 1,
					},
					success: function(){
						showLike(id);
					}
				});
		});
 
		$(document).on('click', '.unlike', function(){
			var id=$(this).val();
			var $this = $(this);
			$this.toggleClass('unlike');
			if($this.hasClass('unlike')){
				$this.text('Unlike'); 
			} else {
				$this.text('Like');
				$this.addClass("like"); 
			}
				$.ajax({
					type: "POST",
					url: "like.php",
					data: {
						id: id,
						like: 1,
					},
					success: function(){
						showLike(id);
					}
				});
		});
 
	});
 
	function showLike(id){
		$.ajax({
			url: 'show_like.php',
			type: 'POST',
			async: false,
			data:{
				id: id,
				showlike: 1
			},
			success: function(response){
				$('#show_like'+id).html(response);
 
			}
		});
	}
 
</script>




<div class="container">
<hr/>
<div class="dukan" style="background:orange;margin-bottom:10px; width:100%;height:30px;line-height:30px;border-radius:7px;color:white;">सभी गांवों की सूचनाएं</div>
<div class="container">
<div class="instant">
<form class="form" action=""  onsubmit="return post1();" method="post" enctype="multipart/form-data" autocomplete="off">

<div class="form-group">
  <textarea class="form-control" rows="2" id="comment1" name="content1" placeholder="Type Something..." required></textarea>
  <button type="submit" id="submit1" >Post</button>
</div>

<input type="hidden" id="vill1" value="<?php echo $eid; ?>">
</form>
<hr style="border:1px solid grey">
</div>
</div>
<script type="text/javascript">
function post1()
{
  var comment1 = document.getElementById("comment1").value;
  var village1 = document.getElementById("vill1").value;
  if(comment1)
  {
    $.ajax
    ({
      type: 'post',
      url: 'insert_all_home.php',
      data: 
      {
         user_comm:comment1,
		 village:village1
		 },
      success: function (response) 
      {
	    document.getElementById("comment1").value="";
		location.reload();
      }
    });
  }
  
  return false;
}
</script>
<?php
$query1= "select * from post inner join users on post.user_id=users.id order by post.id1 desc limit 0,20";
$query8=mysqli_query($conn, $query1);
$rowcount1=mysqli_num_rows($query8);
?>
<?php
while($row1 = mysqli_fetch_assoc($query8))
{
    $text5 = htmlspecialchars($row1["title"], ENT_QUOTES, 'UTF-8');
$post_id=$row1["id1"];
$type = "allvillage";
$type1 = "all";
$sql1 = "SELECT * FROM comments WHERE post_id='$post_id' && type='$type'";
$result09 = mysqli_query($conn, $sql1);
$count1 = mysqli_num_rows($result09);

?>
<div class="all">
      <div class="left-side">
	<a href="showprofile.php?eid=<?php echo $row1["user_id"];?>"><div class="showimg"><img class="img-responsive img-thumbnail" src="<?php echo htmlspecialchars($row1["avatar"], ENT_QUOTES, 'UTF-8');?>" ></div>
    <h4 style="color:rgb(153, 0, 51);margin-left:67px; font-size:14px;line-height:20px;"><?php echo htmlspecialchars($row1["name"], ENT_QUOTES, 'UTF-8');?></h4></a>
		  <p style="margin-left:67px;"><?php echo htmlspecialchars($row1["village"], ENT_QUOTES, 'UTF-8'); ?><br>
		  <?php echo htmlspecialchars($row1["dt1"], ENT_QUOTES, 'UTF-8'); ?> . <?php echo htmlspecialchars($row1["dt2"], ENT_QUOTES, 'UTF-8'); ?></p>
		  <hr style="margin-top:8px;"/>
      </div>
<div class="l-side">
<a href="showmoreall.php?eid=<?php echo $row1["id1"];?>"><p style="color:green;font-size:14px;font-weight:700"><?php echo nl2br("$text5\n");?></p>
       <p style="font-size:15px;font-weight:500"><?php
	    $text2 = htmlspecialchars($row1["content"], ENT_QUOTES, 'UTF-8');
		echo nl2br("$text2\n");
		?></p></a>
		<hr/>
						<p>
 
						<?php
							$query1=mysqli_query($conn,"select * from `like_unlike` where postid='".$row1['id1']."' and type='$type1' and userid='$mid'");
							if (mysqli_num_rows($query1)>0){
								?>
								<button  value="<?php echo $row1['id1']; ?>" class="unlike1">Liked</button>
								<?php
							}
							else{
								?>
								<button value="<?php echo $row1['id1']; ?>" class="like1">Like</button>
								<?php
							}
						?>
					<span id="show_like1<?php echo $row1['id1']; ?>" class="likenum">
						<?php
							$query3=mysqli_query($conn,"select * from `like_unlike` where postid='".$row1['id1']."' and type='$type1'");
							echo mysqli_num_rows($query3);
						?>
					</span> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; <a href="showmoreall.php?eid=<?php echo $row1["id1"];?>"><button class="comm"><img style="width:17px;height:16px;" src="images/comm.jpg"> <?php echo $count1; ?></button></a> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; <button class="comm"><a style="color:grey" href="whatsapp://send?text=<?php echo $row1['content']; ?>">Share</a> </button>

		</p>
		</div>
		</div>
		<div style="width:100%;float:left;margin-top:10px;margin-bottom:10px;"></div>
<?php
}
?>
<a href="showall.php?eid=<?php echo $eid; ?>"><button type="button" class="btn btn-warning" style="color:white;font-weight:800;">सभी देखें</button></a>
  <br>
</div>






<script type = "text/javascript">
	$(document).ready(function(){
 
		$(document).on('click', '.like1', function(){
			var id=$(this).val();
			var $this = $(this);
			$this.toggleClass('like1');
			if($this.hasClass('like1')){
				$this.text('Like'); 
			} else {
				$this.text('Liked');
				$this.addClass("unlike1"); 
			}
				$.ajax({
					type: "POST",
					url: "like_all.php",
					data: {
						id: id,
						like: 1,
					},
					success: function(){
						showLike1(id);
					}
				});
		});
 
		$(document).on('click', '.unlike1', function(){
			var id=$(this).val();
			var $this = $(this);
			$this.toggleClass('unlike1');
			if($this.hasClass('unlike1')){
				$this.text('Unlike'); 
			} else {
				$this.text('Like');
				$this.addClass("like1"); 
			}
				$.ajax({
					type: "POST",
					url: "like_all.php",
					data: {
						id: id,
						like: 1,
					},
					success: function(){
						showLike1(id);
					}
				});
		});
 
	});
 
	function showLike1(id){
		$.ajax({
			url: 'show_like_all.php',
			type: 'POST',
			async: false,
			data:{
				id: id,
				showlike: 1
			},
			success: function(response){
				$('#show_like1'+id).html(response);
 
			}
		});
	}
 
</script>

<?php
$query="select * from registration where id='1'";
$result = mysqli_query($conn, $query);
if($row = mysqli_fetch_assoc($result)){
	$count = $row["pageviews"];
	$newcount = $count + 1;
    $update ="update registration set pageviews = '$newcount' where id='1'";
    $result=mysqli_query($conn, $update);
}
?>
<hr/>

<div class="container" style="height:150px;margin-bottom:60px;">
<h1 style="color:grey;font-size:18px;font-weight:700;">हमारा छोटा सा सहयोग देश हित में - </h1><br>

<div  style="float:left;">
<img class="img-responsive img-thumbnail" src="images/modi.jpg" width="155px" height="160px">
</div>
<div style="height:160px;margin-left:160px;" class="align-middle">
<p style="color:grey;margin-left:2px;">
To Provide Digital Infrastructure To Citizens, 
Electronic Delivery Of Government Services Through Web And Mobile.<br> 
- Mr. Narendra Modi, Prime Minister Of India.
</p>
</div>
</div>
<br>
<div class="container">
<div class="container" style="background:#4b4d59;margin-bottom:60px;border-radius:10px;">
<div style="color:white;font-size:18px;font-weight:700;margin-bottom:5px;margin-top:20px;padding:10px;">महत्वपूर्ण लिंक्स : </div>
<p style="color:white;margin-left:20px;font-weight:700;"><a href="aboutus.html" style="color:white;">हमारे बारे में (About)</a></p>
<p style="color:white;margin-left:20px;font-weight:700;"><a style="color:white;" href="ourgoal.html" >उद्देश्य</a></p>
<p style="color:white;margin-left:20px;font-weight:700;"><a style="color:white;" href="contactus.html" >संपर्क सूत्र</a></p>
<p style="color:white;margin-left:20px;font-weight:700;"><a style="color:white;" href="terms.html" >नियम एवं शर्तें (T&C)</a></p>


<p style="color:white;margin-left:20px;margin-bottom:10px;font-weight:700;"><a style="color:white;" href="privacypolicy.html">Privacy Policy</a></p>
</div>
</div>
<hr/>

<div>
<nav class="navbar navbar-expand-sm bg-light navbar-dark fixed-bottom">
 <div class="d-flex justify-content-between" style="width:100%;height:auto;">
      <div class="footer-but" style="width:20%;font-weight:800;">    
       <a href="khairjhiti kalashop.php?eid=<?php echo $eid; ?>"><img src="images/shop.png" alt="shop" width="30px" height="30px"><br>दुकान</a> 
      </div>
      <div class="footer-but" style="width:20%;font-weight:800;">
        <a href="khairjhitidetails.php?eid=<?php echo $eid; ?>" ><img src="images/village.png" alt="village" width="30px" height="30px"><br>जानकारी</a>
      </div>
      <div class="footer-but" style="width:20%;font-weight:800;">
      <a href="members.php"><img src="images/members.png" alt="members" width="30px" height="30px"><br>यूजर्स</a>
      </div>
      <div class="footer-but" style="width:18%;font-weight:800;">
       <a href="feedback.php" ><img src="images/feedback.png" alt="feedback" width="30px" height="30px"><br>सुझाव</a>
      </div>
</div>
</nav>
</div>
<!--Created By Manish Patel-->
</body>
</html>