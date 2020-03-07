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
<!DOCTYPE html>
<html>
<head>
 <title>MorGaon : MyEVillage | Digital Village</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
	padding: 50px 0 100px;
	
}
.all{
      width:100%;
	  height:auto;
	  background:grey;
}
.left-side{
    float:left;
	width:100%;
	height:auto;
    background:rgba(0,0,0,0.02);;
    border-radius:1px solid grey;	  
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
}
.l-side{
      float:left;
	  width:100%;
	  height:auto;
	  background:white;
	  border-radius:2px;
	  border:0.7px solid rgba(0,0,0,0.09);
	  background:rgba(0,0,0,0.02);
}
.l-side p{
      float:left;
	  width:90%;
	  height:auto;
	  margin-right:15px;
	  margin-bottom:6px;
	  margin-top:6px;
	  margin-left:20px;
	  font-size:14px;
	  border-radius:2px;
	  color:rgba(0,0,0,0.7);
}

.dropdown{
	margin-top:20px;
	margin-left:20px;
	
	
}
.navbar-brand img{
	width:60px;
	height:40px;
}


.col-sm-6 h1{
	font-size:30px;
	color:darkorange;
}
.col-sm-6 h2{
	font-size:21px;
	color:grey;
}


.dukan{
	font-size:18px;
	font-weight:800;
	margin-bottom:13px;
	text-align:center;
	color:darkorange
}
.footer-but{
	color:white;
	font-size:16px;
	text-align:center;
	background:rgba(0,0,0,0.05);
	border-radius:4px;
	border:1px solid orange;
}
.footer-but a{
	color:darkorange;
	margin:1px;
}
.showimg {
	width:100%;
	height:auto;
	background:white;
	text-align:center;
}
.showimg img {
	width:auto;
	height:50%;
	background:white;
	text-align:center;
}
.col-sm-6 h3{
	font-size:14px;
	color:orange;
	font-weight:700;
}
.show img{
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
@media screen and (max-width:700px){
	
	
.col-sm-6 h1{
	font-size:24px;
	color:darkorange;
}
.col-sm-6 h2{
	font-size:16px;
	color:grey;
}
.col-sm-6 h3{
	font-size:14px;
	color:orange;
	font-weight:700;
}
.footer-but{
	width:100px;
	font-size:12px;
	text-align:center;
	background:rgba(0,0,0,0.05);
	border-radius:3px;
	border:1px solid orange;
	color:white;
	
}
.footer-but a{
	color:darkorange;
	width:100px;
	margin:1px;
}
.showimg {
	width:100%;
	height:auto;
	background:white;
	text-align:center;
}
.showimg img {
	width:90%;
	height:auto;
	background:white;
	text-align:center;
}
	
}
</style>


</head>
<body>

<header class="header">
	 <nav class="navbar navbar-expand-md bg-primary navbar-light">
  <!-- Brand -->
  <a class="navbar-brand" href="index.php"><img src="images/home.png" alt="home" title="home"/></a>
  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item" style="font-weight:1000;">
        <a class="nav-link" href="index.php"><b>होम</b></a>
      </li>
      <li class="nav-item" style="font-weight:800;">
        <a class="nav-link" href="form.php">रजिस्टर</a>
      </li>
     
      <li class="nav-item" style="font-weight:800;">
        <a class="nav-link" href="ourgoal.html">उद्देश्य</a>
      </li>
      <li class="nav-item" style="font-weight:800;">
        <a class="nav-link" href="aboutus.html">हमारे बारे में</a>
      </li>
      	  <li class="nav-item" style="font-weight:800;">
        <a class="nav-link" href="contactus.html">संपर्क करेंं</a>
      </li>
      <li class="nav-item" style="font-weight:800;">
        <a class="nav-link" href="privacypolicy.html">गोपनीयता सुविधा</a>
      </li>
    
	</ul>
  </div>
</nav>

     </header>
<br>
<body>
<div>
	<?php
if(isset($_REQUEST["eid"]))
{
$eid=$_REQUEST["eid"];
}
$query="select * from post inner join users on post.user_id=users.id where post.id1='$eid'";
$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_array($result))
{
	$post_id=$row["id1"];
	$type = "allvillage";
$type1 = "all";
$sql1 = "SELECT * FROM comments WHERE post_id='$post_id' && type='$type'";
$result09 = mysqli_query($conn, $sql1);
$count1 = mysqli_num_rows($result09);
?>
<div class="container">
<h2 style="color:darkorange;font-weight:700;font-size:18px;"><?php echo $row["village"]; ?> &#2325;&#2368; &#2360;&#2370;&#2330;&#2344;&#2366; / &#2346;&#2379;&#2360;&#2381;&#2335;...</h2>
<hr style="border:2px solid green"/>
<br>

<div class="all">
      <div class="left-side">
	<a href="showprofile.php?eid=<?php echo $row["user_id"];?>"><div class="show"><img class="img-responsive img-thumbnail" src="<?php echo $row["avatar"]; ?>" /></div>
    <h4 style="color:rgb(153, 0, 51);margin-left:67px; font-size:14px;line-height:20px;"><?php echo htmlspecialchars($row["name"], ENT_QUOTES, 'UTF-8');?></h4></a>
		  <p style="margin-left:67px;"><?php echo htmlspecialchars($row["village"], ENT_QUOTES, 'UTF-8'); ?><br>
		  <?php echo htmlspecialchars($row["dt1"], ENT_QUOTES, 'UTF-8'); ?> . <?php echo htmlspecialchars($row["dt2"], ENT_QUOTES, 'UTF-8');?></p>
          
	  </div>
<div class="l-side">  

        <p><?php echo htmlspecialchars($row["title"], ENT_QUOTES, 'UTF-8');?></p>
        <p><?php
	    $text = htmlspecialchars($row["content"], ENT_QUOTES, 'UTF-8');
		echo nl2br("$text\n");
		?></p>
		<p>
						<?php
							$query1=mysqli_query($conn,"select * from `like_unlike` where postid='".$row['id1']."' and userid='$mid' and type='all'");
							if (mysqli_num_rows($query1)>0){
								?>
								<button  value="<?php echo $row['id1']; ?>" class="unlike">Unlike</button>
								<?php
							}
							else{
								?>
								<button value="<?php echo $row['id1']; ?>" class="like">Like</button>
								<?php
							}
						?>
					<span id="show_like<?php echo $row['id1']; ?>" class="likenum">
						<?php
							$query3=mysqli_query($conn,"select * from `like_unlike` where postid='".$row['id1']."' and type='all'");
							echo mysqli_num_rows($query3);
						?>
					</span> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; <button class="comm"><img style="width:17px;height:16px;" src="images/comm.jpg"> <?php echo $count1; ?></button> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; <button class="comm"> Share </button>

		</p>
		
		</div>
		
		
		</div>
		<div class="showimg"> <?php echo "<p>" ?> <img class="img-responsive img-thumbnail" src="<?php echo htmlspecialchars($row["image"], ENT_QUOTES, 'UTF-8');?>" ><?php echo "</p>" ?></div>
			<?php
		}
	?>
</div>
	
<script type = "text/javascript">
	$(document).ready(function(){
 
		$(document).on('click', '.like', function(){
			var id=$(this).val();
			var $this = $(this);
			$this.toggleClass('like');
			if($this.hasClass('like')){
				$this.text('Like'); 
			} else {
				$this.text('Unlike');
				$this.addClass("unlike"); 
			}
				$.ajax({
					type: "POST",
					url: "like_all.php",
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
					url: "like_all.php",
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
			url: 'show_like_all.php',
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
<form class="form" method='post' action="" onsubmit="return post();">
  <textarea class="form-control" id="comment" placeholder="Type Something..."></textarea>
  <br>
  <input type="hidden" id="username" value="<?php echo $post_id; ?>">

  <input class="btn btn-warning" type="submit" value="Post">
  </form>
<br>
  <div id="all_comments">
  <?php
    $host="localhost";
    $username="root";
    $password="";
    $databasename="accounts";

    $connect=mysqli_connect($host,$username,$password);
    $db=mysqli_select_db($connect,$databasename);
  
    $comm = mysqli_query($conn,"select name,comment,user_id,date2,date1 from comments where post_id='$post_id' and type='allvillage' order by id desc");
    while($row=mysqli_fetch_array($comm))
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
    ?>
  </div>
</div>
<script type="text/javascript">
function post()
{
  var comment = document.getElementById("comment").value;
  var name = document.getElementById("username").value;
  if(comment && name)
  {
    $.ajax
    ({
      type: 'post',
      url: 'insert_comments_all.php',
      data: 
      {
         user_comm:comment,
	     user_name:name
      },
      success: function (response) 
      {
	    document.getElementById("all_comments").innerHTML=response+document.getElementById("all_comments").innerHTML;
	    document.getElementById("comment").value="";
  
      }
    });
  }
  
  return false;
}
</script>
</body>
</html>