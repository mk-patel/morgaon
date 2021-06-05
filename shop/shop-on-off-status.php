<?php

/**
* This page provide interface for updating the shop status if it is open or closed. 
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
    <title>Mor Gaon : MyEVillage | Digital Village</title>
	<meta charset="UTF-8">
    <meta name="description" content="Ham hamesh aapko gaon me hone wali sundar ghatnao aur parivartano se avgat karate rahenge, MorGaon">
    <meta name="keywords" content="mor gaon, myevillage, mor gaon ki jankari, khairjhiti kala, gaon, dukano ka vivran, dukan, ">
    <meta name="author" content="Manish Patel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<?php
if(isset($_REQUEST["eid"])){
	$eid=$_REQUEST["eid"];
}
if(isset($_POST["submit"])){
	$shop_status=$_POST["shop_status"];
	$query1="update shop set shop_status='$shop_status'where shop_id='$eid'";
	mysqli_query($conn, $query1);
	header('location:../userprofile/welcome.php');
}
?>
<body>
	<?php
	$query="select shop_status from shop where shop_id='$eid'";
	$result = mysqli_query($conn, $query);
	$row=mysqli_fetch_assoc($result);
	?>
	<br/>
	<div class="container">
		<h5>अपने दुकान या सार्वजनिक स्थान की स्थिति अपडेट करें</h5>
		<br/>
		<form class="form" method="POST"  autocomplete="off">
			<div class="form-group">
				<label for="uname">सार्वजनिक स्थान की स्थिति :</label>
				<select class="custom-select" name="shop_status" required>
					<option selected><?php echo htmlspecialchars($row["shop_status"], ENT_QUOTES, 'UTF-8');?></option>
					<option>off</option>
					<option>on</option>
				</select>
				<div class="valid-feedback">Valid.</div>
				<div class="invalid-feedback">Please fill out this field.</div>
			</div>
			
			<input type="submit" name="submit" class="btn btn-primary">
		</form>
	</div>
</body>
</html>