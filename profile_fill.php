<?php

session_start();
include('connection.php');



?>
<!DOCTYPE html>
<html>
<head>
	<title>Weconnect</title>
	<link rel="stylesheet" type="text/css" href="#">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
	</script>
</head>
<body>
<div class="header">
 <div class="logo">
	<img src="#" class="logo" alt="company logo to go here">
 </div>
 <div class="nav">
 	<ul>
 		<li><a href="#"><img  class="nav_img" src="#" alt="home"></a></li>
 	    <li><a href="#"><img  class="nav_img" src="#" alt="home"></a></li>
 	</ul>
 </div>	
</div>
<div class="content">
<h2> welcome <?php echo($_SESSION["username"]); ?> </h2>
	<div class="profile_pic">
		<img class="pr_pic" src="#" alt="profile photo goes here"></img>
		<button>Add Photo</button>
	</div>
	<form action="info_fill.php" method="post">
	<div class="details">
	 <ul>
		<li><input type="text" name="gender" placeholder="gender"></li>
		<li><input type="text" name="address" placeholder="address"></li>
		<li><input type="number" name="number" placeholder="mobile number"></li>
		<li><input type="text" name="date" placeholder="date of birth"></li>
		<li><input type="text" name="interests" placeholder="interests"></li>
		<li><input type="submit" name="submit" value="Add"></li>
	 </ul>
	</div>
	</form>
</div>
</body>
</html>

