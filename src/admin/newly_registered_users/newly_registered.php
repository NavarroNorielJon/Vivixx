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

	<!--scripts-->
	<script type="text/javascript" src="../../script/datatables.min.js"></script>
	<script type="text/javascript" src="../../script/ajax.js"></script>
	<script type="text/javascript" src="../../script/popper.min.js"></script>
	<script type="text/javascript" src="../../script/sweetalert.min.js"></script>
	<script type="text/javascript" src="../../script/bootstrap/bootstrap.min.js"></script>
	<script src="../../script/jquery.form.min.js"></script>
</head>

<body>
	<div id="wrapper">
		<nav class="navbar fixed-top navbar-expand-lg navbar-dark" id="navigation-bar">
			<a href="../accounts/accounts_status.php" class="navbar-brand">Vivixx</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="#navbar-content" aria-expanded="false" aria-label="Toggle navigation">
    			<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbar-content">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="../accounts/accounts_status.php">Accounts</a>
					</li>
					<li class="nav-item active">
						<button onclick="myFunction()" class="dropbtn">Employees</button>
						<div id="myDropdown" class="dropdown-content">
							<a href="../user_information/user_information.php">Employees</a>
							<a href="../newly_registered_users/newly_registered.php">New Registered Employees</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../leave_request/leave_requests.php">Leave Request</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../summary_of_pay.php">Summary of Pay</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../payslip.php">Payslip</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../announcements/announcement.php">Announcement</a>
					</li>
					<li class="nav-item">
						<a class="nav-link logout" href="../utilities/logout.php">Logout</a>
					</li>
				</ul>
			</div>
		</nav>

		<!-- table for viewing user information -->
		<div class="user-content container-fluid">
			<div class="text-center">
				<h1>New Registered Employee</h1>
			</div>

			<div style="margin: 5vh 15vh;">
				<table class="table" id="table">
					<thead>
						<tr>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email</th>
							<th>Edit or View data</th>
						</tr>
					</thead>

					<?php
					include '../../utilities/session.php';
					$sql = "SELECT * FROM user_info NATURAL JOIN user natural join employee_info WHERE type='user' and (date_hired is null and employee_status is null and position is null);";
					$result = $connect->query($sql);

					if($result-> num_rows > 0){
						while($row = $result->fetch_assoc()){

							$show = "
							<input name='show' value='show' style='display: none;'>
							<a href='view_information.php?user_id=".$row['user_id'].
								"& fname=".$row['first_name'] . "& lname=" .$row['last_name'] ."' class='show btn btn-primary'>Show more</a>";
							//print data in table
							echo "
							<tr>
							<td>" . ucwords($row['first_name']) . "</td>
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
	</div>

	<div id="result"></div>

	<script>
		/* When the user clicks on the button, 
								toggle between hiding and showing the dropdown content */
		function myFunction() {
			document.getElementById("myDropdown").classList.toggle("showbtn");
		}

		// Close the dropdown if the user clicks outside of it
		window.onclick = function(event) {
			if (!event.target.matches('.dropbtn')) {

				var dropdowns = document.getElementsByClassName("dropdown-content");
				var i;
				for (i = 0; i < dropdowns.length; i++) {
					var openDropdown = dropdowns[i];
					if (openDropdown.classList.contains('showbtn')) {
						openDropdown.classList.remove('showbtn');
					}
				}
			}
		}

	</script>

	<!--script for calling data table library-->
	<script>
		$(document).ready(function() {
			$('#table').dataTable({
				"columnDefs": [{
					"orderable": false,
					"targets": [3]
				}]
			});
			$('#table').DataTable();
		});

	</script>
</body>

</html>
