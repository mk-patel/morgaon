<html>
<head>
	<title>Mor Gaon : MyEVillage | Digital Village</title>
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
		border-radius:50%;
	}
	</style>
</head>
<body>
	<?php 
	
	// Including database connection code.
	require_once '../control/db.php';
	
	// Setting up the timezone.
	date_default_timezone_set('Asia/Calcutta');
	?>
	<br/>
	<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$name = $mysqli->real_escape_string($_POST['name']);
		$content = $mysqli->real_escape_string($_POST['content']);
		$mobile = $mysqli->real_escape_string($_POST['mobile']);
		$dt2=date("Y-m-d H:i:s");
		$sql = "INSERT INTO feedback(name,content,mobile,date)"
			. "VALUES('$name','$content','$mobile','$dt2')";	
		mysqli_query($conn,$sql);
		echo "<br>";
		echo "<center style='color:green;'>Thankyou For Your Feedback.</center>";	
		echo "<br>";
		echo "<br>";
	}
	?>
	<div class="container">
		<h5>अपना सुझाव / शिकायत हमें भेजे</h5>
		<hr>
		<form class="form" action="feedback.php" method="post" enctype="multipart/form-data" autocomplete="off">
			<div class="form-group">
				<label for="text">Your Name :</label>
				<input type="text" class="form-control" id="username" placeholder="Your Name " name="name" required>
			</div>
			<div class="form-group">
				<label for="comment">Feedback / Report :</label>
				<textarea class="form-control" rows="7" id="comment" name="content" required></textarea>
			</div>
			<div class="form-group">
				<label for="text">Your Mobile Number :</label>
				<input type="text" class="form-control" id="username" placeholder="Mobile Number " name="mobile" required>
			</div>
			<button type="submit" name="submit" class="btn btn-warning">Submit</button>
		</form>
	</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>