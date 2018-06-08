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
				<div class="jumbotron" style="background-color: #fac213;">
					<h1>Personal Information</h1>
					<form>
						<div class="form-group">
								<label for="first"> First Name</label>
								<input type="text" id="first" class="form-control" value="<?php echo "$user_first";?>" disabled>
						</div>
					</form>
				</div>
			</div>			
		</div>
    </body>
</html>