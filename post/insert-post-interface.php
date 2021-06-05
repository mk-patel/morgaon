<?php

/**
* This page inserts the user's post into database.
*/

/**
* This ("identification.php") file contains User Authentication code.
* This ("identification.php") file contains Database Connection code.
* It checks the user existency in database .
*/
require_once '../control/identification.php';

// Setting up the timezone.
date_default_timezone_set('Asia/Calcutta');
$date=date("d M Y");
$time=date("H:i A");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$post_title = $mysqli->real_escape_string($_POST['post_title']);
	$post_data =$mysqli->real_escape_string($_POST['post_data']);
	$post_village = $mysqli->real_escape_string($_POST['post_village']);
    if(empty($_FILES['post_image']['tmp_name'])){
        $post_image = "images/default.jpg";
		
		// $mid variable from "identification.php" for user_id.
		$sql = "INSERT INTO post(post_title,post_data,post_village,post_time,post_date,post_image,user_id)"
        . "VALUES('$post_title','$post_data','$post_village','$time','$date','$post_image','$mid')";
        mysqli_query($conn,$sql);
		header('location:../userprofile/welcome.php');
		
        }
		else{
        $file = $_FILES['post_image'];
		$fileName = $_FILES['post_image']['name'];
		$fileTmpName = $_FILES['post_image']['tmp_name'];
		$fileSize = $_FILES['post_image']['size'];
		$fileError = $_FILES['post_image']['error'];
		$fileType = $_FILES['post_image']['type'];
		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));
		$allowed = array('jpg', 'png', 'jpeg','gif');
		if(in_array($fileActualExt, $allowed)){
			if($fileError === 0){
				if($fileSize < 4624616){
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
					$newwidth_min=360;
					$newheight_min = ($height_min / $width_min)*$newwidth_min;
					$tmp_min = imagecreatetruecolor($newwidth_min, $newheight_min);
					imagecopyresampled($tmp_min, $src, 0,0,0,0,$newwidth_min, $newheight_min, $width_min , $height_min);
					$fileDestinatio  =  imagejpeg($tmp_min,"../images/".$fileNameNew,90);
					$fileDestination ='images/'.$fileNameNew;
				
					move_uploaded_file($fileTmpName, $fileDestinatio);
                    $sql = "INSERT INTO post(post_title,post_data,post_village,post_time,post_date,post_image,user_id)"
					. "VALUES('$post_title','$post_data','$post_village','$time','$date','$fileDestination','$mid')";
					mysqli_query($conn, $sql);
                    header('location:../userprofile/welcome.php');
				}
				else{
                    echo "Too Big Image, Please Upload Image Under 600kb Size.";
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
else{
	echo "Please try again";
}
?>