<?php
session_start();
/*
 global $nameErr="";
 global $emailErr="";
 global $passwordErr="";
*/
 include('connection.php');
$name = test_input($_POST["name"]);
$username= test_input($_POST["username"]);
$email= test_input($_POST["email"]);
$password= test_input($_POST["password"]);
$re_pass= test_input($_POST["repassword"]);
$_SESSION["username"]=$username;
$x=0;
 
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	
if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
  $nameErr = "Only letters and white space allowed"; 
  $x=1;
  
 }

if(!preg_match("/^[a-zA-Z][A-Za-z0-9]{5,31}$/",$username)){
	$usernameErr="the given user name is invalid";
	$x=1;
	
} 

if(empty($name)){
	$nameErr="name cannot be empty";
	
	$x=1;
}
if(empty($username)){
	$usernameErr="username cannot be empty";
	
	$x=1;
}

if($x==0){
  $sql = "INSERT INTO newusers(PERSON_NAME,USER_NAME,USER_EMAIL,USER_PASSWORD) VALUES ('$name','$username','$email','$password')";
  if($conn->query($sql)==true){
    echo("new record created");
  }
  else{
    echo("error").$conn->error;
  }
  $sql1= "SELECT  USER_PHOTO FROM newusers WHERE USER_NAME='$username' ";
  $result = $conn->query($sql1);
  if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
      $_SESSION["user_photo"]=$row["USER_PHOTO"];
    }
  }
$conn->close();
header("Location:http://localhost/profile_fill.php");
}


}

?>

<html>
<head>
 <title>
WeConnect
 </title>
    <link rel="stylesheet" type="text/css" href="sign.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <script >
    	$(document).ready(function(){
             $('.signup').hide();
             $('#sign').click(function(){
              $('.login').hide();
              $('.signup').show('slow');
             });
           $('#log').click(function(){
              $('.signup').hide();
              $('.login').show('slow');
             });
               
    	});
    </script>
</head>
<body>
  <div class="header">
   <img src="#" class="logo" alt="company logo to go here">
 </div>
 
 <div class="content">
 <div class="box">
        <button class="link" id="log">LOGIN</button>
 		<button class="link" id="sign">SIGNUP</button>
 	<div class="login">

 		<form action="#" method="post">
 		<ul>
 			<li class="log_fields"><input type="text" name="username" placeholder="enter your username"></li>
 			<li class="log_fields"><input type="password" name="password" placeholder="enter your password"></li>
 			<li class="log_fields"><input type="submit"  name="submit" value="login"></li>
 		</ul>	
 		</form>
 	</div>
 	<div class="signup">
 		
 		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
 		<ul>
 			<li><input  class =" sign_fields" type="text" name="name" placeholder="enter your name"></li>
 			<?php echo("$nameErr"); ?>
 			<li><input  class =" sign_fields" type="text" name="username" placeholder="enter your username"></li>
 			<?php echo("$usernameErr"); ?>
 			<li><input  class =" sign_fields" type="email" name="email" placeholder="enter your emailaddress"></li>
 			<li><input  class =" sign_fields" type="password" name="password" placeholder="enter your password"></li>
 			
 			<li><input  class =" sign_fields" type="password" name="repassword" placeholder="confirm password"></li>
 			<li><input  class =" sign_fields" type="submit" name="submit" value="signup"></li>
 		</ul>
 		</form>
 	</div>
 </div>
 </div>

</body>
</html>
