<script>
	$(document).ready(function() {
		$('.signup').click(function(e) {
			e.preventDefault();
			$.ajax({
				url: $(this).attr('href'),
				success: function(res) {
					$('#signup_form').html(res);
				}
			});
		});
	});

</script>
<script src="../../script/jquery.form.min.js"></script>
<script src="../../script/jquery.validate.min.js"></script>
<script src="../../script/additional-methods.min.js"></script>

<?php
    $new_reg = "SELECT user_id, first_name, middle_name, last_name, department,email FROM user_info NATURAL JOIN user natural join employee_info WHERE type='user' and (date_hired is null and employee_status is null and position is null);";
    $res = $connect->query($new_reg);
    $count = mysqli_num_rows($res);

    if($count > 0){
        $new = "(<span style='color:red;'>".$count."</span>)";
    }else{
        $new ="";
    }


    $leave = "SELECT status from leave_req where status='pending';";
    $res1 = $connect->query($leave);
    $count1 = mysqli_num_rows($res1);

    if($count1 > 0){
        $leave = "(<span style='color:red;'>".$count1."</span>)";
    }else{
        $leave ="";
    }
?>

	<nav class="fixed-top navbar navbar-dark navbar-expand-lg  navigation-bar">
		<a href="../accounts/accounts_status" class="navbar-brand">Vivixx</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="#navbar-content" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

		<div class="collapse navbar-collapse" id="navbar-content">
			<ul class="navbar-nav">

				<li>
					<input name='edit' value='signup' style='display: none;'>
					<a href="../fragments/signup" data-target="#signup" class="nav-link signup">Add User</a>
				</li>

				<li id="acc" class="nav-item">
					<a class="nav-link" href="../accounts/accounts_status">Accounts</a>
				</li>

				<li id="an" class="nav-item">
					<a class="nav-link" href="../announcements/announcement">Announcement</a>
				</li>

				<li id="emp" class="nav-item">
					<button onclick="drop()" class="dropbtn">Employees</button>
					<div id="drop" class="dropdown-content">
						<a href="../user_information/user_information">Employees</a>
						<a href="../newly_registered_users/newly_registered">New Registered Employees<?php echo $new?></a>
					</div>
				</li>

				<li id="leave_r" class="nav-item">
					<a class="nav-link" href="../leave_request/leave_requests">Leave Request<?php echo $leave?></a>
				</li>

				<li id="pay" class="nav-item">
					<a class="nav-link" href="../payslip/user_payslip">Payslip</a>
				</li>

				<li id="sum" class="nav-item">
					<a class="nav-link" href="../summary_of_pay/user_summary">Summary of Pay</a>
				</li>

				<li class="nav-item">
					<a class="nav-link logout" href="../utilities/logout">Logout</a>
				</li>

			</ul>
		</div>
	</nav>
	<div id="signup_form"></div>
	<script>
		function drop() {
			document.getElementById("drop").classList.toggle("showbtn");
		}

		// Close the dropdown if the user clicks outside of it
		window.onclick = function(event) {
			if (!event.target.matches('.dropbtn')) {

				var dropdowns = document.getElementsByClassName("dropdown-content");
				var i;
				for (i = 0; i < dropdowns.length; i++) {
					var openDropdown = dropdowns[i];
					if (openDropdown.classList.contains('showbtn')) {
						openDropdown.classList.remove('showbtn');
					}
				}
			}
		}
	</script>
