<?php

/**
* This page updates the village details. 
*/

/**
* This ("identification.php") file contains User Authentication code.
* This ("identification.php") file contains Database Connection code.
* It checks the user existency in database .
*/
require_once '../control/identification.php';

if(isset($_POST["submit"])){
    	
		$sarpanch = mysqli_real_escape_string($conn,$_POST['sarpanch']);
        $upsarpanch = mysqli_real_escape_string($conn,$_POST['upsarpanch']);
		$sarpanchmob =  mysqli_real_escape_string($conn,$_POST['sarpanchmob']);
		$ward = mysqli_real_escape_string($conn, $_POST['ward']);
		$houses = mysqli_real_escape_string($conn,$_POST['houses']);
		$population = mysqli_real_escape_string($conn,$_POST['population']);
		$populationF = mysqli_real_escape_string($conn, $_POST['populationF']);
		$populationM = mysqli_real_escape_string($conn, $_POST['populationM']);
		$waterlevel = mysqli_real_escape_string($conn, $_POST['waterlevel']);
		$ponds = mysqli_real_escape_string($conn, $_POST['ponds']);
		$samasya =mysqli_real_escape_string($conn, $_POST['samasya']);
        $school = mysqli_real_escape_string($conn,$_POST['school']);
        $shop = mysqli_real_escape_string($conn, $_POST['shop']);
        $health = mysqli_real_escape_string($conn, $_POST['health']);
        $weather = mysqli_real_escape_string($conn, $_POST['weather']);
        $jila = mysqli_real_escape_string($conn, $_POST['jila']);
        $tehsil = mysqli_real_escape_string($conn, $_POST['tehsil']);
        $polish = mysqli_real_escape_string($conn, $_POST['polish']);
        $block = mysqli_real_escape_string($conn, $_POST['block']);
        $loksabha = mysqli_real_escape_string($conn, $_POST['loksabha']);
        $vidhansabha = mysqli_real_escape_string($conn, $_POST['vidhansabha']);
        $vidhayak = mysqli_real_escape_string($conn, $_POST['vidhayak']);
        $sansad = mysqli_real_escape_string($conn, $_POST['sansad']);
        $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
	    $uservillage = mysqli_real_escape_string($conn,$_POST['uservillage']);
		echo $uservillage;
		$query2="update villagedetails set sarpanch='$sarpanch' ,
				upsarpanch='$upsarpanch' ,sarpanchmob='$sarpanchmob' ,
				ward ='$ward',houses='$houses',
				population='$population' ,populationF='$populationF',
				populationM='$populationM',waterlevel='$waterlevel',ponds='$ponds',
				samasya='$samasya' ,school='$school',shop='$shop',health='$health' ,
				weather='$weather' ,jila='$jila' ,tehsil='$tehsil' ,polish='$polish' ,
				block='$block' ,loksabha='$loksabha' ,vidhansabha='$vidhansabha' ,
				vidhayak='$vidhayak' ,sansad='$sansad' ,pincode='$pincode', 
				user_id='$mid'  where village='$uservillage'";
        mysqli_query($conn,$query2);
        echo "<br>";
        echo "&#2360;&#2347;&#2354;&#2340;&#2366;&#2346;&#2370;&#2352;&#2381;&#2357;&#2325; &#2342;&#2352;&#2381;&#2332; &#2325;&#2367;&#2351;&#2366; &#2327;&#2351;&#2366;&#2404;";
        echo "<br>";
        echo "<a href='../userprofile/welcome.php'>Back</a>";

}	
?>
</html>