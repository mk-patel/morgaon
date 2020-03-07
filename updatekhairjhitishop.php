<html>
<head>
    <title>Mor Gaon : MyEVillage</title>
	<meta charset="UTF-8">
    <meta name="description" content="Ham hamesh aapko gaon me hone wali sundar ghatnao aur parivartano se avgat karate rahenge, MorGaon">
    <meta name="keywords" content="mor gaon, myevillage, mor gaon ki jankari, khairjhiti kala, gaon, dukano ka vivran, dukan, ">
    <meta name="author" content="Manish Patel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
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
$tid = $row["id"];
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
if(isset($_REQUEST["eid"]))
{
$eid=$_REQUEST["eid"];
$query="select * from khairjhitishop where id='$eid' && user_id='$tid'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);

}
if(isset($_REQUEST["submit"]))
{
	$shopstatus=$_REQUEST["shopstatus"];
	$query1="update khairjhitishop set shopstatus='$shopstatus' where id='$eid'";
        mysqli_query($conn, $query1);
	header("location:welcome.php");
}



?>

<form method="post">
<div class="container">
<h2 style="color:darkorange; font-size:18px;">&#2309;&#2346;&#2344;&#2366; &#2342;&#2369;&#2325;&#2366;&#2344; &#2351;&#2366; &#2360;&#2366;&#2352;&#2381;&#2357;&#2332;&#2344;&#2367;&#2325; &#2325;&#2381;&#2359;&#2375;&#2340;&#2381;&#2352; &#2325;&#2368; &#2360;&#2381;&#2341;&#2367;&#2340;&#2367; &#2348;&#2340;&#2366;&#2319; :</h2>
<p><input type="radio"  name="shopstatus" value="on"

<?php

if($row["shopstatus"]=='on')

{
	echo "checked";
}

?>


>&#2326;&#2369;&#2354;&#2366; &#2361;&#2376;</p>
<p><input type="radio"  name="shopstatus" value="off"

<?php

if($row["shopstatus"]=='off')

{
	echo "checked";
}

?>


>&#2348;&#2306;&#2342; &#2361;&#2376;</p>

<p><input type="submit" value="Update" name="submit"></p>

</div>
</form>
</html>