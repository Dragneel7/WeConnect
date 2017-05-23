<?php
session_start();
include('connection.php');
$user_gender= test_input($_POST["gender"]);
$user_address= test_input($_POST["address"]);
$user_number= test_input($_POST["number"]);
$user_DOB= test_input($_POST["date"]);
echo($user_DOB);
$user_interests= test_input($_POST["interests"]);
$username=$_SESSION["username"];

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$sql="UPDATE newusers SET USER_GENDER='$user_gender',USER_ADDRESS='$user_address',USER_MOBILE='$user_number',USER_DATE_OF_BIRTH='$user_DOB',USER_INTERESTS='$user_interests'  WHERE USER_NAME= '$username' ";
  if($conn->query($sql)==true){
    echo("new record created");
  }
  else{
    echo("error").$conn->error;
  }
$conn->close();


  header("Location:http://localhost/user_information.php");
?>
