<?php
// user is redirect to this file after clicking the update email on the link received by email 
// signup link contains three GET parameters: email, newemail and activation key
session_start();
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
            <title>Update email</title>

            <!-- Bootstrap -->
            <link href="css/bootstrap.min.css" rel="stylesheet">

            <style>
                h1{
                    color:purple;
                }
                h3{
                    color:lightgreen;
                }
                .contactForm{
                    border:1px solid purple;
                    margin-top:50px;
                    border-radius:15px;
                }
            </style>
        </head>
        <body>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-offset-1 col-sm-10 contactForm">
                        <h1>Update email</h1>
<?php
// if email, new email or activation key is missing show an error
if(!isset($_GET["email"])||!isset($_GET["newemail"])||!isset($_GET["key"])){
    echo "<div class='alert alert-danger'>There was an error. Please click on the link on the email.</div>";
    exit;
}
// else
//     store them in two variables
$email=$_GET["email"];
$newemail=$_GET["newemail"];
$key=$_GET["key"];

//     prepare varable for query
$email=mysqli_real_escape_string($link,$email);
$newemail=mysqli_real_escape_string($link,$newemail);
$key=mysqli_real_escape_string($link,$key);

//     run query: update email
$sql="UPDATE users SET email='$newemail', activationkey='0' WHERE (email='$email' AND activationkey='$key') LIMIT 1";
//********************************* */

$result=mysqli_query($link,$sql);

//     if query successful, show message and invite to login
if(mysqli_affected_rows($link)==1){
    //destry session and cookie
    session_destroy();
    setcookie("rememberme","",time()-3600);
    //send success message
    echo "<div class='alert alert-success'>Your email has been updated.</div>";
    echo "<a href='index.php' type='button' class='btn-lg btn-success'>Log in</a>";
}else{
    //     else
    echo "<div class='alert alert-danger'>Your email could not be updated.</div>";
}
    //     show error message
?>
                       
                    </div>
                </div>
            </div>
<?php

?>
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="js/bootstrap.min.js"></script>
        </body>
</html>