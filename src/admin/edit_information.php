
    <div class="modal fade" id="second" tabindex="-1" role="dialog" >
        <div class="modal-dialog" role="document" style="min-width: 130vh; max-width: 130vh;">
            <div class="modal-content">
                <div class="modal-header">
                </div>
    
                <div class="modal-body" id="personal_info1">
			        <!-- Start of Personal Info-->
                    <form action="update_info" method="POST">
                        <div>
                            <h2>Personal Information</h2><br>
                            <div class="row">
                                <div class="form-group col-4">
                                    <label for="bdate">Birthdate</label>
                                    <input type="date" name="birth_date" id="bdate" class="form-control" required="required" value="<?php echo $row['birth_date']?>">
                                </div>

                                <div class="form-group col-4" >
                                    <label for="pbirth">Place of Birth</label>
                                    <input type="text" stle="text-transform:capitalize;" name="birth_place" autocomplete="off" id="pbirth" class="form-control" required="required" value="<?php echo $row['birth_place']?>">
                                </div>

                                <div class="form-group col-4" >
                                    <label for="contact">Mobile Number</label>
                                    <input type="text" name="contact_number" maxlength="11" autocomplete="off" class="form-control" id="contact" onkeypress="numberInput(event)" onkeyup="helperText('contact_number',this.value,'validContact')" class=" form-control" required="required"
                                    value="<?php echo $row['contact_number']?>">
                                    <div id="validContact"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class=" form-group col-3 ">
                                    <label for="gender">Sex</label>
                                    <select name="gender" class="form-control" required="required">
                                        <?php
                                            if($row['gender'] === 'm'){
                                                $gender = "Male";
                                            }else{
                                                $gender = "Female";
                                            }
                                        ?>
                                        <option selected disabled ><?php echo $gender ?></option>
                                        <option value="m">Male</option>
                                        <option value="f">Female</option>
                                    </select>
                                </div>

                                <div class="form-group col-3 ">
                                    <label for="height">Height</label>
                                    <input type="text" name="height" id="height" class="form-control" autocomplete="off" placeholder="(ft.)" required="required" value="<?php echo $row['height']?>">
                                </div>

                                <div class="form-group col-3 ">
                                    <label for="weight">Weight</label>
                                    <input type="text" name="weight" id="weight" class="form-control" onkeypress="numberInput(event)" autocomplete="off" maxlength="3" placeholder="(kg.)" required="required" value="<?php echo $row['weight']?>">
                                </div>

                                <div class="form-group col-3 ">
                                    <label for="blood">Blood Type</label>
                                    <select name="blood" class="form-control" required="required">
                                        <option selected disabled><?php echo ucwords($row['blood_type'])?></option>
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
                                    <input type="text" name="residential_address" id="residential_address" autocomplete="off" class="form-control" required="required" value="<?php echo $row['residential_address']?>">
                                </div>

                                <div class="form-group col-2 ">
                                    <label for="residential_zip">Zip Code</label>
                                    <input type="text" name="residential_zip" class="form-control num" id="residential_zip" onkeypress="numberInput(event)" maxlength="4" autocomplete="off"  required="required" value="<?php echo $row['residential_zip']?>">
                                </div>

                                <div class="form-group col-3 ">
                                    <label for="residential_tel_no">Telephone NO.</label>
                                    <input type="text" name="residential_tel_no" id="residential_tel_no" maxlength="7" onkeypress="numberInput(event)" autocomplete="off" class="form-control" required="required" value="<?php echo $row['residential_tel_no']?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-7">
                                    <label for="permanent_address">Permanent Address</label>
                                    <input type="text" name="permanent_address" id="permanent_address" autocomplete="off" class="form-control" required="required" value="<?php echo $row['permanent_address']?>">
                                </div>

                                <div class="form-group col-2 ">
                                    <label for="permanent_zip">Zip Code</label>
                                    <input type="text" name="permanent_zip" id="permanent_zip" onkeypress="numberInput(event)" maxlength="4" autocomplete="off" class="form-control" required="required" value="<?php echo $row['permanent_zip']?>">
                                </div>

                                <div class="form-group col-3 " >
                                    <label for="permanent_tel_no">Telephone NO.</label>
                                    <input type="text" name="permanent_tel_no" id="permanent_tel_no" maxlength="7" onkeypress="numberInput(event)" autocomplete="off" class="form-control" required="required" value="<?php echo $row['permanent_tel_no']?>">
                                </div>
					        </div>

                            <div class="row">
              			        <div class="form-group col-4" >
                        	        <label for="citizenship">Citizenship</label>
              					    <input type="text" name="citizenship" id="citizenship" autocomplete="off" class="form-control" required="required" value="<?php echo $row['citizenship']?>">
              			        </div>

                                <div class="form-group col-4" >
                                    <label for="religion">Religion</label>
                                    <input type="text" name="religion" id="religion" class="form-control" autocomplete="off" required="required" value="<?php echo $row['religion']?>">
                                </div>

                                <div class="form-group col-2" >
                                    <label for="civil_status">Civil Status</label>
                                    <select name="civil_status" class="form-control" required="required">
                                        <option selected disabled><?php echo ucwords($row["civil_status"]) ?></option>
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
                                    <input type="text" name="sss_no" id="sss_no" onkeypress="numberInput(event)" autocomplete="off" class="form-control" required="required" value="<?php echo $row['sss_no']?>">
                                </div>

                                <div class="form-group col-3" >
                                    <label for="tin">TIN</label>
                                    <input type="text" name="tin" id="tin" onkeypress="numberInput(event)" autocomplete="off" class="form-control" required="required" value="<?php echo $row['tin']?>">
                                </div>

                                <div class="form-group col-3" >
                                    <label for="philhealth_no ">PHILHEALTH NO.</label>
                                    <input type="text" name="philhealth_no" id="philhealth_no" onkeypress="numberInput(event)" autocomplete="off" class="form-control" required="required" value="<?php echo $row['philhealth_no']?>">
                                </div>

                                <div class="form-group col-3" >
                                    <label for="pagibig_id_no">PAG-IBIG ID NO.</label>
                                    <input type="text" name="pagibig_id_no" id="pagibig_id_no" onkeypress="numberInput(event)" autocomplete="off" class="form-control" required="required" value="<?php echo $row['pagibig_id_no']?>">
                                </div>
                            </div>

                            <h2>Educational Background</h2><br>
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


           <!-- Start of Family Background -->
                            <h2>Family Background</h2><br>
                            <h3><i class="large material-icons" style="font-size:30px;">person</i>Father's Name</h3>
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label for="ffname">First Name</label>
                                        <input type="text" name="father_first_name" id="ffname" class="form-control" autocomplete="off" required="required" value="<?php echo $row['father_first_name']?>">
                                    </div>

                                    <div class="form-group col-4">
                                        <label for="fmname">Middle Name</label>
                                        <input type="text" name="father_middle_name" id="fmname" class="form-control" autocomplete="off" required="required" value="<?php echo $row['father_middle_name']?>">
                                    </div> 

                                    <div class="form-group col-4">
                                        <label for="flname">Last Name</label>
                                        <input type="text" name="father_last_name" id="flname" class="form-control" autocomplete="off" required="required" value="<?php echo $row['father_last_name']?>">
                                    </div>
                                </div>

                            <h3><i class="large material-icons" style="font-size:30px;">person</i>Mother's Maiden Name</h3>
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label for="mfname">First Name</label>
                                        <input type="text" name="mother_first_name" id="mfname" class="form-control" autocomplete="off" required="required" value="<?php echo $row['mother_first_name']?>">
                                    </div>

                                    <div class="form-group col-4">
                                        <label for="mmname">Middle Name</label>
                                        <input type="text" name="mother_middle_name" id="mmname" class="form-control" autocomplete="off" required="required" value="<?php echo $row['mother_middle_name']?>">
                                    </div>

                                    <div class="form-group col-4">
                                        <label for="mlname">Last Name</label>
                                        <input type="text" name="mother_last_name" id="mlname" class="form-control" autocomplete="off" required="required" value="<?php echo $row['mother_last_name']?>">
                                    </div>
                                </div>
                                <hr>
                            <h3><i class="large material-icons" style="font-size:30px;">person</i>Spouse's Name</h3>
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label for="sfname">First Name</label>
                                        <input type="text" name="spouse_first_name" id="sfname" class="form-control" autocomplete="off" value="<?php echo $row['spouse_first_name']?>">
                                    </div>

                                    <div class="form-group col-4">
                                        <label for="smname">Middle Name</label>
                                        <input type="text" name="spouse_middle_name" id="smname" class="form-control" autocomplete="off" value="<?php echo $row['spouse_middle_name']?>">
                                    </div>

                                    <div class="form-group col-4">
                                        <label for="slname">Last Name</label>
                                        <input type="text" name="spouse_last_name" id="slname" class="form-control" autocomplete="off" value="<?php echo $row['spouse_last_name']?>">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-2">
                                        <label for="occupation">Occupation</label>
                                        <input type="text" name="occupation" id="occupation" class="form-control" autocomplete="off" value="<?php echo $row['occupation']?>">
                                    </div>

                                    <div class="form-group col-4">
                                        <label for="employer">Employer</label>
                                        <input type="text" name="employer" id="employer" class="form-control" autocomplete="off" value="<?php echo $row['employer']?>">
                                    </div>

                                    <div class="form-group col-4">
                                        <label for="business_address">Business Address</label>
                                        <input type="text" name="business_address" id="business_address" class="form-control" autocomplete="off" value="<?php echo $row['business_address']?>">
                                    </div>

                                    <div class="form-group col-2">
                                        <label for="spouse_tel_no">Telephone NO.</label>
                                        <input type="text" name="spouse_tel_no" id="spouse_tel_no" maxlength="7" onkeypress="numberInput(event)" autocomplete="off" class="form-control" value="<?php echo $row['spouse_tel_no']?>">
                                    </div>
                                </div>


                            <h3><i class="large material-icons" style="font-size:30px;">person</i>Child/Children's Information</h3>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="child_name">Name</label>
                                        <input type="text" placeholder="First name M.I. Last name" name="child_name[]" id="child_name" class="form-control" autocomplete="off" value="<?php echo $row['child_name']?>">
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="child_birth">Date of Birth</label>
                                        <div class="input-group">
                                            <input type="date" name="child_birth[]" id="child_birth" class="form-control" autocomplete="off" value="<?php echo $row['child_birth_date']?>">
                                            <div class="input-group-append">
                                                <button class="btn btn-success" type="button" onclick="add()"><i class="large material-icons">add</i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="child"></div>

                                <div style="text-align: right">
                                    
                                    <button type="submit">Submit</button>
                                </div>
                    </form>
                </div>
                                <div id="back">
                                    <a href="view_information.php"><button> Back</button></a>
                                </div>
            </div>
        </div>
    </div>

    <script>
    function nextForm(currId,nextId){
      document.getElementById(currId).classList.add("d-none");
      document.getElementById(nextId).classList.remove("d-none");
    }
    </script>
    <script>
        $("button[data-dismiss-modal=back]").click(function () {
            $('#second').modal('hide');
            $('#first').modal('show');
        });
    </script>
