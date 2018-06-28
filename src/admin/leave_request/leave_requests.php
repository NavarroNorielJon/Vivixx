<?php 
	include '../../utilities/session.php';
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
			<a href="../index" class="navbar-brand" style="margin-right:53vw;">Vivixx</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="#navbar-content" aria-expanded="false" aria-label="Toggle navigation">
    			<span class="navbar-toggler-icon"></span>
			</button>
			
			<div class="collapse navbar-collapse" id="navbar-content">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="../accounts/accounts_status.php">Accounts</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../user_information/user_information.php">Users</a>
					</li>
					<li class="nav-item  active">
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
		
		<div class="leave-request-content container-fluid">
			<h1>Leave Requests</h1>
				<table class="table" id="leave">
					<thead>
						<tr>
							<th>First Name</th>
							<th>Middle Name</th>
							<th>Last Name</th>
							<th>Contact Number</th>
							<th>View</th>
						</tr>
					</thead>

					<?php
					$sql = "select * from leave_req where status='pending';";
					$result = $connect->query($sql);
					
					if($result-> num_rows > 0){
						while($row = $result->fetch_assoc()){
							$fname = explode(",",$row["employee"])[0];
							$mname = explode(",",$row["employee"])[1];
							$lname = explode(",",$row["employee"])[2];
						$show = "
								<input name='show' value='show' style='display: none;'>
								<a href='view_leave_request_form.php?user_id=".$row['user_id']."&req_id=".$row['leave_req_id']."&fname=".$fname."&mname=".$mname."&lname=".$lname."'   class='show btn btn-primary'>Show more</a>";
						//print data in table
							echo "
							<tr>
							<td>" . ucwords($fname) . "</td>
							<td>" . ucwords($mname) . "</td>
							<td>" . ucwords($lname) . "</td>
							<td>" . $row['contact_number'] . "</td>
							<td>" . $show ."</td>
							</tr>";
						}
						}

					$connect-> close();
					?>
        		</table>
    	</div>
    	<div id="result"></div>
	</div>
		
      <script>
	  	//Script for showing the show more content inside a modal
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
		
		//script for calling datatables library
		$(document).ready(function(){
		$('#leave').dataTable( {
		"columnDefs": [
			{ "orderable": false, "targets": 4 }
		]
		});
		$('#leave').DataTable();
		});
      </script>
</body>
</html>