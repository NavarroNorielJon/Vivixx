<?php
    include '../utilities/session.php';
 	include '../utilities/check_user_info.php';

    $today = date("Y-m-d");
    $age = date_diff(date_create($birth_date),date_create($today))->y;

    if ($prof_image === null) {
        $image = "No Profile Picture";
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
							<input type="text" id="name" class="form-control-plaintext name" value="<?php echo " $full_name ";?>" disabled>
						</div>
						<div class="form-group col-4 number">
							<label for="contact_number">Contact Number</label>
							<input type="text" id="contact_number" class="form-control-plaintext" value="<?php echo " $contact_number ";?>" disabled>
						</div>

						<div class="col-4">
							<div style="height:250px;width:250px;border: 2px solid black;">
								<?php echo $image;?>
							</div>
						</div>
					</div>

					<div class="row birth_information">
						<div class="form-group col-4">
							<label for="birth_place"> Birth Place</label>
							<input type="text" id="first" class="form-control-plaintext" value="<?php echo " $birth_place ";?>" disabled>
						</div>

						<div class="form-group col-4">
							<label for="birth_date">Birth Date</label>
							<input type="text" id="first" class="form-control-plaintext" value="<?php echo " $birth_date ";?>" disabled>
						</div>

						<div class="form-group col-4">
							<label for="age">Age</label>
							<input type="text" id="age" class="form-control-plaintext" value="<?php echo $age;?>" disabled>
						</div>
					</div>

					<div class="form-group col-4 city-address">
						<label for="city_address">City Address</label>
						<input type="text" id="city_address" class="form-control-plaintext" value="<?php echo " $residential_address ";?>" disabled>
					</div>

					<div class="form-group col-4 permanent-address">
						<label for="permanent_address">Permanent Address</label>
						<input type="text" id="permanent_address" class="form-control-plaintext" value="<?php echo " $permanent_address ";?>" disabled>
					</div>
				</div>
			</div>
		</div>
        <script>
            $('#profile').addClass('active');
        </script>


	</body>


	<!--
                    <div class="row">
                        <div class="form-group col-4">
            				<label for="birth_place"> Birth Place</label>
            				<input type="text" id="first" class="form-control" value="<?php echo "$birth_place";?>" disabled>
        				</div>
                        <div class="form-group col-4">
            				<label for="birth_date">Birth Date</label>
            				<input type="text" id="first" class="form-control" value="<?php echo "$birth_date";?>" disabled>
        				</div>
                    </div>

                    <div class="row">
                        <div class="form-group col-4">
            				<label for="gender"> Gender</label>
            				<input type="text" id="first" class="form-control" value="<?php if ($gender === 'm') {echo 'Male';} else {echo 'Female';}?>" disabled>
        				</div>
                        <div class="form-group col-4">
            				<label for="height">Height</label>
            				<input type="text" id="first" class="form-control" value="<?php echo "$height";?> ft" disabled>
        				</div>
        				<div class="form-group col-4">
            				<label for="weight">Weight</label>
            				<input type="text" id="first" class="form-control" value="<?php echo "$weight";?> kg" disabled>
        				</div>
                    </div>

                    <div class="row">
                        <div class="form-group col-4" id="off">
            				<label for="offsprint">Offspring</label>
            				<p>
                            <?php
                            $sql = "SELECT child_name FROM user_offspring where user_id='$user_id';";
                            $res = $connect->query($sql);
                            if ($res->num_rows > 0) {
                                while ($row = $res->fetch_assoc()) {
                                    echo $row['child_name']."
                                    \n";
                                }
                            }
                            ?></p>

        				</div>
                    </div>

                </div>
			</div>
		</div>
