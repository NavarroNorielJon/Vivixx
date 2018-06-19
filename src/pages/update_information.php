<?php
    include '../utilities/session.php';
?>
<!DOCTYPE html>
<html>

<head>
	<title>Update Information</title>
	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="../style/bootstrap/bootstrap.min.css" media="screen, projection">
	<link type="text/css" rel="stylesheet" href="../style/style2.css" media="screen, projection">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="../script/jquery-3.2.1.min.js"></script>
</head>

<body id="update-information">
	<div class="update-information-header">
		<h1>Update Information Form </h1>
		<button type="button" class="btn btn-default logout">
			<a href="../utilities/logout" id="logout">
				<i class="material-icons">
					power_settings_new
				</i>
			</a>
		</button>
	</div>

	<div class="container">
		<ul class="nav nav-tabs justify-content-end mb-3" id="tab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="personal-tab" data-toggle="tab" href="#personal" role="tab" aria-	controls="home" aria-selected="true">
					Personal Information<i class="fa"></i>
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" id="family-tab" data-toggle="tab" href="#family" role="tab" aria-controls="family" aria-selected="false">
					Family Background<i class="fa"></i>
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" id="educ-tab" data-toggle="tab" href="#educ" role="tab" aria-controls="educ" aria-selected="false">
					Educational Background<i class="fa"></i>
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" id="emergency-tab" data-toggle="tab" href="#emergency" role="tab" aria-controls="emergency" aria-selected="false">
					Emergency Information Sheet<i class="fa"></i>
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" id="tutor-tab" data-toggle="tab" href="#tutor" role="tab" aria-controls="tutor" aria-selected="false">
					Tutor's Info Sheet<i class="fa"></i>
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" id="submit-tab" data-toggle="tab" href="#submit" role="tab" aria-controls="submit" aria-selected="false">
					Submit<i class="fa"></i>
				</a>
			</li>
		</ul>

		<form id="update_form" action="../utilities/update_info" method="POST">
			<div class="tab-content" id="tabContent">


                <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">

					<div class="row">
						<div class="form-group col-4">
							<label for="prof_image">Profile Image</label>
							<input type="file" name="prof_image"/>
						</div>

						<div class="form-group col-4">
							<label for="prof_image">Signature</label>
							<input type="file"/>
						</div>
					</div>


					<div class="row">
						<div class="form-group col">
							<label >Birthdate</label>
							<input type="date" name="birth_date" id="bdate" class="form-control" required="required">
						</div>

						<div class="form-group col">
							<label >Place of Birth</label>
							<input type="text" name="birth_place" autocomplete="off" id="pbirth" class="form-control text-transform" required="required">
						</div>

						<div class="form-group col" >
							<label for="contact">Mobile Number</label>
							<input type="text" name="contact_number" maxlength="11" autocomplete="off" class="form-control" id="contact" onkeypress="numberInput(event)" onkeyup="helperText('contact_number',this.value,'validContact')" class=" form-control" required="required">
							<div id="validContact"></div>
						</div>
					</div>

					<div class="row">
						<div class=" form-group col">
							<label for="gender">Sex</label>
							<select name="gender" class="form-control custom-select" required="required">
								<option selected disabled>Select Here:</option>
								<option value="m">Male</option>
								<option value="f">Female</option>
							</select>
						</div>

						<div class="form-group col">
							<label for="height">Height</label>
							<input type="text" name="height" id="height" class="form-control" autocomplete="off" placeholder="(ft.)" required="required">
						</div>

						<div class="form-group col">
							<label for="weight">Weight</label>
							<input type="text" name="weight" id="weight" class="form-control" onkeypress="numberInput(event)" autocomplete="off" maxlength="3" placeholder="(kg.)" required="required">
						</div>

						<div class="form-group col">
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
							<input type="text" name="residential_address" id="residential_address" autocomplete="off" class="form-control text-transform" required="required">
						</div>

						<div class="form-group col-2 ">
							<label for="residential_zip">Zip Code</label>
							<input type="text" name="residential_zip" class="form-control" id="residential_zip" onkeypress="numberInput(event)" maxlength="4" autocomplete="off"  required="required">
						</div>

						<div class="form-group col-3 ">
							<label for="residential_tel_no">Telephone NO.</label>
							<input type="text" name="residential_tel_no" id="residential_tel_no" maxlength="7" onkeypress="numberInput(event)" autocomplete="off" class="form-control" required="required">
						</div>
					</div>

					<div class="row">
                        <div class="form-group col-7">
							<label for="permanent_address">Permanent Address</label>
							<input type="text" name="permanent_address" id="permanent_address" autocomplete="off" class="form-control text-transform" required="required">
						</div>

						<div class="form-group col-2 ">
							<label for="permanent_zip">Zip Code</label>
							<input type="text" name="permanent_zip" id="permanent_zip" onkeypress="numberInput(event)" maxlength="4" autocomplete="off" class="form-control" required="required">
						</div>

						<div class="form-group col-3 " >
							<label for="permanent_tel_no">Telephone NO.</label>
							<input type="text" name="permanent_tel_no" id="permanent_tel_no" maxlength="7" onkeypress="numberInput(event)" autocomplete="off" class="form-control" required="required">
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

						<script>
							$(function() {
								$('#civil_status').change(function(){
                                    $('#others').hide();
									$('#' + $(this).val()).show();
								});
							});
						</script>

						<div class="form-group col-2" >
							<label for="civil_status">Civil Status</label>
							<select name="civil_status" id="civil_status" class="form-control" required="required">
								<option selected disabled>Select:</option>
								<option value="single">Single</option>
								<option value="married">Married</option>
								<option value="widowed">Widowed</option>
								<option value="annulled">Annulled</option>
								<option value="separated">Separated</option>
								<option value="others">Others</option>
							</select>
						</div>

						<div id='others' style='display:none' class="form-group col">
							<label for="civil_status" >If Others:</label>
							<input id="oth" class="form-control" name="civil_status"  placeholder="Please Specify">
						</div>
					</div>

                    <div class="row">
    					<div class="form-group col">
    						<label for="sss_no">SSS NO.</label>
    						<input type="text" name="sss_no" id="sss_no" onkeypress="numberInput(event)" autocomplete="off" class="form-control" required="required">
    					</div>

    					<div class="form-group col">
    						<label for="tin">TIN</label>
    						<input type="text" name="tin" id="tin" onkeypress="numberInput(event)" autocomplete="off" 	class="form-control" required="required">
    					</div>

    					<div class="form-group col">
    						<label for="philhealth_no ">PHILHEALTH NO.</label>
    						<input type="text" name="philhealth_no" id="philhealth_no" onkeypress="numberInput(event)" autocomplete="off" class="form-control" required="required">
    					</div>

    					<div class="form-group col">
    						<label for="pagibig_id_no">PAG-IBIG ID NO.</label>
    						<input type="text" name="pagibig_id_no" id="pagibig_id_no" onkeypress="numberInput(event)" autocomplete="off" class="form-control" required="required">
    					</div>
                    </div>
			    </div>

                <div class="tab-pane fade" id="family" role="tabpanel" aria-labelledby="family-tab">
    				<h5>Father's Name</h5>
    				<div class="row">
    					<div class="form-group col">
    						<label for="ffname">First Name</label>
    						<input type="text" name="father_first_name" id="ffname" class="form-control text-transform" autocomplete="off" required="required">
    					</div>

    					<div class="form-group col">
    						<label for="fmname">Middle Name</label>
    						<input type="text" name="father_middle_name" id="fmname" class="form-control text-transform" autocomplete="off" required="required">
    					</div>

    					<div class="form-group col">
    						<label for="flname">Last Name</label>
    						<input type="text" name="father_last_name" id="flname" class="form-control text-transform" autocomplete="off" required="required">
    					</div>
    				</div>

    				<h5>Mother's Maiden Name</h5>
    				<div class="row">
    					<div class="form-group col">
    						<label for="mfname">First Name</label>
    						<input type="text" name="mother_first_name" id="mfname" class="form-control text-transform" autocomplete="off" required="required">
    					</div>

    					<div class="form-group col">
    						<label for="mmname">Middle Name</label>
    						<input type="text" name="mother_middle_name" id="mmname" class="form-control text-transform" 	autocomplete="off" required="required">
    					</div>

    					<div class="form-group col">
    						<label for="mlname">Last Name</label>
    						<input type="text" name="mother_last_name" id="mlname" class="form-control text-transform" autocomplete="off" required="required">
    					</div>
    				</div>
    				<hr>

    				<h5>Spouse's Name(Optional)</h5>
    				<sub>
    					<strong>Note:</strong> If you dont have a spouse, it's unneccessary to fill up the form below
    				</sub>
    				<br>

    				<div class="row">
    				<br>
    					<div class="form-group col">
    						<label for="sfname">First Name</label>
    						<input type="text" name="spouse_first_name" id="sfname" class="form-control text-transform" autocomplete="off">
    					</div>

    					<div class="form-group col">
    						<label for="smname">Middle Name</label>
    						<input type="text" name="spouse_middle_name" id="smname" class="form-control text-transform" autocomplete="off">
    					</div>

    					<div class="form-group col">
    						<label for="slname">Last Name</label>
    						<input type="text" name="spouse_last_name" id="slname" class="form-control text-transform" autocomplete="off">
    					</div>
    				</div>

    				<div class="row">
    					<div class="form-group col-2">
    						<label for="occupation">Occupation</label>
    						<input type="text" name="occupation" id="occupation" class="form-control text-transform" autocomplete="off">
    					</div>

    					<div class="form-group col-4">
    						<label for="employer">Employer</label>
    						<input type="text" name="employer" id="employer" class="form-control text-transform" autocomplete="off">
    					</div>

    					<div class="form-group col-4">
    						<label for="business_address">Business Address</label>
    						<input type="text" name="business_address" id="business_address" class="form-control text-transform" autocomplete="off">
    					</div>

    					<div class="form-group col-2">
    						<label for="spouse_tel_no">Telephone NO.</label>
    						<input type="text" name="spouse_tel_no" id="spouse_tel_no" maxlength="7" onkeypress="numberInput(event)" autocomplete="off" class="form-control">
    					</div>
    				</div>


    				<h5>Child/Children's Information</h5>
    				<div class="row">
    					<div class="form-group col">
    						<label for="child_name">Name</label>
    						<input type="text" placeholder="First name M.I. Last name" name="child_name[]" id="child_name" class="form-control text-transform" autocomplete="off">
    					</div>

    					<div class="form-group col">
    						<label for="child_birth">Date of Birth</label>
    						<div class="input-group">
    							<input type="date" name="child_birth[]" id="child_birth" class="form-control" autocomplete="off">
    							<div class="input-group-append">
    								<button class="btn btn-success" type="button" onclick="add()"><i class="large material-icons">add</i></button>
    							</div>
    						</div>
    					</div>
				</div>

				<div id="child"></div>
			</div>

                <div class="tab-pane fade" id="educ" role="tabpanel" aria-labelledby="educ-tab">
				<h5>Elementary</h5>
				<div class="row">
					<div class="form-group col">
						<label for="school_name">Name of School</label>
						<input type="text" name="elem_school_name" id="elem_school_name" class="form-control text-transform" autocomplete="off">
					</div>

					<div class="form-group col">
						<label for="yr_grad">Year Graduated</label>
						<input type="text" name="elem_yr_grad" id="elem_yr_grad" placeholder="(If Graduated)" class="form-control" autocomplete="off">
					</div>

					<div class="form-group col">
						<label for="high_level">Highest Level</label>
						<input type="text" name="elem_high_level" id="elem_high_level" placeholder="(If Undergraduate)" class="form-control" autocomplete="off">
					</div>

				</div>

				<h5>Secondary</h5>
				<div class="row">
					<div class="form-group col">
						<label for="school_name">Name of School</label>
						<input type="text" name="sec_school_name" id="sec_school_name" class="form-control text-transform" autocomplete="off">
					</div>

					<div class="form-group col">
						<label for="yr_grad">Year Graduated</label>
						<input type="text" name="sec_yr_grad" id="sec_yr_grad" placeholder="(If Graduated)" class="form-control" autocomplete="off">
					</div>

					<div class="form-group col">
						<label for="high_level">Highest Level</label>
						<input type="text" name="sec_high_level" id="sec_high_level" placeholder="(If Undergraduate)" class="form-control" autocomplete="off">
					</div>

				</div>

				<h5>College</h5>
				<div class="row">
					<div class="form-group col">
						<label for="school_name">Name of School</label>
						<input type="text" name="col_school_name" id="col_school_name" class="form-control text-transform" autocomplete="off">
					</div>

					<div class="form-group col">
						<label for="yr_grad">Year Graduated</label>
						<input type="text" name="col_yr_grad" id="col_yr_grad" placeholder="(If Graduated)" class="form-control"  autocomplete="off">
					</div>

					<div class="form-group col">
						<label for="high_level">Highest Level</label>
						<input type="text" name="col_high_level" id="col_high_level" placeholder="(If Undergraduate)" class="form-control" autocomplete="off">
					</div>

				</div>

				<h6>Post Grad</h6>
				<div class="row">
					<div class="form-group col">
						<label for="school_name">Name of School</label>
						<input type="text" name="post_school_name" id="post_school_name" class="form-control text-transform" autocomplete="off">
					</div>

					<div class="form-group col">
						<label for="yr_grad">Year Graduated</label>
						<input type="text" name="post_yr_grad" id="post_yr_grad" placeholder="(If Graduated)" class="form-control" autocomplete="off">
					</div>

					<div class="form-group col">
						<label for="high_level">Highest Level</label>
						<input type="text" name="post_high_level" id="post_high_level" placeholder="(If Undergraduate)" class="form-control"  autocomplete="off">
					</div>

				</div>

			</div>

                <div class="tab-pane fade" id="emergency" role="tabpanel" aria-labelledby="emergency-tab">
				<h5>Main City Address</h5>
				<div style="height:500px;width:1110px;border: 5px solid black">
				</div>
				<hr>
				<h6>Your Housemates</h6>
				<div class="row">
					<div class="form-group col">
						<label for="hname">Name of Housemate</label>
						<input type="text" name="hname" id="hname" class="form-control text-transform" autocomplete="off">
					</div>

					<div class="form-group col-2">
						<label for="rel">Relationship</label>
						<input type="text" name="rel" id="rel" class="form-control text-transform" autocomplete="off">
					</div>

					<div class="form-group col">
						<label for="high_level">Mobile Number</label>
						<input type="text" name="mnumber1" id="mnumber1" maxlength="11" onkeypress="numberInput(event)" class="form-control" autocomplete="off">
					</div>

					<div class="form-group col">
						<label for="high_level">Mobile Number</label>
						<input type="text" name="mnumber2" id="mnumber2" maxlength="11" onkeypress="numberInput(event)" class="form-control" autocomplete="off">
					</div>
				</div>

				<div class="row">
					<div class="form-group col">
						<label for="hname">Name of Housemate</label>
						<input type="text" name="hname2" id="hname2" class="form-control text-transform" autocomplete="off">
					</div>

					<div class="form-group col-2">
						<label for="rel">Relationship</label>
						<input type="text" name="rel2" id="rel2"  class="form-control text-transform" autocomplete="off">
					</div>

					<div class="form-group col">
						<label for="high_level">Mobile Number</label>
						<input type="text" name="mnumber3" id="mnumber3" maxlength="11" onkeypress="numberInput(event)" class="form-control" autocomplete="off">
					</div>

					<div class="form-group col">
						<label for="high_level">Mobile Number</label>
						<input type="text" name="mnumber4" id="mnumber4" maxlength="11" onkeypress="numberInput(event)" class="form-control" autocomplete="off">
					</div>
				</div>

				<h6>Your Closest Living Relatives</h6>
				<div class="row">
					<div class="form-group col">
						<label for="hname">Name of relative</label>
						<input type="text" name="rname1" id="rname1" class="form-control text-transform" autocomplete="off">
					</div>

					<div class="form-group col-2">
						<label for="rel">Relationship</label>
						<input type="text" name="rrel1" id="rrel1" class="form-control text-transform" autocomplete="off">
					</div>

					<div class="form-group col">
						<label for="high_level">Mobile Number</label>
						<input type="text" name="rmnumber1" id="rmnumber1" maxlength="11" onkeypress="numberInput(event)" 	class="form-control" autocomplete="off">
					</div>

					<div class="form-group col">
						<label for="high_level">Mobile Number</label>
						<input type="text" name="rmnumber2" id="rmnumber2" maxlength="11" onkeypress="numberInput(event)" class="form-control" autocomplete="off">
					</div>
				</div>

				<div class="row">
					<div class="form-group col">
						<label for="hname">Name of relative</label>
						<input type="text" name="rname2" id="rname2" class="form-control text-transform" autocomplete="off">
					</div>

					<div class="form-group col-2">
						<label for="rel">Relationship</label>
						<input type="text" name="rrel2" id="rrel2"  class="form-control text-transform" autocomplete="off">
					</div>

					<div class="form-group col">
						<label for="high_level">Mobile Number</label>
						<input type="text" name="rmnumber3" id="rmnumber3" maxlength="11" onkeypress="numberInput(event)" 	class="form-control" autocomplete="off">
					</div>

					<div class="form-group col">
						<label for="high_level">Mobile Number</label>
						<input type="text" name="rmnumber3" id="rmnumber3" maxlength="11" onkeypress="numberInput(event)" class="form-control" autocomplete="off">
					</div>
				</div>

				<div class="row">
					<div class="form-group col">
						<label for="rel"><h6>Secondary City Address</h6></label>
						<input type="text" class="form-control text-transform" placeholder="(Your alternate address when you are not at Main City Address)">
					</div>

					<div class="form-group col">
						<label><h6>Provincial/Permanent Address</h6></label>
						<input type="text" class="form-control text-transform" >
					</div>
				</div>
			</div>

                <div class="tab-pane fade" id="tutor" role="tabpanel" aria-labelledby="tutor-tab">
				<div class="row">
					<div class="form-group col">
						<label>Tutor's Full Name</label>
						<input type="text" class="form-control">
					</div>

					<div class="form-group col">
						<label>Nickname</label>
						<input type="text" class="form-control">
					</div>

					<div class="form-group col-2">
						<label>Mobile number/s</label>
						<input type="text" class="form-control">
					</div>

					<div class="form-group col-2">
						<label>Landline Number/s</label>
						<input type="text" class="form-control">
					</div>
				</div>

				<div class="row">
					<div class="form-group col">
						<label>Accounts</label>
						<input type="text" class="form-control">
					</div>
				</div>

				<div class="row">
					<div class="form-group col">
						<label>Company Email address</label>
						<input type="text" class="form-control">
					</div>

					<div class="form-group col">
						<label>Password</label>
						<input type="text" class="form-control">
					</div>
				</div>

				<div class="row">
					<div class="form-group col">
						<label>Skype Account</label>
						<input type="text" class="form-control">
					</div>

					<div class="form-group col">
						<label>Password</label>
						<input type="text" class="form-control">
					</div>
				</div>

				<div class="row">
					<div class="form-group col">
						<label>QQ Number</label>
						<input type="text" class="form-control">
					</div>

					<div class="form-group col">
						<label>Password</label>
						<input type="text" class="form-control">
					</div>
				</div>

				<button type="button" class="btn btn-info">Back</button>
				<button type="button" class="btn btn-info">Next</button>
			</div>

                <div class="tab-pane fade text-center" id="submit" role="tabpanel" aria-labelledby="submit-tab">
				<br>
				<a class="nav-link" id="emergency-tab" data-toggle="tab" href="#emergency" role="tab" aria-controls="emergency" aria-selected="false">
					<button type="button" class="btn btn-info">Back</button></a>
					<button type="submit" class="btn btn-success">Submit</button>
			</div>
            </div>
		</form>
	</div>

	<script>
		var form = $(#update_form).show();
	</script>

	<script type="text/javascript" src="../script/popper.min.js"></script>
	<script type="text/javascript" src="../script/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="../script/sweetalert.min.js"></script>
	<script type="text/javascript" src="../script/ajax.js"></script>
</body>

</html>
