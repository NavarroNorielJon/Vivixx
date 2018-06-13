<?php include 'utilities/session.php'; ?>

<!DOCTYPE html>
<html>
    
<head>
	<title>Vivixx</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link type="text/css" rel="stylesheet" href="style/bootstrap/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="style/style2.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
	<div class="container-fluid">
		<div class="jumbotron">
			<form>
				<h1 class="text-center">LEAVE APPLICATION FORM</h1><hr>
				
				<div class="row">
					<div class="form-group col">
						<label for="employee_name">Employee</label>
						<input type="text" class="form-control" id="employee_name" placeholder="Employee Name" name="employeeName">
					</div>
					
					<div class="form-group col">
						<label for="department">Department</label>
						<input type="text" class="form-control" id="department" placeholder="department" name="dept">
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col">
						<label for="position">Position</label>
						<input type="text" class="form-control" id="position" placeholder="Position" name="employeePosition">
					</div>
					
					<div class="form-group col">
						<label for="date_hired">Date Hired</label>
						<input type="date" class="form-control" id="date_hired" placeholder="Date Hired" name="dateHired">
					</div>
					
					<div class="form-group col">
						<label for="date_filed">Date Filed</label>
						<input type="date" class="form-control" id="date_filed" placeholder="date_filed" name="dateFilled">
					</div>
				</div><hr>
				
				<div>
					<select class="custom-select form-group" name="reason">
						<option selected disabled>Reason for leave</option>
						<option value="Vacation">Vacation</option>
						<option value="Emergency">Emergency Leave</option>
						<option value="Maternal Leave">Maternity Leave</option>
						<option value="Paternal Leave">Paternity Leave</option>
						<option value="Sick Leave">Sick Leave</option>
						<option value="Sent Home">Sent Home</option>
						<option value="Others">Others</option>
					</select>
					
					<div class="form-group">
						<label for="other_reason">(Please Specify)</label>
						<input type="text" class="form-control" id="other_reason">
					</div>
					
					<div class="row">
						<div class="form-group col">
							<label for="address_leave">Contact Address during leave</label>
							<input type="text" class="form-control" id="address_leave">
						</div>
						
						<div class="form-group col">
							<label for="number_leave">Contact Number during leave</label>
							<input type="text" class="form-control" id="number_leave">
						</div>
					</div>
				</div><hr>
				
				<div>
					<h1>Inclusive days applied</h1>
					
					<div class="row">
						<div class="form-group col">
							<input type="date" class="form-control">
						</div>
						
						<div class="form-group col">
							<input type="date" class="form-control">
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	
	<script type="text/javascript" src="script/ajax.js"></script>
	<script type="text/javascript" src="script/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="script/popper.min.js"></script>
	<script type="text/javascript" src="script/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="script/sweetalert.min.js"></script>
</body>