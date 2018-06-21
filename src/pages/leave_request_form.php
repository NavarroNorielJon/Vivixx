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
					<a href="profile.php" class="sidebar-item">
					<i class="material-icons">home</i>Home</a>
					<a class="icon" href="home.php"><i class="material-icons">home</i></a>
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
					<a href="#" class="sidebar-item">
						<i class="material-icons">info_outline</i> About
					</a>
					<a class="icon"><i class="material-icons">info_outline</i></a>
				</li><hr>
            	<li>
					<a href="../utilities/logout.php"  class="sidebar-item" id="logout">
					<i class="material-icons">power_settings_new</i> Logout
					</a>
					<a class="icon" href="../utilities/logout.php"><i class="material-icons">power_settings_new</i></a>
				</li>
        	</ul>
		</nav>

		<div id="leave">
			<form id="leave_form" action="../utilities/leave_request" method="POST">
				<h1 class="text-center">LEAVE APPLICATION FORM</h1><hr>
					<div class="row">
						<div class="form-group col">
							<label for="employee_name">Employee</label>
							<input type="text" class="form-control-plaintext" id="employee_name" placeholder="<?php echo $full_name?>" name="employeeName" value="<?php echo $full_name?>" disabled>
						</div>

						<div class="form-group col">
							<label for="department">Department</label>
							<select class="custom-select form-group" name="department">
								<option selected disabled>Choose your Department</option>
								<option value="Administration">Administration</option>
								<option value="Administration Support / HR">Administration Support / HR</option>
								<option value="IT Support">IT Support</option>
								<option value="Non-voice Account">Non-voice Account</option>
								<option value="Phone ESL">Phone ESL</option>
								<option value="Video ESL">Video ESL</option>
								<option value="Voice Account">Voice Account</option>
							</select>
						</div>
					</div>

					<div class="row">

						<div class="form-group col">
							<label for="position">Position</label>
							<select class="custom-select form-group" name="position">
								<option selected disabled>Choose your Department</option>
								<option value="Administration">Administration</option>
								<option value="Administration Support / HR">Administration Support / HR</option>
								<option value="IT Support">IT Support</option>
								<option value="Non-voice Account">Non-voice Account</option>
								<option value="Phone ESL">Phone ESL</option>
								<option value="Video ESL">Video ESL</option>
								<option value="Voice Account">Voice Account</option>
							</select>
						</div>

						<div class="form-group col">
							<label for="date_hired">Date Hired</label>
							<input type="date" class="form-control" id="date_hired" placeholder="Date Hired" name="date_hired">
						</div>

						<div class="form-group col">
							<label for="date_filed">Date Filed</label>
							<input type="date" class="form-control" id="date_filed" placeholder="date_filed" name="date_filed">
						</div>
					</div><hr>
				<script>
					$(function() {
						$('#reason1').change(function(){
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
				</div><hr>

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
	<script type="text/javascript" src="../script/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="../script/sweetalert.min.js"></script>
	<script type="text/javascript" src="../script/ajax.js"></script>
</body>
