<?php

/**
* This page shows news, events and all the updates of a village. 
*/

/**
* This ("identification.php") file contains User Authentication code.
* This ("identification.php") file contains Database Connection code.
* It checks the user existency in database .
*/
require_once '../control/identification.php';

/**
* These 4 lines code will fetch user's village from "users" table.
* Variables '$user' and '$password' are from 'identification.php' file.
*/
$village_query="SELECT user_village FROM user WHERE username='$user' AND password='$password'";
$village_result = mysqli_query($conn, $village_query);
$village_row = mysqli_fetch_assoc($village_result);
$user_village = $village_row["user_village"];

// These 2 lines code will fetch all villages from table "villagedetails".
$sql_village_name = "SELECT village FROM villagedetails";
$result_village_name = mysqli_query($conn, $sql_village_name);

/** 
* These 9 lines code will notify users for new notifications.
* Variable '$mid' is from 'identification.php' file.
*/
$notify_query = "select user_seen from notification where owner_id=$mid order by id desc";
$result_notify = mysqli_query($conn, $notify_query);
$row_notify = mysqli_fetch_assoc($result_notify);
/**
* If no any new notification then 'notified.png' image will be in active state. 
* Otherwise 'notification.png' image will be in active state to notify user. 
*/

if($row_notify['user_seen'] == 1){
	$notification_icon="notified.png";
}
else{
	$notification_icon="notification.png";
}
if(empty($row_notify))
	$notification_icon="notified.png";

// Setting up the time zone.
date_default_timezone_set('Asia/Calcutta');

/**
* time_elapsed_string() function converts the timestamp to human timing like 1 hour ago, 2 months ago etc.
* It has year, month, week, day, hour, minute, second formats.
*/
function time_elapsed_string($datetime, $level = 7) {
	$now = new DateTime;
	$ago = new DateTime($datetime);
	$diff = $now->diff($ago);

	$diff->w = floor($diff->d / 7);
	$diff->d -= $diff->w * 7;

	$string = array(
		'y' => 'year',
		'm' => 'month',
		'w' => 'week',
		'd' => 'day',
		'h' => 'hour',
		'i' => 'minute',
		's' => 'second',
	);
	foreach ($string as $k => &$v) {
		if ($diff->$k) {
			$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
		} else {
			unset($string[$k]);
		}
	}

	$string = array_slice($string, 0, $level);
	return $string ? implode(', ', $string) . ' ago' : 'just now';
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<style>
		#strip-1{
			background:#ff9b4a;
			width:100%;
			height:10px;
		}
		#strip-2{
			background:black;
			width:100%;
			height:5px;
		}
		#strip-3{
			background-image:linear-gradient(to bottom,  white ,#f0fcff);
			width:100%;
			height:5px;
			padding:20px;
		}
		.header{
			width:100%;
			height:70px;
			background-color:white;
		}
		.header h1{
			font-size:25px;
			font-weight:700;
			color:darkorange;
			float:left;
			padding:15px;
			width:190px;
			height:70px;
		}
		.header h1 img{
			width:50px;
			height:50px;
			border:1px solid white;
			border-radius:50%;
		}
		.header-icon{
			float:right;
			background:white;
			padding:20px;
			font-size:12px;
		}
		.header img{
			width:30px;
			height:30px;
		}
		body{
			background:#f0fcff;
		}
		.below-header{
			font-size:18px;
			font-weight:700;
			margin-left:20px;
		}
		.below-header img{
			width:40px;
			height:35px;
		}
		.instant-btn{
			width:110px;
			background:orange;
			border:1px solid darkoranges;
			border-radius:5px;
			font-size:14px;
			font-weight:700;
			color:black;
			padding:10px 12px 12px 12px;
		}
		.instant-btn img{
			width:27px;
			height:27px;
		}
		.post-sec{
			margin-top:30px;
		}
		.heading-all-news{
			margin-top:20px;
		}
		.all{
			width:100%;
			height:auto;
			margin-top:40px;
		}
		.left-side{
			float:left;
			width:100%;
			box-shadow:0px 0px 10px 0px grey;
		}
		.left-side h4 {
			font-weight:700;
			color:rgb(153, 0, 51);
			font-size:14px;
			margin-left:90px;
		}
		.left-side p{
			font-weight:700;
			color:black;
			font-size:12px;
			margin-left:90px;
		}
		.thumbnail{
			padding:0px;
			border:5px solid rgba(0,0,0,0.1);
			background:white;
			box-shadow:1px 1px 10px 1px rgba(0,0,0,0.1);
		}
		.l-side{
			float:left;
			width:100%;
			border-radius:5px;
			border:8px solid white;  
			margin-bottom:0px;
		}
		.l-side p{
			background:white;
			width:90%;
			margin-right:15px;
			margin-bottom:15px;
			margin-left:20px;
			font-size:14px;
			color:rgba(0,0,0,0.7);
		}
		.l-side .p1{
			margin-top:0px;
			color:black;
			font-size:15px;
			font-weight:700;
		}
		.l-side .p2{
			font-size:15px;
			margin-bottom:10px;
			font-weight:700;
		}
		.navbar-brand img{
			width:60px;
			height:40px;
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
		.showimg{
			padding:10px;
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
		.comm img{
			width:17px;
			height:16px;
		}
		.comm a{
			color:grey;
		}
		.likenum{
			color:grey;
			font-weight:700;
		}
		.all-show-btn{
			color:black;
			font-weight:700;
			margin-top:
		}
		.news-image{
			text-align:center;
		}
		.news-image img{
			width:400px;
			height:auto;
			border:1 px solid white;
			text-align:center;
		}
		.action-like{
			text-align:center;
		}
		.bottom-nav{
			background-color:#ffe4d1;
			width:100%;
			height:auto;
			margin-bottom:70px;
			padding:10px;
		}
		.bottom-nav h3{
			color:#0f1c3b;
			padding:20px;
			font-size:20px;
			font-weight:700;
		}
		.bottom-nav a{
			color:#000b4d;
			margin-left:30px;
			padding:5px;
			font-size:15px;
			font-weight:700;
		}
		.footer-bottom-icon{
			width:100%;
			height:auto;
		}
		.footer-button{
			width:20%;
			font-weight:800;
			color:black;
			text-align:center;
		}
		.footer-button a{
			color:black;
		}
		.footer-button img{
			width:30px;
			height:30px;
		}
		@media screen and (max-width:700px){
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<div id="strip-1">
	</div>
	<div id="strip-2">
	</div>
	<div class="header">
		<h1><img src="../sys_images/morgaon.jpg" alt="morgaon logo"/>&nbsp;&nbsp;मोर गांव</h1>
		<span class="header-icon">
			<a href="../notification/notifications.php">
				<img src="../sys_images/<?php echo $notification_icon; ?>" alt="Notification"/>
			</a>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../images/search.png" class="dropdown-toggle" data-toggle="dropdown" alt="Search"/>
			<div class="dropdown-menu">         
				<?php
				
				// Showing all the villages to go to that village and see all the events and news.
				while($row_village_name=mysqli_fetch_assoc($result_village_name)){
				?>
					<a class="dropdown-item" href="../villagedetails/village.php?eid=<?php echo $row_village_name["village"]; ?>"><?php echo $row_village_name["village"]; ?></a>
				<?php
				
				}
				?>
			</div>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="../userprofile/welcome.php"><img src="../images/profile.png" alt="Profile"/></a>
		</span>
	</div>
	<div id="strip-3">
	</div>
	<div class="bg-bd">
		<div class="below-header">
			<img src="../sys_images/uservillage.png"/>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $user_village ?>
			&nbsp;&nbsp;
			<a href="../post/post-interface.php">
				<span class="instant-btn"><img src="../sys_images/post.png"/>&nbsp;&nbsp;&nbsp;&nbsp;Post A News</span>
			</a>
		</div>
			<div class="container">
				<div class="row post-sec">
				<?php
				
				// Fetching posts from user's village and fetching user details from 'user.
				$user_village_post_query = "SELECT 
											post_id, post_title, post_data,
											post_time, post_date,
											post_image, p.user_id,u.user_id,
											user_name,user_image
											FROM post p inner join user u 
											ON p.user_id=u.user_id 
											WHERE p.post_village='$user_village' 
											ORDER BY p.post_id desc 
											LIMIT 0,9";
				$user_village_post_result=mysqli_query($conn, $user_village_post_query);
				$user_village_post_count = mysqli_num_rows($user_village_post_result);
				
				if($user_village_post_count==0){
					echo "<center><br/>No News...<br/><br/></center>";
				}
				while($user_village_post = mysqli_fetch_assoc($user_village_post_result)){
					$post_id=$user_village_post["post_id"];
					$post_date = $user_village_post['post_date'];
					$post_time = $user_village_post['post_time'];
					
					// Calculating time in formate of 1 hour ago or 1 day ago etc,
					$day_diffrence = strtotime(date("d M Y"))-strtotime($post_date);
					$day_diffrence = ceil($day_diffrence/86400);
					if($day_diffrence >62)
						$time = $post_time." . ".$post_date;
					else
						$time = time_elapsed_string($post_date." ".$post_time,1);
						
					// Fetching comments count from comments table for each post.
					$user_village_comment_query = "SELECT id FROM comments WHERE post_id='$post_id'";
					$user_village_comment_result = mysqli_query($conn, $user_village_comment_query);
					$user_village_comment_count = mysqli_num_rows($user_village_comment_result);
				?>
					<div class="col-md-4">
						<div class="thumbnail">
							<div class="caption">
								<div class="left-side">
									<a href="../userprofile/showprofile.php?eid=<?php echo $user_village_post["user_id"];?>">
										<div class="showimg">
											<img class="img-responsive img-thumbnail" src="../<?php echo $user_village_post["user_image"]; ?>" />
										</div>
										<h4><?php echo htmlspecialchars($user_village_post["user_name"], ENT_QUOTES, 'UTF-8');?></h4>
									</a>
									<p>
										<?php echo htmlspecialchars($time, ENT_QUOTES, 'UTF-8'); ?>
									</p>
								</div>
							</div>
							<a href="../post/expand-post-data.php?eid=<?php echo $user_village_post["post_id"];?>">
							<div class="l-side">
								<div class="news-data">
									<p class="p1">
										<?php echo htmlspecialchars($user_village_post["post_title"], ENT_QUOTES, 'UTF-8');?>
									</p> 
									<p class="p2">
										<?php
										$post_data = htmlspecialchars($user_village_post["post_data"], ENT_QUOTES, 'UTF-8');
										$post_data = substr($post_data,0,500)."..."; // Limiting the post's word to 500 characters to show in specific height and width.
										echo nl2br("$post_data\n");// converting new line to <br/> tag.
										?>
									</p>
								</div>
							</div>
							<img src="../<?php echo $user_village_post["post_image"];?>" alt="image" style="width:100%">
							</a>
							<hr/>
							<p class="action-like">
								<?php
								
								// Checking the post that it is liked or not.
								$like_unlike_query=mysqli_query($conn,"select id from `like_unlike` where postid='".$user_village_post['post_id']."' and userid='$mid'");
								// If liked then button "Liked" will be in active state.
								if (mysqli_num_rows($like_unlike_query)>0){
									?>
									<button  value="<?php echo $user_village_post['post_id']; ?>" class="unlike">Liked</button>
									<?php
								}
								// If unliked then button "Like" will be in active state.
								else{
									?>
									<button value="<?php echo $user_village_post['post_id']; ?>" class="like">Like</button>
									<?php
								}
								?>
								<span id="show_like<?php echo $user_village_post['post_id']; ?>" class="likenum">
									<?php
									
									// Showing the like count from "like_unlike" table.
									$like_unlike_count_query=mysqli_query($conn,"select id from `like_unlike` where postid='".$user_village_post['post_id']."'");
									echo mysqli_num_rows($like_unlike_count_query);
									?>
								</span> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; 
								<a href="../post/expand-post-data.php?eid=<?php echo $user_village_post["post_id"];?>">
									<button class="comm"><img src="../images/comm.jpg"/> <?php echo $user_village_comment_count; ?></button>
								</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; 
								<!-- This button will work only in mobile phones as it will share the text data in whatsapp.-->
								<button class="comm">
									<a href="whatsapp://send?text=<?php echo $user_village_post['post_data']; ?>">Share</a>
								</button>
							</p>
						</div>
					</div>
					<?php
					}
					?>
				</div>
				<br/>
				<a href="../post/show-all-post.php">
					<button type="button" class="btn btn-warning all-show-btn">See More</button>
				</a>
			</div>
			<script type = "text/javascript">
			// These scripts are for sending like or unlike request and recieving like count from the database.
			$(document).ready(function(){
				$(document).on('click', '.like', function(){
					var id=$(this).val();
					var $this = $(this);
					$this.toggleClass('like');
					if($this.hasClass('like')){
						$this.text('Like'); 
					}
					else {
						$this.text('Liked');
						$this.addClass("unlike"); 
					}
					$.ajax({
						type: "POST",
						url: "../like/insert-like.php",
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
						url: "../like/insert-like.php",
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
					url: '../like/show_like.php',
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
			<hr/>
			<div class="heading-all-news below-header">
				 <img src="../sys_images/allvillage.png"/>&nbsp;&nbsp;&nbsp;&nbsp;सभी गांवों की सूचनाएं
				 &nbsp;&nbsp;
				 <a href="../post/post-interface.php">
					<span class="instant-btn"><img src="../sys_images/post.png"/>&nbsp;&nbsp;&nbsp;&nbsp;Post A News</span>
				 </a>
			</div>
			<div class="container">
				<div class="row post-sec">
					<?php
					
					// Fetching posts from all villages and user details.
					$all_village_post_query = " SELECT 
												post_id, post_title, post_data,
												post_village, post_time, post_date,
												post_image, p.user_id,u.user_id,
												user_name,user_image
												FROM post p inner join user u 
												ON p.user_id=u.user_id 
												WHERE p.post_village != '$user_village' 
												ORDER BY p.post_id desc 
												LIMIT 0,19 ";
					$all_village_post_result=mysqli_query($conn, $all_village_post_query);
					$all_village_post_count = mysqli_num_rows($all_village_post_result);
					if($all_village_post_count==0){
						echo "<center><br/>No News...<br/><br/></center>";
					}
					while($all_village_post = mysqli_fetch_assoc($all_village_post_result)){
						$post_id = $all_village_post["post_id"];
						$post_date = $all_village_post['post_date'];
						$post_time = $all_village_post['post_time'];
						
						// Calculating time in formate of 1 hour ago or 1 day ago etc,
						$day_diffrence = strtotime(date("d M Y"))-strtotime($post_date);
						$day_diffrence = ceil($day_diffrence/86400);
						if($day_diffrence >62)
							$time = $post_time." . ".$post_date;
						else
							$time = time_elapsed_string($post_date." ".$post_time,1);
						
						// Fetching comments count from comments table for each post.
						$all_village_comment_query = "SELECT id FROM comments WHERE post_id='$post_id'";
						$all_village_comment_result = mysqli_query($conn, $all_village_comment_query);
						$all_comment_count = mysqli_num_rows($all_village_comment_result);
					?>
						<div class="col-md-4">
							<div class="thumbnail">
								<div class="caption">
									<div class="left-side">
										<a href="../userprofile/showprofile.php?eid=<?php echo $all_village_post["user_id"];?>">
											<div class="showimg">
												<img class="img-responsive img-thumbnail" src="../<?php echo $all_village_post["user_image"]; ?>" />
											</div>
											<h4><?php echo htmlspecialchars($all_village_post["user_name"], ENT_QUOTES, 'UTF-8');?></h4>
										</a>
										<p>
											<?php echo htmlspecialchars($all_village_post["post_village"], ENT_QUOTES, 'UTF-8'); ?> . 
											<?php echo htmlspecialchars($time, ENT_QUOTES, 'UTF-8'); ?>
										</p>
									</div>
								</div>
								<a href="../post/expand-post-data.php?eid=<?php echo $all_village_post["post_id"];?>">
								<div class="l-side">
									<div class="news-data">
										<p class="p1">
											<?php echo htmlspecialchars($all_village_post["post_title"], ENT_QUOTES, 'UTF-8');?>
										</p> 
										<p class="p2">
											<?php
											$post_data = htmlspecialchars($all_village_post["post_id"], ENT_QUOTES, 'UTF-8');
											$post_data = substr($post_data,0,500)."...";
											echo nl2br("$post_data\n");
											?>
										</p>
									</div>
								</div>
								<img src="../<?php echo $all_village_post["post_image"];?>" alt="Post image" style="width:100%">
								</a>
								<hr/>
								<p class="action-like">
									<?php
										$like_unlike_query=mysqli_query($conn,"select * from `like_unlike` where postid='".$all_village_post['post_id']."' and userid='$mid'");
										if (mysqli_num_rows($like_unlike_query)>0){
											?>
											<button  value="<?php echo $all_village_post['post_id']; ?>" class="unlike1">Liked</button>
											<?php
										}
										else{
											?>
											<button value="<?php echo $all_village_post['post_id']; ?>" class="like1">Like</button>
											<?php
										}
									?>
									<span id="show_like1<?php echo $all_village_post['post_id']; ?>" class="likenum1">
										<?php
										
										// Showing the like count from "like_unlike" table.
										$like_unlike_count_query=mysqli_query($conn,"select * from `like_unlike` where postid='".$all_village_post['post_id']."'");
										echo mysqli_num_rows($like_unlike_count_query);
										?>
									</span> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; 
									<a href="../post/expand-post-data.php?eid=<?php echo $all_village_post["post_id"];?>">
										<button class="comm"><img src="../images/comm.jpg"/> <?php echo $all_comment_count; ?></button>
									</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; 
									<button class="comm">
										<a href="whatsapp://send?text=<?php echo $all_village_post['post_data']; ?>">Share</a>
									</button>
								</p>
							</div>
						</div>
					<?php
					}
					?>
				</div>
				<br/>
				<a href="../post/show-all-post.php">
					<button type="button" class="btn btn-warning all-show-btn">See More</button>
				</a>
			</div>
			<script type = "text/javascript">
			$(document).ready(function(){
				$(document).on('click', '.like1', function(){
					var id=$(this).val();
					var post_id=id.split(".")[0];
					var user_id=id.split(".")[1];
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
						url: "../like/insert-like.php",
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
					var postid
					var $this = $(this);
					$this.toggleClass('unlike1');
					if($this.hasClass('unlike1')){
						$this.text('Unlike'); 
					}
					else {
						$this.text('Like');
						$this.addClass("like1"); 
					}
					$.ajax({
						type: "POST",
						url: "../like/insert-like.php",
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
					url: '../like/show_like.php',
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
			<hr/>
		</div>
		<div id="strip-1">
		</div>
		<div id="strip-2">
		</div>
		<div class="bottom-nav">
			<h3>महत्वपूर्ण लिंक्स : </h3>
			<p><a href="../about/aboutus.html">हमारे बारे में ( About )</a></p>
			<p><a href="../about/ourgoal.html" >उद्देश्य ( Aim )</a></p>
			<p><a href="../about/contactus.html" >संपर्क सूत्र ( Contact )</a></p>
			<p><a href="../about/terms.html" >नियम एवं शर्तें (T&C)</a></p>
			<p><a href="../about/privacypolicy.html">Privacy Policy</a></p>
			<p><a href="../about/feedback.php">Suggestion & Feedback</a></p>
		</div>
	</div>
	<nav class="navbar navbar-expand-sm bg-light fixed-bottom">
		<div class="d-flex justify-content-between footer-bottom-icon">
			<div class="footer-button">    
				<a href="../shop/shop.php?eid=<?php echo $user_village; ?>"><img src="../images/shop.png" alt="shop"><br>दुकान</a> 
			</div>
			<div class="footer-button">
				<a href="../tution/tution.php?eid=<?php echo $user_village; ?>"><img src="../images/tution.png" alt="tution"><br>शिक्षण सुविधा</a>
			</div>
			<div class="footer-button">
				<a href="../bus/bus.php?eid=<?php echo $user_village; ?>"><img src="../images/bus.png" alt="Bus"><br>बस सुविधा</a> 
			</div>
			<div class="footer-button">
				<a href="../villagedetails/village-details.php?eid=<?php echo $user_village; ?>" ><img src="../images/village.png" alt="village"><br>जानकारी</a>
			</div>
		</div>
	</nav>
<!--Created By Manish Patel-->
</body>
</html>