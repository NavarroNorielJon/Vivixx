<?php
    ini_set('post_max_size', '64M');
    ini_set('upload_max_filesize', '64M');
    include '../../utilities/session.php';
    $connect = Connect();
    $user_id = $_GET["user_id"];
    $personal_info = "SELECT * FROM user_info where user_id=$user_id;";
    $background = "SELECT * FROM user_background where user_id=$user_id;";
    $child = "SELECT * FROM user_offspring where user_id=$user_id ;";
    $education ="SELECT * FROM user_educ where user_id=$user_id;";
    $emergency = "SELECT * FROM emergency_info_sheet where user_id=$user_id;";
    $relatives = "SELECT * FROM relatives where r_id=$user_id;";
    $housemates = "SELECT * FROM housemates where h_id=$user_id;";
    $employee_info = "SELECT * FROM employee_info where user_id=$user_id;";

    $result1 = mysqli_query($connect,$personal_info);
    $result2 = mysqli_query($connect,$background);
    $result3 = mysqli_query($connect,$child);
    $result4 = mysqli_query($connect,$education);
    $result5 = mysqli_query($connect,$emergency);
    $result6 = mysqli_query($connect,$housemates);
    $result7 = mysqli_query($connect,$relatives);
    $result8 = mysqli_query($connect,$employee_info);

    $row1 = $result1->fetch_assoc();
    $row2 = $result2->fetch_assoc();
    $row4 = $result4->fetch_assoc();
    $row5 = $result5->fetch_assoc();
    $row8 = $result8->fetch_assoc();

    $height = explode("'",$row1['height']);
    $coordinates = explode("|",$row5['coordinates']);
?>
	<!DOCTYPE html>
	<html>

	<head>
		<title>Vivixx Ph</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="../../style/bootstrap/bootstrap.min.css" media="screen, projection">
		<link type="text/css" rel="stylesheet" href="../style/style.css" media="screen, projection">
		<link rel="stylesheet" href="../../style/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../../style/form-elements.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="../../script/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="../../script/bootstrap/bootstrap.min.js"></script>
		<script src="../../script/jquery.backstretch.min.js"></script>
		<script src="../../script/bootstrap/jasny-bootstrap.js"></script>
		<script src="../../script/scripts.js"></script>
		<link type="text/css" rel="stylesheet" href="../../leaflet/leaflet.css">
		<script src="../../leaflet/leaflet.js"></script>
		<link rel="stylesheet" href="../../leaflet/leaflet.css" />
		<script src="../../leaflet/leaflet-src.js"></script>
		<script src="../../leaflet/esri-leaflet-debug.js"></script>
		<link rel="stylesheet" href="../../leaflet/esri-leaflet-geocoder.css">
		<script src="../../leaflet/esri-leaflet-geocoder-debug.js"></script>

		<!--scripts-->
	</head>

	<body>
		<div class="wrapper">
			<?php include '../fragments/navbar.php'; ?>

			<div class="view-information-container">
				<div role="form" action="update_info" method="post" class="f1">
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
						<form id="personal" action="update_personal" method="post" enctype="multipart/form-data">
							<input type="hidden" name="userid1" value="<?php echo $user_id ?>" />
							<h2>Step 1: Personal Information</h2>
							<div class="row">
								<div class="form-group col-4">
									<?php
                                    if ($row1['prof_image'] !== null) {
                                        echo "<img src='data:image/jpg;base64,". $row1['prof_image'] . "' style='height:2in;width:2in;'>";
                                        echo "<br>";
                                    } else {
                                        echo "No Profile Image";
                                        echo "<br>";

                                    }
                                    ?>
										<label for="prof_image">Profile Image</label>
										<input type="file" name="prof_image" id="pro" />
								</div>

								<div class="form-group col-4">
									<?php
                                    if ($row1['signature'] !== null) {
                                        echo "<img src='data:image/jpg;base64,". $row1['signature'] . "' style='height:2in;width:2in;'>";
                                        echo "<br>";
                                    } else {
                                        echo "No Signature";
                                        echo "<br>";

                                    }
                                    ?>
										<label for="prof_image">Signature</label>
										<input type="file" name="signature" id="sig" />
								</div>
							</div>

							<div class="row">
								<div class="form-group col">
									<label>First Name</label>
									<input type="text" name="first_name" id="fname" class="form-control-plaintext" value="<?php echo $row1['first_name'];?>" placeholder="First Name">
								</div>

								<div class="form-group col">
									<label>Middle Name</label>
									<input type="text" name="middle_name" id="mname" class="form-control-plaintext" value="<?php echo $row1['middle_name'];?>" placeholder="Middle Name">
								</div>

								<div class="form-group col-4">
									<label>Last Name</label>
									<input type="text" name="last_name" id="lname" class="form-control-plaintext" value="<?php echo $row1['last_name'];?>" placeholder="Last Name">
								</div>
							</div>

							<div class="row">
								<div class="form-group col">
									<label>Birthdate</label>
									<input type="date" name="birth_date" id="bdate" class="form-control" value="<?php echo $row1['birth_date'];?>">
								</div>

								<div class="form-group col">
									<label>Place of Birth</label>
									<input type="text" name="birth_place" autocomplete="off" placeholder="address" id="pbirth" class="form-control text-transform" value="<?php echo $row1['birth_place'];?>">
								</div>

								<div class="form-group col">
									<label for="contact">Mobile Number</label>
									<input type="tel" name="contact_number" autocomplete="off" placeholder="+639XX XXX XXXX" class="form-control mobile" id="contact" value="<?php echo $row1['contact_number'];?>">

									<div id="validContact"></div>
								</div>
							</div>

							<div class="row">
								<div class="form-group col">
									<label for="facebook">Facebook Link</label>
									<input type="text" name="facebook" id="facebook" placeholder="Facebook Name" class="form-control" autocomplete="off" value="<?php echo $row1['facebook_link'];?>">
								</div>
							</div>

							<div class="row">
								<script>
									$(function() {
										$('#gender').change(function() {
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
									<select name="gender" id="gender" class="form-control">
                                        <option selected="selected" value="None" ><?php echo $row1["gender"]?></option>
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
									<div class="input-group">
                                        <input type="text" name="ft" id="ft" class="form-control" onkeypress="numberInput(event)" maxlength="2" autocomplete="off" placeholder="(ft.)" value="<?php echo $height[0]; ?>">
                                        <input type="text" name="in" id="in" class="form-control" autocomplete="off" placeholder="(in.)" value="<?php echo $height[1]; ?>">

									</div>
								</div>

								<div class="form-group col">
									<label for="weight">Weight</label>
									<input type="text" name="weight" id="weight" class="form-control" onkeypress="numberInput(event)" autocomplete="off" maxlength="3" placeholder="(kg.)" value="<?php echo $row1['weight'];?>">
								</div>

								<div class="form-group col">
									<label for="blood">Blood Type</label>
									<select name="blood" class="form-control">
                                        <option selected="selected" value="None"><?php echo $row1["blood_type"]?></option>
                                        <option value="O">O</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="AB">AB</option>
                                    </select>
								</div>
							</div>

							<div class="row">
								<div class="form-group col-5">
									<label for="residential_address">Residential Address</label>
									<input type="text" name="residential_address" id="residential_address" autocomplete="off" placeholder="address" class="form-control text-transform" value="<?php echo $row1['residential_address'];?>">
								</div>

								<div class="form-group col-2">
									<label for="residential_zip">Zip Code</label>
									<input type="text" name="residential_zip" class="form-control zip" id="residential_zip" placeholder="XXXX" autocomplete="off" value="<?php echo $row1['residential_zip'];?>">
								</div>
								<div class="form-group col-3">
									<label>Area Code</label>
									<select name="res_area_code" class="form-control" id="res_area_code" required="required">
                                        <option selected="selected" value="None"><?php  echo explode("-",$row1['residential_tel_no'])[0]?></option>
                                        <optgroup label="Luzon">
                                            <option value="74">Abra (74)</option>
                                            <option value="52">Albay (52)</option>
                                            <option value="42">Aurora (42)</option>
                                            <option value="47">Bataan (47)</option>
                                            <option value="78">Batanes (78)</option>
                                            <option value="43">Batangas (43)</option>
                                            <option value="74">Benguet (74)</option>
                                            <option value="44">Bulacan (44)</option>
                                            <option value="78">Cagayan Valley (78)</option>
                                            <option value="54">Camarines Norte/Sur (54)</option>
                                            <option value="52">Catanduanes (52)</option>
                                            <option value="46">Cavite Province (46)</option>
                                            <option value="74">Ifugao Province (74)</option>
                                            <option value="77">Ilocos Norte/Sur (77)</option>
                                            <option value="78">Isabela Province(78)</option>
                                            <option value="74">Kalinga-Apayao (74)</option>
                                            <option value="49">Laguna (49)</option>
                                            <option value="72">La Union (72)</option>
                                            <option value="42">Marinduque (42)</option>
                                            <option value="43">Mindoro Occidental/Oriental (43)</option>
                                            <option value="74">Mountain Province (74)</option>
                                            <option value="44">Nueva Ecija/Viscaya (44)</option>
                                            <option value="48">Palawan (48)</option>
                                            <option value="45">Pampanga (45)</option>
                                            <option value="75">Pangasinan (75)</option>
                                            <option value="42">Quezon Province (42)</option>
                                            <option value="78">Quirino Province (78)</option>
                                            <option value="2">Rizal Province (2)</option>
                                            <option value="56">Sorsogon Province (56)</option>
                                            <option value="45">Tarlac (45)</option>
                                            <option value="47">Zambales (47)</option>
                                        </optgroup>

                                        <optgroup label="Visayas">
                                            <option value="36">Aklan (36)</option>
                                            <option value="36">Antique (36)</option>
                                            <option value="53">Biliran (53)</option>
                                            <option value="38">Bohol (38)</option>
                                            <option value="36">Capiz (36)</option>
                                            <option value="32">Cebu Province (32)</option>
                                            <option value="33">Guimaras (33)</option>
                                            <option value="33">Iloilo Province (33)</option>
                                            <option value="53">Leyte (53)</option>
                                            <option value="56">Masbate Province (56)</option>
                                            <option value="88">Misamis Occidental and Oriental (88)</option>
                                            <option value="34">Negros Occidental Occidental (34)</option>
                                            <option value="35">Negros Occidental Oriental (35)</option>
                                            <option value="42">Romblon (42)</option>
                                            <option value="55">Eastern Samar (55)</option>
                                            <option value="55">Northern Samar(55)</option>
                                            <option value="55">Western Samar (55)</option>
                                            <option value="35">Siquijor (35)</option>
                                        </optgroup>

                                        <optgroup label="Mindanao">
                                            <option value="85">Agusan (85)</option>
                                            <option value="62">Basilan (62)</option>
                                            <option value="88">Bukidnon (88)</option>
                                            <option value="88">Camiguin (88)</option>
                                            <option value="84">Davao del Norte (84)</option>
                                            <option value="82">Davao del Sur (82)</option>
                                            <option value="87">Davao Oriental (87)</option>
                                            <option value="63">Lanao del Norte (63)</option>
                                            <option value="64">Maguindanao (64)</option>
                                            <option value="64">North Cotobato (64)</option>
                                            <option value="65">North Cotobato (65)</option>
                                            <option value="83">Sarangani (83)</option>
                                            <option value="83">South Cotobato (83)</option>
                                            <option value="64">Sultan Kudarat (64)</option>
                                            <option value="86">Surigao (86)</option>
                                            <option value="68">Tawi Tawi (68)</option>
                                            <option value="65">Zamboanga (65)</option>
                                        </optgroup>
                                    </select>
								</div>
								<div class="form-group col-2">
									<label for="residential_tel_no">Telephone NO.</label>
									<input type="tel" name="residential_tel_no" id="residential_tel_no" autocomplete="off" placeholder="XXX-XXXX" class="form-control telephone" value="<?php echo explode(" - ",$row1['residential_tel_no'])[1]; echo explode("- ",$row1['residential_tel_no'])[2];?>">
								</div>
							</div>

							<div class="row">
								<div class="form-group col-5">
									<label for="permanent_address">Permanent Address</label>
									<input type="text" name="permanent_address" id="permanent_address" autocomplete="off" placeholder="address" class="form-control text-transform" value="<?php echo $row1['permanent_address'];?>">
								</div>

								<div class="form-group col-2">
									<label for="permanent_zip">Zip Code</label>
									<input type="text" name="permanent_zip" id="permanent_zip" autocomplete="off" placeholder="XXXX" class="form-control zip" value="<?php echo $row1['permanent_zip'];?>">
								</div>

								<div class="form-group col-3">
									<label>Area Code</label>
									<select name="per_area_code" class="form-control" id="per_area_code" required="required">
                                        <option selected="selected" value="None"><?php  echo explode("-",$row1['permanent_tel_no'])[0]?></option>
                                        <optgroup label="Luzon">
                                            <option value="74">Abra (74)</option>
                                            <option value="52">Albay (52)</option>
                                            <option value="42">Aurora (42)</option>
                                            <option value="47">Bataan (47)</option>
                                            <option value="78">Batanes (78)</option>
                                            <option value="43">Batangas (43)</option>
                                            <option value="74">Benguet (74)</option>
                                            <option value="44">Bulacan (44)</option>
                                            <option value="78">Cagayan Valley (78)</option>
                                            <option value="54">Camarines Norte/Sur (54)</option>
                                            <option value="52">Catanduanes (52)</option>
                                            <option value="46">Cavite Province (46)</option>
                                            <option value="74">Ifugao Province (74)</option>
                                            <option value="77">Ilocos Norte/Sur (77)</option>
                                            <option value="78">Isabela Province(78)</option>
                                            <option value="74">Kalinga-Apayao (74)</option>
                                            <option value="49">Laguna (49)</option>
                                            <option value="72">La Union (72)</option>
                                            <option value="42">Marinduque (42)</option>
                                            <option value="43">Mindoro Occidental/Oriental (43)</option>
                                            <option value="74">Mountain Province (74)</option>
                                            <option value="44">Nueva Ecija/Viscaya (44)</option>
                                            <option value="48">Palawan (48)</option>
                                            <option value="45">Pampanga (45)</option>
                                            <option value="75">Pangasinan (75)</option>
                                            <option value="42">Quezon Province (42)</option>
                                            <option value="78">Quirino Province (78)</option>
                                            <option value="2">Rizal Province (2)</option>
                                            <option value="56">Sorsogon Province (56)</option>
                                            <option value="45">Tarlac (45)</option>
                                            <option value="47">Zambales (47)</option>
                                        </optgroup>

                                        <optgroup label="Visayas">
                                            <option value="36">Aklan (36)</option>
                                            <option value="36">Antique (36)</option>
                                            <option value="53">Biliran (53)</option>
                                            <option value="38">Bohol (38)</option>
                                            <option value="36">Capiz (36)</option>
                                            <option value="32">Cebu Province (32)</option>
                                            <option value="33">Guimaras (33)</option>
                                            <option value="33">Iloilo Province (33)</option>
                                            <option value="53">Leyte (53)</option>
                                            <option value="56">Masbate Province (56)</option>
                                            <option value="88">Misamis Occidental and Oriental (88)</option>
                                            <option value="34">Negros Occidental Occidental (34)</option>
                                            <option value="35">Negros Occidental Oriental (35)</option>
                                            <option value="42">Romblon (42)</option>
                                            <option value="55">Eastern Samar (55)</option>
                                            <option value="55">Northern Samar(55)</option>
                                            <option value="55">Western Samar (55)</option>
                                            <option value="35">Siquijor (35)</option>

                                        </optgroup>

                                        <optgroup label="Mindanao">
                                            <option value="85">Agusan (85)</option>
                                            <option value="62">Basilan (62)</option>
                                            <option value="88">Bukidnon (88)</option>
                                            <option value="88">Camiguin (88)</option>
                                            <option value="84">Davao del Norte (84)</option>
                                            <option value="82">Davao del Sur (82)</option>
                                            <option value="87">Davao Oriental (87)</option>
                                            <option value="63">Lanao del Norte (63)</option>
                                            <option value="64">Maguindanao (64)</option>
                                            <option value="64">North Cotobato (64)</option>
                                            <option value="65">North Cotobato (65)</option>
                                            <option value="83">Sarangani (83)</option>
                                            <option value="83">South Cotobato (83)</option>
                                            <option value="64">Sultan Kudarat (64)</option>
                                            <option value="86">Surigao (86)</option>
                                            <option value="68">Tawi Tawi (68)</option>
                                            <option value="65">Zamboanga (65)</option>
                                        </optgroup>
                                    </select>
								</div>

								<div class="form-group col-2">
									<label for="permanent_tel_no">Telephone NO.</label>
									<input type="tel" name="permanent_tel_no" id="permanent_tel_no" autocomplete="off" placeholder="XXX-XXXX" class="form-control telephone" value="<?php echo explode(" - ",$row1['permanent_tel_no'])[1]; echo explode("- ",$row1['permanent_tel_no'])[2];?>">
								</div>
							</div>

							<div class="row">
								<div class="form-group col-6">
									<label for="citizenship">Citizenship</label>
									<input type="text" name="citizenship" id="citizenship" onkeypress="alphabetInput(event)" autocomplete="off" placeholder="Citizenship" class="form-control text-transform" value="<?php echo $row1['citizenship'];?>">
								</div>

								<script>
									$(function() {
										$('#civil_status').change(function() {
											$('#Others').hide();
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
									<select name="civil_status" id="civil_status" class="form-control">
                                        <option selected="selected" value="None"><?php echo $row1["civil_status"]?></option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Widowed">Widowed</option>
                                        <option value="Annulled">Annulled</option>
                                        <option value="Separated">Separated</option>
                                        <option value="Others">Others</option>
                                    </select>
								</div>

								<div id='Others' style='display:none' class="form-group col-4">
									<label for="other_civil">(Please Specify)</label>
									<input id="oth" class="form-control" placeholder="" name="other_civil">
								</div>
							</div>

							<div class="row">
								<div class="form-group col">
									<label for="sss_no">SSS NO.</label>
									<input type="text" name="sss_no" id="sss_no" placeholder="XX-XXXXXXX-X" autocomplete="off" class="form-control" value="<?php echo $row1['sss_no'];?>">
								</div>

								<div class="form-group col">
									<label for="tin">TIN</label>
									<input type="text" name="tin" id="tin" placeholder="XXX-XXX-XXX-XXX" autocomplete="off" class="form-control" value="<?php echo $row1['tin'];?>">
								</div>

								<div class="form-group col">
									<label for="philhealth_no ">PHILHEALTH NO.</label>
									<input type="text" name="philhealth_no" id="philhealth_no" placeholder="XX-XXXXXXXXX-X" autocomplete="off" class="form-control" value="<?php echo $row1['philhealth_no'];?>">
								</div>

								<div class="form-group col">
									<label for="pagibig_id_no">PAG-IBIG ID NO.</label>
									<input type="text" name="pagibig_id_no" id="pagibig_id_no" placeholder="XXXX-XXXX-XXXX" autocomplete="off" class="form-control" value="<?php echo $row1['pagibig_id_no'];?>">
								</div>
							</div>

							<div class="f1-buttons">
								<button type="submit" class="btn pages btn-next">Next</button>
								<button type="submit" class="btn pages btn-primary submit">Submit</button>
							</div>
						</form>
					</fieldset>

					<fieldset>
						<form id="family" action="update_family" method="post">
							<input type="hidden" name="userid2" value="<?php echo $user_id ?>" />
							<h2>Step 2: Family Background</h2>
							<h5 id="sample">Father's Name</h5>
							<div class="row">
								<div class="form-group col">
									<label for="ffname">First Name</label>
									<input type="text" name="father_first_name" placeholder="first name" onkeypress="alphabetInput(event)" id="ffname" class="form-control text-transform" autocomplete="off" value="<?php echo $row2['father_first_name'];?>">
								</div>

								<div class="form-group col">
									<label for="fmname">Middle Name</label>
									<input type="text" name="father_middle_name" placeholder="first name" onkeypress="alphabetInput(event)" id="fmname" class="form-control text-transform" autocomplete="off" value="<?php echo $row2['father_middle_name'];?>">
								</div>

								<div class="form-group col">
									<label for="flname">Last Name</label>
									<input type="text" name="father_last_name" placeholder="last name" onkeypress="alphabetInput(event)" id="flname" class="form-control text-transform" autocomplete="off" value="<?php echo $row2['father_last_name'];?>">
								</div>
							</div>

							<h5>Mother's Maiden Name</h5>
							<div class="row">
								<div class="form-group col">
									<label for="mfname">First Name</label>
									<input type="text" name="mother_first_name" placeholder="first name" onkeypress="alphabetInput(event)" id="mfname" class="form-control text-transform" autocomplete="off" value="<?php echo $row2['mother_first_name'];?>">
								</div>

								<div class="form-group col">
									<label for="mmname">Middle Name</label>
									<input type="text" name="mother_middle_name" placeholder="middle name" onkeypress="alphabetInput(event)" id="mmname" class="form-control text-transform" autocomplete="off" value="<?php echo $row2['mother_middle_name'];?>">
								</div>

								<div class="form-group col">
									<label for="mlname">Last Name</label>
									<input type="text" name="mother_last_name" placeholder="last name" onkeypress="alphabetInput(event)" id="mlname" class="form-control text-transform" autocomplete="off" value="<?php echo $row2['mother_last_name'];?>">
								</div>
							</div>
							<hr>

							<h5>Spouse's Name</h5>


							<div class="row">
								<div class="form-group col">
									<label for="sfname">First Name</label>
									<input type="text" name="spouse_first_name" placeholder="first name" onkeypress="alphabetInput(event)" id="sfname" class="form-control text-transform" autocomplete="off" value="<?php echo $row2['spouse_first_name'];?>">
								</div>

								<div class="form-group col">
									<label for="smname">Middle Name</label>
									<input type="text" name="spouse_middle_name" placeholder="middle name" onkeypress="alphabetInput(event)" id="smname" class="form-control text-transform" autocomplete="off" value="<?php echo $row2['spouse_middle_name'];?>">
								</div>

								<div class="form-group col">
									<label for="slname">Last Name</label>
									<input type="text" name="spouse_last_name" placeholder="last name" onkeypress="alphabetInput(event)" id="slname" class="form-control text-transform" autocomplete="off" value="<?php echo $row2['spouse_last_name'];?>">
								</div>
							</div>

							<div class="row">
								<div class="form-group col-5">
									<label for="occupation">Occupation</label>
									<input type="text" name="occupation" id="occupation" placeholder="occupation" value="<?php echo $row2['occupation'];?>" onkeypress="alphabetInput(event)" class="form-control text-transform" autocomplete="off">
								</div>

								<div class="form-group col-5">
									<label for="employer">Employer</label>
									<input type="text" name="employer" id="employer" placeholder="employer" value="<?php echo $row2['employer'];?>" class="form-control text-transform" autocomplete="off">
								</div>

							</div>
							<div class="row">
								<div class="form-group col">
									<label for="business_address">Business Address</label>
									<input type="text" name="business_address" id="business_address" placeholder="business address" value="<?php echo $row2['business_address'];?>" class="form-control text-transform" autocomplete="off">
								</div>

								<div class="form-group col-3">
									<label>Area Code</label>
									<select name="sp_area_code" class="form-control" id="sp_area_code">
                                        <option selected="selected" value="None"><?php if($row2['spouse_tel_no'] !== null){
                                            echo explode("-", $row2['spouse_tel_no'])[0];}else{echo "None";} ?></option>
                                        <optgroup label="Luzon">
                                            <option value="74">Abra (74)</option>
                                            <option value="52">Albay (52)</option>
                                            <option value="42">Aurora (42)</option>
                                            <option value="47">Bataan (47)</option>
                                            <option value="78">Batanes (78)</option>
                                            <option value="43">Batangas (43)</option>
                                            <option value="74">Benguet (74)</option>
                                            <option value="44">Bulacan (44)</option>
                                            <option value="78">Cagayan Valley (78)</option>
                                            <option value="54">Camarines Norte/Sur (54)</option>
                                            <option value="52">Catanduanes (52)</option>
                                            <option value="46">Cavite Province (46)</option>
                                            <option value="74">Ifugao Province (74)</option>
                                            <option value="77">Ilocos Norte/Sur (77)</option>
                                            <option value="78">Isabela Province(78)</option>
                                            <option value="74">Kalinga-Apayao (74)</option>
                                            <option value="49">Laguna (49)</option>
                                            <option value="72">La Union (72)</option>
                                            <option value="42">Marinduque (42)</option>
                                            <option value="43">Mindoro Occidental/Oriental (43)</option>
                                            <option value="74">Mountain Province (74)</option>
                                            <option value="44">Nueva Ecija/Viscaya (44)</option>
                                            <option value="48">Palawan (48)</option>
                                            <option value="45">Pampanga (45)</option>
                                            <option value="75">Pangasinan (75)</option>
                                            <option value="42">Quezon Province (42)</option>
                                            <option value="78">Quirino Province (78)</option>
                                            <option value="2">Rizal Province (2)</option>
                                            <option value="56">Sorsogon Province (56)</option>
                                            <option value="45">Tarlac (45)</option>
                                            <option value="47">Zambales (47)</option>
                                        </optgroup>

                                        <optgroup label="Visayas">
                                            <option value="36">Aklan (36)</option>
                                            <option value="36">Antique (36)</option>
                                            <option value="53">Biliran (53)</option>
                                            <option value="38">Bohol (38)</option>
                                            <option value="36">Capiz (36)</option>
                                            <option value="32">Cebu Province (32)</option>
                                            <option value="33">Guimaras (33)</option>
                                            <option value="33">Iloilo Province (33)</option>
                                            <option value="53">Leyte (53)</option>
                                            <option value="56">Masbate Province (56)</option>
                                            <option value="88">Misamis Occidental and Oriental (88)</option>
                                            <option value="34">Negros Occidental Occidental (34)</option>
                                            <option value="35">Negros Occidental Oriental (35)</option>
                                            <option value="42">Romblon (42)</option>
                                            <option value="55">Eastern Samar (55)</option>
                                            <option value="55">Northern Samar(55)</option>
                                            <option value="55">Western Samar (55)</option>
                                            <option value="35">Siquijor (35)</option>
                                        </optgroup>

                                        <optgroup label="Mindanao">
                                            <option value="85">Agusan (85)</option>
                                            <option value="62">Basilan (62)</option>
                                            <option value="88">Bukidnon (88)</option>
                                            <option value="88">Camiguin (88)</option>
                                            <option value="84">Davao del Norte (84)</option>
                                            <option value="82">Davao del Sur (82)</option>
                                            <option value="87">Davao Oriental (87)</option>
                                            <option value="63">Lanao del Norte (63)</option>
                                            <option value="64">Maguindanao (64)</option>
                                            <option value="64">North Cotobato (64)</option>
                                            <option value="65">North Cotobato (65)</option>
                                            <option value="83">Sarangani (83)</option>
                                            <option value="83">South Cotobato (83)</option>
                                            <option value="64">Sultan Kudarat (64)</option>
                                            <option value="86">Surigao (86)</option>
                                            <option value="68">Tawi Tawi (68)</option>
                                            <option value="65">Zamboanga (65)</option>
                                        </optgroup>
                                    </select>
								</div>

								<div class="form-group col-3">
									<label for="spouse_tel_no">Telephone NO.</label>
									<input type="tel" name="spouse_tel_no" id="spouse_tel_no" placeholder="XXX-XXXX" value="<?php if ($row2['spouse_tel_no'] !== null ){echo explode(" - ", $row2['spouse_tel_no'])[1];echo explode("- ", $row2['spouse_tel_no'])[2];}else{echo "None ";}?>" autocomplete="off" class="form-control telephone">
								</div>
							</div>

							<h5>Child/Children's Information <button type="button" class="btn btn-info" data-toggle="modal" data-target="#adding">
                              Add Child
                            </button></h5>
							<?php
                                while ($row3 = mysqli_fetch_array($result3)) {
                                    echo '<div class="row">
                                        <div class="form-group col-6">
                                            <label for="child_name">Name</label>
                                            <input type="text" name="child_name[]" value="'.$row3['child_name'].'" class="form-control text-transform" autocomplete="off">
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="child_birth">Date of Birth</label>
                                            <input type="date" name="child_birth[]" value="'.$row3['child_birth_date'].'" class="form-control" autocomplete="off">
                                        </div>
                                    </div>';
                                }
                            ?>

								<div class="f1-buttons">
									<button type="button" class="btn pages btn-previous">Previous</button>
									<button type="submit" class="btn pages btn-primary submit">Submit</button>
									<button type="submit" class="btn pages btn-next">Next</button>
								</div>
						</form>

						<form id="family2" action="add_child" method="post">
							<input type="hidden" name="userid2_5" value="<?php echo $user_id ?>" />
							<div class="modal fade" id="adding" tabindex="-1" role="dialog" aria-labelledby="addingLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document" style="min-width: 130vh; max-width: 130vh">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="addingLabel">Add Child</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
										</div>
										<div class="modal-body">
											<div class="row">
												<div class="form-group col-6">
													<label for="child_name">Name</label>
													<input type="text" placeholder="First name M.I. Last name" onkeypress="alphabetInput(event)" name="add_child_name[]" id="addchild_name" class="form-control text-transform" autocomplete="off">
												</div>

												<div class="form-group col-6">
													<label for="child_birth">Date of Birth</label>
													<div class="input-group">
														<input type="date" name="add_child_birth[]" id="add_child_birth" class="form-control" autocomplete="off">
														<div class="input-group-append">
															<button class="btn btn-success" type="button" onclick="addchild2()">
                                                                <i class="large material-icons">add</i>
                                                            </button>
														</div>
													</div>
												</div>
											</div>
											<div id="child2"></div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" onclick="" data-dismiss="modal">Close</button>
											<button type="submit" id="sub" class="btn btn-primary" disabled="disabled">Add</button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</fieldset>

					<fieldset>
						<form id="educational" action="update_educ" method="post">
							<input type="hidden" name="userid3" value="<?php echo $user_id ?>" />
							<?php
                                $elemname = explode("|",$row4["elementary"])[0];
                                $elemstat = explode("|",$row4["elementary"])[1];
                                $elemyear = explode("|",$row4["elementary"])[2];
                                $secondname = explode("|",$row4["secondary"])[0];
                                $secondstat = explode("|",$row4["secondary"])[1];
                                $secondyear = explode("|",$row4["secondary"])[2];
                                $collegename = explode("|",$row4["college"])[0];
                                $collegestat = explode("|",$row4["college"])[1];
                                $collegeyear = explode("|",$row4["college"])[2];
                                $postname = explode("|",$row4["post_grad"])[0];
                                $poststat = explode("|",$row4["post_grad"])[1];
                                $postyear = explode("|",$row4["post_grad"])[2];

                                if($elemname === "None" && $elemyear === "None" ){
                                    $ename = "None";
                                    $eyear = "None";
                                    $estat = "None";
                                }else{
                                    $ename = $elemname;
                                    $eyear = $elemyear;
                                    $estat = $elemstat;
                                }
                                if($secondname === "None" && $secondyear === "None"){
                                    $sname = "None";
                                    $syear = "None";
                                    $sstat = "None";
                                }else{
                                    $sname = $secondname;
                                    $syear = $secondyear;
                                    $sstat = $secondstat;
                                }
                                if($collegename === "None" && $collegeyear === "None"){
                                    $cname = "None";
                                    $cyear = "None";
                                    $cstat = "None";
                                }else{
                                    $cname = $collegename;
                                    $cyear = $collegeyear;
                                    $cstat = $collegestat;
                                }
                                if($postname === "None" && $postyear === "None"){
                                    $pname = "None";
                                    $pyear = "None";
                                    $pstat = "None";
                                }else{
                                    $pname = $postname;
                                    $pyear = $postyear;
                                    $pstat = $poststat;
                                }
                            ?>
								<h2>Step 3: Educational Background</h2>
								<h5>Elementary</h5>
								<div class="row">
									<div class="form-group col">
										<label for="school_name">Name of School</label>
										<input type="text" name="elem_school_name" id="elem_school_name" onkeypress="alphabetInput(event)" class="form-control text-transform" autocomplete="off" value="<?php echo $ename?>">
									</div>
									<script>
										$(function() {
											$('#option1').change(function() {
												$('#g1').hide();
												$('#u1').hide();
												$('#<?php echo $estat?>').hide();
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
                                        <?php
                                            if($estat == "Graduate"){
                                                echo '
                                                <option value="None">None</option>
                                                <option selected value="g1">'.$estat.'</option>
                                                <option value="u1">Undergraduate</option>
                                                ';
                                            } elseif($estat == "Undergraduate"){
                                                echo '
                                                <option value="None">None</option>
                                                <option value="g1">Graduate</option>
                                                <option selected value="u1">'.$estat.'</option>
                                                ';
                                            } else {
                                                echo '
                                                <option selected value="'.$estat.'">'.$estat.'</option>
                                                <option value="g1">Graduate</option>
                                                <option value="u1">Undergraduate</option>
                                                ';
                                            }
                                         ?>
                                    </select>
									</div>

									<?php
                                        if ($estat == "Graduate") {
                                            echo "
                                                <div class='form-group col' id='g1'>
                                                    <label for='yr_grad'>Year Graduated</label>
                                                    <input type='text' name='elem_old_yr' id='elem_old_yr' placeholder='Ex. 1995-96' value='".$eyear."' class='form-control gradyear' autocomplete='off'>
                                                </div>
                                                ";
                                        } elseif ($estat == "Undergraduate") {
                                            echo "
                                                <div class='form-group col' id='u1'>
                                                    <label for='yr_grad'>Highest Level</label>
                                                    <select name='elem_old_level' id='elem_old_level' class='form-control'>
                                                        <option value='".$eyear."'>".$eyear."</option>
                                                        <option value='None'>None</option>
                                                        <option value='Grade 1'>Grade 1</option>
                                                        <option value='Grade 2'>Grade 2</option>
                                                        <option value='Grade 3'>Grade 3</option>
                                                        <option value='Grade 4'>Grade 4</option>
                                                        <option value='Grade 5'>Grade 5</option>
                                                        <option value='Grade 6'>Grade 6</option>
                                                    </select>
                                                </div>
                                                ";
                                        }
                                     ?>

										<div class="form-group col" id="g1" style="display:none">
											<label for="yr_grad">Year Graduated</label>
											<input type="text" name="elem_yr_grad" id="elem_yr_grad" placeholder="Ex. 1995-96" class="form-control gradyear" autocomplete="off">
										</div>

										<div class="form-group col" id="u1" style="display:none">
											<label for="high_level">Highest Level</label>
											<select name="elem_high_level" id="elem_high_level" class="form-control">
                                        <option selected="selected" value="None">None</option>
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
										<input type="text" name="sec_school_name" id="sec_school_name" onkeypress="alphabetInput(event)" class="form-control text-transform" autocomplete="off" value="<?php echo $sname?>">
									</div>
									<script>
										$(function() {
											$('#option2').change(function() {
												$('#g2').hide();
												$('#u2').hide();
												$('#<?php echo $sstat?>').hide();
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
                                        <?php
                                            if($sstat == "Graduate"){
                                                echo '
                                                <option value="None">None</option>
                                                <option selected value="g2">'.$sstat.'</option>
                                                <option value="u2">Undergraduate</option>
                                                ';
                                            } elseif($sstat == "Undergraduate"){
                                                echo '
                                                <option value="None">None</option>
                                                <option value="g2">Graduate</option>
                                                <option selected value="u2">'.$sstat.'</option>
                                                ';
                                            } else {
                                                echo '
                                                <option selected value="'.$sstat.'">'.$sstat.'</option>
                                                <option value="g2">Graduate</option>
                                                <option value="u2">Undergraduate</option>
                                                ';
                                            }
                                         ?>
                                    </select>
									</div>

									<?php
                                        if ($sstat == "Graduate") {
                                            echo "
                                                <div class='form-group col' id='g2'>
                                                    <label for='yr_grad'>Year Graduated</label>
                                                    <input type='text' name='sec_old_yr' id='sec_old_yr' placeholder='Ex. 1995-96' value='".$syear."' class='form-control gradyear' autocomplete='off'>
                                                </div>
                                                ";
                                        } elseif ($sstat == "Undergraduate") {
                                            echo "
                                                <div class='form-group col' id='u2'>
                                                    <label for='yr_grad'>Highest Level</label>
                                                    <select name='sec_old_level' id='sec_old_level' class='form-control'>
                                                        <option selected='selected' value='".$syear."'>".$syear."</option>
                                                        <option value='None'>None</option>
                                                        <option value='1st Year'>1st Year</option>
                                                        <option value='2nd Year'>2nd Year</option>
                                                        <option value='3rd Year'>3rd Year</option>
                                                        <option value='4th Year'>4th Year</option>
                                                        <option value='Grade 7'>Grade 7</option>
                                                        <option value='Grade 8'>Grade 8</option>
                                                        <option value='Grade 9'>Grade 9</option>
                                                        <option value='Grade 10'>Grade 10</option>
                                                        <option value='Grade 11'>Grade 11</option>
                                                        <option value='Grade 12'>Grade 12</option>
                                                    </select>
                                                </div>
                                                ";
                                        }
                                     ?>

										<div class="form-group col" id="g2" style="display:none">
											<label for="yr_grad">Year Graduated</label>
											<input type="text" name="sec_yr_grad" id="sec_yr_grad" placeholder="Ex. 1995-96" class="form-control gradyear" autocomplete="off">
										</div>

										<div class="form-group col" id="u2" style="display:none">
											<label for="high_level">Highest Level</label>
											<select name='sec_high_level' id='sec_high_level' class='form-control'>
                                        <option value='None'>None</option>
                                        <option value='1st Year'>1st Year</option>
                                        <option value='2nd Year'>2nd Year</option>
                                        <option value='3rd Year'>3rd Year</option>
                                        <option value='4th Year'>4th Year</option>
                                        <option value='Grade 7'>Grade 7</option>
                                        <option value='Grade 8'>Grade 8</option>
                                        <option value='Grade 9'>Grade 9</option>
                                        <option value='Grade 10'>Grade 10</option>
                                        <option value='Grade 11'>Grade 11</option>
                                        <option value='Grade 12'>Grade 12</option>
                                    </select>
										</div>

								</div>

								<h5>College</h5>
								<div class="row">
									<div class="form-group col">
										<label for="school_name">Name of School</label>
										<input type="text" name="col_school_name" id="col_school_name" onkeypress="alphabetInput(event)" class="form-control text-transform" autocomplete="off" value="<?php echo $cname?>">
									</div>

									<script>
										$(function() {
											$('#option3').change(function() {
												$('#g3').hide();
												$('#u3').hide();
												$('#<?php echo $cstat?>').hide();
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
                                        <?php
                                            if($cstat == "Graduate"){
                                                echo '
                                                <option value="None">None</option>
                                                <option selected value="g3">'.$cstat.'</option>
                                                <option value="u3">Undergraduate</option>
                                                ';
                                            } elseif($cstat == "Undergraduate"){
                                                echo '
                                                <option value="None">None</option>
                                                <option value="g3">Graduate</option>
                                                <option selected value="u3">'.$cstat.'</option>
                                                ';
                                            } else {
                                                echo '
                                                <option selected value="'.$cstat.'">'.$cstat.'</option>
                                                <option value="g3">Graduate</option>
                                                <option value="u3">Undergraduate</option>
                                                ';
                                            }
                                         ?>
                                    </select>
									</div>

									<?php
                                        if ($cstat == "Graduate") {
                                            echo "
                                                <div class='form-group col' id='g3'>
                                                    <label for='yr_grad'>Year Graduated</label>
                                                    <input type='text' name='col_old_yr' id='col_old_yr' placeholder='Ex. 1995-96' value='".$cyear."' class='form-control gradyear' autocomplete='off'>
                                                </div>
                                                ";
                                        } elseif ($cstat == "Undergraduate") {
                                            echo "
                                                <div class='form-group col' id='u3'>
                                                    <label for='yr_grad'>Highest Level</label>
                                                    <select name='col_old_level' id='col_old_level' class='form-control'>
                                                        <option selected='selected' value='".$cyear."'>".$cyear."</option>
                                                        <option value='None'>None</option>
                                                        <option value='1st Year'>1st Year</option>
                                                        <option value='2nd Year'>2nd Year</option>
                                                        <option value='3rd Year'>3rd Year</option>
                                                        <option value='4th Year'>4th Year</option>
                                                        <option value='5th Year'>5th Year</option>
                                                    </select>
                                                </div>
                                                ";
                                        }
                                     ?>

										<div class="form-group col" id="g3" style="display:none">
											<label for="yr_grad">Year Graduated</label>
											<input type="text" name="col_yr_grad" id="col_yr_grad" placeholder="Ex. 1995-96" class="form-control gradyear" autocomplete="off">
										</div>

										<div class="form-group col" id="u3" style="display:none">
											<label for="high_level">Highest Level</label>
											<select name="col_high_level" id="col_high_level" class="form-control">
                                        <option selected="selected" value="None">None</option>
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
										<input type="text" name="pos_school_name" id="pos_school_name" onkeypress="alphabetInput(event)" class="form-control text-transform" autocomplete="off" value="<?php echo $pname?>">
									</div>

									<script>
										$(function() {
											$('#option4').change(function() {
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
                                        <?php
                                            if($pstat == "Graduate"){
                                                echo '
                                                <option value="None">None</option>
                                                <option selected value="g4">'.$pstat.'</option>
                                                <option value="u4">Undergraduate</option>
                                                ';
                                            } elseif($pstat == "Undergraduate"){
                                                echo '
                                                <option value="None">None</option>
                                                <option value="g4">Graduate</option>
                                                <option selected value="u4">'.$pstat.'</option>
                                                ';
                                            } else {
                                                echo '
                                                <option selected value="'.$pstat.'">'.$pstat.'</option>
                                                <option value="g4">Graduate</option>
                                                <option value="u4">Undergraduate</option>
                                                ';
                                            }
                                         ?>
                                    </select>
									</div>

									<?php
                                    if ($pstat == "Graduate") {
                                        echo "
                                            <div class='form-group col' id='g4'>
                                                <label for='yr_grad'>Year Graduated</label>
                                                <input type='text' name='post_old_yr' id='post_old_yr' placeholder='Ex. 1995-96' value='".$pyear."' class='form-control gradyear' autocomplete='off'>
                                            </div>
                                            ";
                                    } elseif ($pstat == "Undergraduate") {
                                        echo "
                                            <div class='form-group col' id='u4'>
                                                <label for='yr_grad'>Highest Level</label>
                                                <select name='pos_old_level' id='pos_old_level' class='form-control'>
                                                    <option selected='selected' value='".$pyear."'>".$pyear."</option>
                                                    <option value='None'>None</option>
                                                    <option value='1st Year'>1st Year</option>
                                                    <option value='2nd Year'>2nd Year</option>
                                                    <option value='3rd Year'>3rd Year</option>
                                                    <option value='4th Year'>4th Year</option>
                                                    <option value='Grade 7'>Grade 7</option>
                                                    <option value='Grade 8'>Grade 8</option>
                                                    <option value='Grade 9'>Grade 9</option>
                                                    <option value='Grade 10'>Grade 10</option>
                                                    <option value='Grade 11'>Grade 11</option>
                                                    <option value='Grade 12'>Grade 12</option>
                                                </select>
                                            </div>
                                            ";
                                    }
                                 ?>



										<div class="form-group col" id="g4" style="display:none">
											<label for="yr_grad">Year Graduated</label>
											<input type="text" name="pos_yr_grad" id="pos_yr_grad" placeholder="Ex. 1995-96" class="form-control gradyear" autocomplete="off">
										</div>

										<div class="form-group col" id="u4" style="display:none">
											<label for="high_level">Highest Level</label>
											<select name='pos_high_level' id='pos_high_level' class='form-control'>
                                        <option value='None'>None</option>
                                        <option value='1st Year'>1st Year</option>
                                        <option value='2nd Year'>2nd Year</option>
                                        <option value='3rd Year'>3rd Year</option>
                                        <option value='4th Year'>4th Year</option>
                                        <option value='Grade 7'>Grade 7</option>
                                        <option value='Grade 8'>Grade 8</option>
                                        <option value='Grade 9'>Grade 9</option>
                                        <option value='Grade 10'>Grade 10</option>
                                        <option value='Grade 11'>Grade 11</option>
                                        <option value='Grade 12'>Grade 12</option>
                                    </select>
										</div>

								</div>
								<div class="f1-buttons">
									<button type="button" class="btn pages btn-previous">Previous</button>
									<button type="submit" class="btn pages btn-primary submit">Submit</button>
									<button type="submit" class="btn pages btn-next">Next</button>
								</div>
						</form>
					</fieldset>

					<fieldset>
						<form id="emergency" action="update_emergency" method="post">
							<input type="hidden" name="userid4" value="<?php echo $user_id ?>" />
							<h2>Step 4: Emergency Information Sheet</h2>
							<h5>Main City Address</h5>
							<div>
								<div id="mapid"></div>
								<input type="text" id="lat" name="lat" value="<?php echo $coordinates[0];?>" class="d-none" hidden>
								<input type="text" id="lng" name="lng" value="<?php echo $coordinates[1];?>" class="d-none" hidden>
								<div class="row">
									<div class="form-group col">
										<label>
                                            <h6>Main address</h6>
                                        </label>
										<input type="text" id="main_address" placeholder="main address" class="form-control text-transform" name="main_address" value="<?php echo $row5['main_address'];?>">
									</div>
								</div>
								<br>
								<super>(Your alternate address when you are not at Main City Address)</super>
								<div class="row">
									<div class="form-group col">
										<label for="secondary_add">
                                            <h6>Secondary City Address</h6>
                                        </label>
										<input type="text" name="secondary_add" class="form-control text-transform" placeholder="secondary address" value="<?php if ($row5['secondary_address'] !== " ") {echo $row5['secondary_address'];}?>">
									</div>

									<div class="form-group col">
										<label>
                                            <h6>Provincial/Permanent Address</h6>
                                        </label>
										<input type="text" name="provincial_add" placeholder="provincial address" class="form-control text-transform" value="<?php echo $row5['provincial_address'];?>">
									</div>
								</div>
							</div>
							<hr>
							<h6>Your Housemates</h6>
							<?php
                                $c = 0;
                                while ($row6 = mysqli_fetch_array($result6)) {
                                    if ($row6['h_relationship'] != null) {
                                        echo "<div class='row'>
                                            <div class='form-group col'>
                                                <label for='hname'>Name of Housemate</label>
                                                <input type='text' name='hname[]' id='hname' value='".$row6['h_name']."' placeholder='name' onkeypress='alphabetInput(event)' class='form-control text-transform' autocomplete='off'>
                                            </div>

                                            <div class='form-group col'>
                                                <label for='rel'>Relationship</label>
                                                <select class='custom-select form-group' name='hrel[]' id='hrel'>
                                                    <option selected='selected' value='".$row6['h_relationship']."'>".$row6['h_relationship']."</option>
                                                    <option value='Family'>Family</option>
                                                    <option value='Friend'>Friend</option>
                                                    <option value='Acquaintances'>Acquaintances</option>
                                                    <option value='Romantic Relationship'>Romantic Relationship</option>
                                                </select>
                                            </div>

                                            <div class='form-group col'>
                                                <label for='mnumber1'>Mobile Number</label>
                                                <input type='tel' name='hnumber[]' id='mnumber' value='".$row6['h_number']."' placeholder='+639XX XXX XXXX' class='form-control mobile' autocomplete='off'>
                                            </div>
                                        </div>";
                                    } else {
                                        echo "<div class='row'>
                                            <div class='form-group col'>
                                                <label for='hname'>Name of Housemate</label>
                                                <input type='text' name='hname[]' id='hname' value='".$row6['h_name']."' placeholder='name' onkeypress='alphabetInput(event)' class='form-control text-transform' autocomplete='off'>
                                            </div>

                                            <div class='form-group col'>
                                                <label for='rel'>Relationship</label>
                                                <select class='custom-select form-group' name='hrel[]' id='hrel'>
                                                    <option selected='selected' value='".$row6['h_relationship']."'>None</option>
                                                    <option value='Family'>Family</option>
                                                    <option value='Friend'>Friend</option>
                                                    <option value='Acquaintances'>Acquaintances</option>
                                                    <option value='Romantic Relationship'>Romantic Relationship</option>
                                                </select>
                                            </div>

                                            <div class='form-group col'>
                                                <label for='mnumber1'>Mobile Number</label>
                                                <input type='tel' name='hnumber[]' id='mnumber' value='".$row6['h_number']."' placeholder='+639XX XXX XXXX' class='form-control mobile' autocomplete='off'>
                                            </div>
                                        </div>";
                                    }


                                }
                             ?>

								<hr>
								<h6>Your Closest Living Relatives</h6>
								<?php
                                while ($row7 = mysqli_fetch_array($result7)) {
                                    if ($row7['r_relationship'] != null) {
                                        echo "<div class='row'>
                                            <div class='form-group col'>
                                                <label for='hname'>Name of relative</label>
                                                <input type='text' name='rname[]' id='rname' value='".$row7['r_name']."' placeholder='name' onkeypress='alphabetInput(event)' class='form-control text-transform' autocomplete='off'>
                                            </div>

                                            <div class='form-group col'>
                                                <label for='rel'>Relationship</label>
                                                <select class='custom-select form-group' name='rrel[]' id='rrel'>
                                                    <option selected='selected' value='".$row7['r_relationship']."'>".$row7['r_relationship']."</option>
                                                    <option value='Family'>Family</option>
                                                    <option value='Friend'>Friend</option>
                                                    <option value='Acquaintances'>Acquaintances</option>
                                                    <option value='Romantic Relationship'>Romantic Relationship</option>
                                                </select>
                                            </div>

                                            <div class='form-group col'>
                                                <label for='rmnumber1'>Mobile Number</label>
                                                <input type='tel' name='rnumber[]' id='rmnumber' value='".$row7['r_number']."' placeholder='+639XX XXX XXXX' class='form-control mobile' autocomplete='off'>
                                            </div>
                                        </div>
                                        ";
                                    } else {
                                        echo "<div class='row'>
                                            <div class='form-group col'>
                                                <label for='hname'>Name of relative</label>
                                                <input type='text' name='rname[]' id='rname' value='".$row7['r_name']."' placeholder='name' onkeypress='alphabetInput(event)' class='form-control text-transform' autocomplete='off'>
                                            </div>

                                            <div class='form-group col'>
                                                <label for='rel'>Relationship</label>
                                                <select class='custom-select form-group' name='rrel[]' id='rrel'>
                                                    <option selected='selected' value='".$row7['r_relationship']."'>None</option>
                                                    <option value='Family'>Family</option>
                                                    <option value='Friend'>Friend</option>
                                                    <option value='Acquaintances'>Acquaintances</option>
                                                    <option value='Romantic Relationship'>Romantic Relationship</option>
                                                </select>
                                            </div>

                                            <div class='form-group col'>
                                                <label for='rmnumber1'>Mobile Number</label>
                                                <input type='tel' name='rnumber[]' id='rmnumber' value='".$row7['r_number']."' placeholder='+639XX XXX XXXX' class='form-control mobile' autocomplete='off'>
                                            </div>
                                        </div>
                                        ";
                                    }
                                }
                             ?>
									<?php
                            if ($row5['answer'] === "No") {
                                $answer = $row5['answer'];
                                $reason = null;
                            } else {
                                $answer = explode("|",$row5['answer'])[0];
                                $reason = explode("|",$row5['answer'])[1];
                            }
                            ?>
										<script>
											$(function() {
												$('#quest').change(function() {
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
										<div class="row">
											<div class="form-group col-4">
												<label for="quest">Do you plan on relocating soon?
                                    </label>
												<select name="yesorno" id="quest" class="form-control">
                                        <option selected="selected" value="none"><?php echo $answer?></option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
											</div>

											<div class="form-group col" id="Yes">
												<label for="answer">If yes, where will be your new address?</label>
												<input type="text" name="answer" id="answer" placeholder="Address" class="form-control text-transform" autocomplete="off" value="<?php echo $reason?>">
											</div>
										</div>

										<div class="f1-buttons">
											<button type="button" class="btn pages btn-previous">Previous</button>
											<button type="submit" class="btn pages btn-primary submit">Submit</button>
											<button type="submit" class="btn pages btn-next">Next</button>
										</div>
						</form>
					</fieldset>

					<fieldset>
						<form id="employee" action="update_employee" method="post">
							<input type="hidden" name="userid5" value="<?php echo $user_id ?>" />
							<h2>Step 5: Employee Info Sheet</h2>
							<div class="row">
								<div class="form-group col">
									<label>Persona</label>
									<input type="text" name="persona" id="persona" placeholder="full name" onkeypress="alphabetInput(event)" class="form-control text-transform" value="<?php echo $row8['persona']?>">
								</div>

								<div class="form-group col">
									<label>Mobile Number</label>
									<input type="tel" name="mobile" id="mobile" placeholder="+639XX XXX XXXX" class="form-control mobile" value="<?php echo $row8['mobile_number']?>">
								</div>

								<div class="form-group col">
									<label>Area Code</label>
									<select name="l_area_code" class="form-control" id="l_area_code">
                                        <option selected="selected" value="none"><?php echo explode("-",$row8['landline'])[0]?></option>
                                        <optgroup label="Luzon">
                                            <option value="74">Abra (74)</option>
                                            <option value="52">Albay (52)</option>
                                            <option value="42">Aurora (42)</option>
                                            <option value="47">Bataan (47)</option>
                                            <option value="78">Batanes (78)</option>
                                            <option value="43">Batangas (43)</option>
                                            <option value="74">Benguet (74)</option>
                                            <option value="44">Bulacan (44)</option>
                                            <option value="78">Cagayan Valley (78)</option>
                                            <option value="54">Camarines Norte/Sur (54)</option>
                                            <option value="52">Catanduanes (52)</option>
                                            <option value="46">Cavite Province (46)</option>
                                            <option value="74">Ifugao Province (74)</option>
                                            <option value="77">Ilocos Norte/Sur (77)</option>
                                            <option value="78">Isabela Province(78)</option>
                                            <option value="74">Kalinga-Apayao (74)</option>
                                            <option value="49">Laguna (49)</option>
                                            <option value="72">La Union (72)</option>
                                            <option value="42">Marinduque (42)</option>
                                            <option value="43">Mindoro Occidental/Oriental (43)</option>
                                            <option value="74">Mountain Province (74)</option>
                                            <option value="44">Nueva Ecija/Viscaya (44)</option>
                                            <option value="48">Palawan (48)</option>
                                            <option value="45">Pampanga (45)</option>
                                            <option value="75">Pangasinan (75)</option>
                                            <option value="42">Quezon Province (42)</option>
                                            <option value="78">Quirino Province (78)</option>
                                            <option value="2">Rizal Province (2)</option>
                                            <option value="56">Sorsogon Province (56)</option>
                                            <option value="45">Tarlac (45)</option>
                                            <option value="47">Zambales (47)</option>
                                        </optgroup>

                                        <optgroup label="Visayas">
                                            <option value="36">Aklan (36)</option>
                                            <option value="36">Antique (36)</option>
                                            <option value="53">Biliran (53)</option>
                                            <option value="38">Bohol (38)</option>
                                            <option value="36">Capiz (36)</option>
                                            <option value="32">Cebu Province (32)</option>
                                            <option value="33">Guimaras (33)</option>
                                            <option value="33">Iloilo Province (33)</option>
                                            <option value="53">Leyte (53)</option>
                                            <option value="56">Masbate Province (56)</option>
                                            <option value="88">Misamis Occidental and Oriental (88)</option>
                                            <option value="34">Negros Occidental Occidental (34)</option>
                                            <option value="35">Negros Occidental Oriental (35)</option>
                                            <option value="42">Romblon (42)</option>
                                            <option value="55">Eastern Samar (55)</option>
                                            <option value="55">Northern Samar(55)</option>
                                            <option value="55">Western Samar (55)</option>
                                            <option value="35">Siquijor (35)</option>
                                        </optgroup>

                                        <optgroup label="Mindanao">
                                            <option value="85">Agusan (85)</option>
                                            <option value="62">Basilan (62)</option>
                                            <option value="88">Bukidnon (88)</option>
                                            <option value="88">Camiguin (88)</option>
                                            <option value="84">Davao del Norte (84)</option>
                                            <option value="82">Davao del Sur (82)</option>
                                            <option value="87">Davao Oriental (87)</option>
                                            <option value="63">Lanao del Norte (63)</option>
                                            <option value="64">Maguindanao (64)</option>
                                            <option value="64">North Cotobato (64)</option>
                                            <option value="65">North Cotobato (65)</option>
                                            <option value="83">Sarangani (83)</option>
                                            <option value="83">South Cotobato (83)</option>
                                            <option value="64">Sultan Kudarat (64)</option>
                                            <option value="86">Surigao (86)</option>
                                            <option value="68">Tawi Tawi (68)</option>
                                            <option value="65">Zamboanga (65)</option>
                                        </optgroup>
                                    </select>
								</div>

								<div class="form-group col">
									<label>Landline Number</label>
									<input type="tel" name="landline" id="landline" placeholder="XXX-XXXX" class="form-control telephone" value="<?php echo explode(" - ",$row8['landline'])[1]?><?php echo explode("- ",$row8['landline'])[2]?>">
								</div>
							</div>
							<div class="row">
								<div class="form-group col">
									<label>Employee Status</label>
									<select class="custom-select form-control" name="employee_status">
                                        <option selected value="<?php echo $row8["landline"]?>"><?php echo $row8["employee_status"]?></option>
                                        <option value="Freelance">Freelance</option>
                                        <option value="Project Based">Project Based</option>
                                        <option value="Probationary">Probationary</option>
                                        <option value="Regular">Regular</option>
                                    </select>
								</div>
								<div class="form-group col">
									<label>Position</label>
									<?php
                                    $main = explode("|",$row8['department'])[0];
                                        if($main === "Voice Account" || $main === "Non-Voice Account"){
                                            echo '
                                            <select class="custom-select form-control" name="position">
                                                <option selected value="'. $row8['position'] .'">'. $row8['position'] .'</option>
                                                <option selected required="require" value="Online English Tutor">Online English Tutor</option>
                                            </select>';
                                        }else if($main === "Administration/HR Support"){
                                            echo '
                                            <select class="custom-select form-control" name="position">
                                            <option selected value="'. $row8['position'] .'">'. $row8['position'] .'</option>
                                            <option selected required="require" value="HR Assistant">HR Assistant</option>
                                            </select>';
                                        }else if($main === "IT Support"){
                                            echo '
                                            <select class="custom-select form-control" name="position">
                                            <option selected value="'. $row8['position'] .'">'. $row8['position'] .'</option>
                                            <option value="ICT Support Specialist">ICT Support Specialist</option>
                                            </select>';
                                        }else if($main === "Virtual Assistant"){
                                            echo '
                                            <select class="custom-select form-control" name="position">
                                            <option selected value="'. $row8['position'] .'">'. $row8['position'] .'</option>
                                            <option value="Indesigner">Indesigner</option>
                                            <option value="Web Developer">Web Developer</option>
                                            </select>';
                                        }else if ($main === "Maintainance") {
                                            echo '
                                            <select class="custom-select form-control" name="position">
                                            <option selected value="'. $row8['position'] .'">'. $row8['position'] .'</option>
                                            <option value="Housekeeping">Housekeeping</option>
                                            <option value="Utilities">Utilities</option>
                                            </select>';
                                        } elseif ($main === "Security") {
                                            echo '
                                            <select class="custom-select form-control" name="position">
                                            <option selected value="'. $row8['position'] .'">'. $row8['position'] .'</option>
                                            <option value="Security">Security</option>
                                            </select>';
                                        }
                                    ?>
								</div>

								<div class="form-group col">
									<label>Date Hired</label>
									<input type="date" name="date_hired" class="form-control" value="<?php echo $row8['date_hired']?>">
								</div>
							</div>

							<?php
                                $department = explode("|",$row8['department']);
                                $account = explode("|",$row8['account']);
                                $i = 0;
                                echo "
                                <div class='row'>
                                    <script>
                                        $(function() {
                                            $('#department').change(function() {
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
                                    <div class='form-group col'>
                                        <label for='department'>Main Department</label>
                                        <select class='custom-select form-group' name='department[]' id='department'>
                                            <option selected='selected' value='".$department[$i]."'>".$department[$i]."</option>
                                            <option value='ash'>Administration/HR Support</option>
                                            <option value='its'>IT Support</option>
                                            <option value='main'>Maintenance</option>
                                            <option value='nva'>Non-voice Account</option>
                                            <option value='sec'>Security</option>
                                            <option value='ve'>Video ESL</option>
                                            <option value='va'>Virtual Assistant</option>
                                            <option value='voa'>Voice Account</option>
                                        </select>
                                    </div>

                                    <div class='form-group col'>
                                        <label for='position'>Main Account</label>
                                        <div class='input-group'>
                                            <select class='custom-select form-group' name='account[]'>
                                                <optgroup id='orig'>
                                                    <option selected='selected' value='".$account[$i]."'>".$account[$i]."</option>
                                                </optgroup>

                                                <optgroup label='Administration/HR Support' id='ash' style='display:none'>
                                                    <option value='HR Assistant'>HR Assistant</option>
                                                    <option value='IDP Staff'>IDP Staff</option>
                                                    <option value='Operations Support'>Operations Support</option>
                                                    <option value='Springboard Staff'>Springboard Staff</option>
                                                </optgroup>

                                                <optgroup label='IT Support' id='its' style='display:none'>
                                                    <option value='ICT Specialist'>ICT Specialist</option>
                                                </optgroup>

                                                <optgroup label='Non-voice Account' id='nva' style='display:none'>
                                                    <option value='April Writing'>April Writing</option>
                                                    <option value='CL/IL'>CL/IL</option>
                                                </optgroup>

                                                <optgroup label='Voice Account' id='voa' style='display:none'>
                                                    <option value='ELANSO'>ELANSO</option>
                                                    <option value='Phone ESL'>Phone ESL</option>
                                                </optgroup>

                                                <optgroup label='Video ESL' id='ve' style='display:none'>
                                                    <option value='First Future'>First Future</option>
                                                    <option value='Key English'>Key English</option>
                                                </optgroup>

                                                <optgroup label='Virtual Assistant' id='va' style='display:none'>
                                                    <option value='Drag and drop'>Drag and drop</option>
                                                    <option value='Job Getter'>Job Getter</option>
                                                </optgroup>

                                                <optgroup label='Security' id='sec' style='display:none'>
                                                    <option value='Security'>Security</option>
                                                </optgroup>

                                                <optgroup label='Maintenance' id='main' style='display:none'>
                                                    <option value='Housekeeping'>Housekeeping</option>
                                                    <option value='Utility'>Utility</option>
                                                </optgroup>
                                            </select>
                                            <div class='input-group-append'>
                                                <button class='btn btn-success' type='button' onclick='addAccount()'>
                                                    <i class='small material-icons'>add</i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                ";
                                for ($i=1; $i <count($department) ; $i++) {
                                    echo "
                                    <div class='row'>
                                        <script>
                                            $(function () {
                                                $('#department".$i."').change(function () {
                                                    $('#orig".$i."').hide();
                                                    $('#ash".$i."').hide();
                                                    $('#its".$i."').hide();
                                                    $('#nva".$i."').hide();
                                                    $('#main".$i."').hide();
                                                    $('#sec".$i."').hide();
                                                    $('#voa".$i."').hide();
                                                    $('#ve".$i."').hide();
                                                    $('#va".$i."').hide();
                                                    $('#' + (
                                                        $(this).val() + ".$i."
                                                    )).show();
                                                });
                                            });
                                        </script>
                                        <div class='form-group col rem".$i."'>
                                            <label for='department'>Additional Department</label>
                                            <select class='custom-select form-group' name='department[]' id='department".$i."'>
                                                <option selected='selected' value='".$department[$i]."'>".$department[$i]."</option>
                                                <option value='ash'>Administration/HR Support</option>
                                                <option value='its'>IT Support</option>
                                                <option value='main'>Maintenance</option>
                                                <option value='nva'>Non-voice Account</option>
                                                <option value='sec'>Security</option>
                                                <option value='ve'>Video ESL</option>
                                                <option value='va'>Virtual Assistant</option>
                                                <option value='voa'>Voice Account</option>
                                            </select>
                                        </div>
                                        <div class='form-group col rem".$i."'>
                                            <label >Additional Account</label>
                                            <div class='input-group'>
                                                <select class='custom-select form-group' name='account[]'>
                                                    <optgroup id='orig".$i."'>
                                                        <option selected='selected' value='".$account[$i]."'>".$account[$i]."</option>
                                                    </optgroup>
                                                    <optgroup label='Administration/HR Support' id='ash".$i."' style='display:none'>
                                                        <option value='HR Assistant'>HR Assistant</option>
                                                        <option value='IDP Staff'>IDP Staff</option>
                                                        <option value='Operations Support'>Operations Support</option>
                                                        <option value='Springboard Staff'>Springboard Staff</option>
                                                    </optgroup>
                                                    <optgroup label='IT Support' id='its".$i."' style='display:none'>
                                                        <option value='ICT Specialist'>ICT Specialist</option>
                                                    </optgroup>
                                                    <optgroup label='Non-voice Account' id='nva".$i."' style='display:none'>
                                                        <option value='April Writing'>April Writing</option>
                                                        <option value='CL/IL'>CL/IL</option>
                                                    </optgroup>
                                                    <optgroup label='Voice Account' id='voa".$i."' style='display:none'>
                                                        <option value='ELANSO'>ELANSO</option>
                                                        <option value='Phone ESL'>Phone ESL</option>
                                                    </optgroup>
                                                    <optgroup label='Video ESL' id='ve".$i."' style='display:none'>
                                                        <option value='First Future'>First Future</option>
                                                        <option value='Key English'>Key English</option>
                                                    </optgroup>
                                                    <optgroup label='Virtual Assistant' id='va".$i."' style='display:none'>
                                                        <option value='Drag and drop'>Drag and drop</option>
                                                        <option value='Job Getter'>Job Getter</option>
                                                    </optgroup>
                                                    <optgroup label='Security' id='sec".$i."' style='display:none'>
                                                        <option value='Security'>Security</option>
                                                    </optgroup>
                                                    <optgroup label='Maintenance' id='main".$i."' style='display:none'>
                                                        <option value='Housekeeping'>Housekeeping</option>
                                                        <option value='Utility'>Utility</option>
                                                    </optgroup>
                                                </select>
                                                <div class='input-group-append'>
                                                    <button class='btn btn-danger' type='button' onclick='removeAcc(".$i.");'>
                                                        <i class='small material-icons'>remove</i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    ";
                                }

                            ?>
								<div id='new_acc'></div>
								<div class="row">
									<div class="form-group col">
										<label>Company Email address</label>
										<input type="text" name="com_email" id="com_email" placeholder="Company Email addres" class="form-control" value="<?php echo $row8['comp_email']?>">
									</div>

									<div class="form-group col">
										<label>Password</label>
										<input type="text" placeholder="Password" name="c_password" id="c_password" class="form-control" value="<?php echo $row8['comp_email_password']?>">
									</div>
								</div>

								<div class="row">
									<div class="form-group col">
										<label>Skype Account</label>
										<input type="text" name="skype" id="skype" placeholder="Skype" class="form-control" value="<?php echo $row8['skype']?>">
									</div>

									<div class="form-group col">
										<label>Password</label>
										<input type="text" placeholder="Password" name="s_password" id="s_password" class="form-control" value="<?php echo $row8['skype_password']?>">
									</div>
								</div>

								<div class="row">
									<div class="form-group col">
										<label>QQ Number</label>
										<input type="text" name="qq_num" id="qq_num" placeholder="QQ Number" class="form-control" value="<?php echo $row8['qq_number']?>">
									</div>

									<div class="form-group col">
										<label>Password</label>
										<input type="text" placeholder="Password" name="qq_password" id="qq_password" class="form-control" value="<?php echo $row8['qq_password']?>">
									</div>
								</div>
								<div class="f1-buttons">
									<button type="button" class="btn pages btn-previous">Previous</button>
									<button type="submit" class="btn pages btn-primary submit">Submit</button>
								</div>
						</form>
					</fieldset>
				</div>
			</div>
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
			$('.zip').inputmask({
				mask: 'dddd'
			});
			$('.mobile').inputmask({
				mask: '+639dd ddd dddd'
			});
			$('.telephone').inputmask({
				mask: 'ddd-dddd'
			});
			$('.height').inputmask({
				mask: 'dd'
			});
			$('.gradyear').inputmask({
				mask: 'dddd-dd'
			});

		</script>
		<script>
			var map = L.map('mapid').setView([
				16.4134367, 120.5858916
			], 15);
			map.on('dragging', function() {
				setTimeout(function() {
					map.invalidateSize();
				}, 400);
			});

			L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
				attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
			}).addTo(map);
			map.doubleClickZoom.disable();
			var marker = new L.Marker([
				16.4134367, 120.5858916
			], {
				draggable: true
			}).addTo(map);
			document.getElementById('lat').value = marker.getLatLng().lat;
			document.getElementById('lng').value = marker.getLatLng().lng;
			marker.on('drag', function() {
				setTimeout(function() {
					map.invalidateSize();
				}, 400);
				document.getElementById('lat').value = marker.getLatLng().lat;
				document.getElementById('lng').value = marker.getLatLng().lng;
			});
			map.on('dblclick', function(event) {
				setTimeout(function() {
					map.invalidateSize();
				}, 400);
				marker.setLatLng(event.latlng);
				marker.addTo(map);
				document.getElementById('lat').value = marker.getLatLng().lat;
				document.getElementById('lng').value = marker.getLatLng().lng;
			});
			marker.bindPopup("Click the map to reload.").openPopup();
			var searchControl = L.esri.Geocoding.geosearch().addTo(map);
			map.on('click', function() {
				setTimeout(function() {
					map.invalidateSize();
				}, 400);
			});

		</script>
		<script>
			function myFunction() {
				document.getElementById("myDropdown").classList.toggle("showbtn");
			}

		</script>

		<script type="text/javascript" src="../../script/jquery.form.min.js"></script>
		<script type="text/javascript" src="../../script/jquery.validate.min.js"></script>
		<script type="text/javascript" src="../../script/additional-methods.min.js"></script>
		<script type="text/javascript" src="../../script/alerts.js"></script>
		<script type="text/javascript" src="../../script/popper.min.js"></script>
		<script type="text/javascript" src="../../script/sweetalert.min.js"></script>
		<script type="text/javascript" src="../../script/ajax.js"></script>
		<script>
			$(document).change(function() {
				if ($('#add_child_name').val() != "" && $('.addchild').val() != "" && $('#add_child_birth').val() != "") {
					$('#sub').attr("disabled", false);
				} else {
					$('#sub').attr("disabled", true);
				}
				$(document).keyup(function() {
					if ($('#add_child_name').val() != "" && $('.addchild').val() != "" && $('#add_child_birth').val() != "") {
						$('#sub').attr("disabled", false);
					} else {
						$('#sub').attr("disabled", true);
					}
				});
			});
			$('#sub').click(function() {
				swal({
					type: 'success',
					title: 'Successfully Added',
					icon: 'success',
					showConfirmButton: false
				}).then(function() {
					window.location = '/admin/user_information/view_information.php?user_id=<?php echo $user_id;?>';
				});
			});
			$('.submit').click(function() {
				swal({
					type: 'success',
					title: 'Successfully Done!',
					icon: 'success',
					showConfirmButton: false
				}).then(function() {
					window.location = '/admin/user_information/view_information.php?user_id=<?php echo $user_id;?>';
				});
			});
			$('#personal').ajaxForm({
				url: 'update_personal.php',
				method: 'post'
			});
			$('#family').ajaxForm({
				url: 'update_family.php',
				method: 'post'
			});
			$('#family2').ajaxForm({
				url: 'add_child.php',
				method: 'post'
			});
			$('#educational').ajaxForm({
				url: 'update_educ.php',
				method: 'post'
			});
			$('#emergency').ajaxForm({
				url: 'update_emergency.php',
				method: 'post'
			});
			$('#employee').ajaxForm({
				url: 'update_employee.php',
				method: 'post'
			});
			$('#emp').addClass('active');

		</script>
	</body>

	</html>
