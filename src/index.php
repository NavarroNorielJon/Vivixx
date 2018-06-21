<?php
    include 'utilities/db.php';
	session_start();
    if (isset($_SESSION['user'])) {
        echo "<script>window.location = 'pages/';</script>";
    }
?>

<!DOCTYPE html>
<html>

<head>
	<title>Vivixx</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link type="text/css" rel="stylesheet" href="style/bootstrap/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="style/style2.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="body" id="body">
	<!-- container -->
	<div class="containter-fluid" id="index">
		<div class="row no-gutters">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-9 index-content">
				<a href="#login-form"><img class="image" id="image" src="img/Lion.png"></a>
				<h1 class="message" id="message">TO TEACH IS TO LEARN</h1>
			</div>

			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-3 index-form" id="login-form">
				<div class="text-center">
					<h3 style="color: white; margin-bottom: 4vh;">
						Login
					</h3>
				</div>

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
                        		<button type="button" class="btn eye" onclick="showHide('password','icon')">
                            		<i class="material-icons" id="icon">visibility</i>
                            	</button>
                        	</div>
						</div>
					</div>

					<div class="text-center">
						<a href="#!" data-toggle="modal" data-target="#forgot-form" style="display: block; margin: 1rem;" class="forgot">Forgot password?</a>
            			<button type="submit" class="btn login-button" name="submit">
							Login
						</button>

						<br>

						<a href="#!" data-toggle="modal" id="signup-link" data-target="#signup-form">Sign Up</a>
					</div>
				</form>

				<button  type="button" class="btn signup-button" href="#!" data-toggle="modal" data-target="#signup-form">Sign Up</button>
			</div>
		</div>
	</div>

	<!-- Modal for forgot password -->
    <div class="modal fade col-sm-12" id="forgot-form" tabindex="-1" role="dialog">
    	<div class="modal-dialog" role="document">
        	<div class="modal-content forgot-content">
            	<!-- Header -->
                <div class="modal-header forgot-header">
					<div class="row">
            			<div class="col-3">
							<img src="img/Lion.png" style="height:auto; width:65%;" >
						</div>

						<div class="col-9">
                    		<h3>Forgot Password</h3>
						</div>
					</div>
				</div>

				<!-- Body -->
                <div class="modal-body">
                	<form action="mailing/send_reset.php" method="POST">
                    	<div class="form-group">
                        	<label for="id">E-mail Address</label>
                            <input type="email" class="form-control" id="forgot_email" placeholder="E-mail Address" name="email" required>
						</div>

						<div style="text-align: right;">
                        	<button type="submit" class="btn btn-primary">Send Email</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- End of forgot password modal -->

	<!-- Modal for Register -->
    <div class="modal fade" id="signup-form" tabindex="-1" role="dialog">
    	<div class="modal-dialog" role="document">
        	<div class="modal-content signup-content">
            	<div class="modal-header signup-header">
            		<div class="row">
            			<div class="col-3">
							<img src="img/Lion.png" style="height:auto; width:65%;" >
						</div>

						<div class="col-9">
                    		<h3>Registration Form</h3>
						</div>
					</div>
				</div>

				<!-- Body -->
                <div class="modal-body">
                	<form  id="signup_form" action="../utilities/registration.php" method="post">
						<!-- Full Name -->
						<div class="row">
                        	<div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            	<label for="fname">First Name</label>
                                <input type="text" name="first_name" id="fname" autocomplete="off" class="form-control text-transform" placeholder="First Name" required="required">
							</div>

							<div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
								<label for="mname">Middle Name</label>
								<input type="text" name="middle_name" id="mname" autocomplete="off" class="form-control text-transform" placeholder="Middle Name (Optional)" >
							</div>

							<div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
								<label for="lname">Last Name</label>
								<input type="text" name="last_name" id="lname" autocomplete="off" class="form-control text-transform" placeholder="Last Name" required="required">
							</div>
						</div>

                        <div class="form-group">
                        	<label for="email">Email</label>
                            <input type="text" name="email" id="email" autocomplete="off" onkeyup="helperText('email',this.value,'validEmail');nextButton('password','cpassword');" class="form-control form-control" placeholder="E-mail Address" required="required">
                            <div id="validEmail"></div>
						</div>

						<div class="row">
							<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<label for="reg_pass">Password</label>
                                <input type="password" name="password" id="regpass" onkeyup="helperText('password',this.value,'validPassword')" class="form-control" placeholder="Password" required="required">
                                <div id="validPassword"></div>
							</div>

							<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<label for="cpass">Confirm Password</label>
								<div class="input-group">
                                	<input type="password" name="confirm_password" id="cpassword" onkeyup="confirmPass('confirm_password',this.value,'regpass','validConfirmation')" class="form-control" placeholder="Confirm Password" required="required">

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
							<button type="submit" class="btn btn-primary" id="button1" onclick="loginSuccess()">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="script/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="script/jquery.form.min.js"></script>
    <script type="text/javascript" src="script/alerts.js"></script>
	<script type="text/javascript" src="script/popper.min.js"></script>
	<script type="text/javascript" src="script/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="script/sweetalert.min.js"></script>
	<script type="text/javascript" src="script/ajax.js"></script>
	<script>
		window.onload = function() {
			var body = document.getElementById('body');
			body.style.opacity = "1";
		}

		$('a[href^="#"]').on('click', function(event) {
    		var target = $(this.getAttribute('href'));
    		if( target.length ) {
        		event.preventDefault();
        		$('html, body').stop().animate({
            	scrollTop: target.offset().top
        		}, 1000);
    		}
		});
	</script>
</body>

</html>
