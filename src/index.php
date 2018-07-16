<?php
include 'utilities/db.php';
session_start();

if (isset($_SESSION['user'])) {
    echo "<script>window.location = 'pages/';</script>";
}
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<title>Vivixx</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
		<link type="text/css" rel="stylesheet" href="style/style.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link type="text/css" rel="stylesheet" href="style/style.css">
	</head>

	<body class="index background">
		<div class="containter">
			<form action="utilities/login.php" method="post" class="jumbotron login" id="login">
				<img src="../img/Lion.png" alt="logo" class="index-image">

				<div class="form-group col-sm-12">
					<label for="userEmail">Username or Email-Address</label>
					<input class="form-control" type="text" name="userOrEmail" id="userEmail" required="required" placeholder="Username or Email-Address">
				</div>

				<div class="form-group col-sm-12">
					<label for="password">Password</label>
					<div class="input-group">
						<input type="password" placeholder="Password" name="login_password" id="password" class="form-control" required="required">
						<div class="input-group-append">
							<button type="button" class="btn eye" onclick="showHide('password','icon')">
							<i class="material-icons" id="icon">visibility</i>
						</button>
						</div>
					</div>
				</div>

				<div class="text-center">
					<button type="submit" class="btn login-button" name="submit">Login</button>
					<p style="display: inline-block;">
						<a href="#!" data-toggle="modal" data-target="#forgot-password-form" class="forgot-link">Forgot password?</a> or
						
					</p>
				</div>
			</form>
		</div>

		<!-- Modal for forgot password -->
		<div class="modal fade col-sm-12 forgot-password-modal" id="forgot-password-form" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content forgot-password-content">
					<!-- Header -->
					<div class="modal-header forgot-password-header">
						<div class="row">
							<div class="col-2">
								<img src="img/Lion.png" alt="-forgot-password-logo" class="forgot-password-logo">
							</div>

							<div class="col-10">
								<h1 class="header">Forgot Password</h1>
							</div>
						</div>
					</div>

					<!-- Body -->
					<div class="modal-body forgot-password-body">
						<form action="mailing/send_reset.php" id="reset_form" method="POST">
							<div class="form-group">
								<label for="forgot_email">E-mail Address</label>
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


		<script src="script/jquery-3.2.1.min.js"></script>
		<script src="script/jquery.form.min.js"></script>
		<script src="script/jquery.validate.min.js"></script>
		<script src="script/additional-methods.min.js"></script>
		<script src="script/alerts.js"></script>
		<script src="script/popper.min.js"></script>
		<script src="script/bootstrap/bootstrap.min.js"></script>
		<script src="script/sweetalert.min.js"></script>
		<script src="script/ajax.js"></script>
	</body>

	</html>
