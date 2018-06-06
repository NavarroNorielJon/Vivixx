<?php
    include 'utilities/session.php';
    include 'module/navbar.php';
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Vivixx</title>
        <link type="text/css" rel="stylesheet" href="style/bootstrap/bootstrap.min.css" media="screen, projection">
        <link type="text/css" rel="stylesheet" href="../style/style.css" media="screen, projection">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body style="background-color:#005959;">
        <div class="jumbotron" style="background-color: white; padding-top: 6%;">
            <img src="img/Lion.png" style="width:40%; height:auto; margin-right:4%; margin-left:3%;"><br>
            <form action="../utilities/login.php" method="post" class="col s12 ">
                
                <div class="form-group">
                    <label for="userOrEmail">Username or Email-Address</label>
                    <input class="form-control" type="text" name="user" id="userOrEmail" required="required" placeholder="Username or Email-Address">
                </div>
                
                <div class="form-group">
                    <label for="pass">Password</label>
                    <input type="password" class="form-control" required="required" name="password" id="pass" placeholder="Password">
                </div>
                
                <div style="text-align: center;">    
                <button type="submit" class="btn" style="background-color: #fac213;color: #fac" name="submit">Login</button>
                <a a href="#!" class="modal-trigger" data-target="forgot" style="display: block; margin: 1rem;">Forgot password?</a>
                </div>
	       </form>
        </div>
    </body>
    
</html>