<?php
    include 'utilities/session.php';
    include 'module/navbar2.0.php';
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

    <body style="background-color:#005959;">
        <div class="jumbotron" id="login-form" style="background-color: white; padding-top: 6%;">
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
                    <input type="password" placeholder="Password" name="password" id="lpass" class="form-control" onkeyup="confirmLogin('password',this.value,'userEmail','validPassword')" required="required" >
                    
                    <div class="input-group-appened">
                        <button  type="button" class="btn" onclick="showPass()">
                            <span><i class="material-icons" >remove_red_eye</i></span>
                    </button>
                    </div>
                    </div>
					          <div id="validPassword"></div>
                </div>

                
                <div style="text-align: center;">
                
                    <div class="btn-group" role="group">
                        <button type="submit" class="btn" style="border: 2px solid #005959;" id="button1" name="submit">Login</button><br>
                        <button type="button" class="btn" style="border: 2px solid #005959;" id="button1"><a href="signUp.php" id="sign">Sign Up</a></button>
                    </div>
                     <a a href="#!" data-target="forgot" style="display: block; margin: 1rem;">Forgot password?</a>
                </div>

	       </form>

        </div>
		<script type="text/javascript" src="../script/ajax.js"></script>
    </body>
</html>
