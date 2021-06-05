<?php

/**
* This page provide interface for uploading user profile picture. 
*/

/**
* This ("identification.php") file contains User Authentication code.
* This ("identification.php") file contains Database Connection code.
* It checks the user existency in database .
*/
require_once '../control/identification.php';

?>
<html>
<body>
<?php

// when user submits, the file will be uploaded into user table.
if(isset($_REQUEST["submit"])){
	$file = $_FILES['user_image'];
	$fileName = $_FILES['user_image']['name'];
	$fileTmpName = $_FILES['user_image']['tmp_name'];
	$fileSize = $_FILES['user_image']['size'];
	$fileError = $_FILES['user_image']['error'];
	$fileType = $_FILES['user_image']['type'];
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
				$sql = "UPDATE user SET user_image='$fileDestination' where user_id='$mid'";
				mysqli_query($conn, $sql);
				echo "<br>";
				echo "<br>";
				echo "<div style='text-align:center;font-weight:700;'><p>Successful, Display Profile has been uploaded.</p></div>";
				echo "<p style='text-align:center;'><a style='text-align:center;color:red;font-size:20px;font-weight:700;' href='welcome.php'>Back</a></p>";
				echo "<br>";
			}
			else{
				echo "Too Big Image, Please Upload Image Under 2 MB Size.";
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
?>
</body>
</html>