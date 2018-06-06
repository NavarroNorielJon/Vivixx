
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

                <h3>Registration Form</h3> 
				
				
				<div class="center-align">
					<div class="row">
						<form action="Utilities/registration.php" method="post" class="col s12" >
							
							<!--START of user info-->
							<h4>User Information</h4>
							<div class="input-field col s5">
								<i class="small material-icons prefix">account_box</i>
								<input type="text" name="username" id="username" onkeyup="helperText('username',this.value,'validUser')" class="validate" required="required">
								<label for="username">Username</label>
								<div id="validUser"></div>
							</div>

							<div class="input-field col s7">
								<i class="small material-icons prefix">email</i>
								<input type="text" name="email" id="email" onkeyup="helperText('email',this.value,'validEmail')" class="validate" required="required">
								<label for="email">Email</label>
								<div id="validEmail"></div>
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
							<!--END OF user info-->
							
							<!--Personal info-->
							<h4>Personal Information</h4>
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
								<i class="small material-icons prefix">contact_phone</i>
								<input type="text" name="contact_number" id="contact" onkeyup="helperText('contact',this.value,'validContact')" class="validate" required="required">
								<label for="contact">Mobile Number</label>
								<div id="validContact"></div>
							</div>
							
							<div class="input-field col s6">
								<i class="small material-icons prefix">date_range</i>
								<input type="date" name="birthdate" id="bdate" class="validate" required="required">
								<label for="bdate">Birthdate</label>
							</div>
							
							<div class="input-field col s6" >
								<i class="small material-icons prefix">home</i>
								<input type="text" name="pbirth" id="pbirth">
								<label for="pbirth">Place of Birth</label>
							</div>

							<div class="left-align input-field col s6">
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
														
							<div class="input-field col s6" >
								<i class="small material-icons prefix">home</i>
								<input type="text" name="age" id="age">
								<label for="age">Age</label>
							</div>
							
							<div class="input-field col s5" >
								<i class="small material-icons prefix">home</i>
								<input type="text" name="res_address" id="res_address">
								<label for="res_address">Residential Address</label>
							</div>
							
							<div class="input-field col s3" >
								<i class="small material-icons prefix">home</i>
								<input type="text" name="rzip_code" id="rzip_code">
								<label for="rzip_code">Zip Code</label>
							</div>
							
							<div class="input-field col s4" >
								<i class="small material-icons prefix">home</i>
								<input type="text" name="tel_num" id="tel_num">
								<label for="tel_num">Telephone NO.</label>
							</div>
							
							<div class="input-field col s5" >
								<i class="small material-icons prefix">home</i>
								<input type="text" name="per_address" id="per_address">
								<label for="per_address">Permanent Address</label>
							</div>
							
							<div class="input-field col s3" >
								<i class="small material-icons prefix">home</i>
								<input type="text" name="pzip_code" id="pzip_code">
								<label for="pzip_code">Zip Code</label>
							</div>
							
							<div class="input-field col s4" >
								<i class="small material-icons prefix">home</i>
								<input type="text" name="tel_num1" id="tel_num1">
								<label for="tel_num1">Telephone NO.</label>
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
								<input type="text" name="civil" id="civil">
								<label for="civil">Civil Status</label>
							</div>
							
							<div class="input-field col s4" >
								<i class="small material-icons prefix">home</i>
								<input type="text" name="height" id="height">
								<label for="height">Height</label>
							</div>
							
							<div class="input-field col s4" >
								<i class="small material-icons prefix">home</i>
								<input type="text" name="weight" id="weight">
								<label for="weight">Weight</label>
							</div>
							
							<div class="input-field col s4" >
								<i class="small material-icons prefix">home</i>
								<input type="text" name="blood" id="blood">
								<label for="blood">Blood Type</label>
							</div>
							
							<div class="input-field col s3" >
								<i class="small material-icons prefix">home</i>
								<input type="text" name="sss" id="sss">
								<label for="sss">SSS NO.</label>
							</div>
							
							<div class="input-field col s3" >
								<i class="small material-icons prefix">home</i>
								<input type="text" name="tin" id="tin">
								<label for="tin">TIN</label>
							</div>
							
							<div class="input-field col s3" >
								<i class="small material-icons prefix">home</i>
								<input type="text" name="phn" id="phn">
								<label for="phn">PHILHEALTH NO.</label>
							</div>
							
							<div class="input-field col s3" >
								<i class="small material-icons prefix">home</i>
								<input type="text" name="phn" id="phn">
								<label for="phn">PAG-IBIG ID NO.</label>
							</div>
							<!--end of Personal info-->
							
							<!--Family Background-->
							<h4>Family Background</h4>
							<h5 class="left-align">Spouse's Information</h5>
							<div class="input-field col s4" >
								<i class="small material-icons prefix">person</i>
								<input type="text" name="sfirst_name" id="sfname" class="validate" required="required">
								<label for="sfname">First Name</label>
							</div>
							
							<div class="input-field col s4" >
								<input type="text" name="smiddle_name" id="smname" class="validate" required="required">
								<label for="smname">Middle Name</label>
							</div>
							
							<div class="input-field col s4" >
								<input type="text" name="slast_name" id="slname" class="validate" required="required">
								<label for="slname">Last Name</label>
							</div>
							
							<h5 class="left-align">Father's Information</h5>
							<div class="input-field col s4" >
								<i class="small material-icons prefix">person</i>
								<input type="text" name="ffirst_name" id="ffname" class="validate" required="required">
								<label for="ffname">First Name</label>
							</div>
							
							<div class="input-field col s4" >
								<input type="text" name="fmiddle_name" id="fmname" class="validate" required="required">
								<label for="fmname">Middle Name</label>
							</div>
							
							<div class="input-field col s4" >
								<input type="text" name="flast_name" id="flname" class="validate" required="required">
								<label for="flname">Last Name</label>
							</div>
							
							<h5 class="left-align">Mother's Information</h5>
							<div class="input-field col s4" >
								<i class="small material-icons prefix">person</i>
								<input type="text" name="mfirst_name" id="mfname" class="validate" required="required">
								<label for="mfname">First Name</label>
							</div>
							
							<div class="input-field col s4" >
								<input type="text" name="mmiddle_name" id="mmname" class="validate" required="required">
								<label for="mmname">Middle Name</label>
							</div>
							
							<div class="input-field col s4" >
								<input type="text" name="mlast_name" id="mlname" class="validate" required="required">
								<label for="mlname">Last Name</label>
							</div>
							
							<!--end of Family Background-->
							
							<div class="center-align">
								<button type="submit" class="btn waves-effect waves-light col s12 " id="signbutton">Sign Up</button>
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