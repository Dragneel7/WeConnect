<?php
include('connection.php');
session_start();
$curr_user=$_SESSION["username"];
$friend=$_SESSION["username1"];
echo($curr_user);
echo("   ");
echo $friend;
$chat=$_POST["chat"];
echo($chat);



$TABLE1=$curr_user.$friend;
$TABLE2=$friend.$curr_user;
$connect="you are now connected";
$_SESSION["table1"]=$TABLE1;

$sql3="SELECT * from $TABLE1";

$result=$conn->query($sql3);



if($result->num_rows==0){

$sql="CREATE TABLE $TABLE1(USER_NAME VARCHAR(255),USER_CHAT VARCHAR(255) )";

if($conn->query($sql)==true){
	echo("table created");
}




$sql1="CREATE TABLE $TABLE2(USER_NAME VARCHAR(255),USER_CHAT VARCHAR(255) )";

if($conn->query($sql1)==true){
	echo("table created");
}

}

$sql4="INSERT Into $TABLE1(USER_NAME,USER_CHAT) VALUES('$curr_user','$chat')";
if($conn->query($sql4)==true){
	echo("added");
}
$sql5="INSERT Into $TABLE2(USER_NAME,USER_CHAT) VALUES('$curr_user','$chat')";
if($conn->query($sql5)==true){
	echo("added");
}


header('Location:http://localhost/chat_portal.php');

?>

