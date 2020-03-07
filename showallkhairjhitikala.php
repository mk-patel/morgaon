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
$mid = $row["id"];
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
<html>
<head>
  <title>Mor Gaon : MyEVillage | Digital Village</title>
	<meta charset="UTF-8">
    <meta name="description" content="Ham hamesh aapko gaon me hone wali sundar ghatnao aur parivartano se avgat karate rahenge, Mor Gaon : MyEVillage | Digital Village">
    <meta name="keywords" content="mor gaon, myevillage, mor gaon ki jankari, khairjhiti kala, gaon, dukano ka vivran, dukan,evillage, mor gaon me suchna kaise dale ">
    <meta name="author" content="Manish Patel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="60">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>
*{
      padding:0px;
	  margin:0px;
	  
}
body{
	background:white;
}
.banner{
	height:auto;
	background-position:center;
	padding: 0px 0 100px;
	
}
.all{
    width:100%;
	height:auto;  
}
.left-side{
    float:left;
	width:100%;
	height:auto;
    background:#F4F6F6;
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
	  background:#F4F6F6;
}
.l-side{
      float:left;
	  width:100%;
	  height:auto;
	  background:#F4F6F6;
	  border-radius:2px;
	  border-radius:8px solid white;  
}
.l-side p{
      background:#F4F6F6;
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
.col-sm-6 h4{
	font-size:21px;
	color:grey;
}
.dukan{
	font-size:16px;
	font-weight:800;
	margin-bottom:1px;
	text-align:center;
	color:darkorange
}
.col-sm-6 h3{
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
@media screen and (max-width:700px){
.col-sm-6 h1{
	font-size:20px;
	color:darkorange;
}
.col-sm-6 h4{
	font-size:14px;
	color:grey;
}
.col-sm-6 h3{
	font-size:13px;
	color:orange;
	font-weight:700;
}
.col-sm-6 p{
	font-size:13px;
	color:black;
}

}
</style>
</head>
<body>
<header class="header">
<nav class="navbar navbar-expand-md bg-primary navbar-light">
 <a class="navbar-brand" href="index.php"><img src="images/home.png" alt="home" title="home"/></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item" style="font-weight:1000;">
        <a class="nav-link" href="index.php"><b>&#2361;&#2379;&#2350;</b></a>
      </li>
      <li class="nav-item" style="font-weight:800;">
        <a class="nav-link" href="form.php">&#2352;&#2332;&#2367;&#2360;&#2381;&#2335;&#2352;</a>
      </li>
      <li class="nav-item" style="font-weight:800;">
        <a class="nav-link" href="ourgoal.html">&#2313;&#2342;&#2381;&#2342;&#2375;&#2358;&#2381;&#2351;</a>
      </li>
      <li class="nav-item" style="font-weight:800;">
        <a class="nav-link" href="aboutus.html">&#2361;&#2350;&#2366;&#2352;&#2375; &#2348;&#2366;&#2352;&#2375; &#2350;&#2375;&#2306;</a>
      </li>
      	  <li class="nav-item" style="font-weight:800;">
        <a class="nav-link" href="contactus.html">&#2360;&#2306;&#2346;&#2352;&#2381;&#2325; &#2325;&#2352;&#2375;&#2306;</a>
      </li>
      <li class="nav-item" style="font-weight:800;">
        <a class="nav-link" href="privacypolicy.html">&#2327;&#2379;&#2346;&#2344;&#2368;&#2351;&#2340;&#2366; &#2360;&#2369;&#2357;&#2367;&#2343;&#2366;</a>
      </li>
      <li class="nav-item" style="font-weight:800;">
        <a href="welcome.php"> <button type="button" class="btn btn-warning" style="color:white;font-weight:800;">Login Kare</button></a>
      </li>
	  &nbsp; &nbsp;
      <li class="nav-item" style="font-weight:800;">
	  <a href="form.php"><button type="button" class="btn btn-warning"  style="color:white;font-weight:800;">&#2360;&#2381;&#2357;&#2351;&#2306; &#2325;&#2379; &#2352;&#2332;&#2367;&#2360;&#2381;&#2335;&#2352; &#2325;&#2352;&#2375;&#2306;</button></a>
       </li>
	</ul>
  </div>
</nav>
</header>
<br>

<?php
require 'db.php';
if(isset($_REQUEST["eid"]))
{
$eid=$_REQUEST["eid"];
}
?>
<!--Yaha Gaon KA Nam Dale-->

<div class="container">
   <div class="row">
	  <div class="col-sm-6">
	      <h1 style="font-weight:800;">&#2350;&#2379;&#2352; &#2327;&#2366;&#2306;&#2357;, <?php echo $eid; ?></h1>
	      <h3>&#2327;&#2366;&#2306;&#2357; &#2361;&#2379; &#2340;&#2379; &#2325;&#2376;&#2360;&#2366;, <i style="font-size:17px;">&#2350;&#2379;&#2352; &#2327;&#2366;&#2306;&#2357; </i> &#2332;&#2376;&#2360;&#2366;</h3>
		  <h4>&#2361;&#2350; &#2361;&#2350;&#2375;&#2358;&#2366; &#2310;&#2346;&#2325;&#2379; &#2327;&#2366;&#2306;&#2357; &#2350;&#2375;&#2306; &#2361;&#2379;&#2344;&#2375; &#2357;&#2366;&#2354;&#2368; <br>
			&#2358;&#2369;&#2349; &#2325;&#2366;&#2352;&#2381;&#2351;&#2325;&#2381;&#2352;&#2350;&#2379;&#2306;, &#2360;&#2369;&#2306;&#2342;&#2352; &#2328;&#2335;&#2344;&#2366;&#2323;&#2306;, &#2327;&#2366;&#2306;&#2357; &#2325;&#2368; &#2360;&#2381;&#2341;&#2367;&#2340;&#2367; &#2324;&#2352; <br>
			&#2327;&#2366;&#2306;&#2357; &#2350;&#2375;&#2306; &#2361;&#2366;&#2354; &#2361;&#2368; &#2350;&#2375;&#2306; &#2361;&#2379;&#2344;&#2375; &#2357;&#2366;&#2354;&#2375; &#2346;&#2352;&#2367;&#2357;&#2352;&#2381;&#2340;&#2344;&#2379;&#2306; &#2324;&#2352; <br>
			&#2360;&#2369;&#2357;&#2367;&#2343;&#2366;&#2323;&#2306; &#2360;&#2375; &#2309;&#2357;&#2327;&#2340; &#2325;&#2352;&#2366;&#2319;&#2306;&#2327;&#2375;, &#2343;&#2344;&#2381;&#2351;&#2357;&#2366;&#2342; &#2404;
		  </h4>
	   </div>
	   </div></div>

<section class="banner">

<div class="container">
<hr/>
<div class="dukan" style="background:orange;margin-bottom:10px; width:100%;height:30px;line-height:30px;border-radius:7px;color:white;">&#2361;&#2366;&#2354; &#2361;&#2368; &#2350;&#2375;&#2306; ( &#2357;&#2352;&#2381;&#2340;&#2350;&#2366;&#2344; &#2350;&#2375;&#2306; )</div>

<?php
$query = "select * from khairjhitikalan inner join users on khairjhitikalan.user_id=users.id where khairjhitikalan.gaon='$eid' order by khairjhitikalan.id1 desc";
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


</body>
</html>