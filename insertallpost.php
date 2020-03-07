<?php
session_start();
require 'db.php';
$user=$_SESSION["username"];
$password=$_SESSION["password"];
$query="select * from users where username='$user' and password='$password'";
$result = mysqli_query($conn, $query);
$row=mysqli_fetch_assoc($result);
$un = $row["username"];
$pass = $row["password"];
if(empty($user) || empty($password)){
       header("location: index.php");
         exit();
	}else{
if ($_SESSION["username"] == $row["username"])
	
	{
		echo "Welcome ! ";
	}else{
		header("location: index.php");
        exit();
	}
 if ($password == $row["password"])
 {
	 echo $row["username"];
    
 }else{
         header("location: index.php");
         exit();
 }
}	
?>
<?php
$query="select * from users where username='$user'";
$result = mysqli_query($conn, $query);
$row=mysqli_fetch_assoc($result);
$id=$row["id"];
if (isset($_POST['submit'])){
	$title = $mysqli->real_escape_string($_POST['title']);
	$content = $mysqli->real_escape_string($_POST['content']);
	$village = $mysqli->real_escape_string($_POST['village']);
    date_default_timezone_set('Asia/Calcutta');
	$dt2=date("d-m-Y");
	$dt1=date("H:i A");
 if(empty($_FILES['avatar']['tmp_name'])){
         $image = "images/default.jpg";
         $sql = "INSERT INTO post(uname,title,content,village,dt1,dt2,user_id,image) VALUES ('$user','$title','$content','$village','$dt1','$dt2','$id','$image')";
            mysqli_query($conn,$sql);
            header('location:allpost.php');
    }else{
         $file = $_FILES['avatar'];
         
         $fileName = $_FILES['avatar']['name'];
         $fileTmpName = $_FILES['avatar']['tmp_name'];
         $fileSize = $_FILES['avatar']['size'];
         $fileError = $_FILES['avatar']['error'];
         $fileType = $_FILES['avatar']['type'];
         
         $fileExt = explode('.', $fileName);
         $fileActualExt = strtolower(end($fileExt));
         
         $allowed = array('jpg', 'png', 'jpeg','gif');
         
         if(in_array($fileActualExt, $allowed)){
             if($fileError === 0){
                 if($fileSize <4624616){
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
					$newwidth_min=350;
					$newheight_min = ($height_min / $width_min)*$newwidth_min;
					$tmp_min = imagecreatetruecolor($newwidth_min, $newheight_min);
					imagecopyresampled($tmp_min, $src, 0,0,0,0,$newwidth_min, $newheight_min, $width_min , $height_min);
					$fileDestinatio  =  imagejpeg($tmp_min,"images/".$fileNameNew,90);
					$fileDestination ='images/'.$fileNameNew;
				
					move_uploaded_file($fileTmpName, $fileDestinatio);
                    $sql = "INSERT INTO post(uname,title,content,village,dt1,dt2,user_id,image) VALUES ('$user','$title','$content','$village','$dt1','$dt2','$id','$fileDestination')";
                    mysqli_query($conn, $sql);
                    header('location:allpost.php');
                 }else{
                     echo "Too Big Image, Please Upload Image Under 600kb Size.";
                 }
             }else{
                 echo "Sorry! Something Went Wrong.";
             }
         }else{
             echo "Warning ! You can not upload of this type of file.";
         }
        }       
}else{
    echo "<br>";
    echo "Please Try again later!";
}
?>