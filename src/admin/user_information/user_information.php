<!DOCTYPE html>
<html>
	
<head>
	<title>Vivixx Ph</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="../../style/bootstrap/bootstrap.min.css">
	<link type="text/css" rel="stylesheet" href="../style/style.css" media="screen, projection">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../../style/datatables.css">

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
			<!--<a href="#!"><img src="../img/Lion.png" id="nav-logo"></a>-->
			<a href="index" class="navbar-brand" style="margin-right:40vw;">Vivixx</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="#navbar-content" aria-expanded="false" aria-label="Toggle navigation">
    			<span class="navbar-toggler-icon"></span>
			</button>
			
			<div class="collapse navbar-collapse" id="navbar-content">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="../index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../accounts/accounts_status.php">Accounts</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="../user_information/user_information.php">Users</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../leave_request/leave_requests.php">Leaver Request</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Summary of Pay</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../announcements/announcement.php">Announcement</a>
					</li>
					<li class="nav-item">
						<a class="nav-link logout" href="../logout.php">Logout</a>
					</li>
				</ul>
			</div>
		</nav>
		
		<!-- table for viewing user information -->
		<div class="user-content container-fluid">
			<h1>User Information</h1>	
				<table class="table" id="table">
					<thead>
						<tr>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Gender</th>
							<th>Address</th>
							<th>Contact Number</th>
							<th>Email</th>
							<th>Edit or View data</th>
						</tr>
					</thead>
		
					<?php
						include '../../utilities/session.php';
							$sql = "select * from user_info natural join user where type='user';";
							$result = $connect->query($sql);
							if($result-> num_rows > 0){
								while($row = $result->fetch_assoc()){
									if($row["gender"] === "m"){
										$gender = "Male";
									}else if($row["gender"] === "f"){
										$gender = "Female";
									}else{
										$gender = "Not set";
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
						
									//print data in table
									echo "
										<tr>
											<td>" . ucwords($row['first_name']) . "</td>
											<td>" . ucwords($row['last_name']) . "</td>
											<td>" . $gender . "</td>
											<td>" . $address . "</td>
											<td>" . $contact . "</td>
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

	<div id="result">
	</div>
         
	<!--script for calling data table library-->
	<script>
		$(document).ready(function(){
				$('.show').click(function(e){
					e.preventDefault();
					$.ajax({
						url: $(this).attr('href'),
						success: function(res){
							$('#result').html(res);
						}
					});
				});
			});
			
      	$(document).ready(function(){
			$('#table').dataTable( {
				"columnDefs": [
					{ "orderable": false, "targets": [5,6] }
				]
			});
			$('#table').DataTable();
		});
	</script>
</body>
</html>
