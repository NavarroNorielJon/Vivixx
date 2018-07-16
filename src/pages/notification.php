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
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<<<<<<< HEAD
		<script type="text/javascript" src="../script/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="../script/popper.min.js"></script>
		<script type="text/javascript" src="../script/bootstrap/bootstrap.min.js"></script>
		<script type="text/javascript" src="../script/ajax.js"></script>
=======
		<link rel="stylesheet" href="../admin/style/datatables.css">

>>>>>>> 5aff48d3fb2aafab6768563f235238cf85be0f8e
	</head>

	<body>
		<div class="wrapper">
<<<<<<< HEAD
			<?php include 'fragments/sidebar.php'; ?>
			<div id="content" style="margin-left: 20%;"></div>
			<div id="salary_form"></div>

		</div>


=======
			<nav class="sidebar">
				<div class="sidebar-header">
					<a class="sidebar-logo" href="home"><img src="../img/Lion.png"></a>
				</div>

				<!-- Sidebar Links -->
				<ul class="list-unstyled components">
					<li>
						<a href="profile" class="sidebar-item">
						<i class="material-icons">person</i> <?php echo "$first_name"?>
					</a>

						<a href="profile" class="icon" data-toggle="tooltip" data-placement="right" title="Profile">
						<i class="material-icons">person</i>
					</a>
					</li>

					<li>
						<a href="home" class="sidebar-item">
						<i class="material-icons">home</i>Home
					</a>

						<a class="icon" href="home" data-toggle="tooltip" data-placement="right" title="Home">
						<i class="material-icons">home</i>
					</a>
					</li>

					<li class="active">
						<a href="notification.php" class="sidebar-item">
					<i class="material-icons">mail</i>Notifications</a>
						<a class="icon" href="notification.php"><i class="material-icons">mail</i></a>
					</li>

					<li>
						<a href="#requests" data-toggle="collapse" class="sidebar-item" aria-expanded="false">
						<i class="material-icons">work</i> Requests
					</a>

						<a href="#requests" data-toggle="collapse" class="icon" aria-expanded="false">
						<i class="material-icons">work</i>
					</a>

						<ul class="collapse list-unstyled" id="requests">
							<li class="active">
								<input name='edit' value='salary' style='display: none;'>
								<a href="salary_request.php" data-target="#salary" class="sidebar-item salary">Salary Request</a>
							</li>

							<li class="active">
								<a href="leave_request_form" class="sidebar-item">Leave Request</a>
							</li>

							<li class="active">
								<a href="salary_request.php" class="icon" data-toggle="tooltip" data-placement="right" title="Salary Request">SR</a>
							</li>

							<li class="active">
								<a href="leave_request_form.php" class="icon" data-toggle="tooltip" data-placement="right" title="Leave Request">LR</a>
							</li>
						</ul>
					</li>

					<li>
						<a href="about.php" class="sidebar-item">
						<i class="material-icons">info</i> About
					</a>

						<a class="icon" href="about.php" data-toggle="tooltip" data-placement="right" title="About">
						<i class="material-icons">info</i>
					</a>
					</li>

					<hr>

					<li>
						<a href="../utilities/logout.php" class="sidebar-item logout">
						<i class="material-icons">power_settings_new</i> Logout
					</a>

						<a class="icon" href="../utilities/logout.php" data-toggle="tooltip" data-placement="right" title="Logout">
						<i class="material-icons">power_settings_new</i>
					</a>
					</li>
				</ul>
			</nav>

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
>>>>>>> 5aff48d3fb2aafab6768563f235238cf85be0f8e
	</body>

	</html>
