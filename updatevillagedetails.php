<html>
<?php
session_start();
require 'db.php';
$user=$_SESSION["username"];
$password=$_SESSION["password"];
$query="select * from users where username='$user' and password='$password'";
$result = mysqli_query($conn, $query);
$row=mysqli_fetch_assoc($result);
$un = $row["username"];
$id = $row["id"];
$village2 = $row["village"];
$pass = $row["password"];
if ($_SESSION["username"] == $un)
	
	{
		echo "Welcome ! ";
	}else{
		header('location:login.php');
	}
 if ($password == $pass)
 {
	 echo $_SESSION["username"];
 }else{
	 
	 header('location: login.php');
 }
	
?>
<?php

if(isset($_REQUEST["submit"])){
    	
		$username = mysqli_real_escape_string($conn,$_REQUEST['sarpanch']);
        $upsarpanch = mysqli_real_escape_string($conn,$_REQUEST['upsarpanch']);
		$dob =  mysqli_real_escape_string($conn,$_REQUEST['sarpanchmob']);
		$email = mysqli_real_escape_string($conn, $_REQUEST['ward']);
		$houses = mysqli_real_escape_string($conn,$_REQUEST['houses']);
		$pincode = mysqli_real_escape_string($conn,$_REQUEST['population']);
		$pincodeF = mysqli_real_escape_string($conn, $_REQUEST['populationF']);
		$pincodeM = mysqli_real_escape_string($conn, $_REQUEST['populationM']);
		$waterlevel = mysqli_real_escape_string($conn, $_REQUEST['waterlevel']);
		$ponds = mysqli_real_escape_string($conn, $_REQUEST['ponds']);
		$samasya =mysqli_real_escape_string($conn, $_REQUEST['samasya']);
        $school = mysqli_real_escape_string($conn,$_REQUEST['school']);
        $shop = mysqli_real_escape_string($conn, $_REQUEST['shop']);
        $health = mysqli_real_escape_string($conn, $_REQUEST['health']);
        $weather = mysqli_real_escape_string($conn, $_REQUEST['weather']);
        $jila = mysqli_real_escape_string($conn, $_REQUEST['jila']);
        $tehsil = mysqli_real_escape_string($conn, $_REQUEST['tehsil']);
        $polish = mysqli_real_escape_string($conn, $_REQUEST['polish']);
        $block = mysqli_real_escape_string($conn, $_REQUEST['block']);
        $loksabha = mysqli_real_escape_string($conn, $_REQUEST['loksabha']);
        $vidhansabha = mysqli_real_escape_string($conn, $_REQUEST['vidhansabha']);
        $vidhayak = mysqli_real_escape_string($conn, $_REQUEST['vidhayak']);
        $sansad = mysqli_real_escape_string($conn, $_REQUEST['sansad']);
        $pincode2 = mysqli_real_escape_string($conn, $_REQUEST['pincode']);
		$userid = mysqli_real_escape_string($conn,$_REQUEST['userid']);
	    $village2 = mysqli_real_escape_string($conn,$_REQUEST['uservillage']);
		$query2="update villagedetails set sarpanch='$username' ,upsarpanch='$upsarpanch' , sarpanchmob='$dob' ,ward ='$email',houses='$houses',population='$pincode' ,populationF='$pincodeF',populationM='$pincodeM',waterlevel='$waterlevel',ponds='$ponds',samasya='$samasya' ,school='$school',shop='$shop',health='$health' ,weather='$weather' ,jila='$jila' ,tehsil='$tehsil' ,polish='$polish' ,block='$block' ,loksabha='$loksabha' ,vidhansabha='$vidhansabha' ,vidhayak='$vidhayak' ,sansad='$sansad' ,pincode='$pincode2', user_id='$userid'  where village='$village2'";
        mysqli_query($conn,$query2);
        echo "<br>";
        echo "&#2360;&#2347;&#2354;&#2340;&#2366;&#2346;&#2370;&#2352;&#2381;&#2357;&#2325; &#2342;&#2352;&#2381;&#2332; &#2325;&#2367;&#2351;&#2366; &#2327;&#2351;&#2366;&#2404;";
        echo "<br>";
        echo "<a href='welcome.php'>Back</a>";

}	
?>
</html>