<?php

/**
* This page shows user dashboard.. 
*/

/**
* This ("identification.php") file contains User Authentication code.
* This ("identification.php") file contains Database Connection code.
* It checks the user existency in database .
*/
require_once '../control/identification.php';

?>
<html>
<head>
    <title>MorGaon : MyEVillage | Digital Village</title>
	<meta charset="UTF-8">
    <meta name="description" content="Ham hamesh aapko gaon me hone wali sundar ghatnao aur parivartano se avgat karate rahenge, MorGaon">
    <meta name="keywords" content="mor gaon, myevillage, mor gaon ki jankari, khairjhiti kala, gaon, dukano ka vivran, dukan, ">
    <meta name="author" content="Manish Patel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
	.navbar-brand img{
		width:50px;
		height:40px;
	}
	.title-line{
		font-size:16px;
		font-weight:700;
		color:black;
		margin-left:8px;
		margin-top:3px;
		background:lightblue;
		padding:15px;
		border-radius:5px;
	}
	.all{
		  width:100%;
		  height:auto;
		  background:grey;
	}
	.left-side{
		  float:left;
		  width:80%;
		  height:auto;
		  background:#fafafa;
		  border:2px solid rgba(0,0,0,0.1);	 
		  border-radius:9px;	  
	}
	.left-side h4 {
		  margin-left:8px;
		  margin-top:4px;
		  padding:5px;
		  font-weight:700;
		  color:rgba(0,0,0,0.6);
		  font-size:15px;
	}
	.left-side p{
		  margin-left:15px;
		  font-weight:700;
		  color:rgba(0,0,0,0.4);
		  font-size:13px;
	}
	.left-side-left{
		  float:right;
		  width:20%;
		  height:auto;
		  background:grey;
		  border:2px solid rgba(0,0,0,0.1); 
		  border-radius:9px; 	  
	}
	.left-side-left p{
		  background:grey;
		  padding:10px;
		  text-align:center;
	}
	.left-side-left a p{
		  text-decoration:none;
		  color:white;
		  height:auto;
		  width:100%;  
	}
	.right-side{
		  float:left;
		  width:100%;
		  height:auto;
		  background:grey;
		  margin-top:5px;	  
	}
	.l-side{
		  float:left;
		  width:100%;
		  height:auto;
		  background:#fafafa;
		  border:2px solid rgba(0,0,0,0.1); 
		  border-radius:9px; 
		  margin-bottom:30px;
	}
	.l-side p{
		 float:left;
		 width:90%;
		 height:auto;
		 margin-left:10px;
		 margin-right:10px;
		 margin-bottom:0px;
		 margin-top:5px;
		 font-size:14px;
		 border-radius:4px;
		 padding:5px;
	}
	.col-sm-6 h3{
		font-size:14px;
		color:orange;
		font-weight:700;
	}
	.showimg{
		width:100%;
		height:auto;
		text-align:center;
	}
	.showimg img{
		width:160px;
		height:165px;
		border-radius:50%;
	}
	.pro-info{
		text-align:center;
		margin-top:8px;
	}
	.pro-info p{
		text-align:center;
		color:grey;
		font-size:15px;
		font-weight:700;
	}
	.title-line-2{
		color:grey;
		font-weight:700;
		font-size:16px;
		text-align:center;
	}
	.title-line-3{
		font-weight:700;
		text-align:center;
	}
	</style>
</head>
<body>
	<?php 
	//including header navbar.
	include '../about/header_component.php';
	?>
	<?php
	if(isset($_REQUEST["delid1"])){
		$delid1 = $_REQUEST["delid1"];
		$sql = "delete from shop where shop_id='$delid1'";
		mysqli_query($conn, $sql);
	}
	$user4=$_SESSION["username"];
	$query4="select username,user_name,user_email,user_village,user_image from user where username='$user4'";
	$result4 = mysqli_query($conn, $query4);
	$row4=mysqli_fetch_assoc($result4);
	$vill = $row4["user_village"];
	$query5="select shop_id,shop_name,shop_category,shop_village,shop_status from shop where user_id='$mid' order by shop_id desc";
	$result5 = mysqli_query($conn, $query5);
	$rowcount=mysqli_num_rows($result5);
	if($row4["user_email"] == ""){
		echo "<div class='container' style='color:red;margin-top:20px;margin-bottom:20px;'>आपका Account बंद होने वाला है,<br>
		कृपया अपना सही मोबाइल नंबर दें,<br>अपने Account को Safe करने के लिए Edit Profile में जाएं, Thank You.</div>";
	}
	?>
	<?php 
	$query0 = "select id from villagedetails where village='$vill'";
	$result0 = mysqli_query($conn, $query0);
	$row0=mysqli_fetch_assoc($result0);
	?>	 
	<br/>
	<div class="container">
		<div class="showimg"><img class="img-responsive img-thumbnail" src="../<?php echo $row4["user_image"];?>"></div>
		<div class="pro-info">
			<p><?php echo $row4["user_name"];?></p>
			<p>@<?php echo $row4["username"];?></p>
			<p><a href="profile.php"><button class="btn btn-primary"> Edit Profile</button></a> | <a href="../login/logout.php"><button class="btn btn-info"> Log Out</button></a></p>
		</div>
	</div>
	<div class="container">
		<h1 class="title-line">सेवाएं ( Services )</h1>
		<div class="row">
			<div class="col-sm-6">
				<br/>
				<h3 class="title-line-2">अपना दुकान रजिस्टर करें</h3>
				<p class="title-line-3"> &nbsp; <a href="../shop/shopregistration.php" > <button type="button" class="btn btn-info">अपना दुकान रजिस्टर करें</button></a> </p>
				<h3 class="title-line-2">अपने गांव की जानकारी अपडेट करें</h3>
				<p class="title-line-3"> &nbsp; <a href="../villagedetails/update-village-details-interface.php"> <button type="button" class="btn btn-info">गांव की जानकारी अपडेट करें</button></a></p>
				<h3 class="title-line-2">अपने गांव में बस सुविधा अपडेट करें</h3>
				<p class="title-line-3"> &nbsp; <a href="../bus/bus_ad.php" > <button type="button" class="btn btn-success">बस सुविधा अपडेट करें</button></a> 
				</p>
				<h3 class="title-line-2">अपने गांव में शिक्षण सुविधा अपडेट करें</h3>
				<p class="title-line-3"> &nbsp; <a href="../tution/insert-tution-interface.php"> <button type="button" class="btn btn-success">शिक्षण सुविधा अपडेट करें</button></a> 
				</p>
			</div>
			<div class="col-sm-6" style="text-align:center">
				<br/>
				<h3 class="title-line-2"> सूचना डाले</h3>
				<p class="title-line-3"> &nbsp; <a href="../post/post-interface.php" > <button type="button" class="btn btn-warning">सूचना डाले</button></a> 
				</p>
			</div>
		</div>
		<hr/>	
		<br/>
	</div>
	<div class="container">
		<div class="container" style="float:left;">
		<p class="title-line">आपका दुकान/सार्वजनिक क्षेत्र</p>
		<br/>
		<?php
		while($row4=mysqli_fetch_assoc($result5)){
		?>
			<div class="allinone"> 
				<div class="left-side-left">
					<a href="welcome.php?delid1=<?php echo $row4["shop_id"];?>"><p>Delete</p></a>
				</div>
				<div class="all">
					<div class="left-side">
						<a href="../shop/showmoreshop.php?eid=<?php echo $row4["shop_id"];?>"><h4><?php echo htmlspecialchars($row4["shop_name"], ENT_QUOTES, 'UTF-8');?></h4></a>
						<p><?php echo htmlspecialchars(($row4["shop_village"]), ENT_QUOTES, 'UTF-8');?> ~ 
						<a href="../shop/showmoreshop.php?eid=<?php echo $row4["shop_id"];?>">&#2347;&#2379;&#2335;&#2379; &#2342;&#2375;&#2326;&#2375;&#2306;</a> . 
						<a  href="../shop/shopupdate.php?eid=<?php echo $row4["shop_id"];?>">Edit</a></p>
					</div>
					<div class="l-side">
						<p><i><?php echo htmlspecialchars(($row4["shop_category"]), ENT_QUOTES, 'UTF-8');?></i></br>
							आपका दुकान अभी 
							<?php 
							if($row4["shop_status"]=='off'){
								echo "<b>बंद है</b>";
							}
							if($row4["shop_status"]=='on'){
								echo "<b>खुला है</b>";
							}
							?>
							<br/>
							<b>
								<a href="../shop/shop-on-off-status.php?eid=<?php echo $row4["shop_id"];?>">Update (खुला है / बंद है)</a>
							</b>
						</p>
					</div>
				</div>
			</div>
			<?php
			}
			?>
		</div>
	</div>
	<div class="container">
		<div class="container"  style="float:left;">
			<hr/>
			<h4 style="font-size:20px;text-align:center;background:grey;height:50px;color:white;font-weight:700;border-radius:5px;padding:10px;"> &#2360;&#2367;&#2352;&#2381;&#2347; &#2319;&#2325; &#2327;&#2366;&#2306;&#2357; &#2350;&#2375;&#2306; &#2337;&#2366;&#2354;&#2368; &#2327;&#2312; &#2360;&#2370;&#2330;&#2344;&#2366;&#2319;&#2306; :</h4><br>
			<?php
			$query3= "select post_id,post_title,post_data,post_village,post_time,post_date,post_views from post where user_id='$mid' order by post_id desc ";
			$result3 = mysqli_query($conn, $query3);
			$rowcount=mysqli_num_rows($result3);
			if(isset($_REQUEST["delid"])){
				$delid = $_REQUEST["delid"];
				$aql = "delete from post where post_id='$delid'";
				mysqli_query($conn,$aql);
				$notify_delete = "delete from notification where post_id='$delid'";
				mysqli_query($conn,$notify_delete);
				$like_delete = "delete from like_unlike where postid='$delid'";
				mysqli_query($conn,$like_delete);
				$comment_delete = "delete from comments where post_id='$delid'";
				mysqli_query($conn,$comment_delete);
				echo "<br>";
				echo "<br>";
				echo "<div class='container' style='font-weight:700;color:darkorange;'>Successfully Deleted , <a href='welcome.php'>Refresh Now</a></div>";
				echo "<br>";
				echo "<br>";
			}
			?>
			<?php
			for($i=1;$i<=$rowcount;$i++){
			$row2=mysqli_fetch_assoc($result3);
			$text2 = htmlspecialchars($row2["post_data"], ENT_QUOTES, 'UTF-8');
			?>
			<div class="allinone">
				<div class="all">
					<div class="left-side">
						<a href="../post/expand-post-data.php?eid=<?php echo $row2["post_id"];?>"><h4><?php  echo htmlspecialchars($row2["post_title"], ENT_QUOTES, 'UTF-8');?></h4></a>
						<p><?php echo htmlspecialchars($row2["post_village"], ENT_QUOTES, 'UTF-8');?> ~ 
							<?php echo htmlspecialchars($row2["post_time"], ENT_QUOTES, 'UTF-8');?> ~ 
							<a href="../post/post-update-interface.php?eid=<?php echo $row2["post_id"]; ?>">Edit</a>
						</p>
					</div>
					<div class="left-side-left"> 
						<a href="welcome.php?delid=<?php echo $row2["post_id"]; ?>"><p>Delete</p></a>
					</div>
				</div>
				<div class="l-side">
					<p><?php echo nl2br("$text2\n");?></p>
					<p style="color:grey;"><?php echo htmlspecialchars($row2["post_date"], ENT_QUOTES, 'UTF-8');?> ~ <img src="../images/eye.png" width="30px" height="30px"> <?php echo htmlspecialchars($row2['post_views'], ENT_QUOTES, 'UTF-8'); ?> ~ <a style="color:#6f73b0;font-size:12px;font-weight:700;" href="../post/expand-post-data.php?eid=<?php echo $row2["post_id"];?>">&#2347;&#2379;&#2335;&#2379; &#2342;&#2375;&#2326;&#2375;&#2306;</a></p>
				</div>
			</div>
			<?php
			}
			?>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>