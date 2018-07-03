<?php include '../utilities/session.php'; ?>

<!DOCTYPE html>
<html>

<head>
	<title>Vivixx</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
	<link type="text/css" rel="stylesheet" href="../style/bootstrap/bootstrap.min.css">
	<link type="text/css" rel="stylesheet" href="../style/style2.css">
	<script type="text/javascript" src="../script/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../script/bootstrap/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body style="background-color: #e6e6e6;">
	<div class="wrapper">
		<nav id="sidebar">
			<div class="sidebar-header">
				<a class="sidebar-logo" href="home"><img src="../img/Lion.png"></a>
			</div>

			<!-- Sidebar Links -->
			<ul class="list-unstyled components">
				<li>
					<a href="profile.php" class="sidebar-item">
					<i class="material-icons">person</i> <?php echo "$first_name"?></a>
					<a href="profile.php" class="icon"><i class="material-icons">person</i></a>
				</li>

				<li>
					<a href="home.php" class="sidebar-item">
					<i class="material-icons">home</i>Home</a>
					<a class="icon" href="home.php"><i class="material-icons">home</i></a>
				</li>

				<li>
					<a href="notification.php" class="sidebar-item">
					<i class="material-icons">mail</i>Notifications</a>
					<a class="icon" href="notification.php"><i class="material-icons">mail</i></a>
				</li>

				<li class="active">
					<a href="#requests" data-toggle="collapse" class="sidebar-item" aria-expanded="false"><i class="material-icons">work</i> Requests</a>
					<a href="#requests" data-toggle="collapse" class="icon" aria-expanded="false"><i class="material-icons">work</i></a>
					<ul class="collapse list-unstyled" id="requests">
						<li class="active"><a href="#" class="sidebar-item">Salary Request</a></li>
						<li class="active"><a href="leave_request_form" class="sidebar-item">Leave Request</a></li>

						<li class="active"><a href="#requests" class="icon">SR</a></li>
						<li class="active"><a href="leave_request_form" class="icon">LR</a></li>
					</ul>
				</li>
				<li>
					<a href="about.php" class="sidebar-item">
						<i class="material-icons">info</i> About
					</a>
					<a class="icon" href="about.php"><i class="material-icons">info</i></a>
				</li>
				<hr>
				<li>
					<a href="../utilities/logout.php" class="sidebar-item" id="logout">
					<i class="material-icons">power_settings_new</i> Logout
					</a>
					<a class="icon" href="../utilities/logout.php"><i class="material-icons">power_settings_new</i></a>
				</li>
			</ul>
		</nav>

		<div id="leave">
			<form id="leave-form" action="../utilities/leave_request" method="POST">
				<h1 class="text-center">LEAVE APPLICATION FORM</h1>
				<hr>
				<div class="row">
					<div class="form-group col-4">
						<label for="employee_name">Employee</label>
						<input type="text" class="form-control-plaintext" id="employee_name" placeholder="<?php echo $full_name?>" name="employeeName" value="<?php echo $full_name?>" disabled>
					</div>

					<script>
						$(function() {
							$('#department').change(function() {
								$('#orig').hide();
								$('#a').hide();
								$('#ash').hide();
								$('#its').hide();
								$('#nva').hide();
								$('#pe').hide();
								$('#ve').hide();
								$('#va').hide();
								$('#' + $(this).val()).show();
							});
						});
					</script>
					<div class="form-group col-4">
						<label for="department">Department</label>
						<select class="custom-select form-group" name="department" id="department">
								<option selected disabled>Choose your Department</option>
								<option value="a">Administration</option>
								<option value="ash">Administration Support / HR</option>
								<option value="its">IT Support</option>
								<option value="nva">Non-voice Account</option>
								<option value="pe">Phone ESL</option>
								<option value="ve">Video ESL</option>
								<option value="va">Virtual Assistant</option>
							</select>
					</div>

					<div class="form-group col-4" id="orig">
						<label for="position">Position</label>
						<select class="custom-select form-group">
								<option selected disabled>Choose your Position</option>
							</select>
					</div>
					<div class="form-group col" id="a" style='display:none'>
						<label for="position">Position</label>
						<select class="custom-select form-group" name="admin">
								<option selected disabled>Choose your Position</option>
								<option value="HR">HR</option>
								<option value="Company Nurse">Company Nurse</option>
								<option value="COO">COO</option>
							</select>
					</div>

					<div class="form-group col" id="ash" style='display:none'>
						<label for="position">Position</label>
						<select class="custom-select form-group" name="adminsp">
								<option selected disabled value="HR Assistant">HR Assistant</option>
							</select>
					</div>

					<div class="form-group col" id="its" style='display:none'>
						<label for="position">Position</label>
						<select class="custom-select form-group" name="itsupport">
								<option selected disabled value="ICT Support Specialist">ICT Support Specialist</option>

							</select>
					</div>

					<div class="form-group col" id="nva" style='display:none'>
						<label for="position">Position</label>
						<select class="custom-select form-group" name="nonvoice">
								<option selected disabled value="Online English Tutor">Online English Tutor</option>
							</select>
					</div>

					<div class="form-group col" id="pe" style='display:none'>
						<label for="position">Position</label>
						<select class="custom-select form-group" name="phone">
								<option selected disabled value="Online English Tutor">Online English Tutor</option>
							</select>
					</div>

					<div class="form-group col" id="ve" style='display:none'>
						<label for="position">Position</label>
						<select class="custom-select form-group" name="video">
								<option selected disabled value="Online English Tutor">Online English Tutor</option>
							</select>
					</div>

					<div class="form-group col" id="va" style='display:none'>
						<label for="position">Position</label>
						<select class="custom-select form-group" name="virtual">
								<option selected disabled>Choose your Position</option>
								<option value="Indesigner">Indesigner</option>
								<option value="Web Developer">Web Developer</option>
							</select>
					</div>
				</div>

				<div class="row">

					<div class="form-group col">
						<label for="date_hired">Date Hired</label>
						<input type="date" class="form-control" id="date_hired" placeholder="Date Hired" name="date_hired">
					</div>

					<div class="form-group col">
						<label for="date_filed">Date Filed</label>
						<input type="date" class="form-control" id="date_filed" placeholder="date_filed" name="date_filed">
					</div>
				</div>
				<hr>
				<script>
					$(function() {
						$('#reason1').change(function() {
							$('#others').hide();
							$('#' + $(this).val()).show();
						});
					});
				</script>
				<div>
					<div>
						<label>Reason</label>
						<select class="custom-select form-group" name="reason" id="reason1">
							<option selected disabled>Reason for leave:</option>
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
						<label for="other_reason">(Please Specify)</label>
						<input type="text" class="form-control" name="others" id="other_reason">
					</div>

					<div class="row">
						<div class="form-group col">
							<label for="address_leave">Contact Address during leave</label>
							<input type="text" class="form-control" name="contact_address" id="address_leave">
						</div>

						<div class="form-group col">
							<label for="number_leave">Contact Number during leave</label>
							<input type="text" class="form-control" name="contact_number" onkeypress="numberInput(event)" maxlength="11" id="number_leave">
						</div>
					</div>
				</div>
				<hr>

				<div>
					<h1>Inclusive days applied</h1>

					<div class="row">
						<div class="form-group col">
							<label for="start_date">From</label>
							<input type="date" class="form-control" name="from">
						</div>

						<div class="form-group col">
							<label for="end_date">To</label>
							<input type="date" class="form-control" name="to" id="end_date">
						</div>
					</div>

					<div style="text-align:right">
						<button class="btn btn-primary">Submit</button>
					</div>

				</div>
			</form>
		</div>
	</div>

	<script type="text/javascript" src="../script/jquery.form.min.js"></script>
	<script type="text/javascript" src="../script/alerts.js"></script>
	<script type="text/javascript" src="../script/popper.min.js"></script>
	<script type="text/javascript" src="../script/sweetalert.min.js"></script>
	<script type="text/javascript" src="../script/ajax.js"></script>
</body>

</html>