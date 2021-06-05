<?php
/**
* This page counts likes of a post.
*/

/**
* This ("identification.php") file contains User Authentication code.
* This ("identification.php") file contains Database Connection code.
* It checks the user existency in database.
*/
require_once '../control/identification.php';
if (isset($_POST['showlike'])){
	$id = $_POST['id'];
	$query2=mysqli_query($conn,"select id from `like_unlike` where postid='$id'");
	echo mysqli_num_rows($query2);	
}
?>