<?php
session_start();
require 'db.php';
$user=$_SESSION["username"];
$password=$_SESSION["password"];
$query="select * from adminusers where username='$user' and password='$password'";
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
<br><br>
<?php
if (isset($_POST['submit'])) {
        $pw = $mysqli->real_escape_string($_POST['password']);
		$id = $mysqli->real_escape_string($_POST['id']);
        $username = $mysqli->real_escape_string($_POST['username']);
		$pwd = md5($pw);
        $pwd = sha1($pwd);
		$sql = "UPDATE users SET password='$pwd' WHERE email='$username'";		        
        $result1 = "UPDATE registervillage SET block='Done' WHERE id='$id'";
		mysqli_query($conn,$sql);
        mysqli_query($conn,$result1);
		echo "<br>";
        echo "<center style='color:green;font-weight:700;'>Successfull, Password has been changed.</a></center>";
        echo "<br>";
}else{
	echo "Password Not Changed, Please Try Again!";
}
?>