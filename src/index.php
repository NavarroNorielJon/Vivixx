<?php
    include 'utilities/db.php';
    session_start();
    if (isset($_SESSION['user'])) {
        echo "<script>window.location = '/home';</script>";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Vivixx</title>
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
        <link type="text/css" rel="stylesheet" href="style/bootstrap/bootstrap.min.css" media="screen, projection">
        <link type="text/css" rel="stylesheet" href="style/style.css" media="screen, projection">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body  style="background-color:#005959;">
        <div class="jumbotron" id="login-form">
            <img src="img/Lion.png" style="width:40%; height:auto; margin-top: -10%; margin-right:4%; margin-left:3%;">
                <form action="utilities/login.php" method="post" class="col s12 ">
                    <div class="form-group">
                        <label for="userOrEmail">Username or Email-Address</label>
                        <input class="form-control" type="text" onkeyup="confirmation('userOrEmail',this.value,'validUserOrEmail')" name="userOrEmail" id="userEmail" required="required" placeholder="Username or Email-Address">
                        <div id="validUserOrEmail"></div>
                    </div>

                    <div class="form-group">
                        <label for="pass">Password</label>
                        <div class="input-group">
                            <input type="password" placeholder="Password" name="password" id="password" class="form-control" onkeyup="confirmLogin('password',this.value,'userEmail','vPassword')" required="required" >

                            <div class="input-group-append">
                                <button  type="button" class="btn" onclick="showHide('password','icon')">
                                <i class="material-icons" id="icon">visibility</i>
                                </button>
                            </div>
                        </div>

                        <div id="vPassword"></div>
                    </div>

                    <div style="text-align: center;">
                        <button type="submit" class="btn" style="border: 2px solid #005959;" id="button1" name="submit">Login</button><br>
                        <a a href="#!" data-toggle="modal" data-target="#forgot" style="display: block; margin: 1rem;">Forgot password?</a>
                        <a href="#!" data-toggle="modal" data-target="#signupForm" style="display: block">Sign Up</a>
                    </div>
                </form>
        </div>

        <!-- Modal for forgot password -->
        <div class="modal fade" id="forgot" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- Header -->
                    <div class="modal-header">
                        <h3>Forgot Password</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="mailing/send_reset.php" method="POST">
                    <!-- Body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="id">E-mail Address</label>
                            <input type="email" class="form-control" id="email" placeholder="E-mail Address" name="email">
                        </div>
                    </div>

                    <!--Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Send Email</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="signupForm" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Sign Up</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="utilities/registration.php" method="POST">
                    <div>
                        <div>
                        <h1>Registration Form</h1><br>
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="fname">First Name</label>
                                <input type="text" name="first_name" id="fname" autocomplete="off" class="form-control" required="required">
                            </div>

                            <div class="form-group col-4 ">
                                <label for="mname">Middle Name</label>
                                <input type="text" name="middle_name" id="mname" autocomplete="off" class="form-control" required="required">
                            </div>

                            <div class="form-group col-4 ">
                                <label for="lname">Last Name</label>
                                <input type="text" name="last_name" id="lname" autocomplete="off" class="form-control" required="required">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" autocomplete="off" onkeyup="helperText('username',this.value,'validUser');nextButton('password','cpassword');" class="form-control" required="required">
                                <div id="validUser"></div>
                            </div>

                            <div class="form-group col-6">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" autocomplete="off" onkeyup="helperText('email',this.value,'validEmail');nextButton('password','cpassword');" class=" form-control form-control" required="required">
                                <div id="validEmail"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" id="password" onkeyup="helperText('password',this.value,'validPassword')" class="form-control" required="required">

                                <div class="input-group-append">
                                    <button  type="button" class="btn" onclick="showHide('password','icon')">
                                        <i class="material-icons" id="icon">visibility</i>
                                    </button>
                                </div>
                            </div>
                            <div id="validPassword"></div>
                        </div>

                        <div class="form-group" >
                            <label for="cpass">Confirm Password</label>
                                <div class="input-group">
                                    <input type="password" name="confirm_password" id="cpassword" onkeyup="confirmPass('confirm_password',this.value,'password','validConfirmation');nextButton('password','cpassword');" class="form-control" required="required">

                                    <div class="input-group-append">
                                        <button  type="button" class="btn" onclick="showHide('cpassword','icon1')">
                                            <i class="material-icons" id="icon1">visibility</i>
                                        </button>
                                    </div>
                                </div>
                                <div id="validConfirmation"></div>
                        </div>

                        <div>
                            <a href="/"><button type="button" style="text-align: left"><i class="material-icons" >home</i></button></a>
                            <button type="submit" onclick="loginSuccess()">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
                    </div>

                </div>
            </div>
        </div>

        <script type="text/javascript" src="script/ajax.js"></script>
        <script type="text/javascript" src="script/jquery.min.js"></script>
        <script type="text/javascript" src="script/popper.min.js"></script>
        <script type="text/javascript" src="script/bootstrap/bootstrap.min.js"></script>
		<script type="text/javascript" src="script/sweetalert.min.js"></script>
    </body>
</html>
