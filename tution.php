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
       header("location: login.php");
         exit();
	}else{
if ($_SESSION["username"] == $row["username"])
	
	{
		echo "Welcome ! ";
	}else{
		header("location: login.php");
        exit();
	}
 if ($password == $row["password"])
 {
	 echo $row["username"];
    
 }else{
         header("location: login.php");
         exit();
 }
}	
?>
<html>
<head>
    <title>Mor Gaon : MyEVillage</title>
	<meta charset="UTF-8">
    <meta name="description" content="Ham hamesh aapko gaon me hone wali sundar ghatnao aur parivartano se avgat karate rahenge, MorGaon">
    <meta name="keywords" content="mor gaon, myevillage, mor gaon ki jankari, khairjhiti kala, gaon, dukano ka vivran, dukan, ">
    <meta name="author" content="Manish Patel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>

.col-sm-6 h1{
	font-size:30px;
	color:darkorange;
}
.col-sm-6 h4{
	font-size:21px;
	color:grey;
}
.col-sm-6 h3{
	font-size:14px;
	color:orange;
	font-weight:700;
}
.allinone{
  
}
.all{
      width:100%;
	  height:auto;
	  background:grey;
}
.left-side{
      float:left;
	  width:100%;
	  height:auto;
      background:#fafafa;
      border:2px solid rgba(0,0,0,0.1);	 
      border-radius:9px;	  
}
.left-side h4 {
      margin-left:8px;
	  margin-top:4px;
	  padding:0px;
	  font-weight:700;
	  color:rgba(0,0,0,0.6);
	  font-size:15px;
}
.left-side p{
      margin-left:8px;
	  font-weight:700;
	  color:rgba(0,0,0,0.4);
	  font-size:11px;
}

.right-side{
      float:left;
	  width:100%;
	  height:auto;
      background:grey;
      margin-top:5px;	  
}
.l-side{
      float:left;
	  width:100%;
	  height:auto;
	  background:#fafafa;
	  border:2px solid rgba(0,0,0,0.1); 
      border-radius:9px; 
}
.l-side p{
      float:left;
	  width:90%;
	  height:auto;
	  margin-left:10px;
	  margin-right:10px;
	  margin-bottom:0px;
	  margin-top:5px;
	  font-size:14px;
	  border-radius:4px;
	 
}
@media screen and (max-width:700px){
.col-sm-6 h1{
	font-size:23px;
	color:darkorange;
}
.col-sm-6 h4{
	font-size:14px;
	color:grey;
}
.col-sm-6 h3{
	font-size:13px;
	color:orange;
	font-weight:700;
}}
</style>
</head>
<body>
<br>
<div class="container">
   <div class="row">
	  <div class="col-sm-6">
	      <h1 style="font-weight:800;">मोर गांव</h1>
			<h3>Connectig Villages</h3>
	        <h4>हम हमेशा आपको गांव में होने वाली <br>
			शुभ कार्यक्रमों, सुंदर घटनाओं, गांव की स्थिति और <br>
			गांव में हाल ही में होने वाले परिवर्तनों और <br>
			सुविधाओं से अवगत कराएंगे, धन्यवाद ।
			</h4>
	   </div>
	   <div class="col-sm-6" style="text-align:center">
	      <p style="font-weight:700;">
                  <br><a href="feedback.php">सेवा में किसी भी तरह की बदलाव के लिए कृपया अपना सुझाव देवें...</a>
			</p>
	     </div>
   </div>
</div>
<?php
require 'db.php';
if(isset($_REQUEST["eid"]))
{
$eid=$_REQUEST["eid"];
}
$query3= "select * from services where servtype='tution' && village='$eid' order by id desc ";
$result3 = mysqli_query($conn, $query3);
$rowcount=mysqli_num_rows($result3);

?>
<section>
<div class="container">
 <hr style="border:2px solid black" />
<h4 style="text-align:center;background:grey;height:23px;color:white;font-weight:700;border-radius:20px;font-size:18px;"><?php  echo $eid; ?> गांव में शिक्षण सुविधाएं :</h4><br>


<?php

for($i=1;$i<=$rowcount;$i++)
{
$row2=mysqli_fetch_assoc($result3);
?>

<div class="allinone">
    <div class="all">
        <div class="left-side">
        <h4><?php  echo htmlspecialchars($row2["servname"], ENT_QUOTES, 'UTF-8');?></h4></a>
        <p><?php echo htmlspecialchars($row2["category"], ENT_QUOTES, 'UTF-8');?></p>
	    </div>
    </div>
	
	<div class="l-side">
	<p><?php echo htmlspecialchars($row2["facilities"], ENT_QUOTES, 'UTF-8');?></p>
<p style="color:grey;">खुलने का समय : <b><?php echo htmlspecialchars($row2["ontime"], ENT_QUOTES, 'UTF-8');?></b>
 ~ बंद होने का समय : <b><?php echo htmlspecialchars($row2["offtime"], ENT_QUOTES, 'UTF-8');?></b><br>
ध्यान दें : <?php echo htmlspecialchars($row2["notes"], ENT_QUOTES, 'UTF-8');?><br>
पता : <?php echo htmlspecialchars($row2["pata"], ENT_QUOTES, 'UTF-8');?>
</p>
    
    </div>
</div>
<div style="width:100%;float:left;margin-top:10px;margin-bottom:10px;"></div>


<?php
}
?>
</div>
</section>

<section style="width:100%;float:left;">
<div class="container">
<h4 style="text-align:center;background:grey;height:23px;color:white;font-weight:700;border-radius:20px;font-size:18px;">दूसरे गांव में शिक्षण सुविधाएं:</h4><br>

<?php
if(isset($_REQUEST["eid"]))
{
$eid=$_REQUEST["eid"];
}
$query3= "select * from services where servtype='tution' order by id desc ";
$result3 = mysqli_query($conn, $query3);
$rowcount=mysqli_num_rows($result3);

?>
<?php

for($i=1;$i<=$rowcount;$i++)
{
$row2=mysqli_fetch_assoc($result3);
?>

<div class="allinone">
    <div class="all">
        <div class="left-side">
		<h5 style="font-size:16px;font-weight:700;color:orange;margin-left:8px;margin-top:3px;"><?php  echo htmlspecialchars($row2["village"], ENT_QUOTES, 'UTF-8');?> गांव में शिक्षण सुविधा.</h5>
        <h4><?php  echo htmlspecialchars($row2["servname"], ENT_QUOTES, 'UTF-8');?></h4>
        <p><?php echo htmlspecialchars($row2["category"], ENT_QUOTES, 'UTF-8');?></p>
	    </div>
    </div>
	
	<div class="l-side">
	<p><?php echo htmlspecialchars($row2["facilities"], ENT_QUOTES, 'UTF-8');?></p>
<p style="color:grey;">खुलने का समय : <b><?php echo htmlspecialchars($row2["ontime"], ENT_QUOTES, 'UTF-8');?></b> 
~ बंद होने का समय : <b><?php echo htmlspecialchars($row2["offtime"], ENT_QUOTES, 'UTF-8');?></b><br>
ध्यान दें : <?php echo htmlspecialchars($row2["notes"], ENT_QUOTES, 'UTF-8');?><br>
पता : <?php echo htmlspecialchars($row2["pata"], ENT_QUOTES, 'UTF-8');?>
</p>
    
    </div>
</div>
<div style="width:100%;float:left;margin-top:10px;margin-bottom:10px;"></div>


<?php
}
?>
</div>
</section>
</body>
</html>