<?php
    include 'utilities/session.php';
    include 'module/footer.php';
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
                        
                        <div id="vPassword"></div>
                    
                        <div class="input-group-append">
                            <button  type="button" class="btn" onclick="showPass()">
                            <i class="material-icons" >remove_red_eye</i>
                            </button>
                        </div>
                    </div>	          
                </div>
                
                <div style="text-align: center;">
                    <button type="submit" class="btn" style="border: 2px solid #005959;" id="button1" name="submit">Login</button><br>
                    <a a href="#!" data-toggle="modal" data-target="#forgot" style="display: block; margin: 1rem;">Forgot password?</a>
                    <a href="signUp.php" style="display: block">Sign Up</a>
                </div>
            </form>
        </div>
        
        
        
        <!-- Modal for forgot password -->
        <div class="modal" id="forgot" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- Header -->
                    <div class="modal-header">
                        <h3>Forgot Password</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <!-- Body -->
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="id">E-mail Address</label>
                                <input type="email" class="form-control" id="email" placeholder="E-mail Address">
                            </div>
                        </form>
                    </div>
                    
                    <!--Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Send Email</button>
                    </div>
                </div>
            </div>
        </div>
        
        <script type="text/javascript" src="script/ajax.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript" src="script/bootstrap/bootstrap.min.js"></script> 
    </body>
</html>
