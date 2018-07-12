<?php
	include '../utilities/session.php';
	 include '../utilities/check_user_info.php';

	$connect = Connect();
	$sql = "SELECT date_hired FROM employee_info where user_id=$user_id;";
	$result = mysqli_query($connect,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$date_hired = $row['date_hired'];
	$today = date("Y-m-d");
    $diff = date_diff(date_create($date_hired),date_create($today))->y;
	if($diff>=1 && $date_hired != ""){
	} else {
		echo "
		<script>
			swal({
				type: 'error',
				title: 'You are not yet spending 1 year in this company, Sorry.',
				showConfirmButton: true,
				icon:'error',
				timer: 2500
			});
			window.location='/';
		</script>";
	}
?>

	<!DOCTYPE html>
	<html>

	<head>
		<title>Vivixx</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="../style/style.css" media="screen, projection">
		<link type="text/css" rel="stylesheet" href="../style/bootstrap/bootstrap.min.css" media="screen, projection">
		<link type="text/css" rel="stylesheet" href="../style/jquery-ui.css">
		<script type="text/javascript" src="../script/jquery-3.2.1.js"></script>
		<script type="text/javascript" src="../script/bootstrap/bootstrap.min.js"></script>
		<script type="text/javascript" src="../script/jquery-ui.min.js"></script>
		<script type="text/javascript" src="../script/jquery.backstretch.min.js"></script>
		<script type="text/javascript" src="../script/bootstrap/jasny-bootstrap.js"></script>
		<script type="text/javascript" src="../script/scripts.js"></script>


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
					<h1 class="text-center leave-header">Inclusive days applied</h1>

					<div class="row">
						<div class="form-group col">
							<div class="col ui calendar" id="today_date">
								<div class="ui input left icon">
									<label for="start_date">Start Date</label>
									<input type="text" id="today" name="from" class="form-control date" value="<?php echo $today; ?>" autocomplete="off" placeholder="yy-mm-dd">
								</div>
							</div>
						</div>

						<div class="form-group col">
							<div class="col ui calendar" id="start_date">
								<div class="ui input left icon">
									<label for="start_date">Start Date</label>
									<input type="text" id="s_date" name="from" class="form-control date" onkeypress="numberInput(event)" autocomplete="off" required placeholder="yyyy-mm-dd">
								</div>
							</div>
						</div>

						<div class="form-group col">
							<div class="col ui calendar" id="end_date">
								<div class="ui input left icon">
									<label for="end_date">End Date</label>
									<input type="text" id="e_date" name="to" class="form-control date" autocomplete="off" disabled required placeholder="yyyy-mm-dd">
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="form-group col" style="text-align:right">
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
			$('.date').inputmask({
				mask: 'dddd-dd-dd'
			});
			$(function() {
				$("#s_date").datepicker({
					dateFormat: 'yy-mm-dd'
				});
				$(document).ready(function() {
					$("#today").datepicker({
						dateFormat: 'yy-mm-dd'
					}).bind("change", function() {
						var min = $(this).val();
						min = $.datepicker.parseDate("yy-mm-dd", min);
						min.setDate(min.getDate() + 20);
						$("#s_date").datepicker("option", "minDate", min);
					});
				});
				$("#e_date").datepicker({
					dateFormat: 'yy-mm-dd'
				});
				$("#s_date").datepicker({
					dateFormat: 'yy-mm-dd'
				}).bind("change", function() {
					var minValue = $(this).val();
					minValue = $.datepicker.parseDate("yy-mm-dd", minValue);
					minValue.setDate(minValue.getDate() + 1);
					$("#e_date").datepicker("option", "minDate", minValue);
				});


			});
			$(function() {
				$('#s_date').change(function() {
					if ($('#s_date').val() !== "") {
						$('#e_date').removeAttr("disabled");
					} else {
						$('#e_date').attr("disabled", 'true');
					}
				});
				$('#s_date').keyup(function() {
					if ($('#s_date').val() !== "") {
						$('#e_date').removeAttr("disabled");
					} else {
						$('#e_date').attr("disabled", 'true');
					}
				});
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
