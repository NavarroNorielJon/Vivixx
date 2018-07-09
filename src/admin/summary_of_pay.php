<?php
    
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="../style/bootstrap/bootstrap.min.css">
	<link type="text/css" rel="stylesheet" href="style/jquery-ui.min.css">
	<link type="text/css" rel="stylesheet" href="style/style.css" media="screen, projection">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="../style/datatables.css">
</head>
<body>
    <div id="wrapper">
		<nav class="navbar fixed-top navbar-expand-lg navbar-dark" id="navigation-bar">
			<!--<a href="#!"><img src="../img/Lion.png" id="nav-logo"></a>-->
			<a href="index.php" class="navbar-brand">Vivixx</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="#navbar-content" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

			<div class="collapse navbar-collapse" id="navbar-content">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="accounts/accounts_status.php">Accounts</a>
					</li>
					<li class="nav-item">
						<button onclick="myFunction()" class="dropbtn">Employees</button>
						<div id="myDropdown" class="dropdown-content">
							<a href="user_information/user_information.php">Employees</a>
							<a href="newly_registered_users/newly_registered.php">New Registered Employees</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="leave_request/leave_requests.php">Leave Request</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="summary_of_pay.php">Summary of Pay</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../payslip.php">Payslip</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="announcements/announcement.php">Announcement</a>
					</li>
					<li class="nav-item">
						<a class="nav-link logout" href="logout.php">Logout</a>
					</li>
				</ul>
			</div>
		</nav>
	</div>
    <br>
    <br>
    <br>
    
    <table border=1>
        <th>Income Name</th>
        <th>Amount</th>

        <tr>
            <td><?php echo date("Y-m")?> <br>SRF</td>
            <td>15,000.00</td>
        </tr>
        <tr>
            <td>BASIC PAY</td>
            <td>6,600.00</td>
        </tr>
            <td>NIGHT DIFF</td>
            <td>-</td>
        <tr>
            <td>OTHER PAY</td>
            <td>8,400.00</td>
        </tr>
        <tr>
            <td>ALWNC</td>
            <td>3,000.00</td>
        </tr>
        <tr>
            <td>TAX REFUND</td>
            <td>-</td>
        </tr>
        <tr>
            <td>HLDY</td>
            <td>600.00</td>
        </tr>
        <tr>
            <td>GROSS PAY</td>
            <td>27,850.00</td>
        </tr>
        <tr>
            <td>SSS</td>
            <td>254.30</td>
        </tr>
        <tr>
            <td>PHIC</td>
            <td>137.50</td>
        </tr>
        <tr>
            <td>HDMF</td>
            <td>100.00</td>
        </tr>
        <tr>
            <td>SSS-L</td>
            <td>-</td>
        </tr>
        <tr>
            <td>HMDF-L</td>
            <td>-</td>
        </tr>
        <tr>
            <td>CO-LOAN</td>
            <td>-</td>
        </tr>
        <tr>
            <td>S-LOAN</td>
            <td>-</td>
        </tr>
        <tr>
            <td>S-LOAN2</td>
            <td>-</td>
        </tr>
        <tr>
            <td>REGULAR LOAN</td>
            <td>-</td>
        </tr>
        <tr>
            <td>DDCTN</td>
            <td>-</td>
        </tr>
        <tr>
            <td>TESOL LOAN</td>
            <td>-</td>
        </tr>
        <tr>
            <td>P-LOAN</td>
            <td>-</td>
        </tr>
        <tr>
            <td>CASH ADV</td>
            <td>-</td>
        </tr>
        <tr>
            <td>TAX</td>
            <td>-</td>
        </tr>
        <tr>
            <td>TOTAL DDCTN</td>
            <td>491.80</td>
        </tr>
        <tr>
            <td>NET PAY</td>
            <td>27,358.20</td>
        </tr>
        <tr>
            <td>15th PAY OUT</td>
            <td>7,200</td>
        </tr>
        <tr>
            <td>30th PAY OUT</td>
            <td>20,158.20</td>
        </tr>
    </table>
</body>
</html>