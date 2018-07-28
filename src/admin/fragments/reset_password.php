<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Vivixx PH | Reset Password</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../../mis/img/favicon.ico" type="image/x-icon">
	<link type="text/css" rel="stylesheet" href="../../mis/style/bootstrap/bootstrap.min.css">
	<link type="text/css" rel="stylesheet" href="../../mis/style/style.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="background">
	<div class="container-fluid resetPassword" id="resetPassword">
		<h3>Reset Password</h3>
		<hr><br>
		<form action="validate_reset_password.php" id="reset_pass" method="POST">
			<input type="text" name="account" style="display:none; " value="<?php echo $_GET['account'];?>">

			<div class="form-group" style="display: block">
				<label>New Password</label>
				<div class="input-group">
					<input type="password" class="form-control" name="password" id="new_pass" placeholder="Enter New Password" required>
					<div class="input-group-append">
						<button type="button" class="btn eye" onclick="showHide('new_pass','icon1')" tabindex="-1">
                            <i class="material-icons" id="icon1" >visibility</i>
                        </button>
					</div>
				</div>
				<label for="new_pass" generated="true" class="error"></label>
			</div>

			<div class="form-group">
				<label>Re-enter Password</label>
				<div class="input-group">
					<input type="password" class="form-control" name="confirm_password" id="conf_pass" placeholder="Re-enter Password" required>
					<div class="input-group-append">
						<button type="button" class="btn eye" onclick="showHide('conf_pass','icon2')" tabindex="-1">
                            <i class="material-icons" id="icon2">visibility</i>
                        </button>
					</div>
				</div>
				<label for="conf_pass" generated="true" class="error"></label>
			</div>

			<div class="text-right">
				<input type="submit" class="btn btn-primary" name="submit" value="submit">
			</div>
		</form>
	</div>

	<script type="text/javascript" src="../../mis/script/jquery-3.2.1.min.js"></script>
	<script src="../../mis/script/jquery.form.min.js"></script>
	<script src="../../mis/script/jquery.validate.min.js"></script>
	<script type="text/javascript" src="../../mis/script/popper.min.js"></script>
	<script type="text/javascript" src="../../mis/script/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../mis/script/sweetalert.min.js"></script>
	<script type="text/javascript" src="../../mis/script/ajax.js"></script>
	<!-- <script type="text/javascript" src="../../script/alerts.js"></script> -->
	<script>
		$("#reset_pass").validate({
			errorClass: 'error',
			rules: {
				password: {
					required: true,
					minlength: 8,
				},
				confirm_password: {
					equalTo: "#new_pass"
				}
			}
		});
		$('#reset_pass').ajaxForm({
			url: 'validate_reset_password.php',
			method: 'post',
			success: function (data) {
				if (data === 'You have successfully changed your password.') {
					swal({
						title: data,
						icon: 'success'
					}).then(function () {
						window.location = '/mis/';
					});
				} else if (data === 'Error in resetting your password, this link might be already expired.') {
					swal({
						title: data,
						icon: 'error'
					}).then(function () {
						window.location = '/mis/';
					});
				}else {
					swal({
						title: data,
						icon: 'error',
					}).then(function () {
						window.location = '/mis/';
					});
				}
			}
		});
	</script>
</body>

</html>
