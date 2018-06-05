<!DOCTYPE html>
    <head>
    <title>MIS</title>
    <link type="text/css" rel="stylesheet" href="../Style/materialize/css/materialize.min.css" media="screen, projection">
    <link type="text/css" rel="stylesheet" href="../Style/style.css" media="screen, projection">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="../JavaScript/modal.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body>
        <nav>
            <div class="nav-wrapper teal darken-3"><a href="#" class="brand-logo">Vivixx</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">

                <li><a href="../index.php" class="modal-trigger" data-target="login">Login</a></li>
                <li><a href="../registration.html"> Sign-up</a></li>

                </ul>
            </div>
        </nav>

        <div class="modal" id="login">    
            <div class="modal-content">
                
                <div class="right-align">
                    <button type="button" class="btn-flat modal-action modal-close"><i class="material-icons">close</i></button>
                </div>
                
                <div class="center-align">
                    
                    <img src="../img/Logo.png" id="logo">
                <div>
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
                    <a href = "send-reset.php" style="display: block; margin: 1rem;">Forgot password?</a>
                    </div>
	           </form>
            </div>
        </div>
			</div>
		</div>
		
		<div class="modal" id="signup">    
            <div class="modal-content">
                
                <div class="right-align">
                    <button type="button" class="btn-flat modal-action modal-close"><i class="material-icons">close</i></button>
                </div>
                
                <div>
					<div class="center-align container valign-wrapper">
						<div class="row white" id="reg-form">
							<form action="Utilities/registration.php" method="post" class="col s12">
								<div class=" input-field col s6">
									<input type="text" name="first_name" id="fname" class="validate" required="required">
									<label for="fname">First Name</label>
								</div>

								<div class="input-field col s6">
									<input type="text" name="last_name" id="lname" class="validate" required="required">
									<label for="lname">Last Name</label>
								</div>

								<div class="input-field col s12">
									<input type="text" name="username" id="username" class="validate" required="required">
									<label for="username">Username</label>
								</div>

								<div class="input-field col s12">
									<input type="text" name="email" id="email" class="validate" required="required">
									<label for="email">Email</label>
								</div>

								<div class="input-field col s12">
									<input type="text" name="contact_number" id="contact" class="validate" required="required">
									<label for="contact">Contact Number</label>
								</div>

								<div class="left-align">
									<p>
										<strong>Gender</strong> 

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

								<div class="input-field col s12">
									<input type="text" class="datepicker" name="birthdate" id="bdate" class="validate" required="required">
									<label for="bdate">Birthdate</label>
								</div>

								<div class="input-field col s6">
									<input type="password" name="password" id="pass" class="validate" required="required">
									<label for="pass">Password</label>
								</div>

								<div class="input-field col s6">
									<input type="password" name="confirm_password" id="cpass" class="validate" required="required">
									<label for="cpass">Confirm Password</label>
								</div>

								<div  class="input-field col s2" >
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
		</div>
		
        
        
        
        <script type="text/javascript" src="../JavaScript/js/materialize.min.js"></script>
        <script>M.AutoInit();</script>
    </body>
</html>