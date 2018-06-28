<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Vivixx</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link type="text/css" rel="stylesheet" href="../style/bootstrap/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="../style/style2.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body id="reset-form">
	<div class="container-fluid resetPassword" id="resetPassword">
		<h3>Reset Password</h3><hr><br>
		<form action="../utilities/validate_reset_password.php" method="POST">
			<input type="text" name="account" style="display:none; "value="<?php echo $_GET['account'];?>">

			<div class="form-group">
				<label for="new_password">New Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" name="new_pass" id="new_pass" placeholder="Enter New Password" id="new_password">
                    <div class="input-group-append">
                        <button type="button" class="btn eye" onclick="showHide('new_pass','icon1')">
                            <i class="material-icons" id="icon1">visibility</i>
                        </button>
                    </div>
                </div>
			</div>

			<div class="form-group">
				<label for="confirm_password">Re-enter Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" name="confirm_pass" id="r_password" placeholder="Re-enter Password">
                    <div class="input-group-append">
                        <button type="button" class="btn eye" onclick="showHide('r_password','icon2')">
                            <i class="material-icons" id="icon2">visibility</i>
                        </button>
                    </div>
                </div>
			</div>

			<div class="text-right">
			<input type="submit" class="btn btn-primary" name="submit" value="submit">
			</div>
		</form>
	</div>

	<script type="text/javascript" src="../script/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../script/popper.min.js"></script>
	<script type="text/javascript" src="../script/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="../script/sweetalert.min.js"></script>
	<script type="text/javascript" src="../script/ajax.js"></script>
	<script type="text/javascript">
		window.onload = function() {
			var reset_password = document.getElementById('resetPassword');
			reset_password.style.opacity = 1 ;
		}
	</script>
</body>
</html>
