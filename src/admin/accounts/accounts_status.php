<?php
	include '../../utilities/session.php';
	$connect = Connect();
?>

	<!DOCTYPE html>
	<html>

	<head>
		<title>Vivixx Ph</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="../../style/bootstrap/bootstrap.min.css">
		<link type="text/css" rel="stylesheet" href="../style/style.css" media="screen, projection">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="../style/datatables.css">
		<link rel="stylesheet" href="../style/bootstrap-multiselect.css">
		<link rel="stylesheet" href="../../style/jquery-ui.css">

		<!--scripts-->
		<script type="text/javascript" src="../../script/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="../../script/jquery-ui.min.js"></script>
		<script type="text/javascript" src="../../script/datatables.min.js"></script>
		<script type="text/javascript" src="../../script/ajax.js"></script>
		<script type="text/javascript" src="../../script/popper.min.js"></script>
		<script type="text/javascript" src="../../script/sweetalert.min.js"></script>
		<script type="text/javascript" src="../../script/bootstrap/bootstrap.min.js"></script>
		<script type="text/javascript" src="../../script/jquery.form.min.js"></script>
		<script src="../../script/jquery.form.min.js"></script>
		<script src="../style/bootstrap-multiselect.js"></script>
		<script src="../../script/jquery-ui.js"></script>
	</head>

	<body class="background">
		<?php include '../utilities/check_user.php'; ?>
		<div class="wrapper">
			<?php include '../fragments/navbar.php'; ?>

			<div class="content container">
				<div class="text-center">
					<h1 class="accounts-header">ACCOUNTS</h1>
				</div>
				<div class="text-left">
					<h1 class="accounts-header">Enabled Accounts</h1>
				</div>

				<div class="table-container">
					<table class="table" id="table_enable">
						<thead>
							<tr class="table-header">
								<th>First Name</th>
								<th>Last Name</th>
								<th>Username</th>
								<th>Email</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>

						<?php
							$sql = "SELECT username, email, first_name, last_name, end_of_contract, status FROM user NATURAL JOIN user_info NATURAL JOIN employee_info where type='user' and status ='enabled';";
							$result = $connect->query($sql);
							if($result->num_rows > 0){
								while($row = $result->fetch_assoc()){

									if($row['end_of_contract'] != ""){
										if($row['end_of_contract'] === date("Y-m-d")){
											$disabled ="UPDATE user SET status='disabled' WHERE username='".$row['username']."'";
											$res = $connect->query($disabled);
										}
									}

									if($row["status"] === "enabled"){
										$button = "
										<input name='disable' value='Disable' style='display: none;'>
										<a href='update_status.php?disable=".$row['status']."& username=".$row['username']."' onclick='update_status();' class='show btn btn-danger'>Disable</a>";
									}else{
										$button = "
										<input name='enable' value='Enable' style='display: none;'>
										<a href='update_status.php?enable=".$row['status']."& username=".$row['username']."' onclick='update_status();' class='show btn btn-success'>Enable</a>";
									}

									//print data in table
									echo "
									<tr class='table-data'>
									<td>" . ucwords($row['first_name']) . "</td>
									<td>" . ucwords($row['last_name']) . "</td>
									<td>" . $row['username'] . "</td>
									<td>" . $row['email'] . "</td>
									<td>" . $row['status'] . "</td>
									<td>" .$button."</td>
									</tr>";
								}
							}
						?>
					</table>
				</div>
				<br>
				<div class="text-left">
					<h1 class="accounts-header">Disabled Accounts</h1>
				</div>
				<div class="table-container">
					<table class="table" id="table_disable">
						<thead>
							<tr class="table-header">
								<th>First Name</th>
								<th>Last Name</th>
								<th>Username</th>
								<th>Email</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>

						<?php
							$sql = "SELECT username, email, first_name, last_name, end_of_contract, status FROM user NATURAL JOIN user_info NATURAL JOIN employee_info where type='user' and status='disabled';";
							$result = $connect->query($sql);
							if($result->num_rows > 0){
								while($row = $result->fetch_assoc()){

									if($row['end_of_contract'] != ""){
										if($row['end_of_contract'] === date("Y-m-d")){
											$disabled ="UPDATE user SET status='disabled' WHERE username='".$row['username']."'";
											$res = $connect->query($disabled);
										}
									}

									if($row["status"] === "enabled"){
										$button = "
										<input name='disable' value='Disable' style='display: none;'>
										<a href='update_status.php?disable=".$row['status']."& username=".$row['username']."' onclick='update_status();' class='show btn btn-danger'>Disable</a>";
									}else{
										$button = "
										<input name='enable' value='Enable' style='display: none;'>
										<a href='update_status.php?enable=".$row['status']."& username=".$row['username']."' onclick='update_status();' class='show btn btn-success'>Enable</a>";
									}

									//print data in table
									echo "
									<tr class='table-data'>
									<td>" . ucwords($row['first_name']) . "</td>
									<td>" . ucwords($row['last_name']) . "</td>
									<td>" . $row['username'] . "</td>
									<td>" . $row['email'] . "</td>
									<td>" . $row['status'] . "</td>
									<td>" .$button."</td>
									</tr>";
								}
							}
						?>
					</table>
				</div>
				<div id="result1"></div>

			</div>

		</div>

		<script>
			function update_status() {
				swal({
						title: "Caution!",
						text: "Are you sure you want to enable or disable this account?",
						icon: "warning",
						dangerMode: true,
						buttons: {
							cancel: "Cancel",
							confirm: true,
						},
					})
					.then((result) => {
						if (result) {
							$.get('update_status.php');
							swal("Success", "Account successfully enabled or disabled.", "success")
								.then(
									function() {
										location.reload();
									});
						} else {
							swal("Canceled", "", "error");
						}
					})
			}

		</script>

		<script>
			/* When the user clicks on the button,toggle between hiding and showing the dropdown content */

			//script for calling modal
			$(document).ready(function() {
				$('.show').click(function(e) {
					e.preventDefault();
					$.ajax({
						url: $(this).attr('href'),
						success: function(res) {
							$('#result1').html(res);
						}
					});
				});
			});

			//script for calling datatables library
			$(document).ready(function() {
				$('#table_enable').dataTable({
					"columnDefs": [{
						"orderable": false,
						"targets": 5
					}]
				});
				$('#table_enable').DataTable();
				$('#table_disable').dataTable({
					"columnDefs": [{
						"orderable": false,
						"targets": 5
					}]
				});
				$('#table_disable').DataTable();
			});
			$('#acc').addClass('active');

		</script>
	</body>

	</html>
