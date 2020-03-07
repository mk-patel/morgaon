<html>
<head>
  <title>MorGaon : MyEVillage | Digital Village</title>
	<meta charset="UTF-8">
    <meta name="description" content="Ham hamesh aapko gaon me hone wali sundar ghatnao aur parivartano se avgat karate rahenge, MorGaon : MyEVillage | Digital Village">
    <meta name="keywords" content="mor gaon, myevillage, mor gaon ki jankari, khairjhiti kala, gaon, dukano ka vivran, dukan,evillage, mor gaon me suchna kaise dale,khairjhiti kalan,mor gaon news">
    <meta name="author" content="Manish Patel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="100">
    <meta name="google-site-verification" content="CP0yURNQf3rrO3ySzuzJyxSFrfrwpNZgWkWl9PjezaQ" />
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
			<h3> गांव हो तो कैसा, मोर गांव जैसा...</h3>
	        <h4>हम हमेशा आपको गांव में होने वाली <br>
			शुभ कार्यक्रमों, सुंदर घटनाओं, गांव की स्थिति और <br>
			गांव में हाल ही में होने वाले परिवर्तनों और <br>
			सुविधाओं से अवगत कराएंगे, धन्यवाद ।
			</h4>
		</div>
		 </div>
</div>

<?php
if(isset($_REQUEST["eid"]))
{
$eid=$_REQUEST["eid"];
}
?>
<div class="container">
<h1 style="font-weight:700;font-size:22px;color:grey;">मोर गांव की ओर से दी जाने वाली अतिरिक्त सेवाएं...</h1>
<p style="font-weight:700;font-size:15px;color:grey;">हम आपको गांव की जानकारी और गांव में होने वाली घटनाओं की जानकारी
 के साथ साथ आपको नीचे दिए गए सेवाएं भी देते है। जो की हमें लगता है कि यह सुविधा गांव के लोगो के पास होनी चाहिए। 
 हमें खुशी होगी यदि आप इन सेवाओं का उपयोग करते हो और हमे और नई सुविधाओं और सेवाओ को जोड़ने के लिए अपना सुझाव देते हो। 
 <a href="feedback.php">अगर आपको लगता है, नई सेवाएं जोड़ना चाहिए या दी गई सेवाओ में सुधार या बदलाव होना चाहिए तो हमे अवश्य अपना सुझाव दें।</a> धन्यवाद।</p>
<a href="bus.php?eid=<?php echo $eid; ?>"><button style="color:white;font-weight:800;" type="button" class="btn btn-secondary">1. गांव में बस चलने/न चलने की जानकारी</button></a><br><br>
<a href="tution.php?eid=<?php echo $eid; ?>"><button style="color:white;font-weight:800;" type="button" class="btn btn-secondary">2. गांव में नये/पुराने शिक्षण संस्थान/Tution की जानकारी</button></a><br><br>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>