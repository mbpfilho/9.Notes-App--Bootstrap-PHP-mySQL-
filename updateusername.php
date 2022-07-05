<?php

//start session and connect
session_start();
include("connecuin.php");

//get user_id
$id=$_SESSION["user_id"];

//get username sent through Ajax
$username=$_POST["username"];

//Run query
$sql="UPDATE users SET username='$username' WHERE user_id=''$id";
$result=mysqli_query($link,$sql);
if(!$result){
    echo "<div class='alert alert-danger'>Error updating unsername in the database</div>";
}

?>