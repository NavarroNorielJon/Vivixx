<?php
    include 'utilities/session.php';
?>

<html>
    <head>
        <title>Profile</title>
    </head>
    
    <body>
		<div class="row">
        	<div class="col-3">
				<?php include 'module/sidenav.php'?>
			</div>
			
			<div class="col-9">
				<div class="jumbotron" style="width:100%;">
					<h1>Personal Information</h1>
							<form action="/utilities/upload.php" method="post" enctype="multipart/form-data">
								<div class="input-group" id="profile-image">
								Profile Image
								<input type="file" class="form-control-file" name="image">
								<div class="input-group-appened">
								<input type="submit" value="Upload Image" name="submit">
								</div>
								</div>	
							</form>
					
					<form>
						<div class="row">
							<div class="form-group col-6">
								<label for="first"> First Name</label>
								<input type="text" id="first" class="form-control" value="<?php echo "$user_first";?>" disabled>
							</div>
							<div class="form-group col-6">
								<label for="first"> Last Name</label>
								<input type="text" id="first" class="form-control" value="<?php echo "$user_last";?>" disabled>
							</div>
						</div>
					</form>
					
				</div>
			</div>
		</div>
    </body>
</html>