<?php
session_start();
$nameErr="";
$emailErr="";
$name = test_input($_POST["name"]);
$usename= test_input($_POST["username"]);
$email= test_input($_POST["email"]);
$password= test_input($_POST["password"]);
$re_pass= test_input($_POST["re_password"]);
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
  $_SESSION["nameErr"]=$nameErr;
 }
if(!preg_match("/^[a-zA-Z][A-Za-z0-9]{5,31}$/",$username)){
	$usernameErr="the given user name is invalid";
	$x=1;
	$_SESSION["usernameErr"]=$usernameErr;
} 

if(empty($name)){
	$nameErr="name cannot be empty";
	$_SESSION["nameErr"]=$nameErr;
	$x=1;
}
if(empty($username)){
	$usernameErr="username cannot be empty";
	$_SESSION["usernameErr"]=$usernameErr;
	$x=1;
}

if(empty($password)){
	$passwordErr="password cannot be empty";
	$_SESSION["passwordErr"]=$passwordErr;
	$x=1;
}
if($password==$re_password){
	$passwordErr="the two password donot match";
    $_SESSION["passwordErr"]=$passwordErr;
	$x=1;	
}

if($x==1){
	 header("Location:http://localhost/signup.php");
	
}

}

?>
