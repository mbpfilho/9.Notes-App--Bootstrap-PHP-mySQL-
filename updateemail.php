<?php
//start session and connect
session_start();
include("connection.php");

//get user_id and new email sent through Ajax
$user_id=$_SESSION["user_id"];
$newemail=$_POST["email"];

//check if the new email exists on database

//get the current email

//create a unique activation code

//inert the new activation code in the users table

//send email with link to activatenewemail.php with corrent email, new email and activation code



?>