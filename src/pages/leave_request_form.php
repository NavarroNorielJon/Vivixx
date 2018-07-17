<?php
	include '../utilities/session.php';
	 include '../utilities/check_user_info.php';

	$connect = Connect();
	$stmt= "SELECT * FROM employee_info WHERE user_id='$user_id';";
	$res = mysqli_query($connect,$stmt);
	$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
	$date_hired = $row['date_hired'];
	$today = date("Y-m-d");
    $diff = date_diff(date_create($date_hired),date_create($today))->y;
	if($diff>=1 && $date_hired != ""){
	} else {
		echo "
		<script>
			$(function(){
			});
		</script>";
	}
?>

	<!DOCTYPE html>
	<html>

	<head>
		<title>Vivixx PH | Leave Request</title>
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

	<body style="background-color:#f5f5f0;">
		<div class="wrapper">
			<?php include 'fragments/sidebar.php'; ?>

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
								<input type="text" placeholder="Address" class="form-control text-transform" autocomplete="off" name="contact_address" id="address_leave" required>
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
							<div class="ui calendar" id="start_date">
								<div class="ui input left icon">
									<label for="start_date">Start Date</label>
									<input type="text" id="s_date" name="from" class="form-control date" onkeypress="numberInput(event)" autocomplete="off" required placeholder="yyyy-mm-dd">
								</div>
							</div>
						</div>

						<div class="form-group col">
							<div class="ui calendar" id="end_date">
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
			$(document).ready(function() {
				$('.salary').click(function(e) {
					e.preventDefault();
					$.ajax({
						url: $(this).attr('href'),
						success: function(res) {
							$('#salary_form').html(res);
						}
					});
				});
			});
			$('.mobile').inputmask({
				mask: '+639dd ddd dddd'
			});
			$('.date').inputmask({
				mask: 'dddd-dd-dd'
			});
			$("#s_date").datepicker({
				dateFormat: 'yy-mm-dd',
				minDate: new Date((new Date()).setDate(new Date().getDate() + 20))
			});
			$("#e_date").datepicker({
				dateFormat: 'yy-mm-dd'
			});
			$(function() {
				$("#s_date").datepicker({
					dateFormat: 'yy-mm-dd'
				}).bind("change", function() {
					var min = $(this).val();
					min = $.datepicker.parseDate("yy-mm-dd", min);
					min.setDate(min.getDate() + 1);
					$("#e_date").datepicker("option", "minDate", min);
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
