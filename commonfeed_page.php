<?php




session_start();
include('connection.php');

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
 		<li class="nav_icons"><a href="#"><img  class="nav_img" src="#" alt="log out"></a></li>
 	    <li class="nav_icons"><a href="user_settings.php"><img  class="nav_img" src="#" alt="settings"></a></li>
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
    <div class="currentuser"><a href="http://localhost/user_information.php"> <img class="profile_pic" src="<?php echo($user_photo); ?>" alt="currrent user profile pic"> <h2><?php echo($_SESSION["username"]); ?></h2></a></div>
    <div class="users">
    	<h3>CURRENT USERS</h3>
    	         
    	     <p>    <?php
    	     $link="personel_chat.php";
 		   
 		    include('connection.php');
 		   $sql1 = "SELECT USER_NAME,USER_PHOTO from newusers";
 		   $result1=$conn->query($sql1);
 		   if($result1->num_rows>0){
 		   	
 		   	while($row=$result1->fetch_assoc()){
             echo "<a href=".$link.">"."<img src= '".$row["USER_PHOTO"]."'/>".$_SESSION["user"]=$row["USER_NAME"]."</a>"."<br>"."<br>"."<br>";

               
 		   		

 		   	}

 		   }


    	?>
    	</p>

    </div>
    <div class="search_user">
    	<form method="post" action="user_information.php">
    	
    		<input class="search" type="text" name="user_search_name" placeholder="search for a user" >
    		<input class="search" type="hidden" name="check" value="1">
    		<input class="search" type="submit" name="submit" value="go">
    	</form>
    </div>
</div>
</body>
</html>
