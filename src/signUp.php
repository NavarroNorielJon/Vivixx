<?php
    include 'module/navbar2.0.php';
?>

<html>
    <head>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="style/bootstrap/bootstrap.min.css" media="screen, projection">
        <link type="text/css" rel="stylesheet" href="../style/style.css" media="screen, projection">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body>				
        <!--START of user info-->
		<div class="jumbotron" id="signup-form">
            <form>
                <h1>Registration Form</h1><br>
                <div class="form-group">
                    <label for="username">Username</label>
					<input type="text" name="username" id="username" onkeyup="helperText('username',this.value,'validUser')" class="form-control" required="required">
				</div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" onkeyup="helperText('email',this.value,'validEmail')" class="validate form-control" required="required">
				</div>
														
				<div class="form-group">
                    <label for="pass">Password</label>
					<input type="password" name="password" id="pass" onkeyup="helperText('password',this.value,'validPassword')" class="form-control" required="required">
					
				</div>
							
				<div class="form-group" >
                    <label for="cpass">Confirm Password</label>
				    <input type="password" name="confirm_password" id="cpass" onkeyup="confirmPass('confirm_password',this.value,'password','validConfirmation')" class="form-control" required="required">
				</div>
            </form>
        </div>
							<!--END OF user info-->
						
    </body>
</html>