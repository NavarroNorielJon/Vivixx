<?php
	include '../../utilities/session.php';
	$connect = Connect();
?>

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
					
					<li class="nav-item active">
						<a class="nav-link" href="accounts_status.php">Accounts</a>
					</li>
					
					<li class="nav-item">
						<a class="nav-link" href="../user_information/user_information.php">Employees</a>
					</li>
					
					<li class="nav-item">
						<a class="nav-link" href="../leave_request/leave_requests.php">Leave Request</a>
					</li>
					
					<li class="nav-item">
						<a class="nav-link" href="#">Summary of Pay</a>
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
		
		<div class="accounts-content container">
			
			<div class="text-center">
				<h1>Accounts</h1>
			</div>
			
			<div class="accounts-table">
				<table class="table" id="table">
					<thead>
						<tr>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Username</th>
							<th>Email</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
  
					<?php
					$sql = "select username, email, first_name, last_name,status from user natural join user_info where type='user';";
					$result = $connect->query($sql);

					if($result-> num_rows > 0){
						while($row = $result->fetch_assoc()){
							//enable or disable button
							if($row["status"] === "enabled"){
								$button = "
								<input name='disable' value='Disable' style='display: none;'>
								<a href='update_status.php?disable=".$row['status']."& username=".$row['username']."' onclick='update_status();' class='show btn btn-danger'>Disable</a>";
							}else{
								$button = "
								<input name='enable' value='Enable' style='display: none;'>
								<a href='update_status.php?enable=".$row['status']."& username=".$row['username']."' onclick='update_status();' class='show btn btn-success'>Enable</a>";
							}
							
							//print data in table
							echo "
							<tr>
							<td>" . ucwords($row['first_name']) . "</td>
							<td>" . ucwords($row['last_name']) . "</td>
							<td>" . $row['username'] . "</td>
							<td>" . $row['email'] . "</td>
							<td>" . $row['status'] . "</td>
							<td>" .$button."</td>
							</tr>";
						}
					}

					$connect-> close();
					?>
				</table>
			</div>			
			
			<div id="result1"></div>					
			
		</div>
	</div>
	
	<script>
		function update_status() {
			swal({
				title: "Caution!",
				text: "Are you sure you want to enable or disable this account?",
				icon: "warning",
				dangerMode: true, 
				buttons: {
					cancel: "Cancel",
					confirm: true,
				},
			})
				.then((result) => {
				if(result) {
					$.get('update_status.php');
					swal("Success","Account successfully enabled or disabled.","success")
						.then(
						function(){
							location.reload();
						});
				}else {
					swal("Canceled","", "error");
				}
			})
		}	
	</script>
	
	<script>
		//script for calling modal
		$(document).ready(function(){
			$('.show').click(function(e){
				e.preventDefault();
				$.ajax({
					url: $(this).attr('href'),
					success: function(res){
						$('#result1').html(res);
					}
				});
			});
		});
		
		//script for calling datatables library
		$(document).ready(function(){
			$('#table').dataTable( {
				"columnDefs": [
					{ "orderable": false, "targets": 5 }
				]
			});
			$('#table').DataTable();
		});
	</script>	
</body>
</html>