<?php
	include '../utilities/session.php';
	include '../utilities/check_session.php';
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

<body class="body" id="body">

	<div class="wrapper">
		<nav id="sidebar">
			<div class="sidebar-header">
				<a href="home"><img src="../img/Lion.png"></a>
			</div>

			<!-- Sidebar Links -->
        	<ul class="list-unstyled components">
				<li><a href="profile"><i class="material-icons">person</i> <?php echo "$first_name"?></a></li>
            	<li class="active"><a href="home"><i class="material-icons">home</i> Home</a></li>
				<li>
					<a href="#requests" data-toggle="collapse" aria-expanded="false"> <i class="material-icons">work</i> Requests</a>
					<ul class="collapse list-unstyled" id="requests">
						<li class="active"><a href="#">Salary Request</a></li>
						<li class="active"><a href="leave_request_form">Leave Request</a></li>
					</ul>
				</li>
            	<li><a href="#"> <i class="material-icons">info_outline</i> About</a></li><hr>
            	<li><a href="../utilities/logout.php" id="logout">
						<i class="material-icons">power_settings_new</i> Logout</a></li>
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

			<div>
				<div class="card events">
					<div class="event-header">
						<h4 class="card-title">Upcoming Events</h4>
					</div>
					<div class="card-body event-body">
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
		</div>
	</div>

	<script type="text/javascript" src="../script/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../script/popper.min.js"></script>
	<script type="text/javascript" src="../script/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="../script/ajax.js"></script>
	<script>
		window.onload = function() {
			var body = document.getElementById('body');
			body.style.opacity = "1";
		}
	</script>
</body>
