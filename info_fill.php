<?php
session_start();


include('connection.php');
$user_gender= test_input($_POST["gender"]);
$user_address= test_input($_POST["address"]);
$user_number= test_input($_POST["number"]);
$user_DOB= test_input($_POST["date"]);
$user_interests= test_input($_POST["interests"]);
$username=$_SESSION["username"];

$new_username=test_input($_POST["new_username"]);
$new_address=test_input($_POST["new_address"]);
$new_phone_number=test_input($_POST["new_phone_number"]);
$new_interests=test_input($_POST["new_interests"]);
$new_password=test_input($_POST["new_password"]);
$old_password=test_input($_POST["old_password"]);
$change=$_SESSION["change"];




if($new_username!=null){
  $sql="UPDATE newusers SET USER_NAME='$new_username' where USER_NAME='$username' ";
  if($conn->query($sql)==true){
    $_SESSION["username"]=$new_username;
    $username=$_SESSION["username"];
  }
  
  }

echo($username);

if($new_address!=null){
  $user_address=$new_address;
  $sql="UPDATE newusers SET USER_ADDRESS='$user_address' where USER_NAME='$username' ";
  $conn->query($sql);
}

if($new_phone_number!=null){
  echo("hello");
  $user_number=$new_phone_number;
  $sql="UPDATE newusers SET USER_MOBILE='$user_number' where USER_NAME='$username' ";
  if($conn->query($sql)==true){
    echo("changed  ");
    Echo("$username");
  }
}

if($new_interests!=null){
  $user_interests=$new_interests;
  $sql="UPDATE newusers SET USER_INTERESTS='$user_interests' where USER_NAME='$username' ";
  $conn->query($sql);
    
}



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
 if($change==null){
$sql="UPDATE newusers SET USER_GENDER='$user_gender',USER_ADDRESS='$user_address',USER_MOBILE='$user_number',USER_DATE_OF_BIRTH='$user_DOB',USER_INTERESTS='$user_interests'  WHERE USER_NAME= '$username' ";
  if($conn->query($sql)==true){
    echo("new record created");
  }
  else{
    echo("error").$conn->error;
  }
}

$conn->close();


 header("Location:http://localhost/commonfeed_page.php");
  
?>
