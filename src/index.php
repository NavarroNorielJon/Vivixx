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
		<meta charset="utf-8">
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
        <link type="text/css" rel="stylesheet" href="style/bootstrap/bootstrap.min.css" media="screen, projection">
        <link type="text/css" rel="stylesheet" href="style/style.css" media="screen, projection">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body  style="background-color:#005959;">
        <div class="jumbotron col-sm-12" id="login-form">
            <img src="img/Lion.png" style="width:40%; height:auto; margin-top: -10%; margin-right:4%; margin-left:3%;">
            <form action="utilities/login.php" method="post" class="col s12 " id="login">
                <div class="form-group col-sm-12">
                    <label for="userOrEmail">Username or Email-Address</label>
                    <input class="form-control" type="text" onkeyup="helperText('userOrEmail',this.value,'validUserOrEmail')" name="userOrEmail" id="userEmail" required="required" placeholder="Username or Email-Address">
                    <div id="validUserOrEmail"></div>
                </div>

                <div class="form-group col-sm-12">
                    <label for="pass">Password</label>
                    <div class="input-group">
                        <input type="password" placeholder="Password" name="login_password" id="password" class="form-control" required="required" >

                        <div class="input-group-append">
                            <button  type="button" class="btn" onclick="showHide('password','icon')">
                                <i class="material-icons" id="icon">visibility</i>
                            </button>
                        </div>
                    </div>
                </div>

                <div style="text-align: center;">
                    <button type="submit" class="btn buttons" style="border: 2px solid #005959;" id="loginButton" name="submit">Login</button><br>
                    <a a href="#!" data-toggle="modal" data-target="#forgot" style="display: block; margin: 1rem;">Forgot password?</a>
                    <a href="#!" data-toggle="modal" data-target="#signupForm" style="display: block">Sign Up</a>
                </div>
            </form>
        </div>

        <!-- Modal for forgot password -->
        <div class="modal fade col-sm-12" id="forgot" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- Header -->
                    <div class="modal-header">
						<img src="img/Lion.png" class="header-logo">
                        <h1>Forgot Password</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- Body -->
                    <div class="modal-body">
                        <form action="mailing/send_reset.php" method="POST">
                            <div class="form-group">
                                <label for="id">E-mail Address</label>
                                <input type="email" class="form-control" id="email" placeholder="E-mail Address" name="email">
                            </div>

                            <div style="text-align: right;">
                                <button type="button" class="btn btn-primary">Send Email</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of forgot password -->

        <!-- Modal for Register -->
        <div class="modal fade" id="signupForm" tabindex="-1" role="dialog">
            <div class="modal-dialog sign-up" role="document">
                <div class="modal-content">
                    <div class="modal-header">
						<img src="img/Lion.png" class="header-logo">
                        <h1>Registration Form</h1>
                        <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- Body -->
                    <div class="modal-body">
                        <form action="utilities/registration.php" method="POST">
                            <div>
                                <!-- Full Name -->
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
                                <!-- End -->

                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" autocomplete="off" onkeyup="helperText('username',this.value,'validUser');nextButton('password','cpassword');" class="form-control" required="required">
                                    <div id="validUser"></div>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" autocomplete="off" onkeyup="helperText('email',this.value,'validEmail');nextButton('password','cpassword');" class="form-control form-control" required="required">
                                        <div id="validEmail"></div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="reg_pass">Password</label>
                                            <input type="password" name="password" id="regpass" onkeyup="helperText('password',this.value,'validPassword')" class="form-control" required="required">
                                        <div id="validPassword"></div>
                                    </div>

                                    <div class="form-group col-6" >
                                        <label for="cpass">Confirm Password</label>
                                        <div class="input-group">
                                            <input type="password" name="confirm_password" id="cpassword" onkeyup="confirmPass('confirm_password',this.value,'regpass','validConfirmation')" class="form-control" required="required">

                                            <div class="input-group-append">
                                                <button  type="button" class="btn" onclick="showPas('cpassword','regpass','icon1')">
                                                    <i class="material-icons" id="icon1">visibility</i>
                                                </button>
                                            </div>
                                        </div>
                                        <div id="validConfirmation"></div>
                                    </div>
                                </div>

                                <div style="text-align: right;">
                                    <button type="submit" class="btn buttons" id="button1" onclick="loginSuccess()">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<<<<<<< HEAD
=======

		<div id="sample"></div>

>>>>>>> 2457acc0fe393586d32bb50be1d44a973b2b5736
        <script type="text/javascript" src="script/ajax.js"></script>
        <script type="text/javascript" src="script/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="script/popper.min.js"></script>
        <script type="text/javascript" src="script/bootstrap/bootstrap.min.js"></script>
		<script type="text/javascript" src="script/sweetalert.min.js"></script>
        <?php include 'modules/footer.html'; ?>
    </body>
</html>
