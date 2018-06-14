
<?php
    include '../utilities/db.php';
    $connect = Connect();
    $user_id = $_GET["user_id"];
    $personal_info = "select * from mis.user_info where user_id= '$user_id';";
    $result = $connect->query($personal_info);
    $family_bg = "select * from mis.user_background;";
    $result1 = $connect->query($family_bg);

    $row = $result->fetch_assoc();
    $row1 = $result1->fetch_assoc();
?>
        <div class="modal fade" id="1st" tabindex="-1" role="dialog" >
        <div class="modal-dialog" role="document" style="min-width: 130vh; max-width: 130vh;">
            <div class="modal-content">
                <div class="modal-header">
                <?php
                    $user = $_GET["fname"];
                    $user_middle = $_GET["mname"];
                    $user_last = $_GET["lname"];
                    echo "<h1>" ."Information of ". $user . " " . $user_middle . " " . $user_last ."</h1>";
                ?>
                </div>
    
                <div class="modal-body" >
			<!-- Start of Personal Info-->
            <form action="update_info" method="POST">
             <div class="jumbotron" id="personal_info">
                <div>
                    <h1>Personal Information</h1><br>
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="bdate">Birthdate</label>
                            <br>
              		        <input type="date" name="birthdate" id="bdate"  class="form-control" required="required" value="<?php echo $row["birth_date"];?>">
              		    </div>

                        <div class="form-group col-4" >
                            <label for="pbirth">Place of Birth</label>
                            <br>
              		        <input type="text" name="birth_place" id="pbirth" class="form-control" required="required" value="<?php echo $row["birth_place"];?> ">
                        </div>

                        <div class="form-group col-4" >
                            <label for="contact">Mobile Number</label>
                            <input type="text" name="contact_number" class="form-control" id="contact" onkeyup="helperText('contact_number',this.value,'validContact')" class=" form-control" required="required"
                            value="<?php echo $row["contact_number"];?>">
                                <div id="validContact"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class=" form-group col-3 ">
                            <label for="gender">Sex</label>
                            <select name="gender" class="form-control" required="required" >
                                <option selected disabled >Select Here:</option>
                                <option value="m">Male</option>
                                <option value="f">Female</option>
                            </select>
              		    </div>

                        <div class="form-group col-3 ">
                            <label for="height">Height</label>
                            <input type="text" name="height" id="height" class="form-control" placeholder="(ft.)" required="required" value="<?php echo $row["height"];?>">
                        </div>

                        <div class="form-group col-3 ">
                            <label for="weight">Weight</label>
                              <input type="text" name="weight" id="weight" class="form-control" placeholder="(kg.)" required="required" value="<?php echo $row["weight"];?>">
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
              		        <input type="text" name="residential_address" id="residential_address" autocomplete="off" class="form-control" required="required"
                              value="<?php echo $row["residential_address"];?>">
                        </div>

                        <div class="form-group col-2 ">
                            <label for="residential_zip">Zip Code</label>
                            <input type="text" name="residential_zip" id="residential_zip" autocomplete="off"class="form-control" required="required"value="<?php echo $row["residential_zip"];?>">
                        </div>

                        <div class="form-group col-3 ">
                            <label for="residential_tel_no">Telephone NO.</label>
              		        <input type="text" name="residential_tel_no" id="residential_tel_no" class="form-control" value="<?php echo $row["residential_tel_no"];?>">
                        </div>
                    </div>

                    <div class="row">
              			<div class="form-group col-7">
                            <label for="permanent_address">Permanent Address</label>
              				<input type="text" name="permanent_address" id="permanent_address" class="form-control" required="required" value="<?php echo $row["permanent_address"];?>">
              			</div>

              			<div class="form-group col-2 ">
                            <label for="permanent_zip">Zip Code</label>
              				<input type="text" name="permanent_zip" id="permanent_zip" class="form-control" required="required" value="<?php echo $row["permanent_zip"];?>">
              			</div>

              			<div class="form-group col-3 " >
                        	<label for="permanent_tel_no">Telephone NO.</label>
              				<input type="text" name="permanent_tel_no" id="permanent_tel_no" class="form-control" value="<?php echo $row["permanent_tel_no"];?>">
              			</div>
					</div>

                    <div class="row">
              			<div class="form-group col-4" >
                        	<label for="citizenship">Citizenship</label>
              					<input type="text" name="citizenship" id="citizenship" class="form-control" required="required" value="<?php echo $row["citizenship"];?>">
              			</div>

              			<div class="form-group col-4" >
                        	<label for="religion">Religion</label>
              				<input type="text" name="religion" id="religion" class="form-control" value="<?php echo $row["religion"];?>">
              			</div>

              			<div class="form-group col-4" >
                        	<label for="civil_status">Civil Status</label>
                         	<select name="civil_status" class="form-control" required="required" >
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
							<input type="text" name="sss_no" id="sss_no" class="form-control" required="required" value="<?php echo $row["sss_no"];?>">
              			</div>

              			<div class="form-group col-3" >
							<label for="tin">TIN</label>
              				<input type="text" name="tin" id="tin" class="form-control" required="required" value="<?php echo $row["tin"];?>">
              			</div>

              			<div class="form-group col-3" >
							<label for="philhealth_no ">PHILHEALTH NO.</label>
							<input type="text" name="philhealth_no" id="philhealth_no" class="form-control" required="required" value="<?php echo $row["philhealth_no"];?>">
              			</div>

              			<div class="form-group col-3" >
							<label for="pagibig_id_no">PAG-IBIG ID NO.</label>
							<input type="text" name="pagibig_id_no" id="pagibig_id_no" class="form-control" required="required" value="<?php echo $row["pagibig_id_no"];?>">
              			</div>
					</div>

					<div style="text-align: right">
                        <button type="button" onclick="nextForm('personal_info','family_background')"><i class="material-icons" >arrow_forward</i></button>

					</div>
			   </div>
           </div>


           <!-- Start of Family Background -->
           <div class="modal-body" >
           <div class="jumbotron d-none" id="family_background">
               <div>
                   <h1>Family Background</h1><br>


                   <h4><i class="large material-icons" style="font-size:50px;">person</i>Spouse's Name</h4>
                   <div class="row">
                       <div class="form-group col-4">
                           <label for="sfname">First Name</label>
                           <input type="text" name="spouse_first_name" id="sfname" class="form-control"  value="<?php echo $row1["spouse_first_name"];?>">
                       </div>

                       <div class="form-group col-4">
                           <label for="smname">Middle Name</label>
                           <input type="text" name="spouse_middle_name" id="smname" class="form-control"  value="<?php echo $row1["spouse_middle_name"];?>">
                       </div>

                       <div class="form-group col-4">
                           <label for="slname">Last Name</label>
                           <input type="text" name="spouse_last_name" id="slname" class="form-control"  value="<?php echo $row1["spouse_last_name"];?>">
                       </div>
                   </div>

                   <div class="row">
                       <div class="form-group col-2">
                           <label for="occupation">Occupation</label>
                           <input type="text" name="occupation" id="occupation" class="form-control" value="<?php echo $row1["occupation"];?>">
                       </div>

                       <div class="form-group col-4">
                           <label for="employer">Employer</label>
                           <input type="text" name="employer" id="employer" class="form-control"  value="<?php echo $row1["employer"];?>">
                       </div>

                       <div class="form-group col-4">
                           <label for="business_address">Business Address</label>
                           <input type="text" name="business_address" id="business_address" class="form-control" value="<?php echo $row1["business_address"];?>">
                       </div>

                       <div class="form-group col-2">
                           <label for="spouse_tel_no">Telephone NO.</label>
                           <input type="text" name="spouse_tel_no" id="spouse_tel_no" class="form-control" value="<?php echo $row1["spouse_tel_no"];?>">
                       </div>
                   </div>


                   <h4><i class="large material-icons" style="font-size:50px;">person</i>Father's Name</h4>
                   <div class="row">
                       <div class="form-group col-4">

                           <label for="ffname">First Name</label>
                           <input type="text" name="father_first_name" id="ffname" class="form-control" required="required" value="<?php echo $row1["father_first_name"];?>">
                       </div>

                       <div class="form-group col-4">
                           <label for="fmname">Middle Name</label>
                           <input type="text" name="father_middle_name" id="fmname" class="form-control" required="required" value="<?php echo $row1["father_middle_name"];?>">
                       </div>

                       <div class="form-group col-4">
                           <label for="flname">Last Name</label>
                           <input type="text" name="father_last_name" id="flname" class="form-control" required="required" value="<?php echo $row1["father_last_name"];?>">
                       </div>
                   </div>

                   <h4><i class="large material-icons" style="font-size:50px;">person</i>Mother's Maiden Name</h4>
                   <div class="row">
                       <div class="form-group col-4">
                           <label for="mfname">First Name</label>
                           <input type="text" name="mother_first_name" id="mfname" class="form-control" required="required" value="<?php echo $row1["mother_first_name"];?>">
                       </div>

                       <div class="form-group col-4">
                           <label for="mmname">Middle Name</label>
                           <input type="text" name="mother_middle_name" id="mmname" class="form-control" required="required" value="<?php echo $row1["mother_middle_name"];?>">
                       </div>

                       <div class="form-group col-4">
                           <label for="mlname">Last Name</label>
                           <input type="text" name="mother_last_name" id="mlname" class="form-control" required="required" value="<?php echo $row1["mother_last_name"];?>">
                       </div>
                   </div>

                   <h4><i class="large material-icons" style="font-size:50px;">person</i>Child/Children's Information</h4>
                   <div id="child">
                   </div>
                   <div class="row">
                       <div class="form-group col-6">
                           <label for="child_name">Name</label>
                           <input type="text" placeholder="First name M.I. Last name" name="child_name[]" id="child_name" class="form-control">
                       </div>

                       <div class="form-group col-6">
                           <label for="child_birth">Date of Birth</label>
                           <div class="input-group">
                               <input type="date" name="child_birth[]" id="child_birth" class="form-control" >
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
          </div>
       </form>
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
        $(document).ready(function(){
            $("#1st").modal("show");
        });
    </script>
