<?php
	include '../utilities/session.php';
?>

	<!DOCTYPE html>
	<html>

	<head>
		<title>Vivixx</title>
		<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="../style/bootstrap/bootstrap.min.css" media="screen, projection">
		<link type="text/css" rel="stylesheet" href="../style/style.css" media="screen, projection">
		<link rel="stylesheet" href="../style/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../style/form-elements.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="../script/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="../script/bootstrap/bootstrap.min.js"></script>
		<script src="../script/jquery.backstretch.min.js"></script>
		<script src="../script/bootstrap/jasny-bootstrap.js"></script>
		<script src="../script/scripts.js"></script>
	</head>

	<body style="background-color: #e6e6e6;">
		<div class="wrapper">
			<nav class="sidebar">
				<div class="sidebar-header">
					<a class="sidebar-logo" href="home"><img src="../img/Lion.png"></a>
				</div>

				<!-- Sidebar Links -->
				<ul class="list-unstyled components">
					<li>
						<a href="profile.php" class="sidebar-item">
							<i class="material-icons">person</i>
							<?php echo "$first_name"?></a>
						<a href="profile.php" class="icon">
							<i class="material-icons">person</i>
						</a>
					</li>

					<li>
						<a href="home.php" class="sidebar-item">
							<i class="material-icons">home</i>Home</a>
						<a class="icon" href="home.php">
							<i class="material-icons">home</i>
						</a>
					</li>

					<li>
						<a href="notification.php" class="sidebar-item">
							<i class="material-icons">mail</i>Notifications</a>
						<a class="icon" href="notification.php">
							<i class="material-icons">mail</i>
						</a>
					</li>

					<li class="active">
						<a href="#requests" data-toggle="collapse" class="sidebar-item" aria-expanded="false">
							<i class="material-icons">work</i>
							Requests</a>
						<a href="#requests" data-toggle="collapse" class="icon" aria-expanded="false">
							<i class="material-icons">work</i>
						</a>
						<ul class="collapse list-unstyled" id="requests">
							<li class="active">
								<a href="#" class="sidebar-item">Salary Request</a>
							</li>
							<li class="active">
								<a href="leave_request_form" class="sidebar-item">Leave Request</a>
							</li>

							<li class="active">
								<a href="#requests" class="icon">SR</a>
							</li>
							<li class="active">
								<a href="leave_request_form" class="icon">LR</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="about.php" class="sidebar-item">
							<i class="material-icons">info</i>
							About
						</a>
						<a class="icon" href="about.php">
							<i class="material-icons">info</i>
						</a>
					</li>
					<hr>
					<li>
						<a href="../utilities/logout.php" class="sidebar-item logout">
							<i class="material-icons">power_settings_new</i>
							Logout
						</a>
						<a class="icon" href="../utilities/logout.php">
							<i class="material-icons">power_settings_new</i>
						</a>
					</li>
				</ul>
			</nav>

			<div class="leave">
				<form id="leave_form" action="../utilities/leave_request" method="POST">
					<h1 class="text-center leave-header">LEAVE APPLICATION FORM</h1>
					<script>
						$(function() {
							$('#reason1').change(function() {
								$('#others').hide();
								$('#Emergency').hide();
								$('#' + $(this).val()).show();
								if ($('#reason1').val() === "Emergency") {
									$('#emerge').attr('required', 'true');
									$('#other_reason').removeAttr('required');
								} else if ($('#reason1').val() == "others") {
									$('#other_reason').attr('required', 'true');
									$('#emerge').removeAttr('required');
								} else {
									$('#emerge').removeAttr('required');
									$('#other_reason').removeAttr('required');
								}
							});
						});

					</script>
					<div>
						<div>
							<label>Leave Type</label>
							<select class="custom-select form-group" name="type" id="reason1" required>
								<option selected="selected" disabled="disabled">Choose Here:</option>
								<option value="Vacation">Vacation</option>
								<option value="Emergency">Emergency Leave</option>
								<option value="Maternal Leave">Maternity Leave</option>
								<option value="Paternal Leave">Paternity Leave</option>
								<option value="Sick Leave">Sick Leave</option>
								<option value="Sent Home">Sent Home</option>
								<option value="others">Others</option>
							</select>
						</div>
						<div id="others" class="form-group" style='display:none'>
							<label for="other_reason">Reason</label>
							<input type="text" class="form-control" placeholder="Reason" name="others" id="other_reason">
						</div>
						<div id="Emergency" class="form-group" style='display:none'>
							<label>Reason</label>
							<input type="text" class="form-control" placeholder="Reason" name="emer" id="emerge">
						</div>

						<div class="row">
							<div class="form-group col">
								<label for="address_leave">Contact Address during leave</label>
								<input type="text" placeholder="Address" class="form-control text-transform" name="contact_address" id="address_leave" required>
							</div>

							<div class="form-group col">
								<label for="number_leave">Contact Number during leave</label>
								<input type="text" class="form-control mobile" name="contact_number" placeholder="+639XX XXX XXXX" id="number_leave" required>
							</div>
						</div>
					</div>
					<hr>

					<div>
						<h1>Inclusive days applied</h1>

						<div class="row">
							<div class="form-group col">
								<label for="start_date">From</label>
								<input type="date" class="form-control" name="from" required>
							</div>

							<div class="form-group col">
								<label for="end_date">To</label>
								<input type="date" class="form-control" name="to" id="end_date" required>
							</div>
						</div>

						<div style="text-align:right">
							<button class="btn btn-primary">Submit</button>
						</div>

					</div>
				</form>
			</div>
		</div>

		<script>
			$('.mobile').inputmask({
				mask: '+639dd ddd dddd'
			});

		</script>
		<script type="text/javascript" src="../script/jquery.form.min.js"></script>
		<script type="text/javascript" src="../script/jquery.validate.min.js"></script>
		<script type="text/javascript" src="../script/additional-methods.min.js"></script>
		<script type="text/javascript" src="../script/alerts.js"></script>
		<script type="text/javascript" src="../script/popper.min.js"></script>
		<script type="text/javascript" src="../script/sweetalert.min.js"></script>
		<script type="text/javascript" src="../script/ajax.js"></script>
	</body>

	</html>
