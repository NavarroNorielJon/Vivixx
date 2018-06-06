
<!DOCTYPE html>
<html>
    <head>
    <title>MIS</title>
    <link type="text/css" rel="stylesheet" href="../Style/materialize/css/materialize.min.css" media="screen, projection">
    <link type="text/css" rel="stylesheet" href="../Style/style.css" media="screen, projection">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="../JavaScript/modal.js"></script>
	<script type="text/javascript" src="../JavaScript/ajax.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body>
        <div class="navbar-fixed">
            <nav class="yellow darken-3">
                <div class="nav-wrapper" id="navbar">
                    <a href="/" class="brand-logo">Vivixx</a>
                    <a href="#" class="sidenav-trigger" data-target="mobile-nav">Sample</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <?php
                            if(!isset($_SESSION['user'])){
                                echo "
                                    <li><a href='#!' class='modal-trigger' data-target='login'>Login</a></li>
                                    <li><a href='#!' class='modal-trigger' data-target='signup'>Sign-up</a></li>
                                    ";
                            }else
                                echo "
                                    <li><a href='/profile.php'>$user_first</a></li>
                                    <li><a href='Utilities/logout.php'>Logout</a></li>";
                        ?>
                    </ul>
                </div>
            </nav>
        </div>
        
        <ul class="sidenav" id="mobile-nav">
            <li><a href="#">Sample</a></li>
            <li><a href="#">Sample2</a></li>
        </ul>
        
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
				<!--Personal info-->
				<div class="center-align">
					<div class="row">
						<form action="Utilities/registration.php" method="post" class="col s12" >

							<div class=" input-field col s5">
								<i class="small material-icons prefix">person</i>
								<input type="text" name="first_name" id="fname" class="validate" required="required">
								<label for="fname">First Name</label>
							</div>
							
							<div class="input-field col s2">
								<input type="text" name="middle_name" id="mname" class="validate" required="required">
								<label for="mname">Middle Name</label>
							</div>
							
							<div class="input-field col s5">
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
								<label for="contact">Mobile Number</label>
								<div id="validContact"></div>
							</div>
							
							<div class="input-field col s5" >
								<i class="material-icons prefix">vpn_key</i>
								<input type="password" name="password" id="password" onkeyup="helperText('password',this.value,'validPassword')" class="validate" required="required">
								<label for="pass">Password</label>
								<div id="validPassword"></div>
							</div>
							
							<div class="input-field col s5" >
								<input type="password" name="confirm_password" id="cpass" onkeyup="confirmPass('confirm_password',this.value,'password','validConfirmation')" class="validate" required="required">
								<label for="cpass">Confirm Password</label>
								<div id="validConfirmation"></div>		
							</div>

							<div class="switch input-field col s2">
								<label>
									<input id="hid" type="checkbox" onclick="showHide('password','cpass')">
									<span><i class="material-icons" >remove_red_eye</i></span>
								</label>
							</div>
							
							<div class="input-field col s4">
								<i class="small material-icons prefix">date_range</i>
								<input type="date" name="birthdate" id="bdate" class="validate" required="required">
								<label for="bdate">Birthdate</label>
							</div>
							
							<div class="input-field col s2" >
								<i class="small material-icons prefix">home</i>
								<input type="text" name="age" id="age">
								<label for="age">Age</label>
							</div>
							
							<div class="input-field col s6" >
								<i class="small material-icons prefix">home</i>
								<input type="text" name="pbirth" id="pbirth">
								<label for="pbirth">Place of Birth</label>
							</div>
							
							<div class="left-align input-field col s12">
								<div>
									<i class="small material-icons prefix">wc</i>
									<label class="right-align">
										<input class="with-gap" name="gender" type="radio" value="m" required="required"/>
										<span>Male</span>
									</label>

									<label>
									<input class="with-gap" name="gender" type="radio" value="f" required="required" class="right-align"/>
										<span>Female</span>
									</label>		
								</div>
									
							</div>
							
							<div class="input-field col s12" >
								<i class="small material-icons prefix">home</i>
								<input type="text" name="address" id="address">
								<label for="address">Address</label>
							</div>
							
							<div class="input-field col s4" >
								<i class="small material-icons prefix">home</i>
								<input type="text" name="citizenship" id="citizenship">
								<label for="citizenship">Citizenship</label>
							</div>
							
							<div class="input-field col s4" >
								<i class="small material-icons prefix">home</i>
								<input type="text" name="religion" id="religion">
								<label for="religion">Religion</label>
							</div>
							
							<div class="input-field col s4" >
								<i class="small material-icons prefix">home</i>
								<input type="dropdown" name="civil" id="civil">
								<label for="civil">Civil Status</label>
							</div>
							
							
							
							<div class="center-align">
								<button type="submit" class="btn waves-effect waves-light col s12 " id="signbutton">Sign Up</button>
							</div>
						</form>
        			</div>
				</div>
				<!--end of Personal info-->
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