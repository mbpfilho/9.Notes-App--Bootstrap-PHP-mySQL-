<?php
session_start();
include('connection.php');

// get user_id
$user_id=$_SESSION["user_id"];

//get the corrent time
$time=time();

//run a query to create a new note
$sql="INSERT INTO notes (user_id,note,time) VALUES ('$user_id','','$time')";
$result=mysqli_query($link,$sql);
if(!$result){
    echo "error";
}else{
    echo mysqli_insert_id($link); //returns the auto generated id of the last query 
}
?>