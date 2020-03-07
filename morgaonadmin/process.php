<?php
require 'db.php';
if(isset($_POST["submit"]))
{
	$unn = mysqli_real_escape_string($conn, $_POST['username']);
    $un = trim($unn);
	$pwdd = mysqli_real_escape_string($conn, $_POST['password']);
    $pwd = md5($pwdd);
    $pwd = sha1($pwd);
	if(empty($un) || empty($pwd)){
        echo "<br>";
        echo "<center style='color:red;font-weight:700;'>Username And Password Is Empty !! </center>";
        echo "<br>";
	}
	else{
		$sql="SELECT * FROM adminusers WHERE username='$un'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck < 1){
			echo "<br>";
            echo "<center style='color:red;font-weight:700;'>Invalid Login ! </center>";
            echo "<br>";
		}
		else{
            $row = mysqli_fetch_assoc($result);
			if($pwd !== $row["password"]){
					echo "<br>";
                    echo "<center style='color:red;font-weight:700;'> Wrong Password !! </center>";
                    echo "<br>";
				}
				else if($pwd == $row["password"]){
					session_start();
					$_SESSION["username"] = $row["username"];
					$_SESSION["password"] = $row["password"];
					if(!empty($_POST["remember"])){
		                setcookie ("username",$un,time()+(10 * 365 * 24 * 60 * 60));
		                setcookie ("password",$pwdd,time()+(10 * 365 * 24 * 60 * 60));
	                }
					else{
		                if(isset($_COOKIE["username"])){
			                setcookie ("username","");
						}
		                if(isset($_COOKIE["password"])){
			                setcookie ("password","");
		                }
	                }
					header("Location: admin.php");
				}
				else{
					echo "<br>";
                    echo "<center style='color:red;font-weight:700;'> Password Not Matched !! </center>";
                    echo "<br>";
				}
			}
			
		}
}
else{
    echo "<br>";
    echo "<center style='color:red;font-weight:700;'>Please Login !!! </center>";
    echo "<br>";
}

?>