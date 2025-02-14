<?php
	include '../mis/utilities/session.php';
	include '../mis/utilities/check_user_info.php';
	$query = "SELECT * FROM employee_info WHERE user_id='$user_id';";
	$results = mysqli_query($connect,$query);
	$res = mysqli_fetch_array($results, MYSQLI_ASSOC);
	$hired_date = $res['date_hired'];
	$todate = date("Y-m-d");
    $difference = date_diff(date_create($hired_date),date_create($todate))->y;
	if ($difference<1 && $hired_date == "") {
		echo "
			<script>
				location.href = '/pages/home';
			</script>
		";
	}
?>

	<!DOCTYPE html>
	<html>

	<head>
		<title>Vivixx PH | Leave Request</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="../mis/img/favicon.ico" type="image/x-icon">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="../mis/style/style.css" media="screen, projection">
		<link type="text/css" rel="stylesheet" href="../mis/style/bootstrap/bootstrap.min.css" media="screen, projection">
		<link type="text/css" rel="stylesheet" href="../mis/style/jquery-ui.css">
		<script type="text/javascript" src="../mis/script/jquery-3.2.1.js"></script>
		<script type="text/javascript" src="../mis/script/bootstrap/bootstrap.min.js"></script>
		<script type="text/javascript" src="../mis/script/jquery-ui.min.js"></script>
		<script type="text/javascript" src="../mis/script/jquery.backstretch.min.js"></script>
		<script type="text/javascript" src="../mis/script/bootstrap/jasny-bootstrap.js"></script>
		<script type="text/javascript" src="../mis/script/scripts.js"></script>


	</head>

	<body style="background-color:#f5f5f0;">
		<div class="wrapper">
			<?php include 'fragments/sidebar.php';?>
			<div class="leave">
				<form id="leave_form" action="../mis/utilities/leave_request" method="POST" enctype="multipart/form-data">
					<h1 class="text-center leave-header" style="font-family: rock">LEAVE APPLICATION FORM</h1>
					<script>
						$(function() {
							$('#type').change(function() {
								$('#others').hide();
								$('#attach').hide();
								$('#' + $(this).val()).show();
								if ($('#type').val() === "Emergency") {
									$('#others').show();
									$('#attach').show();
									$('#other_reason').attr('required', 'true');
									$('#attachment').attr('required', 'true');
								} else if ($('#type').val() === "others") {
									$('#attach').show();
									$('#other_reason').attr('required', 'true');
								} else if ($('#type').val() === "Sick Leave") {
									$('#attach').show();
									$('#attachment').attr('required', 'true');
								} else {
									$('#other_reason').removeAttr('required');
									$('#attachment').removeAttr('required');
								}
							});
						});

					</script>
					<div>
						<div>
							<label>Leave Type</label>
							<select class="custom-select form-group" name="type" id="type" required>
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
							<input type="text" class="form-control text-transform" placeholder="Reason" name="reason" id="other_reason">
						</div>
						<div id="attach" class="form-group" style='display:none'>
							<label for="other_reason">Supporting Document</label>
							<input type="file" class="form-control" name="attachment" id="attachment">
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
					<h1 class="text-center leave-header" id="header" style="font-family: rock;display:none">Inclusive days applied</h1>

					<script>
						$(function() {
							$('#type').change(function() {
								$('#e1').hide();
								$('#e2').hide();
								$('#s1').hide();
								$('#s2').hide();
								$('#header').hide();
								if ($('#type').val() === "Emergency" || $('#type').val() === "Sick Leave" || $('#type').val() === "others") {
									$('#e1').show();
									$('#s1').show();
									$('#header').show();
									$('#e_date1').attr("required", 'true');
									$('#s_date1').attr("required", 'true');
									$('#s_date2').removeAttr("required");
									$('#e_date2').removeAttr("required");
								} else {
									$('#e2').show();
									$('#s2').show();
									$('#header').show();
									$('#e_date2').attr("required", 'true');
									$('#s_date2').attr("required", 'true');
									$('#s_date1').removeAttr("required");
									$('#e_date1').removeAttr("required");

								}
							});
						});

					</script>
					<div class="row">
						<div class="form-group col" id="s1" style="display:none">
							<div class="ui calendar">
								<div class="ui input left icon">
									<label for="start_date">Start Date</label>
									<input type="text" id="s_date1" name="from1" class="form-control date" onkeypress="numberInput(event)" autocomplete="off" required  placeholder="yyyy-mm-dd">
								</div>
							</div>
						</div>
						<div class="form-group col" id="s2" style="display:none">
							<div class="ui calendar">
								<div class="ui input left icon">
									<label for="start_date">Start Date</label>
									<input type="text" id="s_date2" name="from2" class="form-control date" onkeypress="numberInput(event)" autocomplete="off" required placeholder="yyyy-mm-dd">
								</div>
							</div>
						</div>

						<div class="form-group col" id="e1" style="display:none">
							<div class="ui calendar">
								<div class="ui input left icon">
									<label for="end_date">End Date</label>
									<input type="text" id="e_date1" name="to1" class="form-control date" autocomplete="off" disabled required placeholder="yyyy-mm-dd">
								</div>
							</div>
						</div>
						<div class="form-group col" id="e2" style="display:none">
							<div class="ui calendar">
								<div class="ui input left icon">
									<label for="end_date">End Date</label>
									<input type="text" id="e_date2" name="to2" class="form-control date" autocomplete="off" disabled required placeholder="yyyy-mm-dd">
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

            $(function() {
				$("#s_date1").datepicker({
					dateFormat: 'yy-mm-dd'
				}).bind("change", function() {
					var min = $(this).val();
					min = $.datepicker.parseDate("yy-mm-dd", min);
					min.setDate(min.getDate() + 1);
					$("#e_date1").datepicker("option", "minDate", min);
				});
			});
			$("#s_date1").datepicker({
				dateFormat: 'yy-mm-dd',
				minDate: new Date((new Date()).setDate(new Date().getDate() + 1))
			});
			$("#s_date2").datepicker({
				dateFormat: 'yy-mm-dd',
				minDate: new Date((new Date()).setDate(new Date().getDate() + 20))
			});
			$(function() {
				$("#s_date2").datepicker({
					dateFormat: 'yy-mm-dd'
				}).bind("change", function() {
					var min = $(this).val();
					min = $.datepicker.parseDate("yy-mm-dd", min);
					min.setDate(min.getDate() + 1);
					$("#e_date2").datepicker("option", "minDate", min);
				});
			});
			$("#e_date1").datepicker({
				dateFormat: 'yy-mm-dd'
			});
			$("#e_date2").datepicker({
				dateFormat: 'yy-mm-dd'
			});

			$('.mobile').inputmask({
				mask: '+639dd ddd dddd'
			});
			$('.date').inputmask({
				mask: 'dddd-dd-dd'
			});

			$(function() {
				$('#s_date1').change(function() {
					if ($('#s_date1').val() != "") {
						$('#e_date1').removeAttr("disabled");
					} else {
						$('#e_date1').attr("disabled", 'true');
					}
				});
				$('#s_date1').keyup(function() {
					if ($('#s_date1').val() != "") {
						$('#e_date1').removeAttr("disabled");
					} else {
						$('#e_date1').attr("disabled", 'true');
					}
				});
				$('#s_date2').change(function() {
					if ($('#s_date2').val() != "") {
						$('#e_date2').removeAttr("disabled");
					} else {
						$('#e_date2').attr("disabled", 'true');
					}
				});
				$('#s_date2').keyup(function() {
					if ($('#s_date2').val() != "") {
						$('#e_date2').removeAttr("disabled");
					} else {
						$('#e_date2').attr("disabled", 'true');
					}
				});
			});

		</script>
		<script type="text/javascript" src="../mis/script/jquery.form.min.js"></script>
		<script type="text/javascript" src="../mis/script/jquery.validate.min.js"></script>
		<script type="text/javascript" src="../mis/script/additional-methods.min.js"></script>
		<script type="text/javascript" src="../mis/script/alerts.js"></script>
		<script type="text/javascript" src="../mis/script/popper.min.js"></script>
		<script type="text/javascript" src="../mis/script/sweetalert.min.js"></script>
		<script type="text/javascript" src="../mis/script/ajax.js"></script>
	</body>

	</html>
