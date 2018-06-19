<?php
	include '../utilities/session.php';
	if($type == "admin") {
		echo "<script>window.location = '../admin/';</script>";
	}else {
		echo "<script>alert('$type');</script>";
	}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Vivixx</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link type="text/css" rel="stylesheet" href="../style/bootstrap/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="../style/style2.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar">
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
				
            	<li class="active">
					<a href="home" class="sidebar-item">
						<i class="material-icons">home</i>Home
					</a>
					<a class="icon" href="home" data-toggle="tooltip" data-placement="right" title="Home">
						<i class="material-icons">home</i>
					</a>
				</li>
				
				<li>
					<a href="#requests" data-toggle="collapse" class="sidebar-item" aria-expanded="false"><i class="material-icons">work</i> Requests
					</a>
					<a href="#requests" data-toggle="collapse" class="icon" aria-expanded="false">
						<i class="material-icons">work</i>
					</a>
					
					<ul class="collapse list-unstyled" id="requests">
						<li class="active">
							<a href="#" class="sidebar-item">
								Salary Request
							</a>
						</li>
						<li class="active">
							<a href="leave_request_form" class="sidebar-item">Leave Request</a>
						</li>
						<li class="active">
							<a href="#requests" class="icon" data-toggle="tooltip" data-placement="right" title="Salary Request">SR</a>
						</li>
						<li class="active">
							<a href="leave_request_form.php" class="icon" data-toggle="tooltip" data-placement="right" title="Leave Request">LR</a>
						</li>
					</ul>
				</li>
            	
				<li>
					<a href="#" class="sidebar-item">
						<i class="material-icons">info_outline</i> About
					</a>
					<a class="icon" data-toggle="tooltip" data-placement="right" title="About">
						<i class="material-icons">info_outline</i>
					</a>
				</li>
				<hr>
            	<li>
					<a href="../utilities/logout.php"  class="sidebar-item" id="logout">
						<i class="material-icons">power_settings_new</i> Logout
					</a>
					<a class="icon" href="../utilities/logout.php" data-toggle="tooltip" data-placement="right" title="Logout">
						<i class="material-icons">power_settings_new</i>
					</a>						
				</li>
        	</ul>
		</nav>

		<div id="content">
			<div class="card cards">
				<div class="card-body">
					<h4 class="card-title">Notifications</h4>
					<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                   	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim 	veniam,
                   	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                   	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                   	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                   	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

					<div style="text-align: right">
						<a>
							<button class="btn btn-primary" onclick="sample();">
								See more
							</button>
						</a>
					</div>
				</div>
			</div>

			<div class="card cards">
				<div class="event-header">
					<h4 class="card-title">Upcoming Events</h4>
				</div>
				
				<div class="card-body">
					<p class="card-text">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</p>

					<div style="text-align: right">
						<a>
							<button type="button" class="btn btn-primary">See more</button>
						</a>
					</div>
				</div>
			</div>
		</div>

	<script type="text/javascript" src="../script/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../script/popper.min.js"></script>
	<script type="text/javascript" src="../script/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="../script/ajax.js"></script>
	<script type="text/javascript">
		$(function(){
  			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
</body>
