<?php
if(!isset($_SESSION["username"])){
	header("Location:http://localhost/signup.php");
}
session_start();


$name=$_SESSION["name"];
$username=$_SESSION["username"];
$user_interests=$_SESSION["user_interests"];
$user_photo=$_SESSION["user_photo"];

?>

<!DOCTYPE html>
<html>
<head>
	<title>WeConnect</title>
	<link rel="stylesheet" type="text/css" href="profile.css">
</head>
<body>
<div class="header">
	<div class="logo">
	<img src="#" class="logo" alt="company logo to go here">
 </div>
 <div class="nav">
 	<ul>
 		<li class="nav_icons"><a href="#"><img  class="nav_img" src="#" alt="log out"></a></li>
 	    <li class="nav_icons"><a href="user_settings.php"><img  class="nav_img" src="#" alt="settings"></a></li>
 	</ul>
 </div>	
</div>
<div class="cover1">
	<img class="cover" alt="cover pic here" src="#"></img>
	<img class="profile" alt="profile pic here" src="<?php echo($user_photo); ?>"></img>
</div>
<div class="information">
	<h3><?php echo($name); ?></h3><br>
	<h3><?php echo($username); ?></h3><br>
	<h3><?php echo($user_interests); ?></h3>
	<a href="commonfeed_page.php"><h2>common feed</h2></a>
</div>
<div class="activities"></div>

</body>
</html>