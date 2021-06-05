<?php

/**
* This page provide interface for registering a village shop. 
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
		.module h3{
			font-size:20px;
			font-weight:700;
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
		@media screen and (max-width:700px){
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
		.col-sm-6 h2{
			font-size:18px;
			color:grey;
		}
		}
	</style>
</head>
<body>
	
	<?php

	//including header navbar.
	include '../about/header_component.php';
	?>
	<br/>
	<?php
	$shopstatus = "on";
	if(isset($_POST["submit"])) {
		$puranam = $mysqli->real_escape_string($_POST['puranam']);
		$shopname = $mysqli->real_escape_string($_POST['shopname']);
		$shopdetails = $mysqli->real_escape_string($_POST['shopdetails']);
		$village = $mysqli->real_escape_string($_POST['village']);
		$mob = $mysqli->real_escape_string($_POST['mob']);
		$category = $mysqli->real_escape_string($_POST['category']);
		$pata = $mysqli->real_escape_string($_POST['pata']);
		$dt2=date("Y-m-d H:i:s");
		 $file = $_FILES['shop_image'];
		$fileName = $_FILES['shop_image']['name'];
		$fileTmpName = $_FILES['shop_image']['tmp_name'];
		$fileSize = $_FILES['shop_image']['size'];
		$fileError = $_FILES['shop_image']['error'];
		$fileType = $_FILES['shop_image']['type'];
		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));
		$allowed = array('jpg', 'png', 'jpeg','gif');
		if(in_array($fileActualExt, $allowed)){
			if($fileError === 0){
				if($fileSize < 2624616){
					$fileNameNew = uniqid('', true).".".$fileActualExt;
					$ext = pathinfo($fileName, PATHINFO_EXTENSION);
					if($ext == "png" || $ext == "PNG"  || 
					   $ext == "jpg" || $ext == "ipeg" || 
					   $ext == "JPG" || $ext == "JPEG" ||
					   $ext == "gif" || $ext == "GIF"
					)
					if($ext == "jpg" ||$ext == "JPG" || $ext == "jpeg" || $ext == "JPEG")
					{
						$src = imagecreatefromjpeg($fileTmpName);
					}
					if($ext == "png" ||$ext == "PNG")
					{
						$src = imagecreatefrompng($fileTmpName);
					}
					if($ext == "gif" ||$ext == "GIF")
					{
						$src = imagecreatefromgif($fileTmpName);
					}
					
					list($width_min,$height_min) = getimagesize($fileTmpName);
					$newwidth_min=160;
					$newheight_min = ($height_min / $width_min)*$newwidth_min;
					$tmp_min = imagecreatetruecolor($newwidth_min, $newheight_min);
					imagecopyresampled($tmp_min, $src, 0,0,0,0,$newwidth_min, $newheight_min, $width_min , $height_min);
					$fileDestinatio  =  imagejpeg($tmp_min,"../images/".$fileNameNew,80);
					$fileDestination ='images/'.$fileNameNew;
				
					move_uploaded_file($fileTmpName, $fileDestinatio);
                    $sql = "INSERT INTO shop(shopkipper,shop_name,shop_category,shop_details,shop_address,shop_village,shop_mobile,shop_status,date,shop_image,user_id)"
				    . "VALUES('$puranam','$shopname','$category','$shopdetails','$pata','$village','$mob','$shopstatus','$dt2','$fileDestination','$mid')";
				    mysqli_query($conn, $sql);
                    echo "<br><hr/>";
                    echo "<center>&#2360;&#2347;&#2354;&#2340;&#2366;&#2346;&#2370;&#2352;&#2381;&#2357;&#2325; &#2342;&#2352;&#2381;&#2332; &#2325;&#2367;&#2351;&#2366; &#2327;&#2351;&#2366;&#2404;</center>";
             	    echo "<br>";
                    echo "<center><a style='color:darkorange;font-size:17px;font-weight:800;margin-left:20px;' href='../userprofile/welcome.php'> << &#2346;&#2368;&#2331;&#2375; &#2332;&#2366;&#2319;...</a></center>";
                    echo "<br><hr/><br>";
				}else{
                    echo "<br><br>";
                    echo "<center>Too Big Image, Please Upload Image Under 3MB Size.";
                    echo "<br><br>";
                 }
             }else{
                 echo "<br><br>";
                 echo "<center>Sorry! Something Went Wrong.</center>";
                 echo "<br><br>";
             }
         }else{
             echo "<br><br>";
             echo "<center>Warning ! You can not upload of this type of file.</center>";
             echo "<br><br>";
         }
        }  
	?>
	<?php 
	$query0 ="select village from villagedetails";
	$result = mysqli_query($conn, $query0);
	$rowcount0=mysqli_num_rows($result);
	?>
	<div class="d-flex justify-content-center">
		<div class="container">
			<div class="module">
				<h3>अपना दुकान / सार्वजनिक क्षेत्र रजिस्टर करें :</h3>
				<hr/>
				<p>Note : कृपया फॉर्म English में भरें...</p>
				<form class="form" method="POST" enctype="multipart/form-data" autocomplete="on">
					<div class="form-group">
						<label for="username">आपका/मालिक का पूरा नाम :</label>
						<input type="text" class="form-control" id="username" name="puranam" required>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<div class="form-group">
						<label for="uname">दुकान / सार्वजनिक स्थान का पूरा नाम :</label>
						<input type="text" class="form-control" id="uname" name="shopname" required>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<div class="form-group">
						<label for="uname">दुकान का प्रकार :</label>
						<select class="custom-select" name="category" required>
							<option selected>किराना स्टोर</option>
							<option> जनरल स्टोर</option>
							<option> बुक स्टोर</option>
							<option> ज्वेलरी शॉप</option>
							<option> खिलौना शॉप</option>
							<option> गिफ्ट स्टोर्स</option>
							<option> साड़ी स्टोर्स</option>
							<option> कपड़ा दुकान</option>
							<option> सिलाई कढ़ाई स्टोर्स</option>
							<option> चॉइस सेंटर</option>
							<option> ई- सेंटर</option>
							<option> फोटोकॉपी</option>
							<option> फोटोग्राफी</option>
							<option> इलेक्ट्रॉनिक स्टोर्स</option>
							<option> अनाज दुकान</option>
							<option> हार्डवेयर शॉप</option>
							<option> सॉफ्टवेयर शॉप</option>
							<option> फल / सब्जी</option>
							<option> सायकल स्टोर्स</option>
							<option> हेयर सैलून</option>
							<option> उचित मूल्य की दुकान</option>
							<option> होटल/रेस्टोरेंट</option>
							<option> मोबाइल शॉप</option>
							<option> चप्पल दुकान</option>
							<option> मिठाई दुकान</option>
							<option> शो रूम्स</option>
							<option> मेडिकल स्टोर्स</option>
							<option> रेपरिंग शॉप</option>
							<option> उपहार एवम् सेवाएं</option>
							<option> अन्य</option>
						</select>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<div class="form-group">
						<label for="uname">दुकान / सार्वजनिक स्थान की ख़ास बातें :</label>
						<textarea rows="5" class="form-control" id="uname" name="shopdetails" required></textarea>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<div class="form-group">
						<label for="uname">पता :</label>
						<textarea rows="5" class="form-control" id="uname" name="pata" required></textarea>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<div class="form-group">
						<label for="uname">गांव:</label>
						<select class="custom-select" name="village" required>
						<option selected>&#2309;&#2346;&#2344;&#2366; &#2327;&#2366;&#2306;&#2357; &#2330;&#2369;&#2344;&#2375;&#2306;</option>
						<?php
						while($row0=mysqli_fetch_assoc($result))
						{
						?>
							<option value="<?php echo $row0["village"]; ?>"><?php echo $row0["village"]; ?></option>
						<?php 
						}
						?>  
						</select>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<div class="form-group">
						<label for="mob">मोबाइल नंबर:</label>
						<input type="int" class="form-control" id="uname" name="mob" required>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<hr/>
					<p>ध्यान रहे वैरीफिकेशन के लिए<br>
						हम आपको इसी नंबर पर मैसेज या कॉल करेंगे ।
					</p>
					<hr/>
					<div class="form-group">
						<label for="file">दुकान / सार्वजनिक स्थान का फोटो डालें</label>
						<input type="file" class="form-control" id="file" name="shop_image" required>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<div class="form-group form-check">
						<label class="form-check-label"> <a href="terms.html">कृपया नियम एवं शर्तों को एक बार पढ़ ले ।</a> </label><br>
						<input class="form-check-input" type="checkbox" name="remember" required> मै सहमत हूं |
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Check this checkbox to continue.</div>
					</div>
					<button type="submit" name="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>