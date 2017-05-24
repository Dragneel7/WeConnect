<?php



include('connection.php');
session_start();


$_SESSION["change"]=1;
$username=$_SESSION["username"];

?>
<!DOCTYPE html>
<html>
<head>
	<title>WeConnect</title>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
 </script>
 <script >
 	$(document).ready(function(){
 		$('.password').hide();
 		$('#reveal').click(function(){
 			$('.password').show();
 		});
 	});
 </script>
</head>
<body>
<h2>EDIT PROFILE</h2>
<form method="post" action="info_fill.php">
   <ul>
	<li><input type="text" name="new_username"><label>change username</label></li>
	<li><input type="text" name="new_address"><label>change address</label></li>
	<li><input type="number" name="new_phone_number"><label>CONTACT</label></li>
	<li><input type="text" name="new_interests"><label>Add interests</label></li>
	<li><input class="password" type="password" name="new_password"><label id="reveal">change password</label></li>
	<li><input class="password" type="password" name="old_password"><label class="password">Enter current password to confirm.</label></li>
	<li><input type="submit" name="submit" value="change">
	</ul>
</form>
</body>
</html>
