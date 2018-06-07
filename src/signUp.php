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
                            <div class="form-group col-2">
              								<i class="material-icons" style="font-size:50px;">date_range</i>
                              <label for="bdate">Birthdate</label>
              								<input type="date" name="birthdate" id="bdate" class="form-control" required="required">

              							</div>

                            <div class="form-group col-4" >
              								<i class="material-icons" style="font-size:50px;">home</i>
                              <label for="pbirth">Place of Birth</label>
              								<input type="text" name="pbirth" id="pbirth" class="form-control">
              							</div>

                            <div class=" form-group col-1">
                              <i class="small material-icons prefix" style="font-size:50px;">wc</i>
              								<div>
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

                    				<div class="form-group col-5" >
                              <i class="small material-icons prefix" style="font-size:50px;">contact_phone</i>
                              <label for="contact">Mobile Number</label>
                              <input type="text" name="contact_number" class="form-control" id="contact" onkeyup="helperText('contact',this.value,'validContact')" class=" form-control" required="required">
                              <div id="validContact"></div>
                            </div>
                          </div>


            							<div class="form-group col-5" >
            								<i class="small material-icons prefix">home</i>
            								<input type="text" name="res_address" id="res_address">
            								<label for="res_address">Residential Address</label>
            							</div>

            							<div class="form-group col-3" >
            								<i class="small material-icons prefix">home</i>
            								<input type="text" name="rzip_code" id="rzip_code">
            								<label for="rzip_code">Zip Code</label>
            							</div>

            							<div class="form-group col-4" >
            								<i class="small material-icons prefix">home</i>
            								<input type="text" name="tel_num" id="tel_num">
            								<label for="tel_num">Telephone NO.</label>
            							</div>

            							<div class="form-group col-5" >
            								<i class="small material-icons prefix">home</i>
            								<input type="text" name="per_address" id="per_address">
            								<label for="per_address">Permanent Address</label>
            							</div>

            							<div class="form-group col-3" >
            								<i class="small material-icons prefix">home</i>
            								<input type="text" name="pzip_code" id="pzip_code">
            								<label for="pzip_code">Zip Code</label>
            							</div>

            							<div class="form-group col-4" >
            								<i class="small material-icons prefix">home</i>
            								<input type="text" name="tel_num1" id="tel_num1">
            								<label for="tel_num1">Telephone NO.</label>
            							</div>

            							<div class="form-group col-4" >
            								<i class="small material-icons prefix">home</i>
            								<input type="text" name="citizenship" id="citizenship">
            								<label for="citizenship">Citizenship</label>
            							</div>

            							<div class="form-group col-4" >
            								<i class="small material-icons prefix">home</i>
            								<input type="text" name="religion" id="religion">
            								<label for="religion">Religion</label>
            							</div>

            							<div class="form-group col-4" >
            								<i class="small material-icons prefix">home</i>
            								<input type="text" name="civil" id="civil">
            								<label for="civil">Civil Status</label>
            							</div>

            							<div class="form-group col-4" >
            								<i class="small material-icons prefix">home</i>
            								<input type="text" name="height" id="height">
            								<label for="height">Height</label>
            							</div>

            							<div class="form-group col-4" >
            								<i class="small material-icons prefix">home</i>
            								<input type="text" name="weight" id="weight">
            								<label for="weight">Weight</label>
            							</div>

            							<div class="form-group col-4" >
            								<i class="small material-icons prefix">home</i>
            								<input type="text" name="blood" id="blood">
            								<label for="blood">Blood Type</label>
            							</div>

            							<div class="form-group col-3" >
            								<i class="small material-icons prefix">home</i>
            								<input type="text" name="sss" id="sss">
            								<label for="sss">SSS NO.</label>
            							</div>

            							<div class="form-group col-3" >
            								<i class="small material-icons prefix">home</i>
            								<input type="text" name="tin" id="tin">
            								<label for="tin">TIN</label>
            							</div>

            							<div class="form-group col-3" >
            								<i class="small material-icons prefix">home</i>
            								<input type="text" name="phn" id="phn">
            								<label for="phn">PHILHEALTH NO.</label>
            							</div>

            							<div class="form-group col-3" >
            								<i class="small material-icons prefix">home</i>
            								<input type="text" name="pgb" id="pgb">
            								<label for="pgb">PAG-IBIG ID NO.</label>
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
    </body>
</html>
