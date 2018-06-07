<?php
    include 'module/navbar2.0.php';
?>

<html>
    <head>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="style/bootstrap/bootstrap.min.css" media="screen, projection">
        <link type="text/css" rel="stylesheet" href="../style/style.css" media="screen, projection">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <!--START of user info-->
		<div class="jumbotron" id="signup-form">
            <form id="reg_form">
                <h1>Registration Form</h1><br>
                <div class="form-group">
                    <label for="username">Username</label>
					          <input type="text" name="username" id="username" onkeyup="helperText('username',this.value,'validUser');nextButton('password','cpass');" class="form-control" required="required">
                    <div id="validUser"></div>
				        </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" onkeyup="helperText('email',this.value,'validEmail');nextButton('password','cpass');" class=" form-control form-control" required="required">
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
              <div class="jumbotron d-none" id="personal_info" >
                      <form id="per_info">
                          <h1>Personal Information</h1><br>
                          <i class="large material-icons" style="font-size:50px;">person</i>
                          <div class="row">
                            <div class="form-group col-4">

                              <label for="fname">First Name</label>
                              <input type="text" name="first_name" id="fname" class="form-control" required="required">
            				        </div>

                            <div class="form-group col-4">
                              <label for="mname">Middle Name</label>
                              <input type="text" name="middle_name" id="mname" class="form-control" required="required">
                            </div>

                    				<div class="form-group col-4">
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
              								<input type="text" name="pbirth" id="pbirth" class="form-control">
              							</div>



                    				<div class="form-group col-4" >
                              <i class="small material-icons prefix" style="font-size:50px;">contact_phone</i>
                              <label for="contact">Mobile Number</label>
                              <input type="text" name="contact_number" class="form-control" id="contact" onkeyup="helperText('contact',this.value,'validContact')" class=" form-control" required="required">
                              <div id="validContact"></div>
                            </div>
                          </div>

                          <div class="row">
                            
                            <div class=" form-group col-3 ">
                              <i class="small material-icons prefix" style="font-size:50px;">wc</i>
                              <label for="gender">Sex</label>
                              <select name="gender" class="form-control">
                                <option selected disabled>Select Here:</option>
                                <option value="m">Male</option>
                                <option value="f">Female</option>
                              </select>
              							</div>

                            <div class="form-group col-3 pads">
                              <label for="height">Height</label>
                              <input type="text" name="height" id="height" class="form-control" placeholder="(ft.)">
                            </div>

                            <div class="form-group col-3 pads">
                              <label for="weight">Weight</label>
                              <input type="text" name="weight" id="weight" class="form-control" placeholder="(kg.)">
                            </div>

                            <div class="form-group col-3 pads">
                              <label for="blood">Blood Type</label>
                              <select name="blood" class="form-control">
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
                              <label for="res_address">Residential Address</label>
              								<input type="text" name="res_address" id="res_address" class="form-control">
              							</div>

              							<div class="form-group col-2 pads">
                              <label for="rzip_code">Zip Code</label>
              								<input type="text" name="rzip_code" id="rzip_code" class="form-control">
              							</div>

              							<div class="form-group col-3 pads">
                              <label for="tel_num">Telephone NO.</label>
              								<input type="text" name="tel_num" id="tel_num" class="form-control">
              							</div>
                          </div>


                          <div class="row">
              							<div class="form-group col-7">
              								<i class="small material-icons prefix" style="font-size:50px;">home</i>
                              <label for="per_address">Permanent Address</label>
              								<input type="text" name="per_address" id="per_address" class="form-control">
              							</div>

              							<div class="form-group col-2 pads">
                              <label for="pzip_code">Zip Code</label>
              								<input type="text" name="pzip_code" id="pzip_code" class="form-control">
              							</div>

              							<div class="form-group col-3 pads" >
                              <label for="tel_num1">Telephone NO.</label>
              								<input type="text" name="tel_num1" id="tel_num1" class="form-control">
              							</div>
                          </div>

                          <div class="row">
              							<div class="form-group col-4" >
                              <label for="citizenship">Citizenship</label>
              								<input type="text" name="citizenship" id="citizenship" class="form-control">
              							</div>

              							<div class="form-group col-4" >
                              <label for="religion">Religion</label>
              								<input type="text" name="religion" id="religion" class="form-control">
              							</div>

              							<div class="form-group col-4" >
                              <label for="civil">Civil Status</label>
                              <select name="civil" class="form-control">
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
                              <label for="sss">SSS NO.</label>
              								<input type="text" name="sss" id="sss" class="form-control">
              							</div>

              							<div class="form-group col-3" >
                              <label for="tin">TIN</label>
              								<input type="text" name="tin" id="tin" class="form-control">
              							</div>

              							<div class="form-group col-3" >
                              <label for="phn">PHILHEALTH NO.</label>
              								<input type="text" name="phn" id="phn" class="form-control">
              							</div>

              							<div class="form-group col-3" >
                              <label for="pgb">PAG-IBIG ID NO.</label>
              								<input type="text" name="pgb" id="pgb" class="form-control">
              							</div>
                          </div>


                          <div style="text-align: right">
                            <button type="button" id="next" onclick="hideForm()">Next</button>
                          </div>
                      </form>
              </div>
              <!-- End of Personal Info -->
    <script>
    function hideForm(){
      document.getElementById('reg_form').classList.add("d-none");
      document.getElementById('personal_info').classList.remove("d-none");
    }
    </script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    </body>
</html>
