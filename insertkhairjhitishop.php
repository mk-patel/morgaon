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

$user4=$_SESSION["username"];
$query4="select * from users where username='$user4'";
$query098 = mysqli_query($conn,$query4);
$row4=mysqli_fetch_assoc($query098);

$id4=$row4["id"];


?>


<?php

$_SESSION['message'] = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$username = $mysqli->real_escape_string($_POST['username']);
		
		$email = $mysqli->real_escape_string($_POST['pita-ka-nam']);
		$village = $mysqli->real_escape_string($_POST['village']);
		$jila = $mysqli->real_escape_string($_POST['jila']);
		$password = $mysqli->real_escape_string($_POST['mob']);
		$avatar_path = $mysqli->real_escape_string('images/'.$_FILES['avatar']['name']);
		$dt2=date("Y-m-d H:i:s");
		if (preg_match("!image!", $_FILES['avatar']['type'])){
			
			if (copy($_FILES['avatar']['tmp_name'], $avatar_path)){
				
				
				$sql = "INSERT INTO khairjhitishop(shopkipper,mobile,shopname,gaon,shopstatus,date,user_id,image)"
				. "VALUES('$username','$password','$email','$village','$jila','$dt2','$id4','$avatar_path')";
				
				if ($mysqli->query($sql) === true) {
					$_SESSION['message'] = "Welcome $username ! You Successfully Registered";
					echo "&#2360;&#2347;&#2354;&#2340;&#2366;&#2346;&#2370;&#2352;&#2381;&#2357;&#2325; &#2342;&#2352;&#2381;&#2332; &#2325;&#2367;&#2351;&#2366; &#2327;&#2351;&#2366;&#2404;";
				        echo "<a href='welcome.php'>Back</a>";
				}else{
					$_SESSION['message'] = "user could not be added";
				}
			}else{
				$_SESSION['message'] = "File upload failed!";
			}
		}
		else{
			$_SESSION['message'] = "please only upload jpg, png, gif images";
		}
	
}

?>