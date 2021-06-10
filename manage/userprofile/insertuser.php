<?php

/**
* This page inserts user's and vcode. 
*/

/**
* This ("identification.php") file contains User Authentication code.
* This ("identification.php") file contains Database Connection code.
* It checks the user existency in database .
*/
require_once '../control/identification.php';

// inserting user data into user table.
if (isset($_POST['submit']))  {
	
		$vcode = mysqli_real_escape_string($conn, $_POST['vcode']);
		$id = mysqli_real_escape_string($conn, $_POST['id']);

		$result ="UPDATE user SET vcode='$vcode' WHERE user_id='$id'";
		mysqli_query($conn,$result);
        echo "&#2360;&#2347;&#2354;&#2340;&#2366;&#2346;&#2370;&#2352;&#2381;&#2357;&#2325; &#2342;&#2352;&#2381;&#2332; &#2325;&#2367;&#2351;&#2366; &#2327;&#2351;&#2366;&#2404; <a href='user.php'>BACK</a>";
        
}
?>