<?php
include('connection.php');
session_start();
$username=$_SESSION["username"];


$sql="SELECT * FROM newusers WHERE USER_NAME='$username' ";

$result=$conn->query($sql);

  if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
      $_SESSION["user_photo"]=$row["USER_PHOTO"];
      $_SESSION["name"]=$row["PERSON_NAME"];
      $_SESSION["username"]=$row["USER_NAME"];
      $_SESSION["user_interests"]=$row["USER_INTERESTS"];

    }
  }

  $check=$_SESSION["check"];
  
 
  header("Location:http://localhost/profile_page.php");

?>
