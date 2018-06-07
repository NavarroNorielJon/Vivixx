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
		<div class="jumbotron" id="signup-form" display="visibility:hidden">
            <form id="reg_form">
                <h1>Registration Form</h1><br>
                <div class="form-group">
                    <label for="username">Username</label>
					          <input type="text" name="username" id="username" onkeyup="helperText('username',this.value,'validUser');nextButton('password','cpass');" class="form-control" required="required">
                    <div id="validUser"></div>
				        </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" onkeyup="helperText('email',this.value,'validEmail');nextButton('password','cpass');" class="validate form-control" required="required">
                    <div id="validEmail"></div>
                </div>

        				<div class="form-group">
                  <label for="pass">Password</label>
        					<input type="password" name="password" id="password" onkeyup="helperText('password',this.value,'validPassword');nextButton('password','cpass');" class="form-control" required="required">
        				  <div id="validPassword"></div>
                </div>

        				<div class="form-group" >
                    <label for="cpass">Confirm Password</label>
        				    <input type="password" name="confirm_password" id="cpass" onkeyup="confirmPass('confirm_password',this.value,'password','validConfirmation');nextButton('password','cpass');" class="form-control" required="required">
                    <div id="validConfirmation"></div>
                </div>

                <div style="text-align: right">
                  <button type="button" id="next" onclick="hideForm()">Next</button>
                </div>
            </form>
    </div>
							<!--END OF user info-->
              <!-- Start of Personal Info-->
    <div class="container-fluid d-none" id="personal_info">
      <div class="jumbotron" id="personal">
        <div></div>
      </div>
    </div>
    <script>
    function hideForm(){
      document.getElementById('reg_form').classList.add("d-none");
      document.getElementById('personal_info').classList.remove("d-none");
    }
    </script>
    </body>
</html>
