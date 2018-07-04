<?php
    include '../utilities/session.php';
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
            <div style="text-align:left;margin-top:-3%;">
                <button type="button" class="btn" data-toggle="modal" data-target="#hints" id="help">
                    <i class="material-icons">
                        help
                    </i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="hints" tabindex="-1" role="dialog" aria-labelledby="titlehint" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="titlehint">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="color:black">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                    dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="container">
                <form role="form" action="../utilities/update_info"  method="post" class="f1">
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
                        <!-- <div class="row"> <div class="form-group col-4"> <label for="prof_image">Profile Image</label> <input type="file" name="prof_image"/> </div> <div class="form-group col-4"> <label for="prof_image">Signature</label> <input type="file"/> </div>
                        </div> -->
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
                                <input type="tel" name="contact_number" autocomplete="off" placeholder="+639XX XXX XXXX" class="form-control mobile" id="contact" required="required">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="facebook">Facebook Link</label>
                                <input type="text" name="facebook" id="facebook" placeholder="Facebook Link" class="form-control text-transform" autocomplete="off" required="required">
                            </div>
                        </div>

                        <div class="row">
                            <script>
                                $(function () {
                                    $('#gender').change(function () {
                                        $('#Other').hide();
                                        $('#' + $(this).val()).show();
                                        if ($('#gender').val() == "Other") {
                                            $('#spec').attr('required', 'true');
                                        } else {
                                            $('#spec').removeAttr('required').removeClass('input-error');
                                        }
                                    });
                                });
                            </script>
                            <div class=" form-group col">
                                <label for="gender">Gender</label>
                                <select name="gender" id="gender" class="form-control" required="required">
                                    <option selected="selected" disabled="disabled">Select Here:</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Rather not say">I'd rather not say</option>
                                    <option value="Other">Others</option>
                                </select>
                            </div>

                            <div class="form-group col" style="display:none" id="Other">
                                <label for="spec">Specify</label>
                                <input type="text" name="spec" id="spec" class="form-control" autocomplete="off">
                            </div>

                            <div class="form-group col">
                                <label for="height">Height</label>
                                <div class="row no-gutters ">
                                    <div class="form-group col">
                                        <input type="text" name="ft" id="ft" class="form-control height" autocomplete="off" placeholder="(ft.)" required="required">
                                    </div>
                                    <div class="form-group col">
                                        <input type="text" name="in" id="in" class="form-control height" autocomplete="off" placeholder="(in.)" required="required">
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
                                <input type="text" name="residential_zip" class="form-control zip" id="residential_zip" placeholder="XXXX" autocomplete="off" required="required">
                            </div>

                            <div class="form-group col-3 ">
                                <label for="residential_tel_no">Telephone NO.</label>
                                <input type="tel" name="residential_tel_no" id="residential_tel_no" autocomplete="off" placeholder="XXX-XXXX" class="form-control telephone" required="required">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-7">
                                <label for="permanent_address">Permanent Address</label>
                                <input type="text" name="permanent_address" id="permanent_address" autocomplete="off" placeholder="address" class="form-control text-transform" required="required">
                            </div>

                            <div class="form-group col-2 ">
                                <label for="permanent_zip">Zip Code</label>
                                <input type="text" name="permanent_zip" id="permanent_zip" autocomplete="off" placeholder="XXXX" class="form-control zip" required="required">
                            </div>

                            <div class="form-group col-3 ">
                                <label for="permanent_tel_no">Telephone NO.</label>
                                <input type="tel" name="permanent_tel_no" id="permanent_tel_no" autocomplete="off" placeholder="XXX-XXXX" class="form-control telephone" required="required">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="citizenship">Citizenship</label>
                                <input type="text" name="citizenship" id="citizenship" onkeypress="alphabetInput(event)" autocomplete="off" placeholder="Citizenship" class="form-control text-transform" required="required">
                            </div>

                            <script>
                                $(function () {
                                    $('#civil_status').change(function () {
                                        $('#others').hide();
                                        $('#' + $(this).val()).show();
                                        if ($('#civil_status').val() === "others") {
                                            $('#oth').attr('required', 'true');
                                        } else {
                                            $('#oth').removeAttr('required').removeClass('input-error');

                                        }
                                    });
                                });
                            </script>

                            <div class="form-group col">
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

                            <div id='others' style='display:none' class="form-group col-4">
                                <label for="other_civil">(Please Specify)</label>
                                <input id="oth" class="form-control" placeholder="" name="other_civil">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="sss_no">SSS NO.</label>
                                <input type="text" name="sss_no" id="sss_no" placeholder="XX-XXXXXXX-X" autocomplete="off" class="form-control" required="required">
                            </div>

                            <div class="form-group col">
                                <label for="tin">TIN</label>
                                <input type="text" name="tin" id="tin" placeholder="XXX-XXX-XXX-XXX" autocomplete="off" class="form-control" required="required">
                            </div>

                            <div class="form-group col">
                                <label for="philhealth_no ">PHILHEALTH NO.</label>
                                <input type="text" name="philhealth_no" id="philhealth_no" placeholder="XX-XXXXXXXXX-X" autocomplete="off" class="form-control" required="required">
                            </div>

                            <div class="form-group col">
                                <label for="pagibig_id_no">PAG-IBIG ID NO.</label>
                                <input type="text" name="pagibig_id_no" id="pagibig_id_no" placeholder="XXXX-XXXX-XXXX" autocomplete="off" class="form-control" required="required">
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
                                <input type="text" name="father_first_name" placeholder="first name" onkeypress="alphabetInput(event)" id="ffname" class="form-control text-transform" autocomplete="off" required="required">
                            </div>

                            <div class="form-group col">
                                <label for="fmname">Middle Name</label>
                                <input type="text" name="father_middle_name" placeholder="middle name" onkeypress="alphabetInput(event)" id="fmname" class="form-control text-transform" autocomplete="off" required="required">
                            </div>

                            <div class="form-group col">
                                <label for="flname">Last Name</label>
                                <input type="text" name="father_last_name" placeholder="last name" onkeypress="alphabetInput(event)" id="flname" class="form-control text-transform" autocomplete="off" required="required">
                            </div>
                        </div>

                        <h5>Mother's Maiden Name</h5>
                        <div class="row">
                            <div class="form-group col">
                                <label for="mfname">First Name</label>
                                <input type="text" name="mother_first_name" placeholder="first name" onkeypress="alphabetInput(event)" id="mfname" class="form-control text-transform" autocomplete="off" required="required">
                            </div>

                            <div class="form-group col">
                                <label for="mmname">Middle Name</label>
                                <input type="text" name="mother_middle_name" placeholder="middle name" onkeypress="alphabetInput(event)" id="mmname" class="form-control text-transform" autocomplete="off" required="required">
                            </div>

                            <div class="form-group col">
                                <label for="mlname">Last Name</label>
                                <input type="text" name="mother_last_name" placeholder="last name" onkeypress="alphabetInput(event)" id="mlname" class="form-control text-transform" autocomplete="off" required="required">
                            </div>
                        </div>
                        <hr>

                        <h5>Spouse's Name(Optional)</h5>
                        <br>

                        <div class="row">
                            <div class="form-group col">
                                <label for="sfname">First Name</label>
                                <input type="text" name="spouse_first_name" placeholder="first name" onkeypress="alphabetInput(event)" id="sfname" class="form-control text-transform" autocomplete="off">
                            </div>

                            <div class="form-group col">
                                <label for="smname">Middle Name</label>
                                <input type="text" name="spouse_middle_name" placeholder="middle name" onkeypress="alphabetInput(event)" id="smname" class="form-control text-transform" autocomplete="off">
                            </div>

                            <div class="form-group col">
                                <label for="slname">Last Name</label>
                                <input type="text" name="spouse_last_name" placeholder="last name" onkeypress="alphabetInput(event)" id="slname" class="form-control text-transform" autocomplete="off">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-2">
                                <label for="occupation">Occupation</label>
                                <input type="text" name="occupation" id="occupation" placeholder="occupation" onkeypress="alphabetInput(event)" class="form-control text-transform" autocomplete="off">
                            </div>

                            <div class="form-group col-2">
                                <label for="employer">Employer</label>
                                <input type="text" name="employer" id="employer" placeholder="employer" class="form-control text-transform" autocomplete="off">
                            </div>

                            <div class="form-group col">
                                <label for="business_address">Business Address</label>
                                <input type="text" name="business_address" id="business_address" placeholder="business address" class="form-control text-transform" autocomplete="off">
                            </div>

                            <div class="form-group col-3">
                                <label for="spouse_tel_no">Telephone NO.</label>
                                <input type="tel" name="spouse_tel_no" id="spouse_tel_no" placeholder="XXX-XXXX" autocomplete="off" class="form-control telephone">
                            </div>
                        </div>

                        <h5>Child/Children's Information</h5>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="child_name">Name</label>
                                <input type="text" placeholder="First name M.I. Last name" onkeypress="alphabetInput(event)" name="child_name[]" id="child_name" class="form-control text-transform" autocomplete="off">
                            </div>

                            <div class="form-group col-6">
                                <label for="child_birth">Date of Birth</label>
                                <div class="input-group">
                                    <input type="date" name="child_birth[]" id="child_birth" class="form-control" autocomplete="off">
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="button" onclick="addchild()">
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
                                <input type="text" name="elem_school_name" id="elem_school_name" placeholder="Name of School" onkeypress="alphabetInput(event)" class="form-control text-transform" autocomplete="off">
                            </div>
                            <script>
                                $(function () {
                                    $('#option1').change(function () {
                                        $('#g1').hide();
                                        $('#u1').hide();
                                        $('#' + $(this).val()).show();
                                        if ($('#option1').val() === "g1") {
                                            $('#elem_yr_grad').attr('required', 'true');
                                            $('#elem_school_name').attr('required', 'true');
                                            $('#elem_high_level').removeAttr('required').removeClass('input-error');
                                        } else if ($('#option1').val() === "u1") {
                                            $('#elem_school_name').attr('required', 'true');
                                            $('#elem_high_level').attr('required', 'true');
                                            $('#elem_yr_grad').removeAttr('required').removeClass('input-error');
                                        } else {
                                            $('#elem_school_name').removeAttr('required').removeClass('input-error');
                                            $('#elem_high_level').removeAttr('required').removeClass('input-error');
                                            $('#elem_yr_grad').removeAttr('required').removeClass('input-error');
                                        }
                                    });
                                });
                            </script>
                            <div class="form-group col">
                                <label for="option1">Status</label>
                                <select name="option1" id="option1" class="form-control">
                                    <option selected="selected" value="none">None</option>
                                    <option value="g1">Graduate</option>
                                    <option value="u1">Undergraduate</option>
                                </select>
                            </div>

                            <div class="form-group col" id="g1" style="display:none">
                                <label for="yr_grad">Year Graduated</label>
                                <input type="text" name="elem_yr_grad" id="elem_yr_grad" placeholder="Ex. 1995-96" class="form-control gradyear" autocomplete="off">
                            </div>

                            <div class="form-group col" id="u1" style="display:none">
                                <label for="high_level">Highest Level</label>
                                <select name="elem_high_level" id="elem_high_level" class="form-control">
                                    <option selected="selected" value="none">None</option>
                                    <option value="Grade 1">Grade 1</option>
                                    <option value="Grade 2">Grade 2</option>
                                    <option value="Grade 3">Grade 3</option>
                                    <option value="Grade 4">Grade 4</option>
                                    <option value="Grade 5">Grade 5</option>
                                    <option value="Grade 6">Grade 6</option>
                                </select>
                            </div>

                        </div>

                        <h5>Secondary</h5>
                        <div class="row">
                            <div class="form-group col">
                                <label for="school_name">Name of School</label>
                                <input type="text" name="sec_school_name" id="sec_school_name" placeholder="Name of School" onkeypress="alphabetInput(event)" class="form-control text-transform" autocomplete="off">
                            </div>
                            <script>
                                $(function () {
                                    $('#option2').change(function () {
                                        $('#g2').hide();
                                        $('#u2').hide();
                                        $('#' + $(this).val()).show();
                                        if ($('#option2').val() === "g2") {
                                            $('#sec_yr_grad').attr('required', 'true');
                                            $('#sec_school_name').attr('required', 'true');
                                            $('#sec_high_level').removeAttr('required').removeClass('input-error');
                                        } else if ($('#option2').val() === "u2") {
                                            $('#sec_school_name').attr('required', 'true');
                                            $('#sec_high_level').attr('required', 'true');
                                            $('#sec_yr_grad').removeAttr('required').removeClass('input-error');
                                        } else {
                                            $('#sec_school_name').removeAttr('required').removeClass('input-error');
                                            $('#sec_yr_grad').removeAttr('required').removeClass('input-error');
                                            $('#sec_high_level').removeAttr('required').removeClass('input-error');
                                        }
                                    });
                                });
                            </script>
                            <div class="form-group col">
                                <label for="option2">Status</label>
                                <select name="option2" id="option2" class="form-control">
                                    <option selected="selected" value="none">None</option>
                                    <option value="g2">Graduate</option>
                                    <option value="u2">Undergraduate</option>
                                </select>
                            </div>

                            <div class="form-group col" id="g2" style="display:none">
                                <label for="yr_grad">Year Graduated</label>
                                <input type="text" name="sec_yr_grad" id="sec_yr_grad" placeholder="Ex. 1995-96" class="form-control gradyear" autocomplete="off">
                            </div>

                            <div class="form-group col" id="u2" style="display:none">
                                <label for="high_level">Highest Level</label>
                                <select name="sec_high_level" id="sec_high_level" class="form-control">
                                    <option selected="selected" value="none">None</option>
                                    <option value="1st Year">1st Year</option>
                                    <option value="2nd Year">2nd Year</option>
                                    <option value="3rd Year">3rd Year</option>
                                    <option value="4th Year">4th Year</option>
                                    <option value="Grade 7">Grade 7</option>
                                    <option value="Grade 8">Grade 8</option>
                                    <option value="Grade 9">Grade 9</option>
                                    <option value="Grade 10">Grade 10</option>
                                    <option value="Grade 11">Grade 11</option>
                                    <option value="Grade 12">Grade 12</option>
                                </select>
                            </div>

                        </div>

                        <h5>College</h5>
                        <div class="row">
                            <div class="form-group col">
                                <label for="school_name">Name of School</label>
                                <input type="text" name="col_school_name" id="col_school_name" placeholder="Name of School" onkeypress="alphabetInput(event)" class="form-control text-transform" autocomplete="off">
                            </div>

                            <script>
                                $(function () {
                                    $('#option3').change(function () {
                                        $('#g3').hide();
                                        $('#u3').hide();
                                        $('#' + $(this).val()).show();
                                        if ($('#option3').val() === "g3") {
                                            $('#col_yr_grad').attr('required', 'true');
                                            $('#col_school_name').attr('required', 'true');
                                            $('#col_high_level').removeAttr('required').removeClass('input-error');

                                        } else if ($('#option3').val() === "u3") {
                                            $('#col_high_level').attr('required', 'true');
                                            $('#col_school_name').attr('required', 'true');
                                            $('#col_yr_grad').removeAttr('required').removeClass('input-error');
                                        } else {
                                            $('#col_school_name').removeAttr('required').removeClass('input-error');
                                            $('#col_yr_grad').removeAttr('required').removeClass('input-error');
                                            $('#col_high_level').removeAttr('required').removeClass('input-error');
                                        }
                                    });
                                });
                            </script>
                            <div class="form-group col">
                                <label for="option3">Status</label>
                                <select name="option3" id="option3" class="form-control">
                                    <option selected="selected" value="none">None</option>
                                    <option value="g3">Graduate</option>
                                    <option value="u3">Undergraduate</option>
                                </select>
                            </div>

                            <div class="form-group col" id="g3" style="display:none">
                                <label for="yr_grad">Year Graduated</label>
                                <input type="text" name="col_yr_grad" id="col_yr_grad" placeholder="Ex. 1995-96" class="form-control gradyear" autocomplete="off">
                            </div>

                            <div class="form-group col" id="u3" style="display:none">
                                <label for="high_level">Highest Level</label>
                                <select name="col_high_level" id="col_high_level" class="form-control">
                                    <option selected="selected" value="none">None</option>
                                    <option value="1st Year">1st Year</option>
                                    <option value="2nd Year">2nd Year</option>
                                    <option value="3rd Year">3rd Year</option>
                                    <option value="4th Year">4th Year</option>
                                    <option value="5th Year">5th Year</option>
                                </select>
                            </div>

                        </div>

                        <h5>Post Grad</h5>
                        <div class="row">
                            <div class="form-group col">
                                <label for="school_name">Name of School</label>
                                <input type="text" name="pos_school_name" id="pos_school_name" placeholder="Name of School" onkeypress="alphabetInput(event)" class="form-control text-transform" autocomplete="off">
                            </div>

                            <script>
                                $(function () {
                                    $('#option4').change(function () {
                                        $('#g4').hide();
                                        $('#u4').hide();
                                        $('#' + $(this).val()).show();
                                        if ($('#option4').val() === "g4") {
                                            $('#pos_yr_grad').attr('required', 'true');
                                            $('#pos_school_name').attr('required', 'true');
                                            $('#pos_high_level').removeAttr('required').removeClass('input-error');

                                        } else if ($('#option4').val() === "u4") {
                                            $('#pos_high_level').attr('required', 'true');
                                            $('#pos_school_name').attr('required', 'true');
                                            $('#pos_yr_grad').removeAttr('required').removeClass('input-error');
                                        } else {
                                            $('#pos_school_name').removeAttr('required').removeClass('input-error');
                                            $('#pos_high_level').removeAttr('required').removeClass('input-error');
                                            $('#pos_yr_grad').removeAttr('required').removeClass('input-error');
                                        }
                                    });
                                });
                            </script>
                            <div class="form-group col">
                                <label for="option4">Status</label>
                                <select name="option4" id="option4" class="form-control">
                                    <option selected="selected" value="none">None</option>
                                    <option value="g4">Graduate</option>
                                    <option value="u4">Undergraduate</option>
                                </select>
                            </div>

                            <div class="form-group col" id="g4" style="display:none">
                                <label for="yr_grad">Year Graduated</label>
                                <input type="text" name="pos_yr_grad" id="pos_yr_grad" placeholder="Ex. 1995-96" class="form-control gradyear" autocomplete="off">
                            </div>

                            <div class="form-group col" id="u4" style="display:none">
                                <label for="high_level">Highest Level</label>
                                <select name="pos_high_level" id="pos_high_level" class="form-control">
                                    <option selected="selected" value="none">None</option>
                                    <option value="g4">Graduate</option>
                                    <option value="u4">Undergraduate</option>
                                </select>
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
                            <input type="text" id="lat" name="lat" class="d-none" required="required">
                            <input type="text" id="lng" name="lng" class="d-none" required="required">
                            <br>
                            <div>
                                <label>
                                    <h6>Main address</h6>
                                </label>
                                <input type="text" id="main_address" placeholder="main address" class="form-control text-transform" name="main_address" required="required">
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
                                    <input type="text" name="provincial_add" placeholder="provincial address" class="form-control text-transform" required="required">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h6>Your Housemates</h6>
                        <div class="row">
                            <div class="form-group col">
                                <label for="hname">Name of Housemate</label>
                                <input type="text" name="hname[]" id="hname1" placeholder="name of housemate" onkeypress="alphabetInput(event)" class="form-control text-transform" autocomplete="off" required="required">
                            </div>

                            <div class="form-group col">
                                <label for="rel">Relationship</label>
                                <input type="text" name="hrel[]" id="hrel1" placeholder="Relationship" onkeypress="alphabetInput(event)" class="form-control text-transform" autocomplete="off" required="required">
                            </div>

                            <div class="form-group col">
                                <label for="mnumber1">Mobile Number</label>
                                <input type="tel" name="hnumber[]" id="hnumber1" placeholder="+639XX XXX XXXX" class="form-control mobile" autocomplete="off" required="required">
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="hname">Name of Housemate</label>
                                <input type="text" name="hname[]" id="hname2" placeholder="name of housemate" onkeypress="alphabetInput(event)" class="form-control text-transform" autocomplete="off">
                            </div>

                            <div class="form-group col">
                                <label for="rel">Relationship</label>
                                <input type="text" name="hrel[]" id="hrel2" placeholder="Relationship" onkeypress="alphabetInput(event)" class="form-control text-transform" autocomplete="off">
                            </div>

                            <div class="form-group col">
                                <label for="mnumber2">Mobile Number</label>
                                <input type="tel" name="hnumber[]" id="hnumber2" placeholder="+639XX XXX XXXX" class="form-control mobile" autocomplete="off">
                            </div>

                        </div>
                        <hr>
                        <h6>Your Closest Living Relatives</h6>
                        <div class="row">
                            <div class="form-group col">
                                <label for="hname">Name of relative</label>
                                <input type="text" name="rname[]" id="rname1" placeholder="name of housemate" onkeypress="alphabetInput(event)" class="form-control text-transform" autocomplete="off" required="required">
                            </div>

                            <div class="form-group col">
                                <label for="rel">Relationship</label>
                                <input type="text" name="rrel[]" id="rrel1" placeholder="Relationship" onkeypress="alphabetInput(event)" class="form-control text-transform" autocomplete="off" required="required">
                            </div>

                            <div class="form-group col">
                                <label for="rmnumber1">Mobile Number</label>
                                <input type="tel" name="rnumber[]" id="rnumber1" placeholder="+639XX XXX XXXX" class="form-control mobile" autocomplete="off" required="required">
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="hname">Name of relative</label>
                                <input type="text" name="rname[]" id="rname2" placeholder="name of housemate" onkeypress="alphabetInput(event)" class="form-control text-transform" autocomplete="off">
                            </div>

                            <div class="form-group col">
                                <label for="rel">Relationship</label>
                                <input type="text" name="rrel[]" id="rrel2" placeholder="Relationship" class="form-control text-transform" autocomplete="off">
                            </div>

                            <div class="form-group col">
                                <label for="rmnumber2">Mobile Number</label>
                                <input type="tel" name="rnumber[]" id="rnumber2" placeholder="+639XX XXX XXXX" class="form-control mobile" autocomplete="off">
                            </div>

                        </div>

                        <div class="row">
                            <script>
                                $(function () {
                                    $('#quest').change(function () {
                                        $('#Yes').hide();
                                        $('#' + $(this).val()).show();
                                        if ($('#quest').val() == "Yes") {
                                            $('#answer').attr('required', 'true');
                                        } else {
                                            $('#answer').removeAttr('required').removeClass('input-error');
                                        }
                                    });
                                });
                            </script>
                            <div class="form-group col-4">
                                <label for="quest">Do you plan on relocating soon?
                                </label>
                                <select name="yesorno" id="quest" class="form-control" required="required">
                                    <option selected="selected" disabled="disabled">Select: Yes or No</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>

                            <div class="form-group col" id="Yes" style="display:none">
                                <label for="answer">If yes, where will be your new address?</label>
                                <input type="text" name="answer" id="answer" class="form-control" autocomplete="off">
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
                            <div class="form-group col-4">
                                <label>Tutor's Full Name</label>
                                <input type="text" name="tutor_name" id="tutor_name" placeholder="full name" onkeypress="alphabetInput(event)" class="form-control text-transform">
                            </div>

                            <div class="form-group col-2">
                                <label>Nickname</label>
                                <input type="text" name="nickname" id="nickname" placeholder="nickname" onkeypress="alphabetInput(event)" class="form-control text-transform">
                            </div>

                            <div class="form-group col">
                                <label>Mobile Number</label>
                                <input type="tel" name="mobile" id="mobile" placeholder="+639XX XXX XXXX" class="form-control mobile">
                            </div>

                            <div class="form-group col">
                                <label>Landline Number</label>
                                <input type="tel" name="landline" id="landline" placeholder="XXX-XXXX" class="form-control telephone">
                            </div>
                        </div>

                        <div class="row">
                            <script>
                                $(function () {
                                    $('#department').change(function () {
                                        $('#orig').hide();
                                        $('#ash').hide();
                                        $('#its').hide();
                                        $('#nva').hide();
                                        $('#main').hide();
                                        $('#sec').hide();
                                        $('#voa').hide();
                                        $('#ve').hide();
                                        $('#va').hide();
                                        $('#' + $(this).val()).show();
                                    });
                                });
                            </script>
                            <div class="form-group col">
                                <label for="department">Main Department</label>
                                <select class="custom-select form-group" name="department[]" id="department">
                                    <option selected="selected" disabled="disabled">Choose your Department</option>
                                    <option value="ash">Administration Support / HR</option>
                                    <option value="its">IT Support</option>
                                    <option value="main">Maintenance</option>
                                    <option value="nva">Non-voice Account</option>
                                    <option value="sec">Security</option>
                                    <option value="ve">Video ESL</option>
                                    <option value="va">Virtual Assistant</option>
                                    <option value="voa">Voice Account</option>
                                </select>
                            </div>

                            <div class="form-group col" id="orig">
                                <label for="position">Main Account</label>
                                <select class="custom-select form-group">
                                    <option selected="selected" disabled="disabled">Choose your Main Account</option>
                                </select>
                            </div>

                            <div class="form-group col" id="ash" style='display:none'>
                                <label for="position">Main Account</label>
                                <select class="custom-select form-group" name="adminsp[]">
                                    <option selected="selected" disabled="disabled">Choose your Main Account</option>
                                    <option value="HR Assistant">HR Support</option>
                                    <option value="IDP Staff">IDP Staff</option>
                                    <option value="Operations Support">Operations Support</option>
                                    <option value="Springboard Staff">Springboard Staff</option>
                                </select>
                            </div>

                            <div class="form-group col" id="its" style='display:none'>
                                <label for="position">Main Account</label>
                                <select class="custom-select form-group" name="itsupport[]">
                                    <option value="ICT Specialist" selected="selected">ICT Specialist</option>
                                </select>
                            </div>

                            <div class="form-group col" id="nva" style='display:none'>
                                <label for="position">Main Account</label>
                                <select class="custom-select form-group" name="nonvoice[]">
                                    <option selected="selected" disabled="disabled">Choose your Main Account</option>
                                    <option value="April Writing">April Writing</option>
                                    <option value="CL/IL">CL/IL</option>
                                </select>
                            </div>

                            <div class="form-group col" id="voa" style='display:none'>
                                <label for="position">Main Account</label>
                                <select class="custom-select form-group" name="voice[]">
                                    <option selected="selected" disabled="disabled">Choose your Main Account</option>
                                    <option value="ELANSO">ELANSO</option>
                                    <option value="Phone ESL">Phone ESL</option>
                                </select>
                            </div>

                            <div class="form-group col" id="ve" style='display:none'>
                                <label for="position">Main Account</label>
                                <select class="custom-select form-group" name="video[]">
                                    <option selected="selected" disabled="disabled">Choose your Main Account</option>
                                    <option value="First Future">First Future</option>
                                    <option value="Key English">Key English</option>
                                </select>
                            </div>

                            <div class="form-group col" id="va" style='display:none'>
                                <label for="position">Main Account</label>
                                <select class="custom-select form-group" name="virtual[]">
                                    <option selected="selected" disabled="disabled">Choose your Main Account</option>
                                    <option value="Drag and drop">Drag and drop</option>
                                    <option value="Job Getter">Job Getter</option>
                                </select>
                            </div>

                            <div class="form-group col" id="sec" style='display:none'>
                                <label for="position">Main Account</label>
                                <select class="custom-select form-group" name="sec[]">
                                    <option value="Security" selected="selected">Security</option>
                                </select>
                            </div>

                            <div class="form-group col" id="main" style='display:none'>
                                <label for="position">Main Account</label>
                                <select class="custom-select form-group" name="main[]">
                                    <option selected="selected" disabled="disabled">Choose your Main Account</option>
                                    <option value="Housekeeping">Housekeeping</option>
                                    <option value="Utility">Utility</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <script>
                                $(function () {
                                    var i = 1;
                                    $('#department1').change(function () {
                                        $('#orig1').hide();
                                        $('#ash1').hide();
                                        $('#its1').hide();
                                        $('#nva1').hide();
                                        $('#main1').hide();
                                        $('#sec1').hide();
                                        $('#voa1').hide();
                                        $('#ve1').hide();
                                        $('#va1').hide();
                                        $('#' + $(this).val() + i).show();
                                    });
                                });
                            </script>
                            <div class="form-group col">
                                <label for="department">Secondary Department</label>
                                <select class="custom-select form-group" name="department[]" id="department1">
                                    <option selected="selected" disabled="disabled">Choose your Department</option>
                                    <option value="ash">Administration Support / HR</option>
                                    <option value="its">IT Support</option>
                                    <option value="main">Maintenance</option>
                                    <option value="nva">Non-voice Account</option>
                                    <option value="sec">Security</option>
                                    <option value="ve">Video ESL</option>
                                    <option value="va">Virtual Assistant</option>
                                    <option value="voa">Voice Account</option>
                                </select>
                            </div>

                            <div class="form-group col" id="orig1">
                                <label for="position">Secondary Account</label>
                                <div class="input-group">
                                    <select class="custom-select form-group">
                                        <option selected="selected" disabled="disabled">Choose your Secondary Account</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="button" onclick="addAccount()">
                                            <i class="small material-icons">add</i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col" id="ash1" style='display:none'>
                                <label for="position">Secondary Account</label>
                                <div class="input-group">
                                    <select class="custom-select form-group" name="adminsp[]">
                                        <option selected="selected" disabled="disabled">Choose your Secondary Account</option>
                                        <option value="HR Assistant">HR Support</option>
                                        <option value="IDP Staff">IDP Staff</option>
                                        <option value="Operations Support">Operations Support</option>
                                        <option value="Springboard Staff">Springboard Staff</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="button" onclick="addAccount()">
                                            <i class="small material-icons">add</i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col" id="its1" style='display:none'>
                                <label for="position">Secondary Account</label>
                                <div class="input-group">
                                    <select class="custom-select form-group" name="itsupport[]">
                                        <option value="ICT Specialist" selected="selected">ICT Specialist</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="button" onclick="addAccount()">
                                            <i class="small material-icons">add</i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col" id="nva1" style='display:none'>
                                <label for="position">Secondary Account</label>
                                <div class="input-group">
                                    <select class="custom-select form-group" name="nonvoice[]">
                                        <option selected="selected" disabled="disabled">Choose your Secondary Account</option>
                                        <option value="April Writing">April Writing</option>
                                        <option value="CL/IL">CL/IL</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="button" onclick="addAccount()">
                                            <i class="small material-icons">add</i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col" id="voa1" style='display:none'>
                                <label for="position">Secondary Account</label>
                                <div class="input-group">
                                    <select class="custom-select form-group" name="voice[]">
                                        <option selected="selected" disabled="disabled">Choose your Secondary Account</option>
                                        <option value="ELANSO">ELANSO</option>
                                        <option value="Phone ESL">Phone ESL</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="button" onclick="addAccount()">
                                            <i class="small material-icons">add</i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col" id="ve1" style='display:none'>
                                <label for="position">Secondary Account</label>
                                <div class="input-group">
                                    <select class="custom-select form-group" name="video[]">
                                        <option selected="selected" disabled="disabled">Choose your Secondary Account</option>
                                        <option value="First Future">First Future</option>
                                        <option value="Key English">Key English</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="button" onclick="addAccount()">
                                            <i class="small material-icons">add</i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col" id="va1" style='display:none'>
                                <label for="position">Secondary Account</label>
                                <div class="input-group">
                                    <select class="custom-select form-group" name="virtual[]">
                                        <option selected="selected" disabled="disabled">Choose your Secondary Account</option>
                                        <option value="Drag and drop">Drag and drop</option>
                                        <option value="Job Getter">Job Getter</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="button" onclick="addAccount()">
                                            <i class="small material-icons">add</i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col" id="sec1" style='display:none'>
                                <label for="position">Secondary Account</label>
                                <div class="input-group">
                                    <select class="custom-select form-group" name="sec[]">
                                        <option value="Security" selected="selected">Security</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="button" onclick="addAccount()">
                                            <i class="small material-icons">add</i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col" id="main1" style='display:none'>
                                <label for="position">Secondary Account</label>
                                <div class="input-group">
                                    <select class="custom-select form-group" name="main[]">
                                        <option selected="selected" disabled="disabled">Choose your Secondary Account</option>
                                        <option value="Housekeeping">Housekeeping</option>
                                        <option value="Utility">Utility</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="button" onclick="addAccount()">
                                            <i class="small material-icons">add</i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="new_acc"></div>

                        <div class="row">
                            <div class="form-group col">
                                <label>Company Email address</label>
                                <input type="text" name="com_email" id="com_email" placeholder="Company Email addres" class="form-control">
                            </div>

                            <div class="form-group col">
                                <label>Password</label>
                                <input type="password" placeholder="Password" name="c_password" id="c_password" class="form-control" required="required">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label>Skype Account</label>
                                <input type="text" name="skype" id="skype" placeholder="Skype" class="form-control">
                            </div>

                            <div class="form-group col">
                                <label>Password</label>
                                <input type="password" placeholder="Password" name="s_password" id="s_password" class="form-control" required="required">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label>QQ Number</label>
                                <input type="text" name="qq_num" id="qq_num" placeholder="QQ Number" class="form-control">
                            </div>

                            <div class="form-group col">
                                <label>Password</label>
                                <input type="password" placeholder="Password" name="qq_password" id="qq_password" class="form-control" required="required">
                            </div>
                        </div>
                        <div class="f1-buttons">
                            <button type="button" class="btn pages btn-previous">Previous</button>
                            <button type="submit" class="btn pages btn-submit">Submit</button>
                        </div>
                    </div>

            </form>
        </div>
    </div>

    <div id="footer">
        <p>© Vivixx 2018 . All Rights Reserved.</p>
    </div>
    <script>
        $('#sss_no').inputmask({mask: 'dd-ddddddd-d'});
        $('#tin').inputmask({mask: 'ddd-ddd-ddd-ddd'});
        $('#philhealth_no').inputmask({mask: 'dd-ddddddddd-d'});
        $('.zip').inputmask({mask: 'dddd'});
        $('#pagibig_id_no').inputmask({mask: 'dddd-dddd-dddd'});
        $('.mobile').inputmask({mask: '+639dd ddd dddd'});
        $('.telephone').inputmask({mask: 'ddd-dddd'});
        $('.height').inputmask({mask: 'dd'});
        $('.gradyear').inputmask({mask: 'dddd-dd'});
    </script>
    <script>
        function initMap() {
            var myLatlng = new google.maps.LatLng(16.4134367, 120.5858916);
            var myOptions = {
                zoom: 18,
                center: myLatlng,
                disableDoubleClickZoom: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            var map = new google.maps.Map(document.getElementById("maps"), myOptions);

            var marker = new google.maps.Marker({position: myLatlng, map: map, draggable: true});
            google.maps.event.addListener(marker, 'drag', function () {
                document.getElementById('lat').value = marker.position.lat();
                document.getElementById('lng').value = marker.position.lng();
            });
            google.maps.event.addListener(map, 'dblclick', function (e) {
                var positionDoubleclick = e.latLng;
                marker.setPosition(positionDoubleclick);
                document.getElementById('lat').value = marker.position.lat();
                document.getElementById('lng').value = marker.position.lng();
            });
        }

        function invalid() {
            swal({title: "Error", text: "Please locate your house", icon: "error"});
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
    <script type="text/javascript" src="../script/jquery.validate.min.js"></script>
    <script type="text/javascript" src="../script/additional-methods.min.js"></script>
    <script type="text/javascript" src="../script/alerts.js"></script>
    <script type="text/javascript" src="../script/popper.min.js"></script>
    <script type="text/javascript" src="../script/sweetalert.min.js"></script>
    <script type="text/javascript" src="../script/ajax.js"></script>
</body>

</html>
