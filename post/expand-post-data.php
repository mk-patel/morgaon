<?php
/**
* This page shows expanded form of a post data. 
*/

/**
* This ("identification.php") file contains User Authentication code.
* This ("identification.php") file contains Database Connection code.
* It checks the user existency in database .
*/
require_once '../control/identification.php';
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
	border:0.7px solid rgba(0,0,0,0.09);
}
.left-side h4 {
      margin:2px;
	  padding:0px;
	  font-weight:700;
	  color:rgb(153, 0, 51);
	  font-size:14px;
	  margin-left:67px;
	  line-height:20px;
}
.left-side p{
      margin:0px;
	  font-weight:700;
	  color:grey;
	  font-size:12px;
	  margin-left:67px;
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
.comment-sec{
	width:100%;
	height:auto;
	border-radius:2px;
	border:0.7px solid rgba(0,0,0,0.09);
	background:#ffdfb3;
}
.comment-sec h3{
	width:100%;
	padding:10px;
	margin-left:10px;
	border-radius:5px;
	font-size:15px;
	color:black;
}
.comment-sec p{
	width:100%;
	margin-left:30px;
	border-radius:5px;
	font-size:13px;
	color:black;
}
.navbar-brand img{
	width:50px;
	height:40px;
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
	
	<br/>
	<?php
	if(isset($_REQUEST["eid"])){
		$eid=$_REQUEST["eid"];
	}
	$query="SELECT 
			post_id, post_title, post_data,
			post_village,post_time, post_date,
			post_image, p.user_id,u.user_id,
			user_name,user_image
			FROM post p inner join user u 
			ON p.user_id=u.user_id 
			WHERE p.post_id='$eid'";
	$result=mysqli_query($conn,$query);
	while($row=mysqli_fetch_array($result)){
		$post_id=$row["post_id"];
		$type1 = "all";
		$comments_query = "SELECT id FROM comments WHERE post_id='$post_id'";
		$comments_result = mysqli_query($conn, $comments_query);
		$comments_count = mysqli_num_rows($comments_result);
	?>
		<div class="container">
			<br/>
			<div class="all">
				<div class="left-side">
					<a href="../userprofile/showprofile.php?eid=<?php echo $row["user_id"];?>"><div class="show"><img class="img-responsive img-thumbnail" src="../<?php echo $row["user_image"]; ?>" /></div>
					<h4><?php echo htmlspecialchars($row["user_name"], ENT_QUOTES, 'UTF-8');?></h4></a>
					<p><?php echo htmlspecialchars($row["post_village"], ENT_QUOTES, 'UTF-8'); ?><br>
					<?php echo htmlspecialchars($row["post_time"], ENT_QUOTES, 'UTF-8'); ?> . <?php echo htmlspecialchars($row["post_date"], ENT_QUOTES, 'UTF-8');?></p>
				</div>
				<div class="l-side">  
					<p><?php echo htmlspecialchars($row["post_title"], ENT_QUOTES, 'UTF-8');?></p>
					<p><?php
						$text = htmlspecialchars($row["post_data"], ENT_QUOTES, 'UTF-8');
						echo nl2br("$text\n");
						?>
					</p>
					<p>
						<?php
							$query1=mysqli_query($conn,"select id from `like_unlike` where postid='".$row['post_id']."' and userid='$mid'");
							if (mysqli_num_rows($query1)>0){
								?>
								<button  value="<?php echo $row['post_id']; ?>" class="unlike">Liked</button>
								<?php
							}
							else{
								?>
								<button value="<?php echo $row['post_id']; ?>" class="like">Like</button>
								<?php
							}
						?>
						<span id="show_like<?php echo $row['post_id']; ?>" class="likenum">
							<?php
								$query3=mysqli_query($conn,"select id from `like_unlike` where postid='".$row['post_id']."'");
								echo mysqli_num_rows($query3);
							?>
						</span> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; <button class="comm"><img style="width:17px;height:16px;" src="../images/comm.jpg"> <?php echo $comments_count; ?></button> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; <button class="comm"> Share </button>
					</p>
				</div>
			</div>
			<div class="showimg"> <?php echo "<p>" ?> <img class="img-responsive img-thumbnail" src="../<?php echo htmlspecialchars($row["post_image"], ENT_QUOTES, 'UTF-8');?>" ><?php echo "</p>" ?></div>
		</div>
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
	<div class="container">
		<form class="form" method='post' action="" onsubmit="return post();">
			<textarea class="form-control" id="comment" placeholder="Type Something..."></textarea>
			<input type="hidden" id="cid" value="<?php echo $eid;?>">
			<br/>
			<input class="btn btn-warning" type="submit" value="Post">
		</form>
		<br/>
		<div id="all_comments">
			<?php
			$comm = "select comment,c.user_id,date1,date2,user_name from comments c inner join user u on c.user_id=u.user_id where post_id=$eid order by id desc";
			$comment_result=mysqli_query($conn,$comm);
			while($row=mysqli_fetch_array($comment_result)){
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
			?>
		</div>
	</div>
	<script type="text/javascript">
	function post(){
		var comment = document.getElementById("comment").value;
		var cid = document.getElementById("cid").value;
		if(comment){
			$.ajax({
				type: 'post',
				url: '../comments/insert-comment-interface.php',
				data:{
					user_comm:comment,
					post_id:cid
				},
				success: function (response) {
				document.getElementById("all_comments").innerHTML=response+document.getElementById("all_comments").innerHTML;
				document.getElementById("comment").value="";
				}
			});
		}
	return false;
	}
	</script>
	<?php
	$views_query = "select post_views from post where post_id=$eid";
	$views_result = mysqli_query($conn,$views_query);
	$views_row = mysqli_fetch_assoc($views_result);
	$post_views = $views_row['post_views'];
	$update_views = "update post set post_views=$post_views+1 where post_id=$eid";
	mysqli_query($conn,$update_views);
	?>
</body>
</html>