<?php

/**
* This page shows post details. 
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
    <title>Mor Gaon : MyEVillage</title>
	<meta charset="UTF-8">
    <meta name="description" content="Ham hamesh aapko gaon me hone wali sundar ghatnao aur parivartano se avgat karate rahenge, MorGaon">
    <meta name="keywords" content="mor gaon, myevillage, mor gaon ki jankari, khairjhiti kala, gaon, dukano ka vivran, dukan, ">
    <meta name="author" content="Manish Patel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
    <meta http-equiv="refresh" content="20">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
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
		  background:#7FDBFF;
		  border:0.1px solid lightblue;	  
	}
	.left-side h4 {
		  margin:2px;
		  padding:0px;
		  font-weight:700;
		  color:darkblue;
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
		  background:rgba(0,0,0,0.03);
		  border-radius:2px;
		  border:0.7px solid rgba(0,0,0,0.09);
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
		  font-weight:650;
		  color:rgba(0,0,0,0.7);
	}
	</style>
</head>
<body>
<br/>
	<div class="container"  style="float:left">
		<div style="font-weight:700;color:darkorange">सभी गांवों की सूचनाएं</div>
			<hr style="border:2px solid orange;" />
			<?php

			$query1="select post_id,post_title,post_data,post_village,post_date,user_id from post order by post_id desc";
			$result = mysqli_query($conn, $query1);
			$rowcount1=mysqli_num_rows($result);

			if(isset($_REQUEST["delid4"]))
			{
				$delid4 = $_REQUEST["delid4"];
				
				$success4 = "delete from post where post_id='$delid4'";
				$result4 = mysqli_query($conn, $success4);
				header('location:allpost.php');
			}

			while($row1 = mysqli_fetch_assoc($result))
			{
			?>
			<div class="all">
				<div class="left-side">
					<h4 style="color:darkblue;margin:3px; font-size:14px;">
					Post ID : <?php echo htmlspecialchars($row1["post_id"], ENT_QUOTES, 'UTF-8'); ?><br>
					User ID : <?php echo htmlspecialchars($row1["user_id"], ENT_QUOTES, 'UTF-8'); ?></h4>
					<p>Village : <?php echo htmlspecialchars( $row1["post_village"], ENT_QUOTES, 'UTF-8');?></p>
				</div>
				<div class="l-side">
					<p style="font-size:12px;"> Posted By : <?php echo htmlspecialchars( $row1["user_id"], ENT_QUOTES, 'UTF-8');?> >> At : <?php echo htmlspecialchars( $row1["post_date"], ENT_QUOTES, 'UTF-8');?> </p> 
					<p style="font-size:14px;"><?php echo htmlspecialchars($row1["post_title"], ENT_QUOTES, 'UTF-8'); ?></p>  
					<p>
						<?php
							$text3 = htmlspecialchars($row1["post_data"], ENT_QUOTES, 'UTF-8');
							echo nl2br("$text3");
						?>
					</p>
					<p><a href="allpost.php?delid4=<?php echo $row1["post_id"]; ?>"><p>Delete</p></a></p>
				</div>
			<div style="width:100%;float:left;margin-top:px;margin-bottom:px;"><hr/></div>
			<?php
			}
			?>
		</div>
	</div>
</body>
</html>