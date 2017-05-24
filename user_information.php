<?php
include('connection.php');
session_start();
$username=$_SESSION["username"];
$check=$_POST["check"];
$friend_name=$_POST["user_search_name"];
$_SESSION["chat"]=$check;
if($check==1){
  $sql1="SELECT * FROM newusers WHERE USER_NAME='$friend_name' ";

$result=$conn->query($sql1);

  if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
      $_SESSION["user_photo"]=$row["USER_PHOTO"];
      $_SESSION["name"]=$row["PERSON_NAME"];
      $_SESSION["username1"]=$row["USER_NAME"];
      $_SESSION["user_interests"]=$row["USER_INTERESTS"];

    }
  }
 
}

if($check!=1){
$sql="SELECT * FROM newusers WHERE USER_NAME='$username' ";

$result=$conn->query($sql);

  if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
      $_SESSION["user_photo"]=$row["USER_PHOTO"];
      $_SESSION["name"]=$row["PERSON_NAME"];
      $_SESSION["username1"]=$row["USER_NAME"];
      $_SESSION["user_interests"]=$row["USER_INTERESTS"];

    }
  }

 } 
  
 
  header("Location:http://localhost/profile_page.php");

?>
