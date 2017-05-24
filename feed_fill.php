<?php
session_start();
include('connection.php');
$username=$_SESSION["username"];
$feed= test_input($_POST["feed"]);

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$sql2="INSERT into userfeed(USER_NAME,USER_FEED) VALUES('$username','$feed') ";
 
 if($conn->query($sql2)==true){
  echo("record created");
 }
 
header("Location:http://localhost/commonfeed_page.php");
  $conn->close();
?>
