<?php

/**
* This page shows shop details. 
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
    <meta http-equiv="refresh" content="10">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
	.all1{
		  width:100%;  
	}
	.left-side1{
		float:left;
		  width:75%;
		  height:auto;
		  background:rgba(0,0,0,0.02);
		  border:1px solid lightblue;	  
	}
	.left-side1 h4 {
		  margin:2px;
		  padding:0px;
		  font-weight:700;
		  color:rgb(153, 0, 51);
		  font-size:16px;
		  margin-left:10px;
	}
	.left-side1 p{
		  margin:4px;
		  font-weight:700;
		  color:grey;
		  font-size:14px;
		  margin-left:10px;
	}
	.l-side1{
		  float:right;
		  width:25%;
		  height:auto;
		  background:rgba(0,0,0,0.05);
		  border-radius:2px;
		  border:1px solid lightblue;
	}
	.l-side1 p {
		  float:left;
		  width:100%;
		  height:auto;
		  margin:2px;
		  font-size:18px;
		  border-radius:2px;
		  font-weight:700;
	}
	</style>
</head>
<body>
	<?php
	$query = "select shop_id,shopkipper,shop_name,shop_village,shop_status,shop_mobile,date,user_id from shop order by shop_id desc";
	$result1 = mysqli_query($conn,$query);

	if(isset($_REQUEST["delid1"]))
	{
		$delid1 = $_REQUEST["delid1"];
		$success1 = "delete from shop where shop_id='$delid1'";
		$result = mysqli_query($conn,$success1);
		header('Location:shop.php');
	}
	?>
	<br/>
	<div class="container">
		<div class="font-weight:700;color:darkorange;"> दुकानों का विवरण</div>
		<hr style="border:2px solid orange;" />
		<br/>
		<?php
		while($row=mysqli_fetch_assoc($result1))
		{
		?>
		<div class="all1">
			<div class="left-side1">
				<h4><?php echo htmlspecialchars($row["shop_id"], ENT_QUOTES, 'UTF-8');?> . <?php echo htmlspecialchars($row["shop_name"], ENT_QUOTES, 'UTF-8');?></h4>
				<h4>Village : <?php echo htmlspecialchars($row["shop_village"], ENT_QUOTES, 'UTF-8');?></h4>
				<p>User id : <?php echo htmlspecialchars($row["user_id"], ENT_QUOTES, 'UTF-8');?></p>
				<p>ShopKipper : <?php echo htmlspecialchars($row["shopkipper"], ENT_QUOTES, 'UTF-8');?>,</p>
				<p> Date : <?php echo htmlspecialchars($row["date"], ENT_QUOTES, 'UTF-8');?>,</p>
				<p> Mobile No. : <?php echo htmlspecialchars($row["shop_mobile"], ENT_QUOTES, 'UTF-8');?></p>
			</div>
			<div class="l-side1">  
				<p>
					<?php
					if($row["shop_status"]=='off')
					{
						echo "band hai";
					}
					if($row["shop_status"]=='on')
					{
						echo "chalu hai";
					}
					?>
				</p>
				<a href="shop.php?delid1=<?php echo $row["shop_id"];?>"><p>Delete</p></a>
			</div>
		</div>
		<br/>
		<?php
		}
		?>
	</div>
</body>
</html>