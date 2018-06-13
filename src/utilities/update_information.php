<?php
    include 'session.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Update Information</title>
        <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="../style/bootstrap/bootstrap.min.css" media="screen, projection">
        <link type="text/css" rel="stylesheet" href="../style/style.css" media="screen, projection">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body style="background-color: #005959;">

			<!-- Start of Personal Info-->
            <form action="update_info" method="POST">
             <div class="jumbotron " id="personal_info">
                <div>
                    <h2>Personal Information</h2><br>
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="bdate">Birthdate</label>
              		        <input type="date" name="birth_date" id="bdate" class="form-control" required="required">
              		    </div>

                        <div class="form-group col-4" >
                            <label for="pbirth">Place of Birth</label>
              		        <input type="text" stle="text-transform:capitalize;" name="birth_place" id="pbirth" class="form-control" required="required">
                        </div>

                        <div class="form-group col-4" >
                            <label for="contact">Mobile Number</label>
                                <input type="text" name="contact_number" maxlength="11" autocomplete="off" class="form-control" id="contact" onkeypress="numberInput(event)" onkeyup="helperText('contact_number',this.value,'validContact')" class=" form-control" required="required">
                                <div id="validContact"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class=" form-group col-3 ">
                            <label for="gender">Sex</label>
                            <select name="gender" class="form-control" required="required">
                                <option selected disabled>Select Here:</option>
                                <option value="m">Male</option>
                                <option value="f">Female</option>
                            </select>
              		    </div>

                        <div class="form-group col-3 ">
                            <label for="height">Height</label>
                            <input type="text" name="height" id="height" class="form-control" autocomplete="off" placeholder="(ft.)" required="required">
                        </div>

                        <div class="form-group col-3 ">
                            <label for="weight">Weight</label>
                              <input type="text" name="weight" id="weight" class="form-control" onkeypress="numberInput(event)" autocomplete="off" maxlength="3" placeholder="(kg.)" required="required">
                        </div>

                        <div class="form-group col-3 ">
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
                            <label for="residential_address">Residential Address</label>
              		        <input type="text" name="residential_address" id="residential_address" autocomplete="off" class="form-control" required="required">
                        </div>

                        <div class="form-group col-2 ">
                            <label for="residential_zip">Zip Code</label>
                            <input type="text" name="residential_zip" class="form-control num" id="residential_zip" onkeypress="numberInput(event)" maxlength="4" autocomplete="off"  required="required">
                        </div>

                        <div class="form-group col-3 ">
                            <label for="residential_tel_no">Telephone NO.</label>
              		        <input type="text" name="residential_tel_no" id="residential_tel_no" onkeypress="numberInput(event)" autocomplete="off" class="form-control" required="required">
                        </div>
                    </div>

                    <div class="row">
              			<div class="form-group col-7">
                            <label for="permanent_address">Permanent Address</label>
              				<input type="text" name="permanent_address" id="permanent_address" autocomplete="off" class="form-control" required="required">
              			</div>

              			<div class="form-group col-2 ">
                            <label for="permanent_zip">Zip Code</label>
              				<input type="text" name="permanent_zip" id="permanent_zip" onkeypress="numberInput(event)" maxlength="4" autocomplete="off" class="form-control" required="required">
              			</div>

              			<div class="form-group col-3 " >
                        	<label for="permanent_tel_no">Telephone NO.</label>
              				<input type="text" name="permanent_tel_no" id="permanent_tel_no" onkeypress="numberInput(event)" autocomplete="off" class="form-control" required="required">
              			</div>
					</div>

                    <div class="row">
              			<div class="form-group col-4" >
                        	<label for="citizenship">Citizenship</label>
              					<input type="text" name="citizenship" id="citizenship" autocomplete="off" class="form-control" required="required">
              			</div>

              			<div class="form-group col-4" >
                        	<label for="religion">Religion</label>
              				<input type="text" name="religion" id="religion" class="form-control" autocomplete="off" required="required">
              			</div>

                        <div class="form-group col-2" >
                            <label for="civil_status">Civil Status</label>
                            <select name="civil_status" class="form-control" required="required">
                                <option selected disabled>Select:</option>
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                                <option value="widowed">Widowed</option>
                                <option value="annulled">Annulled</option>
                                <option value="separated">Separated</option>
                                <option>Others</option>
                             </select>
                        </div>

                        <div class="form-group col-2">
                            <label for="civil_status">If Other:</label>
                            <input class="form-control" name="other" disabled="disabled" placeholder="Please Specify">
                        </div>
					</div>

                    <div class="row">
                    	<div class="form-group col-3" >
							<label for="sss_no">SSS NO.</label>
							<input type="text" name="sss_no" id="sss_no" onkeypress="numberInput(event)" autocomplete="off" class="form-control" required="required">
              			</div>

              			<div class="form-group col-3" >
							<label for="tin">TIN</label>
              				<input type="text" name="tin" id="tin" onkeypress="numberInput(event)" autocomplete="off" class="form-control" required="required">
              			</div>

              			<div class="form-group col-3" >
							<label for="philhealth_no ">PHILHEALTH NO.</label>
							<input type="text" name="philhealth_no" id="philhealth_no" onkeypress="numberInput(event)" autocomplete="off" class="form-control" required="required">
              			</div>

              			<div class="form-group col-3" >
							<label for="pagibig_id_no">PAG-IBIG ID NO.</label>
							<input type="text" name="pagibig_id_no" id="pagibig_id_no" onkeypress="numberInput(event)" autocomplete="off" class="form-control" required="required">
              			</div>
					</div>

                    <!-- <h2>Educational Background</h2><br>
                    <div class="row">
                    	<div class="form-group col-3" >
							<label for="sss_no">Level</label>
							<input type="text" name="sss_no" id="sss_no" class="form-control" required="required" autocomplete="off">
              			</div>

              			<div class="form-group col-3" >
							<label for="tin">Name of School</label>
              				<input type="text" name="tin" id="tin" class="form-control" required="required" autocomplete="off">
              			</div>

              			<div class="form-group col-3" >
							<label for="philhealth_no ">Year Graduated</label>
							<input type="text" name="philhealth_no" id="philhealth_no" class="form-control" required="required" autocomplete="off">
              			</div>

              			<div class="form-group col-3" >
							<label for="pagibig_id_no">Highest Level</label>
							<input type="text" name="pagibig_id_no" id="pagibig_id_no" class="form-control" required="required" autocomplete="off">
              			</div>
					</div> -->

					<div style="text-align: right">
                        <button type="button" onclick="nextForm('personal_info','family_background')"><i class="material-icons" >arrow_forward</i></button>
					</div>

			   </div>
           </div>


           <!-- Start of Family Background -->
           <div class="jumbotron d-none" id="family_background">
               <div>
                   <h1>Family Background</h1><br>

                   <h4><i class="large material-icons" style="font-size:30px;">person</i>Father's Name</h4>
                   <div class="row">
                       <div class="form-group col-4">

                           <label for="ffname">First Name</label>
                           <input type="text" name="father_first_name" id="ffname" class="form-control" autocomplete="off" required="required">
                       </div>

                       <div class="form-group col-4">
                           <label for="fmname">Middle Name</label>
                           <input type="text" name="father_middle_name" id="fmname" class="form-control" autocomplete="off" required="required">
                       </div>

                       <div class="form-group col-4">
                           <label for="flname">Last Name</label>
                           <input type="text" name="father_last_name" id="flname" class="form-control" autocomplete="off" required="required">
                       </div>
                   </div>

                   <h4><i class="large material-icons" style="font-size:30px;">person</i>Mother's Maiden Name</h4>
                   <div class="row">
                       <div class="form-group col-4">
                           <label for="mfname">First Name</label>
                           <input type="text" name="mother_first_name" id="mfname" class="form-control" autocomplete="off" required="required">
                       </div>

                       <div class="form-group col-4">
                           <label for="mmname">Middle Name</label>
                           <input type="text" name="mother_middle_name" id="mmname" class="form-control" autocomplete="off" required="required">
                       </div>

                       <div class="form-group col-4">
                           <label for="mlname">Last Name</label>
                           <input type="text" name="mother_last_name" id="mlname" class="form-control" autocomplete="off" required="required">
                       </div>
                   </div>
                   <hr>
                   <h5 style="text-align:center;">Leave this blank if</h5><br>
                   <h4><i class="large material-icons" style="font-size:30px;">person</i>Spouse's Name</h4>
                   <div class="row">
                       <div class="form-group col-4">
                           <label for="sfname">First Name</label>
                           <input type="text" name="spouse_first_name" id="sfname" class="form-control" autocomplete="off">
                       </div>

                       <div class="form-group col-4">
                           <label for="smname">Middle Name</label>
                           <input type="text" name="spouse_middle_name" id="smname" class="form-control" autocomplete="off">
                       </div>

                       <div class="form-group col-4">
                           <label for="slname">Last Name</label>
                           <input type="text" name="spouse_last_name" id="slname" class="form-control" autocomplete="off">
                       </div>
                   </div>

                   <div class="row">
                       <div class="form-group col-2">
                           <label for="occupation">Occupation</label>
                           <input type="text" name="occupation" id="occupation" class="form-control" autocomplete="off">
                       </div>

                       <div class="form-group col-4">
                           <label for="employer">Employer</label>
                           <input type="text" name="employer" id="employer" class="form-control" autocomplete="off">
                       </div>

                       <div class="form-group col-4">
                           <label for="business_address">Business Address</label>
                           <input type="text" name="business_address" id="business_address" class="form-control" autocomplete="off">
                       </div>

                       <div class="form-group col-2">
                           <label for="spouse_tel_no">Telephone NO.</label>
                           <input type="text" name="spouse_tel_no" id="spouse_tel_no" onkeypress="numberInput(event)" autocomplete="off" class="form-control">
                       </div>
                   </div>


                   <h4><i class="large material-icons" style="font-size:30px;">person</i>Child/Children's Information</h4>
                   <div id="child">
                   </div>
                   <div class="row">
                       <div class="form-group col-6">
                           <label for="child_name">Name</label>
                           <input type="text" placeholder="First name M.I. Last name" name="child_name[]" id="child_name" class="form-control" autocomplete="off">
                       </div>

                       <div class="form-group col-6">
                           <label for="child_birth">Date of Birth</label>
                           <div class="input-group">
                               <input type="date" name="child_birth[]" id="child_birth" class="form-control" autocomplete="off">
                               <div class="input-group-append">
                                   <button class="btn btn-success" type="button" onclick="add()"><i class="large material-icons">add</i></button>
                               </div>
                           </div>
                       </div>
                   </div>


                   <div style="text-align: right">
                       <button type="button" onclick="nextForm('family_background','personal_info')"><i class="material-icons">arrow_back</i></button>
                       <button type="submit">Submit</button>

                   </div>
              </div>
          </div>
       </form>

    <script>
    function nextForm(currId,nextId){
      document.getElementById(currId).classList.add("d-none");
      document.getElementById(nextId).classList.remove("d-none");
    }

	function jon(){
        swal("Good Jon", "Hiiii", "success");
	}
    </script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="../script/ajax.js"></script>
    </body>
</html>
