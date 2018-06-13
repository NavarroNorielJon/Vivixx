<?php
    include 'utilities/session.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>
        <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="../style/bootstrap/bootstrap.min.css" media="screen, projection">
        <link type="text/css" rel="stylesheet" href="../style/style.css" media="screen, projection">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body style="overflow:hidden">
		<div class="row">
        	<div class="col-3">
				<?php include 'modules/sidenav.php';?>
			</div>

			<div class="col-9">
                <h1 style="margin:2% 2%;">General Information</h1>

                <div class="jumbotron" style="margin-right:8%;">

                    <div class="row">

                        <div class="form-group col-4">
                			<div class="thumbnail"><img src="img/profile-images/lion.png" style="height:50%;width:50%;"></div>
            			</div>

                        <div class="form-group col-4">
                			<label for="first"> Username</label>
                			<input type="text" id="first" class="form-control" value="<?php echo "$username";?>" disabled>
            			</div>

                        <div class="form-group col-4"></div>
                    </div>

                    <div class="row">

        				<div class="form-group col-4">
            				<label for="first"> First Name</label>
            				<input type="text" id="first" class="form-control" value="<?php echo "$first_name";?>" disabled>
        				</div>

                        <div class="form-group col-4">
            				<label for="first"> Middle Name</label>
            				<input type="text" id="first" class="form-control" value="<?php echo "$middle_name";?>" disabled>
        				</div>

        				<div class="form-group col-4">
            				<label for="first"> Last Name</label>
            				<input type="text" id="first" class="form-control" value="<?php echo "$last_name";?>" disabled>
        				</div>
    				</div>

                    <div class="row">
                        <div class="form-group col-4">
            				<label for="email"> Email</label>
            				<input type="text" id="first" class="form-control" value="<?php echo "$email";?>" disabled>
        				</div>

                        <div class="form-group col-4">
            				<label for="birth_date">Birth Date</label>
            				<input type="text" id="first" class="form-control" value="<?php echo "$birth_date";?>" disabled>
        				</div>

        				<div class="form-group col-4">
            				<label for="contact_number">Contact Number</label>
            				<input type="text" id="first" class="form-control" value="<?php echo "$contact_number";?>" disabled>
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

                </div>
			</div>
		</div>
    </body>
</html>
