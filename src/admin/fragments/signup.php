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
				<form id="s_form" action="../fragments/registration.php" method="post">

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
	$.validator.methods.email = function( value, element ) {
       return this.optional( element ) || /[a-zA-Z0-9]+@[a-z]+\.[a-z]{2,}/.test( value );
    };
    jQuery.validator.addMethod("existing_email", function(value, element) {
        let status;
        $.ajax({
            url: '../../utilities/validator.php?email=' + value,
            success: function (data) {
                if (data ==='0') {
                    status = true;
                }else {
                    status = false;
                }
            },
            async: false
        });
        return status;
    }, "Email already exists, Please use another email.");
    $( "#s_form" ).validate({
		errorClass: 'error',
        rules: {
            email: {
                email: true,
                existing_email: true,
            },
            password: {
                required: true,
                minlength: 8,
            },
            confirm_password: {
                equalTo: "#regpass"
            }
        }
    });
    $('#s_form').ajaxForm({
        url: '../fragments/registration.php',
        method: 'post',
        success: function (data) {
			let dat = data;
			$.post({
				url: '../../mailing/registered.php',
				data: {
					username: dat.username,
					email: dat.email,
					password: dat.password
				},
				success: function () {
					swal({
		                type: 'success',
		                title: 'Successfully Registered',
		                // text: "Your username is " + dat.username,
		                icon: 'success',
		                showConfirmButton: true,
		            }).then(function(){
		                swal({
							type: 'success',
			                title: 'Successfully Registered',
			                icon: 'success',
			                showConfirmButton: false,
						});
		            });
				}
			});
        }
    });

</script>
