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

<body class="background">

	<?php
	include '../../utilities/session.php';
	include '../utilities/check_user.php';
	$connect = Connect();
	?>
		<div class="wrapper">
			<?php include '../fragments/navbar.php'; ?>


			<!-- table for viewing user information -->
			<div class="container content">
				<div class="text-center">
					<h1>EMPLOYEE INFORMATION</h1>
				</div>

				<div class="table-container">
					<table class="table" id="table">
						<thead>
							<tr class="table-header">
								<th>First Name</th>
								<th>Last Name</th>
								<th>Gender</th>
								<th>Address</th>
								<th>Contact Number</th>
								<th>Email</th>
								<th>Action</th>
							</tr>
						</thead>

						<?php

					$sql = "SELECT * FROM user_info NATURAL JOIN user natural join employee_info WHERE type='user' and
						(birth_date is not null and birth_place is not null and contact_number is not null and gender is not null and height is not null
						and weight is not null and blood_type is not null and residential_address is not null and residential_zip is not null and
						residential_tel_no is not null and permanent_address is not null and permanent_zip is not null and permanent_tel_no is not null
						and citizenship is not null and civil_status is not null and sss_no is not null and tin is not null and philhealth_no and
						pagibig_id_no is not null) and (date_hired is not null and employee_status is not null and position is not null);";
					$result = $connect->query($sql);

					if($result-> num_rows > 0){
						while($row = $result->fetch_assoc()){
							if($row["gender"] === null){
								$gender = "Not set";
							}else{
								$gender = $row["gender"];
							}

							if(!isset($row["residential_address"])){
								$address = "Not set";
							}else{
								$address = $row["residential_address"];
							}

							if(!isset($row["contact_number"])){
								$contact = "Not set";
							}else{
								$contact = $row["contact_number"];
							}

							$show = "
							<input name='show' value='show' style='display: none;'>
							<a href='view_information.php?user_id=".$row['user_id'].
								"& fname=".$row['first_name']."& mname=".$row['middle_name'] .
								"& lname=" .$row['last_name'] ."' class='show btn btn-primary'>Show more</a>";

							$message = "
							<input name='message' value='message' style='display: none;'>
							<a href='personal_message.php?user_id=".$row['user_id'].
								"& fname=".$row['first_name']."& mname=".$row['middle_name'] .
								"& lname=" .$row['last_name'] ."& email=".$row['email'] ."' class='btn message'>Send Message</a>";
							//print data in table
							echo "
							<tr class='table-data'>
							<td>" . ucwords($row['first_name']) . "</td>
							<td>" . ucwords($row['last_name']) . "</td>
							<td>" . $gender . "</td>
							<td>" . $address . "</td>
							<td>" . $contact . "</td>
							<td>" . $row['email'] . "</td>
							<td>" . $show . $message ."</td>
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
		<div id="res"></div>
		<script>
			$(document).ready(function() {
				$('.message').click(function(e) {
					e.preventDefault();
					$.ajax({
						url: $(this).attr('href'),
						success: function(res) {
							$('#res').html(res);
						}
					});
				});
			});

			/* When the user clicks on the button, toggle between hiding and showing the dropdown content*/
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
						"targets": [5, 6]
					}]
				});
				$('#table').DataTable();
			});

		</script>

</body>

</html>
