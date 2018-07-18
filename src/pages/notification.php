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
		<script type="text/javascript" src="../script/jquery-3.3.1.js"></script>
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
								<th style="width:300px;">Subject</th>
								<th style="width:70px;">Date</th>
								<th style="width:60px;">Status</th>
								<th style="width:40px;">Action</th>
							</tr>
						</thead>

						<?php
							$sql = "SELECT * from notification where user_id = '$user_id';";
							$result = $connect->query($sql);

							if($result->num_rows > 0){
								while($row = mysqli_fetch_array($result)){
									$button = "
										<a href='message.php?msg_id=".$row['id_notification']."& subject=".$row['subject']." & message=".$row['message']." & date=".$row['date']."' data-toggle='modal' class='btn btn-primary message-modal'>Read</a>";
									//print data in table
									if($row["status"] == "new"){
										echo "
											<tr class='table-data'>
												<td><strong>". $row["subject"] ."</strong></td>
												<td><strong>". $row["date"] ."</strong></td>
												<td><strong>New</strong></td>
												<td>". $button ."</td>
											</tr>";
									}else {
										echo "
											<tr class='table-data'>
												<td>". $row["subject"] ."</td>
												<td>". $row["date"] ."</td>
												<td>Read</td>
												<td>". $button ."</td>
											</tr>
											";
									}
								}
							}
						?>
					</table>
				</div>

				<h1 style="margin-top: 10%;">LOGS</h1>
				<div class="table-container">
					<table class="table" id="table2">
						<thead>
							<tr class="table-header">
								<th style="width:550px;">Reason</th>
								<th style="width:50px;">Date Filed</th>
								<th style="width:60px;">Status</th>
							</tr>
						</thead>

						<?php
							$sql2 = "SELECT * FROM leave_req where user_id='$user_id';";
							$result2 = $connect->query($sql2);

							if($result2->num_rows > 0){
								while($row2 = mysqli_fetch_array($result2)){
									if($row2['status'] == "pending") {
										$status = "<td style='color: #e6b800;'>Pending</td>";
									}elseif($row2['status'] == "accepted") {
										$status = "<td style='color: green;'>Accepted</td>";
									}else {
										$status = "<td style='color: red;'>Rejected</td>";
									}
									//print data in table
									echo "
										<tr class='table-data'>
											<td>". $row2["reason"] ."</td>
											<td>". $row2["date_filed"] ."</td>
											$status
										</tr>";
								}
							}

							$connect->close();
						?>
					</table>
				</div>
			</div>
			<div id="message"></div>
		</div>

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
			//	table for the messages
			$(document).ready(function() {
				$('#table').DataTable({
					"order": [
						[2, "asc"]
					]
				});
				$('#table').DataTable();
			});
			// table for the logs of leave request
			$(document).ready(function() {
				$('#table2').DataTable({
					"order": [
						[2, "asc"]
					]
				});
				$('#table').DataTable();
			});
			$('#notif').addClass('active');

		</script>
	</body>

	</html>
