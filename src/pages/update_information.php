<?php
    include '../utilities/session.php';
	include '../modules/footer.html';
    if ($birth_date != null && $birth_place != null && $contact_number != null &&
	   $gender != null && $height != null && $weight != null && $blood_type != null && $residential_address != null && $residential_zip != null && $residential_tel_no != null && $permanent_address != null && $permanent_zip != null && $permanent_tel_no != null && $citizenship != null
	    && $civil_status != null && $sss_no != null && $tin != null && $philhealth_no != null && $pagibig_id_no != null) {
			header("location:/pages/home");
	}
?>
<!DOCTYPE html>
<html>

    <head>
        <title>Update Information</title>
        <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="../style/bootstrap/bootstrap.min.css" media="screen, projection">
        <link type="text/css" rel="stylesheet" href="../style/style2.css" media="screen, projection">
        <link rel="stylesheet" href="../style/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="../style/form-elements.css">
        <link rel="stylesheet" href="../style/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="../script/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="../script/bootstrap/bootstrap.min.js"></script>
        <script src="../script/jquery.backstretch.min.js"></script>
        <script src="../script/bootstrap/jasny-bootstrap.js"></script>
        <script src="../script/retina-1.1.0.min.js"></script>
        <script src="../script/scripts.js"></script>
    </head>

    <body id="update-information">
        <div class="update-information-header">
            <h1>Update Information Form</h1>
            <a href="../utilities/logout" class="btn" id="logout">
            	<i class="material-icons">
                	power_settings_new
                </i>
            </a>
        </div>

        <div class="row">
            <div class="container">
                <form role="form" action="../utilities/update_info" id="update_form" method="post" class="f1">
                    <div class="f1-steps">
                        <div class="f1-progress">
                            <div class="f1-progress-line" data-now-value="20" data-number-of-steps="6" style="width: 20%;"></div>
                        </div>
                        <div class="f1-step active">
                            <div class="f1-step-icon">
                                <i class="fa fa-user"></i>
                            </div>
                            <p>Personal Information</p>
                        </div>
                        <div class="f1-step">
                            <div class="f1-step-icon">
                                <i class="fa fa-user"></i>
                            </div>
                            <p>Family Background</p>
                        </div>
                        <div class="f1-step">
                            <div class="f1-step-icon">
                                <i class="fa fa-user"></i>
                            </div>
                            <p>Educational Background</p>
                        </div>
                        <div class="f1-step">
                            <div class="f1-step-icon">
                                <i class="fa fa-user"></i>
                            </div>
                            <p>Emergency Information</p>
                        </div>
                        <div class="f1-step">
                            <div class="f1-step-icon">
                                <i class="fa fa-user"></i>
                            </div>
                            <p>Tutor Information</p>
                        </div>
                    </div>

                    <fieldset>
                        <h2>Step 1: Personal Information</h2>
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
                                <label>Birthdate</label>
                                <input type="date" name="birth_date" id="bdate" class="form-control" required="required">
                            </div>

                            <div class="form-group col">
                                <label>Place of Birth</label>
                                <input type="text" name="birth_place" autocomplete="off" placeholder="address" id="pbirth" class="form-control text-transform" required="required">
                            </div>

                            <div class="form-group col">
                                <label for="contact">Mobile Number</label>
                                <input
                                    type="tel"
                                    name="contact_number"
                                    maxlength="11"
                                    autocomplete="off"
                                    placeholder="+63999 999 9999"
                                    class=" form-control"
                                    id="contact"
                                    onkeypress="numberInput(event)"
                                    onkeyup="helperText('contact_number',this.value,'validContact')"
                                    required="required">
                                <div id="validContact"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class=" form-group col">
                                <label for="gender">Gender</label>
                                <select name="gender" class="form-control" required="required">
                                    <option selected="selected" disabled="disabled">Select Here:</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
									<option value="Rather not say">I'd rather not say</option>
									<option value="Specify">Specifiy</option>
                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="height">Height</label>
                                <div class="row no-gutters ">
                                    <div class="form-group col">
                                        <input type="text" name="ft" id="ft" class="form-control" autocomplete="off" placeholder="(ft.)" maxlength="2" onkeypress="numberInput(event)" required="required">
                                    </div>
                                    <div class="form-group col">
                                        <input type="text" name="in" id="in" class="form-control" autocomplete="off" placeholder="(in.)" maxlength="2" onkeypress="numberInput(event)" required="required">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col">
                                <label for="weight">Weight</label>
                                <input type="text" name="weight" id="weight" class="form-control" onkeypress="numberInput(event)" autocomplete="off" maxlength="3" placeholder="(kg.)" required="required">
                            </div>
                            <div class="form-group col">
                                <label for="blood">Blood Type</label>
                                <select name="blood" class="form-control" required="required">
                                    <option selected="selected" disabled="disabled">Select Blood Type:</option>
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
                                <input type="text" name="residential_address" id="residential_address" autocomplete="off" placeholder="address" class="form-control text-transform" required="required">
                            </div>

                            <div class="form-group col-2 ">
                                <label for="residential_zip">Zip Code</label>
                                <input type="text" name="residential_zip" class="form-control" id="residential_zip" placeholder="Zip Code" onkeypress="numberInput(event)" maxlength="4" autocomplete="off" required="required">
                            </div>

                            <div class="form-group col-3 ">
                                <label for="residential_tel_no">Telephone NO.</label>
                                <input type="tel" name="residential_tel_no" id="residential_tel_no" maxlength="7" onkeypress="numberInput(event)" autocomplete="off" placeholder="XXX-XXXX" class="form-control" required="required">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-7">
                                <label for="permanent_address">Permanent Address</label>
                                <input type="text" name="permanent_address" id="permanent_address" autocomplete="off" placeholder="address" class="form-control text-transform" required="required">
                            </div>

                            <div class="form-group col-2 ">
                                <label for="permanent_zip">Zip Code</label>
                                <input type="text" name="permanent_zip" id="permanent_zip" onkeypress="numberInput(event)" maxlength="4" autocomplete="off" placeholder="Zip Code" class="form-control" required="required">
                            </div>

                            <div class="form-group col-3 ">
                                <label for="permanent_tel_no">Telephone NO.</label>
                                <input type="tel" name="permanent_tel_no" id="permanent_tel_no" maxlength="7" onkeypress="numberInput(event)" autocomplete="off" placeholder="XXX-XXXX" class="form-control" required="required">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-4">
                                <label for="citizenship">Citizenship</label>
                                <input type="text" name="citizenship" id="citizenship" autocomplete="off" placeholder="Citizenship" class="form-control text-transform" required="required">
                            </div>

                            <script>
                                $(function () {
                                    $('#civil_status').change(function () {
                                        $('#others').hide();
                                        $('#' + $(this).val()).show();
                                    });
                                });
                            </script>

                            <div class="form-group col-2">
                                <label for="civil_status">Civil Status</label>
                                <select name="civil_status" id="civil_status" class="form-control" required="required">
                                    <option selected="selected" disabled="disabled">Select:</option>
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                    <option value="widowed">Widowed</option>
                                    <option value="annulled">Annulled</option>
                                    <option value="separated">Separated</option>
                                    <option value="others">Others</option>
                                </select>
                            </div>

                            <div id='others' style='display:none' class="form-group col">
                                <label for="other_civil">(Please Specify)</label>
                                <input id="oth" class="form-control" placeholder="" name="other_civil">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="sss_no">SSS NO.</label>
                                <input type="text" name="sss_no"  id="sss_no" placeholder="XX-XXXXXXX-X" onkeypress="numberInput(event)" autocomplete="off" class="form-control" required="required">
                            </div>

                            <div class="form-group col">
                                <label for="tin">TIN</label>
                                <input type="text" name="tin" id="tin" placeholder="XXX-XXX-XXX-XXX" onkeypress="numberInput(event)"  autocomplete="off" class="form-control" required="required">
                            </div>

                            <div class="form-group col">
                                <label for="philhealth_no ">PHILHEALTH NO.</label>
                                <input type="text" name="philhealth_no" id="philhealth_no" placeholder="XX-XXXXXXXXX-X" onkeypress="numberInput(event)" autocomplete="off" class="form-control" required="required">
                            </div>

                            <div class="form-group col">
                                <label for="pagibig_id_no">PAG-IBIG ID NO.</label>
                                <input type="text" name="pagibig_id_no" id="pagibig_id_no" placeholder="XXXX-XXXX-XXXX" onkeypress="numberInput(event)"  autocomplete="off" class="form-control" required="required">
                            </div>
                        </div>
                        <div class="f1-buttons">
                            <button type="button" class="btn pages btn-next">Next</button>
                        </div>
                    </fieldset>

                    <fieldset>
                        <h2>Step 2: Family Background</h2>
                        <h5 id="sample">Father's Name</h5>
                        <div class="row">
                            <div class="form-group col">
                                <label for="ffname">First Name</label>
                                <input type="text" name="father_first_name" placeholder="first name" id="ffname" class="form-control text-transform" autocomplete="off" required="required">
                            </div>

                            <div class="form-group col">
                                <label for="fmname">Middle Name</label>
                                <input type="text" name="father_middle_name" placeholder="middle name" id="fmname" class="form-control text-transform" autocomplete="off" required="required">
                            </div>

                            <div class="form-group col">
                                <label for="flname">Last Name</label>
                                <input type="text" name="father_last_name" placeholder="last name" id="flname" class="form-control text-transform" autocomplete="off" required="required">
                            </div>
                        </div>

                        <h5>Mother's Maiden Name</h5>
                        <div class="row">
                            <div class="form-group col">
                                <label for="mfname">First Name</label>
                                <input type="text" name="mother_first_name" placeholder="first name" id="mfname" class="form-control text-transform" autocomplete="off" required="required">
                            </div>

                            <div class="form-group col">
                                <label for="mmname">Middle Name</label>
                                <input type="text" name="mother_middle_name" placeholder="middle name" id="mmname" class="form-control text-transform" autocomplete="off" required="required">
                            </div>

                            <div class="form-group col">
                                <label for="mlname">Last Name</label>
                                <input type="text" name="mother_last_name" placeholder="last name" id="mlname" class="form-control text-transform" autocomplete="off" required="required">
                            </div>
                        </div>
                        <hr>

                        <h5>Spouse's Name(Optional)</h5>
                        <sub>
                            <strong>Note:</strong>
                            If you dont have a spouse, it's unneccessary to fill up the form below
                        </sub>
                        <br>

                        <div class="row">
                            <div class="form-group col">
                                <label for="sfname">First Name</label>
                                <input type="text" name="spouse_first_name" placeholder="first name" id="sfname" class="form-control text-transform" autocomplete="off">
                            </div>

                            <div class="form-group col">
                                <label for="smname">Middle Name</label>
                                <input type="text" name="spouse_middle_name" placeholder="middle name" id="smname" class="form-control text-transform" autocomplete="off">
                            </div>

                            <div class="form-group col">
                                <label for="slname">Last Name</label>
                                <input type="text" name="spouse_last_name" placeholder="last name" id="slname" class="form-control text-transform" autocomplete="off">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-2">
                                <label for="occupation">Occupation</label>
                                <input type="text" name="occupation" id="occupation" placeholder="occupation" class="form-control text-transform" autocomplete="off">
                            </div>

                            <div class="form-group col-2">
                                <label for="employer">Employer</label>
                                <input type="text" name="employer" id="employer" placeholder=" employer" class="form-control text-transform" autocomplete="off">
                            </div>

                            <div class="form-group col">
                                <label for="business_address">Business Address</label>
                                <input type="text" name="business_address" id="business_address" placeholder="business address" class="form-control text-transform" autocomplete="off">
                            </div>

                            <div class="form-group col-3">
                                <label for="spouse_tel_no">Telephone NO.</label>
                                <input type="tel" name="spouse_tel_no" id="spouse_tel_no" maxlength="7" placeholder="XXX-XXXX" onkeypress="numberInput(event)" autocomplete="off" class="form-control">
                            </div>
                        </div>

                        <h5>Child/Children's Information</h5>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="child_name">Name</label>
                                <input type="text" placeholder="First name M.I. Last name" name="child_name[]" id="child_name" class="form-control text-transform" autocomplete="off">
                            </div>

                            <div class="form-group col-6">
                                <label for="child_birth">Date of Birth</label>
                                <div class="input-group">
                                    <input type="date" name="child_birth[]" id="child_birth" class="form-control" autocomplete="off">
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="button" onclick="add()">
                                            <i class="large material-icons">add</i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="child"></div>
                        <div class="f1-buttons">
                            <button type="button" class="btn pages btn-previous">Previous</button>
                            <button type="button" class="btn pages btn-next">Next</button>
                        </div>
                    </fieldset>

                    <fieldset>
                        <h2>Step 3: Educational Background</h2>
                        <h5>Elementary</h5>
                        <div class="row">
                            <div class="form-group col">
                                <label for="school_name">Name of School</label>
                                <input type="text" name="elem_school_name" id="elem_school_name" placeholder="Name of School" class="form-control text-transform" autocomplete="off">
                            </div>
                            <script>
                                $(function () {
                                    $('#option1').change(function () {
                                        $('#g1').hide();
                                        $('#u1').hide();
                                        $('#' + $(this).val()).show();
                                    });
                                });
                            </script>
                            <div class="form-group col">
                                <label for="option1">Status</label>
                                <select name="option1" id="option1" class="form-control" required="required">
                                    <option selected="selected" disabled="disabled">Select:</option>
                                    <option value="g1">Graduate</option>
                                    <option value="u1">Undergraduate</option>
                                </select>
                            </div>

                            <div class="form-group col" id="g1" style="display:none">
                                <label for="yr_grad">Year Graduated</label>
                                <input type="text" name="elem_yr_grad" id="elem_yr_grad" placeholder="(If Graduate)" class="form-control" autocomplete="off">
                            </div>

                            <div class="form-group col" id="u1" style="display:none">
                                <label for="high_level">Highest Level</label>
                                <input type="text" name="elem_high_level" id="elem_high_level" placeholder="(If Undergraduate)" class="form-control" autocomplete="off">
                            </div>

                        </div>

                        <h5>Secondary</h5>
                        <div class="row">
                            <div class="form-group col">
                                <label for="school_name">Name of School</label>
                                <input type="text" name="sec_school_name" id="sec_school_name" placeholder="Name of School" class="form-control text-transform" autocomplete="off">
                            </div>
                            <script>
                                $(function () {
                                    $('#option2').change(function () {
                                        $('#g2').hide();
                                        $('#u2').hide();
                                        $('#' + $(this).val()).show();
                                    });
                                });
                            </script>
                            <div class="form-group col">
                                <label for="option2">Status</label>
                                <select name="option2" id="option2" class="form-control" required="required">
                                    <option selected="selected" disabled="disabled">Select:</option>
                                    <option value="g2">Graduate</option>
                                    <option value="u2">Undergraduate</option>
                                </select>
                            </div>

                            <div class="form-group col" id="g2" style="display:none">
                                <label for="yr_grad">Year Graduated</label>
                                <input type="text" name="sec_yr_grad" id="sec_yr_grad" placeholder="(If Graduate)" class="form-control" autocomplete="off">
                            </div>

                            <div class="form-group col" id="u2" style="display:none">
                                <label for="high_level">Highest Level</label>
                                <input type="text" name="sec_high_level" id="sec_high_level" placeholder="(If Undergraduate)" class="form-control" autocomplete="off">
                            </div>

                        </div>

                        <h5>College</h5>
                        <div class="row">
                            <div class="form-group col">
                                <label for="school_name">Name of School</label>
                                <input type="text" name="col_school_name" id="col_school_name" placeholder="Name of School" class="form-control text-transform" autocomplete="off">
                            </div>

                            <script>
                                $(function () {
                                    $('#option3').change(function () {
                                        $('#g3').hide();
                                        $('#u3').hide();
                                        $('#' + $(this).val()).show();
                                    });
                                });
                            </script>
                            <div class="form-group col">
                                <label for="option3">Status</label>
                                <select name="option3" id="option3" class="form-control" required="required">
                                    <option selected="selected" disabled="disabled">Select:</option>
                                    <option value="g3">Graduated</option>
                                    <option value="u3">Undergraduate</option>
                                </select>
                            </div>

                            <div class="form-group col" id="g3" style="display:none">
                                <label for="yr_grad">Year Graduated</label>
                                <input type="text" name="col_yr_grad" id="col_yr_grad" placeholder="(If Graduated)" class="form-control" autocomplete="off">
                            </div>

                            <div class="form-group col" id="u3" style="display:none">
                                <label for="high_level">Highest Level</label>
                                <input type="text" name="col_high_level" id="col_high_level" placeholder="(If Undergraduate)" class="form-control" autocomplete="off">
                            </div>

                        </div>

                        <h5>Post Grad</h5>
                        <div class="row">
                            <div class="form-group col">
                                <label for="school_name">Name of School</label>
                                <input type="text" name="pos_school_name" id="pos_school_name" placeholder="Name of School" class="form-control text-transform" autocomplete="off">
                            </div>

                            <script>
                                $(function () {
                                    $('#option4').change(function () {
                                        $('#g4').hide();
                                        $('#u4').hide();
                                        $('#' + $(this).val()).show();
                                    });
                                });
                            </script>
                            <div class="form-group col">
                                <label for="option4">Status</label>
                                <select name="option4" id="option4" class="form-control">
                                    <option selected="selected" disabled="disabled">Select:</option>
                                    <option value="g4">Graduated</option>
                                    <option value="u4">Undergraduate</option>
                                </select>
                            </div>

                            <div class="form-group col" id="g4" style="display:none">
                                <label for="yr_grad">Year Graduated</label>
                                <input type="text" name="pos_yr_grad" id="pos_yr_grad" placeholder="(If Graduated)" class="form-control" autocomplete="off">
                            </div>

                            <div class="form-group col" id="u4" style="display:none">
                                <label for="high_level">Highest Level</label>
                                <input type="text" name="pos_high_level" id="pos_high_level" placeholder="(If Undergraduate)" class="form-control" autocomplete="off">
                            </div>

                        </div>
                        <div class="f1-buttons">
                            <button type="button" class="btn pages btn-previous">Previous</button>
                            <button type="button" class="btn pages btn-next">Next</button>
                        </div>
                    </fieldset>

                    <fieldset>
                        <h2>Step 4: Emergency Information Sheet</h2>
                        <h5>Main City Address</h5>
                        <div>
                            <div id="maps"></div>
                            <input type="text" id="lat" name="lat" class="d-none" oninvalid="invalid()">
                            <input type="text" id="lng" name="lng" class="d-none">
                            <br>
                            <div>
                                <label>
                                    <h6>Main address</h6>
                                </label>
                                <input type="text" id="main_address" placeholder="main address" class="form-control text-transform" name="main_address" required>
                            </div>
                            <br>
                            <super>(Your alternate address when you are not at Main City Address)</super>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="secondary_add">
                                        <h6>Secondary City Address</h6>
                                    </label>
                                    <input type="text" name="secondary_add" class="form-control text-transform" placeholder="secondary address">
                                </div>

                                <div class="form-group col">
                                    <label>
                                        <h6>Provincial/Permanent Address</h6>
                                    </label>
                                    <input type="text" name="provincial_add" placeholder="provincial address" class="form-control text-transform" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h6>Your Housemates</h6>
                        <div class="row">
                            <div class="form-group col">
                                <label for="hname">Name of Housemate</label>
                                <input type="text" name="hname[]" id="hname1" placeholder="name of housemate" class="form-control text-transform" autocomplete="off" required>
                            </div>

                            <div class="form-group col">
                                <label for="rel">Relationship</label>
                                <input type="text" name="hrel[]" id="hrel1" placeholder="Relationship" class="form-control text-transform" autocomplete="off" required>
                            </div>

                            <div class="form-group col">
                                <label for="mnumber1">Mobile Number</label>
                                <input type="tel" name="mnumber[]" id="mnumber1" placeholder="Mobile Number" maxlength="11" onkeypress="numberInput(event)" class="form-control" autocomplete="off" required>
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="hname">Name of Housemate</label>
                                <input type="text" name="hname[]" id="hname2" placeholder="name of housemate" class="form-control text-transform" autocomplete="off">
                            </div>

                            <div class="form-group col">
                                <label for="rel">Relationship</label>
                                <input type="text" name="hrel[]" id="hrel2" placeholder="Relationship" class="form-control text-transform" autocomplete="off">
                            </div>

                            <div class="form-group col">
                                <label for="mnumber2">Mobile Number</label>
                                <input type="tel" name="mnumber[]" id="mnumber2" placeholder="Mobile Number" maxlength="11" onkeypress="numberInput(event)" class="form-control" autocomplete="off">
                            </div>

                        </div>
                        <hr>
                        <h6>Your Closest Living Relatives</h6>
                        <div class="row">
                            <div class="form-group col">
                                <label for="hname">Name of relative</label>
                                <input type="text" name="rname[]" id="rname1" placeholder="name of housemate" class="form-control text-transform" autocomplete="off" required>
                            </div>

                            <div class="form-group col">
                                <label for="rel">Relationship</label>
                                <input type="text" name="rrel[]" id="rrel1" placeholder="Relationship" class="form-control text-transform" autocomplete="off" required>
                            </div>

                            <div class="form-group col">
                                <label for="rmnumber1">Mobile Number</label>
                                <input type="tel" name="rmnumber[]" id="rmnumber1" placeholder="Mobile Number" maxlength="11" onkeypress="numberInput(event)" class="form-control" autocomplete="off" required>
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="hname">Name of relative</label>
                                <input type="text" name="rname[]" id="rname2" placeholder="name of housemate" class="form-control text-transform" autocomplete="off">
                            </div>

                            <div class="form-group col">
                                <label for="rel">Relationship</label>
                                <input type="text" name="rrel[]" id="rrel2" placeholder="Relationship" class="form-control text-transform" autocomplete="off">
                            </div>

                            <div class="form-group col">
                                <label for="rmnumber2">Mobile Number</label>
                                <input type="tel" name="rmnumber[]" id="rmnumber2" placeholder="Mobile Number" maxlength="11" onkeypress="numberInput(event)" class="form-control" autocomplete="off">
                            </div>

                        </div>

                        <div class="row">
                            <script>
                                $(function () {
                                    $('#quest').change(function () {
                                        $('#yes').hide();
                                        $('#' + $(this).val()).show();
                                    });
                                });
                            </script>
                            <div class="form-group col">
                                <label for="quest">Do you plan on relocating soon? </label>
                                <select name="yesorno" id="quest" class="form-control">
                                    <option selected="selected" disabled="disabled">Select: Yes or No</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>

                            <div class="form-group col" id="Yes" style="display:none">
                                <label for="answer">If yes, where will be your new address?</label>
                                <input type="text" name="answer" class="form-control" autocomplete="off">
                            </div>
                        </div>

                        <div class="f1-buttons">
                            <button type="button" class="btn pages btn-previous">Previous</button>
                            <button type="button" class="btn pages btn-next">Next</button>
                        </div>
                    </fieldset>

                    <fieldset>
                        <h2>Step 5: Tutor Info Sheet</h2>
                        <div class="row">
                            <div class="form-group col">
                                <label>Tutor's Full Name</label>
                                <input type="text" name="tutor_name" id="tutor_name" placeholder="full name" class="form-control text-transform">
                            </div>

                            <div class="form-group col">
                                <label>Nickname</label>
                                <input type="text" name="nickname" id="nickname" placeholder="nickname" class="form-control text-transform">
                            </div>

                            <div class="form-group col-2">
                                <label>Mobile Number</label>
                                <input type="tel" name="mobile" id="mobile" placeholder="Mobile Number" onkeypress="numberInput(event)" maxlength="11" class="form-control">
                            </div>

                            <div class="form-group col-2">
                                <label>Landline Number</label>
                                <input type="tel" name="landline" id="landline" placeholder="XXX-XXXX" onkeypress="numberInput(event)" maxlength="7" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label>Accounts</label>
                                <input type="text" name="acc" id="acc" placeholder="Accounts" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label>Company Email address</label>
                                <input type="text" name="com_email" id="com_email" placeholder="Company Email addres" class="form-control">
                            </div>

                            <div class="form-group col">
                                <label>Password</label>
                                <div class="input-group">
                                    <input type="password" placeholder="Password" name="c_password" id="c_password" class="form-control" required="required">

                                    <div class="input-group-append">
                                        <button type="button" class="btn eye" onclick="showHide('c_password','icon1')">
                                            <i class="material-icons" id="icon1">visibility</i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label>Skype Account</label>
                                <input type="text" name="skype" id="skype" placeholder="Skype" class="form-control">
                            </div>

                            <div class="form-group col">
                                <label>Password</label>
                                <div class="input-group">
                                    <input type="password" placeholder="Password" name="s_password" id="s_password" class="form-control" required="required">

                                    <div class="input-group-append">
                                        <button type="button" class="btn eye" onclick="showHide('s_password','icon2')">
                                            <i class="material-icons" id="icon2">visibility</i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label>QQ Number</label>
                                <input type="text" name="qq_num" id="qq_num" placeholder="QQ Number" class="form-control">
                            </div>

                            <div class="form-group col">
                                <label>Password</label>
                                <div class="input-group">
                                    <input type="password" placeholder="Password" name="qq_password" id="qq_password" class="form-control" required="required">

                                    <div class="input-group-append">
                                        <button type="button" class="btn eye" onclick="showHide('qq_password','icon3')">
                                            <i class="material-icons" id="icon3">visibility</i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="f1-buttons">
                            <button type="button" class="btn pages btn-previous">Previous</button>
                            <button type="submit" class="btn pages btn-submit">Submit</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>

        <div id="footer">
            <p>© Vivixx 2018 . All Rights Reserved.</p>
        </div>
        <script>
            $('#sss_no').inputmask({
                mask: 'dd-ddddddd-d'
            });
            $('#tin').inputmask({
                mask: 'ddd-ddd-ddd-ddd'
            });
            $('#philhealth_no').inputmask({
                mask: 'dd-ddddddddd-d'
            });
            $('#pagibig_id_no').inputmask({
                mask: 'dddd-dddd-dddd'
            });
            $('#contact').inputmask({
                mask: '+639dd ddd dddd'
            });
        </script>
        <script>
            function initMap() {
                var myLatlng = new google.maps.LatLng(16.4134367, 120.5858916);
                var myOptions = {
                    zoom: 18,
                    center: myLatlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                }
                var map = new google.maps.Map(document.getElementById("maps"), myOptions);

                var marker = new google.maps.Marker({position: myLatlng, map: map, draggable: true});
                google.maps.event.addListener(marker, 'drag', function () {
                    document.getElementById('lat').value = marker.position.lat();
                    document.getElementById('lng').value = marker.position.lng();
                });
            }

            function invalid() {
                swal({title: "Error", text: "Please complete all the required information", icon: "error"});
            }
        </script>
        <script type="text/javascript">
            function onTop() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
        </script>
        <script async="async" defer="defer" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1K5x8GSc3ReR4YSYxjK3Jq6Zn9Mmiwgo&callback=initMap"></script>
        <script type="text/javascript" src="../script/jquery.form.min.js"></script>
        <script type="text/javascript" src="../script/alerts.js"></script>
        <script type="text/javascript" src="../script/popper.min.js"></script>
        <script type="text/javascript" src="../script/sweetalert.min.js"></script>
        <script type="text/javascript" src="../script/ajax.js"></script>
    </body>

</html>
