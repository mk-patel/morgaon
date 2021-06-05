<!-- This page provide interface for register a village. -->

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
	}
	h3{
		font-weight:700;
		color:darkorange;
	}
	h5{
		color:grey;
	}
	</style>
</head>
<body>
	<?php 
	//including header navbar.
	include '../about/header_component.php';
	require '../control/db.php';
	?>
	<br/>
	<div class="container">
		<h3>मोर गांव</h3>
		<h5>हम हमेशा आपको गांव में होने वाली<br/>
			शुभ कार्यक्रमों, सुंदर घटनाओं, गांव की स्थिति और<br/>
			गांव में हाल ही में होने वाले परिवर्तनों और<br/>
			सुविधाओं से अवगत कराएंगे, धन्यवाद ।
		</h5>
		<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$village = $mysqli->real_escape_string($_POST['village']);
			$pincode = $mysqli->real_escape_string($_POST['pin-code']);
			$block = $mysqli->real_escape_string($_POST['block']);
			$jila = $mysqli->real_escape_string($_POST['jila']);
			$sql = "INSERT INTO villagedetails(village,pincode,block,jila)"
			. "VALUES('$village','$pincode','$block','$jila')";
			mysqli_query($conn, $sql);
			echo "<br><br>";
			echo "<center>&#2360;&#2347;&#2354;&#2340;&#2366;&#2346;&#2370;&#2352;&#2381;&#2357;&#2325; &#2342;&#2352;&#2381;&#2332; &#2325;&#2367;&#2351;&#2366; &#2327;&#2351;&#2366;&#2404;</center>";
			echo "<br><br>";
			echo "<center><a style='color:darkorange;font-size:17px;font-weight:800;margin-left:20px;' href='../userprofile/form.php'><< &#2346;&#2368;&#2331;&#2375; &#2332;&#2366;&#2319;...</a></center>";
			echo "<br><br>";
		}
		?>
		<br/>
		<div class="module">
			<h4>अपना गांव रजिस्टर करें</h4>
			<p>Note : कृपया फॉर्म English में भरें...</p>
			<hr/>
			<form class="form" action="registervillage.php" method="post" enctype="multipart/form-data" autocomplete="off">
				<div class="form-group">
					<label for="uname">गांव :</label>
					<input type="text" class="form-control" id="uname" placeholder="Enter Village Name" name="village" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="uname">पिन कोड :</label>
					<input type="int" class="form-control" id="uname" placeholder="Enter Pin Code" name="pin-code" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="uname">विकास खंड :</label>
					<input type="text" class="form-control" id="uname" placeholder="Enter Block Name" name="block" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="uname">जिला :</label>
					<input type="text" class="form-control" id="uname" placeholder="Enter District Name" name="jila" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group form-check">
					<label class="form-check-label"> <a href="../about/terms.html">कृपया नियम एवं शर्तों को एक बार पढ़ ले ।</a> </label><br>
					<input class="form-check-input" type="checkbox" name="remember" required> मै सहमत हूं |
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Check this checkbox to continue.</div>
				</div>
				<input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
			</form>
		</div>
		<br/>
	</div>
	<br/>
	<br/>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>