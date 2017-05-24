<?php


if(!isset($_SESSION["username"])){
	header("Location:http://localhost/signup.php");
}

session_start();
include('connection.php');
$username=$_SESSION["username"];
$user_photo=$_SESSION["user_photo"];
?>
<!DOCTYPE html>
<html>
<head>
	<title>WeConnect</title>
	<link rel="stylesheet" type="text/css" href="commonfeed.css">
</head>
<body>
<div class="header">
 <div class="logo">
	<img src="#" class="logo" alt="company logo to go here">
 </div>
 <div class="nav">
 	<ul>
 		<li class="nav_icons"><a href="#"><img  class="nav_img" src="#" alt="home"></a></li>
 	    <li class="nav_icons"><a href="#"><img  class="nav_img" src="#" alt="home"></a></li>
 	</ul>
 </div>	
</div>
<div class="content">
<div class="comment">
	<div class="feed">
		<p>
			<?php 
    include'connection.php';
   $sql="SELECT * from userfeed order by USER_TIME DESC";
   $result= $conn->query($sql);
   if($result->num_rows>0){
   while($row=$result->fetch_assoc()){
   	
         echo $row["USER_NAME"]."(".$row["USER_TIME"].") : ".$row["USER_FEED"]."<br>";
      }
   }
   
   else{
     echo"0 result";
   }
   $conn->close();
   
   ?>
		</p>
	</div>
	<div class="sub">	
		<form action="feed_fill.php" method="post">
			<input type="text" name="feed" placeholder="Penny for your thought">
			<input type="submit" name="submit" value="SHOUT OUT">
		</form>
    </div>
</div>    
    <div class="currentuser"><a href="http://localhost/user_information.php"> <img class="profile_pic" src="<?php echo($user_photo); ?>" alt="currrent user profile pic"> <h2><?php echo($username); ?></h2></a></div>
    <div class="active users"></div>
</div>
</body>
</html>
