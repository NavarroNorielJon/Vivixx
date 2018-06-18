<!DOCTYPE html>
<html lang="en">
	<?php
	include '../Utilities/db.php';
	include '../utilities/session.php';
	$connect = Connect();
	?>
<head>
	<?php
		include 'include.php';
	?>
</head>

<body>
	<nav class="navbar navbar-expand navbar-light" id="fade" style="background-color:#005959">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="index.php"><img src="../img/Lion.png" id="logo"></a>
			</div>
			
			<ul class="nav navbar">
				<li class="nav-item"><a class="nav-link" href="index.php" style="color:white">Home</a></li>
				<li class="nav-item"><a class="nav-link" href="accounts_status.php" style="color:white">Accounts</a></li>
				<li class="nav-item"><a class="nav-link" href="user_information.php" style="color:white">User</a></li>
				<li class="nav-item"><a class="nav-link" href="leave_requests.php" style="color:white">Leave Requests</a></li>
				<li class="nav-item"><a class="nav-link" href="logout.php" style="color:#fac213">Logout</a></li>
			</ul>
		</div>
	</nav>
</body>
	
</html>
