<!DOCTYPE html>
<html lang="en">
<head>
	<title>Vivixx Ph</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="../style/bootstrap/bootstrap.min.css">
	<link type="text/css" rel="stylesheet" href="style/jquery-ui.min.css">

	<link type="text/css" rel="stylesheet" href="style/style.css" media="screen, projection">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../style/datatables.css">
	
    <!--scripts-->
	<script src="../script/jquery.min.js"></script>
	<script type="text/javascript" src="../script/bootstrap/bootstrap.min.js"></script>
	<script src="../script/jquery.form.min.js"></script>
	<script type="text/javascript" src="../script/jquery-ui.min.js"></script>
	<script type="text/javascript" src="../script/popper.min.js"></script>
	<script type="text/javascript" src="../script/ajax.js"></script>  
	
</head>

<body>
	<div id="wrapper">
		<nav class="navbar fixed-top navbar-expand-lg navbar-dark" id="navigation-bar">
			<!--<a href="#!"><img src="../img/Lion.png" id="nav-logo"></a>-->
			<a href="index" class="navbar-brand" style="margin-right:51vw;">Vivixx</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="#navbar-content" aria-expanded="false" aria-label="Toggle navigation">
    			<span class="navbar-toggler-icon"></span>
			</button>
			
			<div class="collapse navbar-collapse" id="navbar-content">
				<ul class="navbar-nav">
					<li class="nav-item active">
						<a class="nav-link" href="index">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="accounts/accounts_status">Accounts</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="user_information/user_information">Users</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="leave_request/leave_requests">Leaver Request</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Summary of Pay</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="announcements/view_announcement.php">Announcement</a>
					</li>
					<li class="nav-item">
						<a class="nav-link logout" href="logout.php">Logout</a>
					</li>
				</ul>
			</div>
		</nav>
		
		<div class="index-content container-fluid">
			<div style="text-align:center;">
				<h1>Announcements</h1>
				<?php include 'announcements/announcement.php'; ?>
			</div>	
		</div>
		
	</div>
	
	<script type="text/javascript">
		$(document).ready(function() {
			$(".dropdown-toggle").dropdown();
		});
		
	</script>
</body>
</html>
