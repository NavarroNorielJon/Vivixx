<?php
	include '../mis/utilities/session.php';
	$connect = Connect();
?>
	<!DOCTYPE html>
	<html>

	<head>
		<title>Vivixx Ph</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="../../mis/img/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="../../mis/style/bootstrap/bootstrap.min.css">
		<link type="text/css" rel="stylesheet" href="../mis/style/style.css" media="screen, projection">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="../mis/style/datatables.css">

		<!--scripts-->
		<script type="text/javascript" src="../../mis/script/datatables.min.js"></script>
		<script type="text/javascript" src="../../mis/script/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="../../mis/script/jquery-ui.min.js"></script>
		<script type="text/javascript" src="../../mis/script/datatables.min.js"></script>
		<script type="text/javascript" src="../../mis/script/ajax.js"></script>
		<script type="text/javascript" src="../../mis/script/popper.min.js"></script>
		<script type="text/javascript" src="../../mis/script/sweetalert.min.js"></script>
		<script type="text/javascript" src="../../mis/script/bootstrap/bootstrap.min.js"></script>
		<script src="../../mis/script/jquery.validate.min.js"></script>
		<script src="../../mis/script/additional-methods.min.js"></script>
		<script src="../../mis/script/jquery.form.min.js"></script>
		<script src="../mis/style/bootstrap-multiselect.js"></script>
		<script src="../../mis/script/jquery-ui.js"></script>

	</head>

	<body class="background">
		<div class="wrapper">
			<?php include '../mis/fragments/navbar.php'; ?>


			<div class="content container">
				<div class="text-center">
					<h1>Leave Requests</h1>
				</div>

				<div class="table-container">
					<table class="table" id="leave">
						<thead>
							<tr class="table-header">
								<th>First Name</th>
								<th>Middle Name</th>
								<th>Last Name</th>
								<th>Contact Number</th>
								<th>Action</th>
							</tr>
						</thead>

						<?php
					$sql = "select * from leave_req where status='pending';";
					$result = $connect->query($sql);

					if($result-> num_rows > 0){
						while($row = $result->fetch_assoc()){
							$fname = explode(",",$row["employee"])[0];
							$mname = explode(",",$row["employee"])[1];
							$lname = explode(",",$row["employee"])[2];
							$show = "
							<input name='show' value='show' style='display: none;'>
							<a href='view_leave_request_form.php?user_id=".$row['user_id']."&req_id=".$row['leave_req_id']."&fname=".$fname."&mname=".$mname."&lname=".$lname."'   class='show btn btn-primary'>Show more</a>";

							//print data in table
							echo "
							<tr class='table-data';>
							<td>" . ucwords($fname) . "</td>
							<td>" . ucwords($mname) . "</td>
							<td>" . ucwords($lname) . "</td>
							<td>" . $row['contact_number'] . "</td>
							<td>" . $show ."</td>
							</tr>";
						}
					}

					$connect-> close();
					?>
					</table>
				</div>
			</div>

			<div id="result"></div>

		</div>

		<script>
			//Script for showing the show more content inside a modal
			$(document).ready(function() {
				$('.show').click(function(e) {
					e.preventDefault();
					$.ajax({
						url: $(this).attr('href'),
						success: function(res) {
							$('#result').html(res);
						}
					});
				});
			});

			//script for calling datatables library
			$(document).ready(function() {
				$('#leave').dataTable({
					"columnDefs": [{
						"orderable": false,
						"targets": 4
					}]
				});
				$('#leave').DataTable();
			});
			$('#leave_r').addClass('active');

		</script>

	</body>

	</html>
