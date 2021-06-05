<?php

/**
* This page provide interface for updating the village shop. 
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
	$shopkipper=$_POST["shopkipper"];
	$shopname= $_POST["shopname"];
	$category= $_POST["category"];
	$details= $_POST["details"];
	$pata= $_POST["pata"];
	$mobile= $_POST["mobile"];
	if(empty($_FILES['shop_image']['tmp_name'])){
		$query1="update shop set shopkipper='$shopkipper' , shop_name='$shopname' ,shop_category='$category', shop_details='$details' ,shop_address='$pata', shop_mobile='$mobile'  where shop_id='$eid'";
		$result1 = mysqli_query($conn, $query1);
		header('location:../userprofile/welcome.php');
	}
	else{
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
	                $query1="UPDATE shop SET shopkipper='$shopkipper' , shop_name='$shopname' ,shop_category='$category', shop_details='$details' ,shop_address='$pata',shop_mobile='$mobile', shop_image='$fileDestination' WHERE shop_id='$eid'";
	                $result1 = mysqli_query($conn, $query1);
	                header('location:../userprofile/welcome.php');
				}
				else{
                    echo "Too Big Image, Please Upload Image Under 4 MB Size.";
                }
			}
			else{
				echo "Sorry! Something Went Wrong.";
            }
		}
		else{
			echo "Warning ! You can not upload of this type of file.";
        }
	}
}
?>
<body>
	<?php
	$query="select shopkipper,shop_name,shop_category,shop_details,shop_address,shop_mobile from shop where shop_id='$eid'";
	$result = mysqli_query($conn, $query);
	$row=mysqli_fetch_assoc($result);
	?>
	<br/>
	<div class="container">
		<h5>अपने दुकान या सार्वजनिक स्थान की जानकारी अपडेट करें</h5>
		<br/>
		<form class="form" method="POST"  autocomplete="off">
			<div class="form-group">
				<label for="uname">दुकानदार / मालिक :</label>
				<input class="form-control" type="text" name="shopkipper" value="<?php echo htmlspecialchars($row["shopkipper"], ENT_QUOTES, 'UTF-8');?>">
				<div class="valid-feedback">Valid.</div>
				<div class="invalid-feedback">Please fill out this field.</div>
			</div>
			<div class="form-group">
				<label for="uname">दुकान / सार्वजनिक स्थान का नाम :</label>
				<input class="form-control" type="text" name="shopname" value="<?php echo htmlspecialchars($row["shop_name"], ENT_QUOTES, 'UTF-8');?>">
				<div class="valid-feedback">Valid.</div>
				<div class="invalid-feedback">Please fill out this field.</div>
			</div>
			<div class="form-group">
				<label for="uname">दुकान का प्रकार :</label>
				<select class="custom-select" name="category" required>
					<option selected><?php echo htmlspecialchars($row["shop_category"], ENT_QUOTES, 'UTF-8');?></option>
					<option> किराना स्टोर</option>
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
				<label for="uname">&#2342;&#2369;&#2325;&#2366;&#2344; / &#2360;&#2366;&#2352;&#2381;&#2357;&#2332;&#2344;&#2367;&#2325; &#2360;&#2381;&#2341;&#2366;&#2344; &#2325;&#2368; &#2326;&#2364;&#2366;&#2360; &#2348;&#2366;&#2340;&#2375;&#2306; : :</label>
				<textarea class="form-control" type="text" name="details" style="width:250px;" rows="5"><?php echo htmlspecialchars($row["shop_details"], ENT_QUOTES, 'UTF-8');?></textarea required>
				<div class="valid-feedback">Valid.</div>
				<div class="invalid-feedback">Please fill out this field.</div>
			</div>
			<div class="form-group">
				<label for="uname">पता :</label>
				<textarea class="form-control" type="text" name="pata" style="width:250px;" rows="3"><?php echo htmlspecialchars($row["shop_address"], ENT_QUOTES, 'UTF-8');?></textarea required>
				<div class="valid-feedback">Valid.</div>
				<div class="invalid-feedback">Please fill out this field.</div>
			</div>
			<div class="form-group">
				<label for="uname">मोबाइल नंबर :</label>
				<input class="form-control" type="text" name="mobile" value="<?php echo htmlspecialchars($row["shop_mobile"], ENT_QUOTES, 'UTF-8');?>">
				<div class="valid-feedback">Valid.</div>
				<div class="invalid-feedback">Please fill out this field.</div>
			</div>
			<div class="form-group">
				<label for="file">नया फोटो डालें :</label>
				<input type="file" class="form-control" id="file" name="shop_image">
			</div>
			<input type="submit" name="submit" class="btn btn-primary" >
		</form>
	</div>
</body>
</html>