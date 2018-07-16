<?php
	include '../utilities/session.php';
	include '../utilities/check_user_info.php';

	if($type == "admin") {
		echo "<script>window.location = '../admin/';</script>";
	}

?>

	<!DOCTYPE html>
	<html>

	<head>
		<title>Vivixx PH | Notifications</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
		<link type="text/css" rel="stylesheet" href="../style/bootstrap/bootstrap.min.css">
		<link type="text/css" rel="stylesheet" href="../style/style.css">
		<link rel="stylesheet" href="../admin/style/datatables.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script type="text/javascript" src="../script/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="../script/popper.min.js"></script>
		<script type="text/javascript" src="../script/bootstrap/bootstrap.min.js"></script>
		<script type="text/javascript" src="../script/ajax.js"></script>

	</head>

	<body>
		<div class="wrapper">
			<?php include 'fragments/sidebar.php'; ?>
			<div id="content" style="margin-left: 20%;"></div>
			<div id="salary_form"></div>
			<div class="content">
				<div class="table-container">
					<table class="table" id="table">
						<thead>
							<tr class="table-header">
								<th>Subject</th>
								<th>Message</th>
								<th>Status</th>
								<th>Date</th>
								<th>Action</th>
							</tr>
						</thead>

						<?php
					$sql = "SELECT * from notification;";
					$result = $connect->query($sql);
        			$row = mysqli_fetch_array($results, MYSQLI_ASSOC);					
					if($result-> num_rows > 0){
						while($row = $result->fetch_assoc()){
							//print data in table
							echo "
							<tr class='table-data'>
							<td>". $row["subject"] ."</td>
							<td>". $row["message"] ."</td>
							<td>". $row["status"] ."</td>
							<td>". $row["date"] ."</td>
							<td>". $row["date"] ."</td>
							</tr>";
						}
					}

					$connect-> close();
					?>
					</table>
				</div>
			</div>
		</div>

		<div id="content" style="margin-left: 20%;"></div>
		<div id="salary_form"></div>

		<script type="text/javascript" src="../script/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="../script/popper.min.js"></script>
		<script type="text/javascript" src="../script/bootstrap/bootstrap.min.js"></script>
		<script type="text/javascript" src="../script/ajax.js"></script>
		<script type="text/javascript" src="../script/datatables.js"></script>
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

			//script for calling datatables library
			$(document).ready(function() {
				$('#table').dataTable({
					"columnDefs": [{
						"orderable": false,
						"targets": 4
					}]
				});
				$('#table').DataTable();
			});

		</script>
	</body>

	</html>
