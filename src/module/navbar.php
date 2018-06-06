
<!DOCTYPE html>
<html>
    <head>
    <title>MIS</title>
    <link type="text/css" rel="stylesheet" href="../style/bootstrap/bootstrap.min.css" media="screen, projection">
    <link type="text/css" rel="stylesheet" href="../style/style.css" media="screen, projection">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="../JavaScript/modal.js"></script>
	<script type="text/javascript" src="../JavaScript/ajax.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body>
            <nav class="navbar sticky-top navbar-dark bg-dark">
                <a href="#" class="navbar-brand" style="font-family: rockwell" data-targer="menu">Vivixx</a>
                    <ul class="navbar-nav mr-auto">
                        <?php
                            if(!isset($_SESSION['user'])){
                                echo "
                                    <li class='nav-item'><a class='nav-link' href='#!'>Login</a></li>
                                    <li class='nav-item'><a class='nav-link' href='#!'>Sign-up</a></li>
                                    ";
                            }else
                                echo "
                                    <li><a href='#!' class='dropdown-trigger' data-target='menu' style=' font-size: 28px; width=1000%;'>$user_first</a></li>
                                    ";
                        ?>
                    </ul>
            </nav>
        <!-- Login -->
        <div class="modal" id="login">    
            <div class="modal-content">
                <div class="right-align">
                    <button type="button" class="btn modal-action modal-close yellow darken-2"><i class="material-icons">close</i></button>
                </div>
                
                <div class="center-align">
                    <img src="../img/Logo.png" id="logo">
                    <form action="../Utilities/login.php" method="post" class="col s12 ">
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="text" name="user" class="validate" id="userOrEmail" required="required">
                                <label for="userOrEmail">Username or Email-Address</label>
                            </div>
                        </div>
                
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="password" class="validate" required="required" name="password" id="pass">
                                <label for="pass">Password</label>
                            </div>
                        </div>
                    
                        <div class="center-align">
                            <button type="submit" class="waves-effect waves-light btn teal darken-3" name="submit">Login</button>
                            <a a href="#!" class="modal-trigger" data-target="forgot" style="display: block; margin: 1rem;">Forgot password?</a>
                        </div>
	               </form>
                </div>
            </div>
        </div>
        <!-- End of Login -->
		
		<!-- Sign Up -->
        <div class="modal" id="signup">    
            <div class="modal-content"> 
                <div class="right-align">
                    <button type="button" class="btn modal-action modal-close yellow darken-3"><i class="material-icons">close</i></button>
                </div>

                <h4>Registration Form</h4> 
              
				<div class="center-align">
					<div class="row">
						<form action="Utilities/registration.php" method="post" class="col s12" >

							<div class=" input-field col s6">
								<i class="small material-icons prefix">person</i>
								<input type="text" name="first_name" id="fname" class="validate" required="required">
								<label for="fname">First Name</label>
							</div>

							<div class="input-field col s6">
								<input type="text" name="last_name" id="lname" class="validate" required="required">
								<label for="lname">Last Name</label>
							</div>

							<div class="input-field col s12">
								<i class="small material-icons prefix">account_box</i>
								<input type="text" name="username" id="username" onkeyup="helperText('username',this.value,'validUser')" class="validate" required="required">
								<label for="username">Username</label>
								<div id="validUser"></div>
							</div>

							<div class="input-field col s12">
								<i class="small material-icons prefix">email</i>
								<input type="text" name="email" id="email" onkeyup="helperText('email',this.value,'validEmail')" class="validate" required="required">
								<label for="email">Email</label>
								<div id="validEmail"></div>
							</div>

							<div class="input-field col s12">
								<i class="small material-icons prefix">contact_phone</i>
								<input type="text" name="contact_number" id="contact" onkeyup="helperText('contact',this.value,'validContact')" class="validate" required="required">
								<label for="contact">Contact Number</label>
								<div id="validContact"></div>
							</div>
							
							<div class="input-field col s12" >
								<input type="password" name="password" id="password" onkeyup="helperText('password',this.value,'validPassword')" class="validate" required="required">
								<label for="pass">Password</label>
								<div id="validPassword"></div>
							</div>

							<div class="input-field col s12" >
								<input type="password" name="confirm_password" id="cpass" onkeyup="confirmPass('confirm_password',this.value,'password','validConfirmation')" class="validate" required="required">
								<label for="cpass">Confirm Password</label>
								<div id="validConfirmation"></div>
							</div>

							<div class="input-field col s12">
								<i class="small material-icons prefix">date_range</i>
								<input type="date" name="birthdate" id="bdate" class="validate" required="required">
								<label for="bdate">Birthdate</label>
							</div>
							
							<div class="left-align input-field col s12">
								<p>
									<label class="right-align">
										<input class="with-gap" name="gender" type="radio" value="m" required="required"/>
										<span>Male</span>
									</label>

									<label>
									<input class="with-gap" name="gender" type="radio" value="f" required="required" class="right-align"/>
										<span>Female</span>
									</label>		
								</p>
									
							</div>
							
							<div class="input-field col s2" >
								<i class="small material-icons prefix">home</i>
								<input type="text" name="house_number" id="hnumber">
								<label for="hnumber">House No.</label>
							</div>

							<div class="input-field col s2">
								<input type="text" name="street" id="street">
								<label for="street">Street</label>
							</div>

							<div class="input-field col s2">
								<input type="text" name="barangay" id="barangay" class="validate" required="required">
								<label for="barangay">Barangay</label>
							</div>

							<div class="input-field col s3">
								<input type="text" name="city" id="city" class="validate" required="required">
								<label for="city">Municipality/City</label>
							</div>

							<div class="input-field col s3">
								<input type="text" name="province" id="province" class="validate" required="required">
								<label for="province">Province</label>
							</div>

							<div>
								<button type="submit" class="btn waves-effect waves-light">Sign Up</button>
							</div>
						</form>
        			</div>
				</div>
			</div>
		</div>
		<!-- End of Sign Up -->

		<div class="modal" id="forgot">    
            <div class="modal-content">
                <div class="right-align">
                    <button type="button" class="btn modal-action modal-close yellow darken-2"><i class="material-icons">close</i></button>
                </div>
                <h4>Enter Email</h4>
                <div class="center-align">
                    <div class="row">
                    	<form>
                    	<div class="input-field col s12">
                    		<input type="email" id="fogotPassword" name="email" required="required">
                    		<label for="fogotPassword">E-mail Address</label>
                    	</div>
                    	</form>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="../JavaScript/js/materialize.min.js"></script>
        <script>M.AutoInit();</script>
    </body>
</html>