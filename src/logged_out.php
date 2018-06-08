<!DOCTYPE html>
<html>
    <body class="white">
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
                            <input type="password" placeholder="Password" name="password" id="lpass" class="form-control" onkeyup="confirmLogin('password',this.value,'userEmail','validPassword')" required="required" >

                            <div class="input-group-append">
                                <button  type="button" class="btn" onclick="showPass()">
                                <i class="material-icons">remove_red_eye</i>
                                </button>
                            </div>
                        </div>

                        <div id="vPassword"></div>
                    </div>

                    <div style="text-align: center;">
                        <button type="submit" class="btn" style="border: 2px solid #005959;" id="button1" name="submit">Login</button><br>
                        <a a href="#!" data-toggle="modal" data-target="#forgot" style="display: block; margin: 1rem;">Forgot password?</a>
                        <a href="signUp.php" style="display: block">Sign Up</a>
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
    </body>
</html>
