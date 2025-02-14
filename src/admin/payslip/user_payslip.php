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
	<script type="text/javascript" src="../../mis/script/ajax.js"></script>
	<script type="text/javascript" src="../../mis/script/popper.min.js"></script>
	<script type="text/javascript" src="../../mis/script/sweetalert.min.js"></script>
	<script type="text/javascript" src="../../mis/script/bootstrap/bootstrap.min.js"></script>
	<script src="../../mis/script/jquery.form.min.js"></script>
</head>

<body class="background">
	<?php
	include '../mis/utilities/session.php';
	$connect = Connect();
	?>
		<div class="wrapper">
			<?php include '../mis/fragments/navbar.php'; ?>

			<!-- table for viewing user information -->
			<div class="content container">
				<div class="text-center">
					<h1>Users Payslip</h1>
				</div>

				<div class="table-container">
					<table class="table" id="table">
						<thead>
							<tr class="table-header">
								<th>First Name</th>
								<th>Middle Name</th>
								<th>Last Name</th>
								<th>Email</th>
								<th>Action</th>
							</tr>
						</thead>

						<?php
					$sql = "SELECT user_id, first_name, middle_name, last_name, department,email FROM user_info NATURAL JOIN user natural join employee_info WHERE type='user' and (date_hired is not null and employee_status is not null and position is not null);";
					$result = $connect->query($sql);

					if($result-> num_rows > 0){
						while($row = $result->fetch_assoc()){

							$show = "
							<input name='show' value='show' style='display: none;'>
							<a href='view_payslip.php?user_id=".$row['user_id'].
								"& fname=".$row['first_name'] ."& mname=".$row["middle_name"] ."& lname=" .$row['last_name'] ."' class='show btn btn-primary'>View Payslip</a>";
							//print data in table
							echo "
							<tr class='table-data'>
							<td>" . ucwords($row['first_name']) . "</td>
							<td>" . ucwords($row['middle_name']) . "</td>
							<td>" . ucwords($row['last_name']) . "</td>
							<td>" . $row['email'] . "</td>
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

			//script for calling data table library
			$(document).ready(function() {
				$('#table').dataTable({
					"columnDefs": [{
						"orderable": false,
						"targets": [3, 4]
					}]
				});
				$('#table').DataTable();
			});
			$('#pay').addClass('active');

		</script>
</body>

</html>