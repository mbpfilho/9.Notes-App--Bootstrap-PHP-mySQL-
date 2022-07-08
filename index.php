<?php
session_start();
include("connection.php");

//logout
include("logout.php");

//remember me
include("rememberme.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- favicon links -->
    <link rel="apple-touch-icon" sizes="180x180" href="fonts/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="fonts/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="fonts/favicon-16x16.png">
    <link rel="manifest" href="fonts/site.webmanifest">

    <title>Online Notes</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arvo&family=Open+Sans&family=Source+Sans+Pro&family=Vollkorn&display=swap" rel="stylesheet">

    <link href="styling.css" rel="stylesheet">
  </head>
  <body>
    <!-- Navigation Bar -->
    <nav role="navigation" class="navbar navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header"> 
                <a class="navbar-brand">Online Notes</a>
                <button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse" id="navbarCollapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">Help</a></li>
                    <li><a href="#">Contact us</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#loginModal" data-toggle="modal">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
  
        <!-- Jumbotron with Sign Button -->
        <div class="jumbotron" id="myContainer">
            <h1>Online Notes App</h1>
            <p>Your notes with you wherever you go.</p>
            <p>Easy to use, protects all your notes.</p>
            <button type="button" class="btn btn-lg green" id="signupButton" data-toggle="modal" data-target="#signupModal">Sign up!</button>
        </div>

        <!-- Login form -->
        <form method="post" id="loginForm">
            <div class="modal" id="loginModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <button class="close" data-dismiss="modal">&times;</button>
                    <h4 id="myModalLabel">Login:</h4>
                    </div>
                    <div class="modal-body">
                        <!-- login message from php file -->
                        <div id="loginMessage"></div>

                        <div class="form-group">
                            <label for="loginemail" class="sr-only">Email</label>
                            <input class="form-control" id="loginemail" type="email" name="loginemail" placeholder="Email" maxlength="50">
                        </div>

                        <div class="form-group">
                            <label for="loginpassword" class="sr-only">Password</label>
                            <input class="form-control" id="loginpassword" type="password" name="loginpassword" placeholder="Password" maxlength="30">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="rememberme" id="rememberme">
                                Remember me
                            </label>
                        <a class="pull-right" style="cursor:pointer" data-dismiss="modal" data-target="#forgotModal" data-toggle="modal">
                            Forgot Password?
                        </a>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input class="btn green" name="login" type="submit" value="Login">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal" data-target="signupModal" data-toggle="modal">Register</button>
                    </div>
                </div>
                </div>
            </div>
        </form>

        <!-- Signup form -->
        <form method="post" id="signupForm">
            <div class="modal" id="signupModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <button class="close" data-dismiss="modal">&times;</button>
                    <h4 id="myModalLabel">Sign up and start using!</h4>
                    </div>
                    <div class="modal-body">
                        <!-- signup message from php file -->
                        <div id="signupMessage"></div>
                        <div class="form-group">
                            <label for="username" class="sr-only">Username</label>
                            <input class="form-control" id="username" type="text" name="username" placeholder="Username" maxlength="30">
                        </div>
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input class="form-control" id="email" type="email" name="email" placeholder="Email Address" maxlength="50">
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr-only">Choose a password</label>
                            <input class="form-control" id="password" type="password" name="password" placeholder="Choose a password" maxlength="30">
                        </div>
                        <div class="form-group">
                            <label for="password2" class="sr-only">Confirm password</label>
                            <input class="form-control" id="password2" type="password" name="password2" placeholder="Confirm password" maxlength="30">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input class="btn green" name="signup" type="submit" value="Sign up">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
                </div>
            </div>
        </form>

        <!-- Forgot password form -->
        <form method="post" id="forgotForm">
            <div class="modal" id="forgotModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <button class="close" data-dismiss="modal">&times;</button>
                    <h4 id="myModalLabel">Forgot Password? Enter your email address:</h4>
                    </div>
                    <div class="modal-body">
                        <!-- forgot message from php file -->
                        <div id="forgotMessage"></div>

                        <div class="form-group">
                            <label for="forgotemail" class="sr-only">Email</label>
                            <input class="form-control" id="forgotemail" type="email" name="forgotemail" placeholder="Email" maxlength="50">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input class="btn green" name="forgotpassword" type="submit" value="Submit">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal" data-target="signupModal" data-toggle="modal">Register</button>
                    </div>
                </div>
                </div>
            </div>
        </form>

        <!-- Footer -->
        <div id="footer">
            <div class="container">
                <p>Copyright &copy; 2022-<?php echo date("Y")?></p>
            </div>
        </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <script src="index.js"></script>
  </body>
</html>
<!-- senha notes LczW(-Zm-]ZR!5Ak   -->