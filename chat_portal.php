<?php
session_start();


?>
<!DOCTYPE html>
<html>
<head>
	<title>WeConnect</title>
	<style >
		.chat{
			border:1px solid black;
			width:200px;
			height: 300px;
		}
	</style>
</head>
<body>
<div class="chat">
	<p>
				<?php 
				session_start();
				$TABLE1=$_SESSION["table1"];
    include'connection.php';
   $sql="SELECT * from  $TABLE1";
   $result= $conn->query($sql);
   if($result->num_rows>0){
   while($row=$result->fetch_assoc()){
   	
         echo $row["USER_NAME"]." : ".$row["USER_CHAT"]."<br>";
      }
   }
   
   else{
     echo"0 result";
   }
   $conn->close();
   
   ?>

	</p>
</div>
<form action="personal_chat_alt.php" method="post">
	<input type="text" name="chat">
	<input type="submit" name="submit">
</form>
<a href="user_information.php">profile</a>
</body>
</html>
