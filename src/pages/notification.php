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
		<script type="text/javascript" src="../script/datatables.js"></script>

	</head>

	<body>
		<div class="wrapper">
			<?php include 'fragments/sidebar.php'; ?>
			<div class="content">
				<div class="table-container">
					<table class="table" id="table">
						<thead>
							<tr class="table-header">
								<th>Subject</th>
								<th>Message</th>
								<th>Date</th>
								<th>Action</th>
							</tr>
						</thead>

						<?php
					$sql = "SELECT * from notification;";
					$result = $connect->query($sql);
        			$row = mysqli_fetch_array($results, MYSQLI_ASSOC);
					
					$button = "				
					<a href='message.php?subject=".$row['subject']."' data-toggle='modal' class='btn message btn-primary'>Read</a>";
						
					if($result-> num_rows > 0){
						while($row = $result->fetch_assoc()){
							//print data in table
							if($row["status"] == "new"){
								echo "
									<tr class='table-data'>
										<td><strong>". $row["subject"] ."</strong></td>
										<td><strong>". $row["message"] ."</strong></td>
										<td><strong>". $row["date"] ."</strong></td>
										<td>". $button ."</td>
									</tr>";	
							}
						}
					}

					$connect-> close();
					?>
					</table>
				</div>
			</div>
			<div id="message"></div>
		</div>

		<div id="salary_form"></div>
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
						"targets": 3
					}]
				});
				$('#table').DataTable();
			});
			$('#notif').addClass('active');

			$(document).ready(function() {
				$('.message').click(function(e) {
					e.preventDefault();
					$.ajax({
						url: $(this).attr('href'),
						success: function(res) {
							$('#message').html(res);
						}
					});
				});
			});

		</script>
	</body>

	</html>
