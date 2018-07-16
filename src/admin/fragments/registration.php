<?php

?>


<div class="modal fade signup-modal" id="signup" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content signup-content">
			<div class="modal-header signup-header">
				<div class="row">
					<div class="col-2">
						<img src="../../img/Lion.png" alt="register-logo" class="signup-logo">
					</div>

					<div class="col-10">
						<h1 class="signup-h1">Registration Form</h1>
					</div>
				</div>
			</div>


			<div class="modal-body signup-body">
				<form id="signup_form" action="utilities/registration.php" method="post">

					<div class="row form-group">
						<div class=" col-sm-12 col-md-12 col-lg-12 col-xl-12">
							<label for="fname">First Name</label>
							<input type="text" name="first_name" id="fname" autocomplete="off" class="form-control text-transform" placeholder="First Name" required="required">
						</div>

						<div class=" col-sm-12 col-md-12 col-lg-12 col-xl-12">
							<label for="mname">Middle Name</label>
							<input type="text" name="middle_name" id="mname" autocomplete="off" class="form-control text-transform" placeholder="Middle Name (Optional)">
						</div>

						<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
							<label for="lname">Last Name</label>
							<input type="text" name="last_name" id="lname" autocomplete="off" class="form-control text-transform" placeholder="Last Name" required="required">
						</div>

						<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
							<label for="email">Email</label>
							<input type="text" name="email" id="email" autocomplete="off" class="form-control" placeholder="E-mail Address" required="required">
						</div>

						<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
							<label for="regpass">Password</label>
							<input type="password" name="password" id="regpass" class="form-control" placeholder="Password" required="required">
						</div>

						<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
							<label for="cpassword">Confirm Password</label>
							<input type="password" name="confirm_password" id="cpassword" class="form-control" placeholder="Confirm Password" required="required">
						</div>
					</div>

					<div style="text-align: right;">
						<button type="submit" class="btn btn-primary" id="button1">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<script>
    $(document).ready(function(){
        $("#signup").modal("show");
    });
</script>
