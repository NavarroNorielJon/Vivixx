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
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	<!--scripts-->
	<script type="text/javascript" src="../../script/datatables.min.js"></script>
	<script type="text/javascript" src="../../script/ajax.js"></script>
	<script type="text/javascript" src="../../script/popper.min.js"></script>
	<script type="text/javascript" src="../../script/sweetalert.min.js"></script>
	<script type="text/javascript" src="../../script/bootstrap/bootstrap.min.js"></script>
	<script src="../../script/jquery.form.min.js"></script>
	<script src="../../script/jquery-ui.js"></script>
</head>

<body class="background">
	<?php
	include '../utilities/session.php';
	error_reporting(0);
	$connect = Connect();
	?>
	<div class="wrapper">
		<?php include '../fragments/navbar.php'; ?>

		<!-- table for viewing user information -->
		<div class="content container">
			<div class="text-center">
				<h1>NEW REGISTERED EMPLOYEE</h1>
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
					$sql = "SELECT user_id, first_name, middle_name, last_name, department,email FROM user_info NATURAL JOIN user natural join employee_info WHERE type='user' and (date_hired is null and employee_status is null and position is null);";
					$result = $connect->query($sql);

					if($result-> num_rows > 0){
						while($row = $result->fetch_assoc()){

							$show = "
							<input name='show' value='show' style='display: none;'>
							<a href='set_registered.php?user_id=".$row['user_id'].
								"& fname=".$row['first_name'] ."& mname=".$row["middle_name"] ."& lname=" .$row['last_name'] ."' class='show btn btn-primary'>Show more</a>";
							//print data in table
							echo "
							<tr class='table-data';>
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
		$('#emp').addClass('active');

	</script>
</body>

</html>
