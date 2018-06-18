
<?php
    include '../utilities/db.php';
    $connect = Connect();
    $user_id = $_GET["user_id"];
    $personal_info = "SELECT * FROM user natural join user_info natural left join user_educ natural join user_offspring inner join user_background on ($user_id=bg_id) where type='user';";
    $result = $connect->query($personal_info);
    $row = $result->fetch_assoc();
?>
    <div class="modal fade" id="first" tabindex="-1" role="dialog" >
        <div class="modal-dialog" role="document" style="min-width: 130vh; max-width: 130vh;">
            <div class="modal-content">
                <div class="modal-header">
                    <?php
                        $user = $_GET["fname"];
                        $user_middle = $_GET["mname"];
                        $user_last = $_GET["lname"];
                        echo "<h1>" ."Information of ". ucwords($user) . " " . ucwords($user_middle) . " " . ucwords($user_last) ."</h1>";
                    ?>
                </div>
    
                <div class="modal-body" id="personal_info">
			        <!-- Start of Personal Info-->
                    <div>
                        <div>
                            <h2>Personal Information</h2><br>
                            <div class="row">
                                <div class="form-group col-4">
                                    <label for="bdate">Birthdate</label>
                                    <textbox  style="height:36px;" class="form-control" disabled><?php echo $row['birth_date']?></textbox>
                                </div>

                                <div class="form-group col-4" >
                                    <label for="pbirth">Place of Birth</label>
                                    <textbox  style="height:36px;" style="text-transform:capitalize;" class="form-control" disabled><?php echo $row['birth_place']?></textbox  >
                                </div>

                                <div class="form-group col-4" >
                                    <label for="contact">Mobile Number</label>
                                    <textbox  style="height:36px;"  class="form-control" class=" form-control" disabled><?php echo $row['contact_number']?></textbox  >
                                    <div id="validContact"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class=" form-group col-3 ">
                                    <label for="gender">Sex</label>
                                    <textbox  style="height:36px;"  class="form-control" disabled><?php if($row['gender'] === 'm'){echo 'Male';}else{echo 'Female';}?></textbox  >
                                </div>

                                <div class="form-group col-3 ">
                                    <label for="height">Height</label>
                                    <textbox  style="height:36px;"  class="form-control" disabled><?php echo $row['height']?></textbox  >
                                </div>

                                <div class="form-group col-3 ">
                                    <label for="weight">Weight</label>
                                    <textbox  style="height:36px;" class="form-control" disabled><?php echo $row['weight']?></textbox  >
                                </div>

                                <div class="form-group col-3 ">
                                    <label for="blood">Blood Type</label>
                                    <textbox  style="height:36px;"  class="form-control" disabled><?php echo ucwords($row['blood_type'])?></textbox  >
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-7">
                                    <label for="residential_address">Residential Address</label>
                                    <textbox  style="height:36px;" class="form-control" disabled><?php echo $row['residential_address']?></textbox  >
                                </div>

                                <div class="form-group col-2 ">
                                    <label for="residential_zip">Zip Code</label>
                                    <textbox  style="height:36px;" class="form-control num" disabled><?php echo $row['residential_zip']?></textbox  >
                                </div>

                                <div class="form-group col-3 ">
                                    <label for="residential_tel_no">Telephone NO.</label>
                                    <textbox  style="height:36px;" class="form-control" disabled><?php echo $row['residential_tel_no']?></textbox  >
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-7">
                                    <label for="permanent_address">Permanent Address</label>
                                    <textbox  style="height:36px;" class="form-control" disabled><?php echo $row['permanent_address']?></textbox  >
                                </div>

                                <div class="form-group col-2 ">
                                    <label for="permanent_zip">Zip Code</label>
                                    <textbox  style="height:36px;" class="form-control" disabled><?php echo $row['permanent_zip']?></textbox  >
                                </div>

                                <div class="form-group col-3 " >
                                    <label for="permanent_tel_no">Telephone NO.</label>
                                    <textbox  style="height:36px;" class="form-control" disabled><?php echo $row['permanent_tel_no']?></textbox  >
                                </div>
					        </div>

                            <div class="row">
              			        <div class="form-group col-4" >
                        	        <label for="citizenship">Citizenship</label>
              					    <textbox  style="height:36px;" class="form-control" disabled><?php echo $row['citizenship']?></textbox  >
              			        </div>

                                <div class="form-group col-4" >
                                    <label for="religion">Religion</label>
                                    <textbox  style="height:36px;" class="form-control" disabled><?php echo $row['religion']?></textbox  >
                                </div>

                                <div class="form-group col-2" >
                                    <label for="civil_status">Civil Status</label>
                                    <textbox  style="height:36px;" class="form-control" disabled><?php echo $row['civil_status']?></textbox  >
                                </div>
					        </div>

                            <div class="row">
                                <div class="form-group col-3" >
                                    <label for="sss_no">SSS NO.</label>
                                    <textbox  style="height:36px;" class="form-control" disabled><?php echo $row['sss_no']?></textbox  >
                                </div>

                                <div class="form-group col-3" >
                                    <label for="tin">TIN</label>
                                    <textbox  style="height:36px;" class="form-control" disabled><?php echo $row['tin']?></textbox  >
                                </div>

                                <div class="form-group col-3" >
                                    <label for="philhealth_no ">PHILHEALTH NO.</label>
                                    <textbox  style="height:36px;" class="form-control" disabled><?php echo $row['philhealth_no']?></textbox  >
                                </div>

                                <div class="form-group col-3" >
                                    <label for="pagibig_id_no">PAG-IBIG ID NO.</label>
                                    <textbox  style="height:36px;" class="form-control" disabled><?php echo $row['pagibig_id_no']?></textbox  >
                                </div>
                            </div>

                            <h2>Educational Background</h2><br>
                            <div class="row">
                                <div class="form-group col-2" >
                                    <p>Elementary</p>
                                </div>

                                <div class="form-group col-3" >
                                    <label for="school_name">Name of School</label>
                                    <?php
                                        if(!empty($row['elementary'])){
                                            $sql = $row['elementary'];
                                            $name = explode(',', $sql)[0];
                                        }else{
                                            $name = "Not Set";
                                        }
                                    ?>
                                    <textbox  style="height:36px;" class="form-control" disabled ><?php echo $name ?></textbox  >
                                </div>

                                <div class="form-group col-3" >
                                    <label for="yr_grad">Year Graduated</label>
                                    <?php
                                        if(!empty($row['elementary'])){
                                            $sql = $row['elementary'];
                                            $year = explode(',', $sql)[1];
                                        }else{
                                            $year = "Not Set";
                                        }
                                    ?>
                                    <textbox  style="height:36px;" class="form-control" autocomplete="off" disabled value = "<?php echo $year ?>"></textbox  >
                                </div>

                                <div class="form-group col-3" >
                                    <label for="high_level">Highest Level</label>
                                    <?php
                                        if(!empty($row['elementary'])){
                                            $sql = $row['elementary'];
                                            $level = explode(',', $sql)[2];
                                        }else{
                                            $level = "Not Set";
                                        }
                                    ?>
                                    <textbox  style="height:36px;" class="form-control" disabled><?php echo $level ?></textbox  >
                                </div>

					        </div>

                            <div class="row">
                                <div class="form-group col-2" >
                                    <p>Secondary</p>
                                </div>

                                <div class="form-group col-3" >
                                    <label for="school_name">Name of School</label>
                                    <?php
                                        if(!empty($row['secondary'])){
                                            $sql = $row['secondary'];
                                            $name = explode(',', $sql)[0];
                                        }else{
                                            $name = "Not Set";
                                        }
                                    ?>
                                    <textbox  style="height:36px;" class="form-control" disabled><?php echo $name ?></textbox  >
                                </div>

                                <div class="form-group col-3" >
                                    <label for="yr_grad">Year Graduated</label>
                                    <?php
                                        if (!empty($row['secondary'])){
                                            $sql = $row['secondary'];
                                            $year = explode(',', $sql)[1];
                                        }else{
                                            $year = "Not set";
                                        }
                                    ?>
                                    <textbox  style="height:36px;" class="form-control" disabled><?php echo $year ?></textbox  >
                                </div>

                                <div class="form-group col-3" >
                                    <label for="high_level">Highest Level</label>
                                    <?php
                                        if(!empty($row['secondary'])){
                                            $sql = $row['secondary'];
                                            $level = explode(',', $sql)[2];
                                        }else{
                                            $level = "Not Set";
                                        }
                                    ?>
                                    <textbox  style="height:36px;" class="form-control" disabled><?php echo $level ?></textbox  >
                                </div>

					        </div>

                            <div class="row">
                                <div class="form-group col-2" >
                                    <p>College</p>
                                </div>

                                <div class="form-group col-3" >
                                    <label for="school_name">Name of School</label>
                                    <?php
                                        if(!empty($row['college'])){
                                            $sql = $row['college'];
                                            $name = explode(',', $sql)[0];
                                        }else{
                                            $name = "Not Set";
                                        }
                                    ?>
                                    <textbox  style="height:36px;" class="form-control" disabled><?php echo $name ?></textbox  >
                                </div>

                                <div class="form-group col-3" >
                                    <label for="yr_grad">Year Graduated</label>
                                    <?php
                                        if(!empty($row['college'])){
                                            $sql = $row['college'];
                                            $year = explode(',', $sql)[1];
                                        }else{
                                            $year = "Not Set";
                                        }
                                    ?>
                                    <textbox  style="height:36px;" class="form-control" disabled><?php echo $year ?></textbox  >
                                </div>

                                <div class="form-group col-3" >
                                    <label for="high_level">Highest Level</label>
                                    <?php
                                        if(!empty($row['college'])){
                                            $sql = $row['college'];
                                            $level = explode(',', $sql)[2];
                                        }else{
                                            $level = "Not Set";
                                        }
                                    ?>
                                    <textbox  style="height:36px;" class="form-control" disabled><?php echo $level ?></textbox  >
                                </div>

					        </div>

                            <div class="row">
                                <div class="form-group col-2" >
                                    <p>Post Grad</p>
                                </div>

                                <div class="form-group col-3" >
                                    <label for="school_name">Name of School</label>
                                    <?php
                                        if(!empty($row['post_grad'])){
                                            $sql = $row['post_grad'];
                                            $name = explode(',', $sql)[0];
                                        }else{
                                            $name = "Not Set";
                                        }
                                    ?>
                                    <textbox  style="height:36px;" class="form-control" disabled><?php echo $name ?></textbox  >
                                </div>

                                <div class="form-group col-3" >
                                    <label for="yr_grad">Year Graduated</label>
                                    <?php
                                        if(!empty($row['post_grad'])){
                                            $sql = $row['post_grad'];
                                            $year = explode(',', $sql)[1];
                                        }else{
                                            $year = "Not Set";
                                        }
                                    ?>
                                    <textbox  style="height:36px;" class="form-control" disabled><?php echo $year ?></textbox  >
                                </div>

                                <div class="form-group col-3" >
                                    <label for="high_level">Highest Level</label>
                                    <?php
                                        if(!empty($row['post_grad'])){
                                            $sql = $row['post_grad'];
                                            $level = explode(',', $sql)[2];
                                        }else{
                                            $level = "Not Set";
                                        }
                                    ?>
                                    <textbox  style="height:36px;" class="form-control" disabled><?php echo $level ?></textbox  >
                                </div>

					        </div>
			            </div>


           <!-- Start of Family Background -->
                            <h2>Family Background</h2><br>
                            <h3><i class="large material-icons" style="font-size:30px;">person</i>Father's Name</h3>
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label for="ffname">First Name</label>
                                        <textbox  style="height:36px;" class="form-control" disabled><?php echo $row['father_first_name']?></textbox  >
                                    </div>

                                    <div class="form-group col-4">
                                        <label for="fmname">Middle Name</label>
                                        <textbox  style="height:36px;" class="form-control" disabled><?php echo $row['father_middle_name']?></textbox  >
                                    </div> 

                                    <div class="form-group col-4">
                                        <label for="flname">Last Name</label>
                                        <textbox  style="height:36px;" class="form-control" disabled><?php echo $row['father_last_name']?></textbox  >
                                    </div>
                                </div>

                            <h3><i class="large material-icons" style="font-size:30px;">person</i>Mother's Maiden Name</h3>
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label for="mfname">First Name</label>
                                        <textbox  style="height:36px;" class="form-control" disabled><?php echo $row['mother_first_name']?></textbox  >
                                    </div>

                                    <div class="form-group col-4">
                                        <label for="mmname">Middle Name</label>
                                        <textbox  style="height:36px;" class="form-control" disabled><?php echo $row['mother_middle_name']?></textbox  >
                                    </div>

                                    <div class="form-group col-4">
                                        <label for="mlname">Last Name</label>
                                        <textbox  style="height:36px;" class="form-control" disabled><?php echo $row['mother_last_name']?></textbox  >
                                    </div>
                                </div>
                                <hr>
                            <h3><i class="large material-icons" style="font-size:30px;">person</i>Spouse's Name</h3>
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label for="sfname">First Name</label>
                                        <textbox  style="height:36px;" class="form-control" disabled><?php echo $row['spouse_first_name']?></textbox  >
                                    </div>

                                    <div class="form-group col-4">
                                        <label for="smname">Middle Name</label>
                                        <textbox  style="height:36px;" class="form-control" disabled><?php echo $row['spouse_middle_name']?></textbox  >
                                    </div>

                                    <div class="form-group col-4">
                                        <label for="slname">Last Name</label>
                                        <textbox  style="height:36px;" class="form-control" disabled><?php echo $row['spouse_last_name']?></textbox  >
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-2">
                                        <label for="occupation">Occupation</label>
                                        <textbox  style="height:36px;" class="form-control" disabled><?php echo $row['occupation']?></textbox  >
                                    </div>

                                    <div class="form-group col-4">
                                        <label for="employer">Employer</label>
                                        <textbox  style="height:36px;" class="form-control" disabled><?php echo $row['employer']?></textbox  >
                                    </div>

                                    <div class="form-group col-4">
                                        <label for="business_address">Business Address</label>
                                        <textbox  style="height:36px;" class="form-control" disabled><?php echo $row['business_address']?></textbox  >
                                    </div>

                                    <div class="form-group col-2">
                                        <label for="spouse_tel_no">Telephone NO.</label>
                                        <textbox  style="height:36px;" class="form-control" disabled><?php echo $row['spouse_tel_no']?></textbox  >
                                    </div>
                                </div>


                            <h3><i class="large material-icons" style="font-size:30px;">person</i>Child/Children's Information</h3>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="child_name">Name</label>
                                        <textbox   style="height:36px;" class="form-control" disabled><?php echo $row['child_name']?></textbox  >
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="child_birth">Date of Birth</label>
                                        <div class="textbox  form-group">
                                            <textbox  class="form-control" disabled><?php echo $row['child_birth_date']?></textbox  >
                                        </div>
                                    </div>
                                </div>

                                <div id="child"></div>

                                <div style="text-align: right">
                                <button type="submit" class="btn btn-default" data-dismiss-modal="first">Edit</button>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    include 'edit_information.php';
    ?>
    <script>
    function nextForm(currId,nextId){
      document.getElementById(currId).classList.add("d-none");
      document.getElementById(nextId).classList.remove("d-none");
    }
    </script>
    <script>
        $(document).ready(function(){
            $("#first").modal("show");
        });
        $("button[data-dismiss-modal=first]").click(function () {
            $('#first').modal('hide');
            $('#second').modal('show');
        });
    </script>
