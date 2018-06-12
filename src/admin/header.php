<!DOCTYPE html>
<html lang="en">
	<?php
	include '../Utilities/db.php';
	$connect = Connect();
	?>
<head>
	<title>Bootstrap Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../style/bootstrap/bootstrap.min.css">
	<script src="../script/jquery.min.js"></script>
	<script src="../script/bootstrap/bootstrap.min.js"></script>
</head>

<body>
	<nav class="navbar navbar-light" id="fade" style="background-color:#005959">
		<div class="container-fluid">
			<div class="navbar-header">
				<img src="../img/Lion.png" id="logo">
			</div>
			
			<ul class="nav navbar">
				<li class="nav-item"><a class="nav-link" href="index.php" style="color:white">Home</a></li>
				<li class="nav-item"><a class="nav-link" href="accounts_status.php" style="color:white">Accounts</a></li>
				<li class="nav-item"><a class="nav-link" href="user_information.php" style="color:white">User</a></li>
				<li class="nav-item"><a class="nav-link" href="logout.php" style="color:#fac213">Logout</a></li>
			</ul>
		</div>
	</nav>
</body>
	
</html>
