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
		<link rel="stylesheet" href="../../style/bootstrap/bootstrap.min.css">
		<link type="text/css" rel="stylesheet" href="../style/style.css" media="screen, projection">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="../admin/style/datatables.css">

		<!--scripts-->
		<script type="text/javascript" src="../script/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="../script/jquery-ui.min.js"></script>
		<script type="text/javascript" src="../script/datatables.min.js"></script>
		<script type="text/javascript" src="../script/ajax.js"></script>
		<script type="text/javascript" src="../script/popper.min.js"></script>
		<script type="text/javascript" src="../script/sweetalert.min.js"></script>
		<script type="text/javascript" src="../script/bootstrap/bootstrap.min.js"></script>

	</head>

	<body>
		<div class="wrapper">
			<?php include 'fragments/sidebar.php'; ?>
			<div class="content">
				<h1 style="margin-bottom: 20px;">INBOX</h1>
				<div class="table-container">
					<table class="table" id="table">
						<thead>
							<tr class="table-header">
								<th style="width:550px;">Subject</th>
								<th style="width:60px;">Date</th>
								<th style="width:60px;">Action</th>
							</tr>
						</thead>

						<?php
					$sql = "SELECT * from notification;";
					$result = $connect->query($sql);
        			$row = mysqli_fetch_array($results, MYSQLI_ASSOC);
						
					if($result-> num_rows > 0){
						while($row = $result->fetch_assoc()){
							$button = "				
								<a href='message.php?subject=".$row['subject']." & message=".$row['message']." & date=".$row['date']."' data-toggle='modal' class='btn btn-primary message-modal'>Read</a>";
							//print data in table
							if($row["status"] == "new"){
								echo "
									<tr class='table-data'>
										<td><strong>". $row["subject"] ."</strong></td>
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

		<!-- <div id="salary_form"></div> -->
		<script>
			$(document).ready(function() {
				$('.message-modal').click(function(e) {
					e.preventDefault();
					$.ajax({
						url: $(this).attr('href'),
						success: function(res) {
							$('#message').html(res);
						}
					});
				});
			});
			//script for calling datatables library
			$(document).ready(function() {
				$('#table').dataTable({
					"columnDefs": [{
						"orderable": false,
						"targets": 2
					}]
				});
				$('#table').DataTable();
			});
			$('#notif').addClass('active');

		</script>
	</body>

	</html>
