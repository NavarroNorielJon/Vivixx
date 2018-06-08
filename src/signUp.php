

<html>
    <head>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="style/bootstrap/bootstrap.min.css" media="screen, projection">
        <link type="text/css" rel="stylesheet" href="../style/style.css" media="screen, projection">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
			<!-- START of user info-->
                <form action="utilities/registration.php" method="POST">
                    <div class="jumbotron" id="signup_form">
                        <div>
                        <h1>Registration Form</h1><br>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" onkeyup="helperText('username',this.value,'validUser');nextButton('password','cpassword');" class="form-control" required="required">
                            <div id="validUser"></div>
    				    </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" onkeyup="helperText('email',this.value,'validEmail');nextButton('password','cpassword');" class=" form-control form-control" required="required">
                            <div id="validEmail"></div>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" id="password" onkeyup="helperText('password',this.value,'validPassword')" class="form-control" required="required">

                                <div class="input-group-append">
                                    <button  type="button" class="btn" onclick="showHide('password')">
                                        <i class="material-icons">remove_red_eye</i>
                                    </button>
                                </div>
                            </div>
                            <div id="validPassword"></div>
                        </div>

                        <div class="form-group" >
                            <label for="cpass">Confirm Password</label>
                                <div class="input-group">
                                    <input type="password" name="confirm_password" id="cpassword" onkeyup="confirmPass('confirm_password',this.value,'password','validConfirmation');nextButton('password','cpassword');" class="form-control" required="required">

                                    <div class="input-group-append">
                                        <button  type="button" class="btn" onclick="showHide('cpassword')">
                                            <i class="material-icons">remove_red_eye</i>
                                        </button>
                                    </div>
                                </div>
                                <div id="validConfirmation"></div>
                        </div>

                        <div>
                            <a href="/"><button type="button" onclick="hideForm()" style="text-align: left">Home</button></a>
                            <button type="button" id="next" onclick="hideForm()" style="text-align: right" disabled="disabled">Next</button>

                        </div>
                    </div>
                </div>

			<!-- Start of Personal Info-->
            <div class="jumbotron d-none" id="personal_info" >
                <div>
                    <h1>Personal Information</h1><br>

                    <div class="row">
                        <div class="form-group col-4">
                            <i class="large material-icons" style="font-size:50px;">person</i>
                            <label for="fname">First Name</label>
                            <input type="text" name="first_name" id="fname" class="form-control" required="required">
                        </div>

                        <div class="form-group col-4 pads">
                            <label for="mname">Middle Name</label>
                            <input type="text" name="middle_name" id="mname" class="form-control" required="required">
                        </div>

                        <div class="form-group col-4 pads">
                            <label for="lname">Last Name</label>
                            <input type="text" name="last_name" id="lname" class="form-control" required="required">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-4">
              		        <i class="material-icons" style="font-size:50px;">date_range</i>
                            <label for="bdate">Birthdate</label>
              		        <input type="date" name="birthdate" id="bdate" class="form-control" required="required">
              		    </div>

                        <div class="form-group col-4" >
              		        <i class="material-icons" style="font-size:50px;">home</i>
                            <label for="pbirth">Place of Birth</label>
              		        <input type="text" name="pbirth" id="pbirth" class="form-control" required="required">
                        </div>

                        <div class="form-group col-4" >
                            <i class="small material-icons prefix" style="font-size:50px;">contact_phone</i>
                            <label for="contact">Mobile Number</label>
                            <input type="text" name="contact_number" class="form-control" id="contact" onkeyup="helperText('contact_number',this.value,'validContact')" class=" form-control" required="required">
                                <div id="validContact"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class=" form-group col-3 ">
                            <i class="small material-icons prefix" style="font-size:50px;">wc</i>
                            <label for="gender">Sex</label>
                            <select name="gender" class="form-control" required="required">
                                <option selected disabled>Select Here:</option>
                                <option value="m">Male</option>
                                <option value="f">Female</option>
                            </select>
              		    </div>

                        <div class="form-group col-3 pads">
                            <label for="height">Height</label>
                            <input type="text" name="height" id="height" class="form-control" placeholder="(ft.)" required="required">
                        </div>

                        <div class="form-group col-3 pads">
                            <label for="weight">Weight</label>
                              <input type="text" name="weight" id="weight" class="form-control" placeholder="(kg.)" required="required">
                        </div>

                        <div class="form-group col-3 pads">
                            <label for="blood">Blood Type</label>
                            <select name="blood" class="form-control" required="required">
                                <option selected disabled>Select Blood Type:</option>
                                <option value="o">O</option>
                                <option value="a">A</option>
                                <option value="b">B</option>
                                <option value="ab">AB</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-7">
              		        <i class="small material-icons prefix" style="font-size:50px;">home</i>
                            <label for="residential_address">Residential Address</label>
              		        <input type="text" name="residential_address" id="residential_address" class="form-control" required="required">
                        </div>

                        <div class="form-group col-2 pads">
                            <label for="residential_zip">Zip Code</label>
                            <input type="text" name="residential_zip" id="residential_zip" class="form-control" required="required">
                        </div>

                        <div class="form-group col-3 pads">
                            <label for="residential_tel_no">Telephone NO.</label>
              		        <input type="text" name="residential_tel_no" id="residential_tel_no" class="form-control">
                        </div>
                    </div>

                    <div class="row">
              			<div class="form-group col-7">
             				<i class="small material-icons prefix" style="font-size:50px;">home</i>
                            <label for="permanent_address">Permanent Address</label>
              				<input type="text" name="permanent_address" id="permanent_address" class="form-control" required="required">
              			</div>

              			<div class="form-group col-2 pads">
                            <label for="permanent_zip">Zip Code</label>
              				<input type="text" name="permanent_zip" id="permanent_zip" class="form-control" required="required">
              			</div>

              			<div class="form-group col-3 pads" >
                        	<label for="permanent_tel_no">Telephone NO.</label>
              				<input type="text" name="permanent_tel_no" id="permanent_tel_no" class="form-control" required="required">
              			</div>
					</div>

                    <div class="row">
              			<div class="form-group col-4" >
                        	<label for="citizenship">Citizenship</label>
              					<input type="text" name="citizenship" id="citizenship" class="form-control" required="required">
              			</div>

              			<div class="form-group col-4" >
                        	<label for="religion">Religion</label>
              				<input type="text" name="religion" id="religion" class="form-control">
              			</div>

              			<div class="form-group col-4" >
                        	<label for="civil_status">Civil Status</label>
                         	<select name="civil_status" class="form-control" required="required">
                            	<option selected disabled>Select Civil Status:</option>
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                                <option value="widowed">Widowed</option>
                                <option value="annulled">Annulled</option>
                                <option value="separated">Separated</option>
                                <option value="other">Others</option>
                             </select>
						</div>
					</div>

                    <div class="row">
                    	<div class="form-group col-3" >
							<label for="sss_no">SSS NO.</label>
							<input type="text" name="sss_no" id="sss_no" class="form-control" required="required">
              			</div>

              			<div class="form-group col-3" >
							<label for="tin">TIN</label>
              				<input type="text" name="tin" id="tin" class="form-control" required="required">
              			</div>

              			<div class="form-group col-3" >
							<label for="philhealth_no ">PHILHEALTH NO.</label>
							<input type="text" name="philhealth_no" id="philhealth_no" class="form-control" required="required">
              			</div>

              			<div class="form-group col-3" >
							<label for="pagibig_id_no">PAG-IBIG ID NO.</label>
							<input type="text" name="pagibig_id_no" id="pagibig_id_no" class="form-control" required="required">
              			</div>
					</div>
            <!-- End of Personal Info-->
					<div style="text-align: right">
                    	<button type="submit" id="next1">Submit</button>
					</div>
			   </div>
             </form>
        </div>
    <script>
    function hideForm(){
      document.getElementById('signup_form').classList.add("d-none");
      document.getElementById('personal_info').classList.remove("d-none");
    }
    </script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="script/ajax.js"></script>
    </body>
</html>
