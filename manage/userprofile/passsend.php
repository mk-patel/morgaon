<?php

/**
* This page updates user's password. 
*/

/**
* This ("identification.php") file contains User Authentication code.
* This ("identification.php") file contains Database Connection code.
* It checks the user existency in database .
*/
require_once '../control/identification.php';
	
?>
<br/><br/>
<?php
if (isset($_POST['submit'])) {
        $pw = $mysqli->real_escape_string($_POST['password']);
		$id = $mysqli->real_escape_string($_POST['id']);
        $mobile = $mysqli->real_escape_string($_POST['mobile']);
		$pwd = md5($pw);
        $pwd = sha1($pwd);
		$sql = "UPDATE user SET password='$pwd' WHERE user_email='$mobile'";
		mysqli_query($conn,$sql);
		echo "<br>";
        echo "<center style='color:green;font-weight:700;'>Successfull, Password has been changed.</a></center>";
        echo "<br>";
}else{
	echo "Password Not Changed, Please Try Again!";
}
?>