<?php
include('connection.php');
session_start();
$username=$_POST["username"];
$_SESSION["username"]=$username;
$password=$_POST["password"];
$password_entered=md5($password);
$sql="SELECT USER_PASSWORD from newusers where USER_NAME='$username' ";
$x=1;
$result=$conn->query($sql);

  if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
      $pass=$row["USER_PASSWORD"];
    }
  }
if($password_entered == $pass){
      $_SESSION["check"]=$x;
	  header("Location:http://localhost/user_information.php");
}
else{
	header("Location:http://localhost/signup.php");
}

?>
