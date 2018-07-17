<?php
    include '../utilities/session.php';
 	include '../utilities/check_user_info.php';

    $today = date("Y-m-d");
    $age = date_diff($birth_date,date_create($today))->y;

    if ($prof_image === null) {
        $image = "<br><br><br><br><p style='text-align:center'>No Profile Picture</p>";
    } else {
        $image = "<img src='data:image/jpg;base64,". $prof_image . "' style='height:250px;width:250px;'>";
    }
?>
	<!DOCTYPE html>
	<html>

	<head>
		<title>Vivixx PH | Profile</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
		<link type="text/css" rel="stylesheet" href="../style/bootstrap/bootstrap.min.css">
		<link type="text/css" rel="stylesheet" href="../style/style.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script type="text/javascript" src="../script/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="../script/popper.min.js"></script>
		<script type="text/javascript" src="../script/bootstrap/bootstrap.min.js"></script>
		<script type="text/javascript" src="../script/ajax.js"></script>
	</head>

	<body class="profile">
		<div class="wrapper">
			<?php include 'fragments/sidebar.php';?>


			<div class="container-fluid">
				<div class="profile-header">
					<h1> PERSONAL INFORMATION </h1>
					<hr>
				</div>
				<div class="profile-content">
					<div class="row">
						<div class="form-group col-4">
							<label for="name">Full Name</label>
							<input type="text" id="name" class="form-control-plaintext name" value="<?php echo $full_name;?>" disabled>
						</div>
						<div class="form-group col-4 number">
							<label for="contact_number">Contact Number</label>
							<input type="text" id="contact_number" class="form-control-plaintext" value="<?php echo $contact_number;?>" disabled>
						</div>

						<div class="col-4">
							<div style="height:264px; width:264.5px;border-style: groove; border-width: 7px; border-color: #f5f5f0;">
								<?php echo $image;?>
							</div>
						</div>
					</div>

					<div class="row birth_information">
						<div class="form-group col-4">
							<label for="birth_place"> Birth Place</label>
							<input type="text" id="first" class="form-control-plaintext" value="<?php echo $birth_place;?>" disabled>
						</div>

						<div class="form-group col-4">
							<label for="birth_date">Birth Date</label>
							<input type="text" id="first" class="form-control-plaintext" value="<?php echo $birth_date->format('F d, Y');?>" disabled>
						</div>

						<div class="form-group col-4">
							<label for="age">Age</label>
							<input type="text" id="age" class="form-control-plaintext" value="<?php echo $age;?>" disabled>
						</div>
					</div>

                    <div class="row city-address">
                        <div class="form-group col-4">
    						<label for="residential_address">Residential Address</label>
    						<input type="text" id="residential_address" class="form-control-plaintext" value="<?php echo $residential_address;?>" disabled>
    					</div>
                        <div class="form-group col-4">
    						<label for="residential_zip">Residential Zip</label>
    						<input type="text" id="residential_zip" class="form-control-plaintext" value="<?php echo $residential_zip;?>" disabled>
    					</div>
                        <div class="form-group col-4">
    						<label for="residential_tel_no">Residential Telephone Number</label>
    						<input type="text" id="residential_tel_no" class="form-control-plaintext" value="<?php echo $residential_tel_no;?>" disabled>
    					</div>
                    </div>
                    <div class="row city-address">
                        <div class="form-group col-4 permanent-address">
    						<label for="permanent_address">Permanent Address</label>
    						<input type="text" id="permanent_address" class="form-control-plaintext" value="<?php echo $permanent_address;?>" disabled>
    					</div>
                        <div class="form-group col-4">
    						<label for="permanent_zip">Permanent Zip</label>
    						<input type="text" id="permanent_zip" class="form-control-plaintext" value="<?php echo $permanent_zip;?>" disabled>
    					</div>
                        <div class="form-group col-4">
    						<label for="permanent_tel_no">Residential Telephone Number</label>
    						<input type="text" id="permanent_tel_no" class="form-control-plaintext" value="<?php echo $permanent_tel_no;?>" disabled>
    					</div>
                    </div>
                    <div class="row city-address">
                        <div class="form-group col-4">
            				<label for="gender"> Gender</label>
            				<input type="text" id="gender" class="form-control-plaintext" value="<?php echo $gender?>" disabled>
        				</div>
                        <div class="form-group col-4">
            				<label for="height">Height</label>
            				<input type="text" id="height" class="form-control-plaintext" value="<?php echo $height;?>" disabled>
        				</div>
        				<div class="form-group col-4">
            				<label for="weight">Weight</label>
            				<input type="text" id="weight" class="form-control-plaintext" value="<?php echo $weight;?> kg" disabled>
        				</div>
                    </div>

                    <div class="row">
                        <div class="form-group col-4">
            				<label for="citizenship">Citizenship</label>
            				<input type="text" id="citizenship" class="form-control-plaintext" value="<?php echo $citizenship;?>" disabled>
        				</div>
                        <div class="form-group col-4">
            				<label for="civil_status">Civil Status</label>
            				<input type="text" id="civil_status" class="form-control-plaintext" value="<?php echo $civil_status;?>" disabled>
        				</div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
            				<label for="sss">SSS ID No.</label>
            				<input type="text" id="sss" class="form-control-plaintext" value="<?php echo $sss_no;?>" disabled>
        				</div>
                        <div class="form-group col">
            				<label for="tin">TIN</label>
            				<input type="text" id="tin" class="form-control-plaintext" value="<?php echo $tin;?>" disabled>
        				</div>
                        <div class="form-group col">
            				<label for="philhealth_no">PHILHEALTH ID No.</label>
            				<input type="text" id="philhealth_no" class="form-control-plaintext" value="<?php echo $philhealth_no;?>" disabled>
        				</div>
                        <div class="form-group col">
            				<label for="pagibig_id_no">PAG-IBIG ID No</label>
            				<input type="text" id="pagibig_id_no" class="form-control-plaintext" value="<?php echo $pagibig_id_no;?>" disabled>
        				</div>
                    </div>
				</div>
			</div>
		</div>
		<script>
			$('#profile').addClass('active');

		</script>


	</body>

</html>
