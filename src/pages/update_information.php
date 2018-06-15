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
        <link type="text/css" rel="stylesheet" href="../style/style.css" media="screen, projection">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body style="background-color: #005959;">
        <div class="" style="background-color: white;">
            <h1>Update Information<super><font style="color:red;">*</font></super></h1>

        </div>
        <form action="../utilities/update_info" method="POST">
            <div id="accordion">
                <!-- Personal Information -->
                <div class="card">
                    <div class="card-header" id="heading1">
                        <h5 class="mb-0">
                            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#content1" aria-expanded="true" aria-controls="content1">
                                Personal Information
                            </button>
                        </h5>
                    </div>
                    <div id="content1" class="collapse show" aria-labelledby="heading1" data-parent="#accordion">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-4">
                                    <label for="bdate">Birthdate</label>
                                    <input type="date" name="birth_date" id="bdate" class="form-control" required="required">
                                </div>

                                <div class="form-group col-4" >
                                    <label for="pbirth">Place of Birth</label>
                                    <input type="text" stle="text-transform:capitalize;" name="birth_place" autocomplete="off" id="pbirth" class="form-control" required="required">
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
                                    <input type="text" name="residential_tel_no" id="residential_tel_no" maxlength="7" onkeypress="numberInput(event)" autocomplete="off" class="form-control" required="required">
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

                                <div class="form-group col-2" >
                                    <label for="civil_status">Civil Status</label>
                                    <select name="civil_status" id="civil_status" class="form-control" required="required">
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
                        </div>
                    </div>
                </div>
                <!-- Personal Information -->
                <!-- Family Background  -->
                <div class="card">
                    <div class="card-header" id="heading2">
                        <h5 class="mb-0">
                            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#content2" aria-expanded="false" aria-controls="content2">
                                Family Background
                            </button>
                        </h5>
                    </div>
                    <div id="content2" class="collapse" aria-labelledby="heading2" data-parent="#accordion">
                        <div class="card-body">
                            <h4>Father's Name</h4>
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

                            <h4>Mother's Maiden Name</h4>
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
                            <h4>Spouse's Name</h4>
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
                                    <input type="text" name="spouse_tel_no" id="spouse_tel_no" maxlength="7" onkeypress="numberInput(event)" autocomplete="off" class="form-control">
                                </div>
                            </div>


                            <h4>Child/Children's Information</h4>

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

                            <div id="child"></div>
                        </div>
                    </div>
                </div>
                <!-- Family Background  -->
                <!-- Educational Background  -->
                <div class="card">
                    <div class="card-header" id="heading3">
                        <h5 class="mb-0">
                            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#content3" aria-expanded="true" aria-controls="content3">
                                Educational Background
                            </button>
                        </h5>
                    </div>
                    <div id="content3" class="collapse" aria-labelledby="heading3" data-parent="#accordion">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-2" >
                                    <p>Elementary</p>
                                </div>

                                <div class="form-group col-3" >
                                    <label for="school_name">Name of School</label>
                                    <input type="text" name="elem_school_name" id="elem_school_name" class="form-control" autocomplete="off">
                                </div>

                                <div class="form-group col-3" >
                                    <label for="yr_grad">Year Graduated</label>
                                    <input type="text" name="elem_yr_grad" id="elem_yr_grad" placeholder="(If Graduated)" class="form-control" autocomplete="off">
                                </div>

                                <div class="form-group col-3" >
                                    <label for="high_level">Highest Level</label>
                                    <input type="text" name="elem_high_level" id="elem_high_level" placeholder="(If Undergraduate)" class="form-control" autocomplete="off">
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-2" >
                                    <p>Secondary</p>
                                </div>

                                <div class="form-group col-3" >
                                    <label for="school_name">Name of School</label>
                                    <input type="text" name="sec_school_name" id="sec_school_name" class="form-control" autocomplete="off">
                                </div>

                                <div class="form-group col-3" >
                                    <label for="yr_grad">Year Graduated</label>
                                    <input type="text" name="sec_yr_grad" id="sec_yr_grad" placeholder="(If Graduated)" class="form-control" autocomplete="off">
                                </div>

                                <div class="form-group col-3" >
                                    <label for="high_level">Highest Level</label>
                                    <input type="text" name="sec_high_level" id="sec_high_level" placeholder="(If Undergraduate)" class="form-control" autocomplete="off">
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-2" >
                                    <p>College</p>
                                </div>

                                <div class="form-group col-3" >
                                    <label for="school_name">Name of School</label>
                                    <input type="text" name="col_school_name" id="col_school_name" class="form-control" autocomplete="off">
                                </div>

                                <div class="form-group col-3" >
                                    <label for="yr_grad">Year Graduated</label>
                                    <input type="text" name="col_yr_grad" id="col_yr_grad" placeholder="(If Graduated)" class="form-control"  autocomplete="off">
                                </div>

                                <div class="form-group col-3" >
                                    <label for="high_level">Highest Level</label>
                                    <input type="text" name="col_high_level" id="col_high_level" placeholder="(If Undergraduate)" class="form-control" autocomplete="off">
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-2" >
                                    <p>Post Grad</p>
                                </div>

                                <div class="form-group col-3" >
                                    <label for="school_name">Name of School</label>
                                    <input type="text" name="post_school_name" id="post_school_name" class="form-control" autocomplete="off">
                                </div>

                                <div class="form-group col-3" >
                                    <label for="yr_grad">Year Graduated</label>
                                    <input type="text" name="post_yr_grad" id="post_yr_grad" placeholder="(If Graduated)" class="form-control" autocomplete="off">
                                </div>

                                <div class="form-group col-3" >
                                    <label for="high_level">Highest Level</label>
                                    <input type="text" name="post_high_level" id="post_high_level" placeholder="(If Undergraduate)" class="form-control"  autocomplete="off">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Educational Background  -->
                <!-- Emergency Information Sheet  -->
                <div class="card">
                    <div class="card-header" id="heading4">
                        <h5 class="mb-0">
                            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#content4" aria-expanded="false" aria-controls="content4">
                                Emergency Information Sheet
                            </button>
                        </h5>
                    </div>
                    <div id="content4" class="collapse" aria-labelledby="heading4" data-parent="#accordion">
                        <div class="card-body">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </div>
                    </div>
                </div>
                <!-- Emergency Information Sheet  -->
                <!-- Confirmation -->
                <div class="card">
                    <div class="card-header" id="confirmation">
                        <h5 class="mb-0">
                            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#confirm" aria-expanded="false" aria-controls="confirm">
                                Confirmation
                            </button>
                        </h5>
                    </div>
                    <div id="confirm" class="collapse" aria-labelledby="confirmation" data-parent="#accordion">
                        <div class="card-body">
                            <h3>Agreement</h3>
                            <p>The information above are true and correct. If ever the information will have </p>
                            <div style="text-align:right;">
                                <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#content1" aria-expanded="false" aria-controls="content1">
                                    Go back
                                </button>
                                <button type="submit" class="btn btn-success" oninvalid="success()">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <script>
        function success() {
            swal({
                  title: "Ajax request example",
                  text: "Submit to run ajax request",
                  type: "info",
                  showCancelButton: true,
                  closeOnConfirm: false,
                  showLoaderOnConfirm: true
                }, function () {
                  setTimeout(function () {
                    swal("Ajax request finished!");
                  }, 2000);
                });
        }
    </script>
    <script type="text/javascript" src="../script/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../script/popper.min.js"></script>
    <script type="text/javascript" src="../script/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="../script/sweetalert.min.js"></script>
    <script type="text/javascript" src="../script/ajax.js"></script>
    </body>
</html>
<!-- <div class="card">
    <div class="card-header" id="heading4">
        <h5 class="mb-0">
            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#content4" aria-expanded="false" aria-controls="content4">
                Emergency Information Sheet
            </button>
        </h5>
    </div>
    <div id="content4" class="collapse" aria-labelledby="heading4" data-parent="#accordion">
        <div class="card-body">
        </div>
    </div>
</div> -->
