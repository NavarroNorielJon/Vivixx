<?php
    include 'utilities/session.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Vivixx</title>
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
        <link type="text/css" rel="stylesheet" href="style/bootstrap/bootstrap.min.css" media="screen, projection">
        <link type="text/css" rel="stylesheet" href="style/style.css" media="screen, projection">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
		<div class="row">
        	<div class="col-3">
				<?php include 'modules/sidenav.php';?>
			</div>

			<div class="col-9">
                <h1>Personal Information</h1>
                
                <div class="jumbotron" id="personal_info">

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
                        <div></div>
                    </div>
                </div>
			</div>
		</div>
    </body>
</html>
