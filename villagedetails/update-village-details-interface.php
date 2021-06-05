<?php

/**
* This page provides interface for updating the village details. 
*/

/**
* This ("identification.php") file contains User Authentication code.
* This ("identification.php") file contains Database Connection code.
* It checks the user existency in database .
*/
require_once '../control/identification.php';

?>
<html>
<head>
	<title>MorGaon : MyEVillage | Digital Village</title>
    <meta charset="UTF-8">
    <meta name="description" content="Ham hamesh aapko gaon me hone wali sundar ghatnao aur parivartano se avgat karate rahenge, MorGaon">
    <meta name="keywords" content="mor gaon, myevillage, mor gaon ki jankari, khairjhiti kala, gaon, dukano ka vivran, dukan,evillage, mor gaon me suchna kaise dale ">
    <meta name="author" content="Manish Patel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
	.navbar-brand img{
		width:50px;
		height:40px;
	}
	</style>
</head>
<body>
	<?php 
	//including header navbar.
	include '../about/header_component.php';
	?>
	<br/>		
	<?php
		$query1="select user_village from user where user_id='$mid'";
		$result=mysqli_query($conn,$query1);
		$row1=mysqli_fetch_assoc($result);
		$village1 = $row1["user_village"];
		$query="select * from villagedetails where village='$village1'";
		$result1=mysqli_query($conn,$query); 
		
	while($row=mysqli_fetch_assoc($result1)){
	?>
	<div class="container">
		<div class="module">
			<h5>अपने गांव के बारे में जानकारी अपडेट करें :</h5>
			<hr/>
			<p>Note : कृपया फॉर्म English में भरें...</p>
			<br/>
			<form class="form" action="updatevillagedetails.php" method="POST" enctype="multipart/form-data" autocomplete="off">
				<div class="form-group">
					<label for="mob">मौसम : </label>
					<input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row['weather'], ENT_QUOTES, 'UTF-8');?>"  placeholder="&#2350;&#2380;&#2360;&#2350;" name="weather">
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="username">सरपंच :</label>
					<input type="text" class="form-control" id="username" value="<?php echo htmlspecialchars($row['sarpanch'], ENT_QUOTES, 'UTF-8'); ?>" placeholder="Pura Nam" name="sarpanch" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="username">Sub-सरपंच :</label>
					<input type="text" class="form-control" id="username" value="<?php echo htmlspecialchars($row['upsarpanch'], ENT_QUOTES, 'UTF-8'); ?>" placeholder="Pura Nam" name="upsarpanch" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="uname">सरपंच जी का मोबाइल नंबर :</label>
					<input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row['sarpanchmob'], ENT_QUOTES, 'UTF-8'); ?>"  placeholder="Mobile Number" name="sarpanchmob" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="uname">कुल वार्ड संख्या :</label>
					<input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row['ward'], ENT_QUOTES, 'UTF-8'); ?>"  placeholder="Ward Sankhya" name="ward" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="uname">मकानों की संख्या :</label>
					<input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row['houses'], ENT_QUOTES, 'UTF-8'); ?>"  placeholder="Makano ki Sankhya" name="houses">
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="uname">कुल जनसंख्या :</label>
					<input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row['population'], ENT_QUOTES, 'UTF-8');?>"  placeholder="Jansankhya" name="population">
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="uname">महिलाओं की संख्या :</label>
					<input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row['populationF'], ENT_QUOTES, 'UTF-8');?>"  placeholder="Mahila" name="populationF">
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="uname">पुरुषों की संख्या :</label>
					<input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row['populationM'], ENT_QUOTES, 'UTF-8');?>"  placeholder="Purush" name="populationM">
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="uname">भू - जलस्तर :</label>
					<input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row['waterlevel'], ENT_QUOTES, 'UTF-8');?>"  placeholder="Water Lavel" name="waterlevel">
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="mob">तालाबों की संख्या :</label>
					<input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row['ponds'], ENT_QUOTES, 'UTF-8');?>"  placeholder="Talab" name="ponds">
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="mob">गांव में समस्याएं :</label>
					<textarea rows="10" class="form-control" id="uname" placeholder="Samasya Likhen" name="samasya" required> <?php echo htmlspecialchars($row["samasya"], ENT_QUOTES, 'UTF-8');?></textarea>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="mob">आपके गांव में कहा तक स्कूल या कॉलेज है -</label>
					<br/>
					<input type="radio" class="form-check-input" name="school" value="none"
					<?php if($row["school"] == "none")
					echo "checked";
					?>
					> नहीं है 
					<br/>
					<input type="radio" class="form-check-input" name="school" value="5"
					<?php if($row["school"] == "5")
					echo "checked";
					?>
					> 5वी तक है 
					<br/>
					<input type="radio" class="form-check-input" name="school" value="8"
					<?php if($row["school"] == "8")
					echo "checked";
					?>
					> 8वी तक है 
					<br/>
					<input type="radio" class="form-check-input" name="school" value="10"
					<?php if($row["school"] == "10")
					echo "checked";
					?>
					> 10वी तक है 
					<br/>
					<input type="radio" class="form-check-input" name="school" value="12"
					<?php if($row["school"] == "12")
					echo "checked";
					?>
					> 12वी तक है 
					<br/>
					<input type="radio" class="form-check-input" name="school" value="College"
					<?php if($row["school"] == "College")
					echo "checked";
					?>
					> Graduation तक है 
					<br/>
					<input type="radio" class="form-check-input" name="school" value="Post Graduation"
					<?php if($row["school"] == "Post Graduation")
					echo "checked";
					?>
					> Post Graduation तक है
					<br/>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="mob">दुकानों की संख्या :</label>
					<input type="text" class="form-control" id="uname" placeholder="Dukano Ki Sankhya" name="shop" value="<?php echo htmlspecialchars($row['shop'], ENT_QUOTES, 'UTF-8');?>">
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group" style="margin-left:20px;">
					<label for="mob">प्राथमिक/उपस्वास्थ्य केंद्र है -</label><br>
					<input type="radio" class="form-check-input" name="health" value="Yes"
					<?php
					if($row["health"] == "Yes")
					echo "checked";
					?>
					> हां है 
					<br/>
					<input type="radio" class="form-check-input" name="health" value="No"
					<?php
					if($row["health"] == "No")
					echo "checked";
					?>
					> नहीं है
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="mob">जिला : </label>
					<input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row['jila'], ENT_QUOTES, 'UTF-8');?>"  placeholder="&#2332;&#2367;&#2354;&#2366;" name="jila" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div> 
				<div class="form-group">
					<label for="mob">तहसील : </label>
					<input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row['tehsil'], ENT_QUOTES, 'UTF-8');?>"  placeholder="&#2340;&#2361;&#2360;&#2368;&#2354;" name="tehsil" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>  
				<div class="form-group">
					<label for="mob">पुलिस स्टेशन : </label>
					<input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row['polish'], ENT_QUOTES, 'UTF-8');?>"  placeholder="&#2346;&#2369;&#2354;&#2367;&#2360; &#2360;&#2381;&#2335;&#2375;&#2358;&#2344;" name="polish" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="mob">विकास खंड : </label>
					<input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row['block'], ENT_QUOTES, 'UTF-8');?>"  placeholder="&#2357;&#2367;&#2325;&#2366;&#2360; &#2326;&#2306;&#2337;" name="block" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="mob">लोकसभा क्षेत्र :</label>
					<input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row['loksabha'], ENT_QUOTES, 'UTF-8');?>"  placeholder="&#2354;&#2379;&#2325;&#2360;&#2349;&#2366; &#2325;&#2381;&#2359;&#2375;&#2340;&#2381;&#2352;" name="loksabha" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="mob">विधानसभा क्षेत्र :</label>
					<input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row['vidhansabha'], ENT_QUOTES, 'UTF-8');?>"  placeholder="&#2357;&#2367;&#2343;&#2366;&#2344;&#2360;&#2349;&#2366; &#2325;&#2381;&#2359;&#2375;&#2340;&#2381;&#2352;" name="vidhansabha" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="mob">विधायक : </label>
					<input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row['vidhayak'], ENT_QUOTES, 'UTF-8');?>"  placeholder="&#2357;&#2367;&#2343;&#2366;&#2351;&#2325;" name="vidhayak" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="mob">सांसद : </label>
					<input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row['sansad'], ENT_QUOTES, 'UTF-8');?>"  placeholder="&#2360;&#2366;&#2306;&#2360;&#2342;" name="sansad">
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>  
				<div class="form-group">
					<label for="mob">डाकघर पिन कोड : </label>
					<input type="text" class="form-control" id="uname" value="<?php echo htmlspecialchars($row['pincode'], ENT_QUOTES, 'UTF-8');?>"  placeholder="डाकघर पिन कोड" name="pincode" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				
				<input type="hidden" class="form-control" id="uname" value="<?php echo $village1;?>" name="uservillage" required>
					
				<div class="form-group form-check">
					<label class="form-check-label"> <a href="#">कृपया शर्तों को एक बार पढ़ ले ।</a> </label><br>
					<input class="form-check-input" type="checkbox" name="remember" required> मै सहमत हूं |
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Check this checkbox to continue.</div>
				</div>
				<button type="submit" name="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
	<?php
	}
	?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>