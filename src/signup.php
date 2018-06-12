

<html>
    <head>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="style/bootstrap/bootstrap.min.css" media="screen, projection">
        <link type="text/css" rel="stylesheet" href="../style/style.css" media="screen, projection">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body style="background-color: #005959;">
			<!-- START of user info-->
                <form action="utilities/registration.php" method="POST">
                    <div class="jumbotron " id="signup_form">
                        <div>
                        <h1>Registration Form</h1><br>
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="fname">First Name</label>
                                <input type="text" name="first_name" id="fname" autocomplete="off" class="form-control" required="required">
                            </div>

                            <div class="form-group col-4 ">
                                <label for="mname">Middle Name</label>
                                <input type="text" name="middle_name" id="mname" autocomplete="off" class="form-control" required="required">
                            </div>

                            <div class="form-group col-4 ">
                                <label for="lname">Last Name</label>
                                <input type="text" name="last_name" id="lname" autocomplete="off" class="form-control" required="required">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" autocomplete="off" onkeyup="helperText('username',this.value,'validUser');nextButton('password','cpassword');" class="form-control" required="required">
                                <div id="validUser"></div>
        				    </div>

                            <div class="form-group col-6">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" autocomplete="off" onkeyup="helperText('email',this.value,'validEmail');nextButton('password','cpassword');" class=" form-control form-control" required="required">
                                <div id="validEmail"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                                <input type="password" name="rpassword" id="rpassword" onkeyup="helperText('password',this.value,'validPassword')" class="form-control" required="required">
                            <div id="validPassword"></div>
                        </div>

                        <div class="form-group" >
                            <label for="cpass">Confirm Password</label>
                                <div class="input-group">
                                    <input type="password" name="confirm_password" id="cpassword" onkeyup="confirmPass('confirm_password',this.value,'password','validConfirmation')" class="form-control" required="required">

                                    <div class="input-group-append">
                                        <button  type="button" class="btn" onclick="showHide('cpassword','icon1')">
                                            <i class="material-icons" id="icon1">visibility</i>
                                        </button>
                                    </div>
                                </div>
                                <div id="validConfirmation"></div>
                        </div>

                        <div>
                            <a href="/"><button type="button" style="text-align: left"><i class="material-icons" >home</i></button></a>
                            <button type="submit" onclick="loginSuccess()">Submit</button>
                        </div>
                    </div>
                </div>
       </form>

    <script>
    function nextForm(currId,nextId){
      document.getElementById(currId).classList.add("d-none");
      document.getElementById(nextId).classList.remove("d-none");
    }

	function loginSuccess(){
			swal("Registration Success","" , "success");
		}
    </script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="script/ajax.js"></script>
    <script type="text/javascript" src="script/sweetalert.min.js"></script>
    </body>
</html>
