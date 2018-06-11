<?php
    include 'utilities/session.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>
    </head>

    <body>
		<div class="row">
        	<div class="col-3">
				<?php include 'module/sidenav.php';?>
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
