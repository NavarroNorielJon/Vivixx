<?php
	include '../utilities/session.php';
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
		<script type="text/javascript" src="../../script/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="../../script/jquery-ui.min.js"></script>
		<script type="text/javascript" src="../../script/datatables.min.js"></script>
		<script type="text/javascript" src="../../script/ajax.js"></script>
		<script type="text/javascript" src="../../script/popper.min.js"></script>
		<script type="text/javascript" src="../../script/sweetalert.min.js"></script>
		<script type="text/javascript" src="../../script/bootstrap/bootstrap.min.js"></script>
		<script src="../../script/jquery.validate.min.js"></script>
		<script src="../../script/additional-methods.min.js"></script>
		<script src="../../script/jquery.form.min.js"></script>
		<script src="../style/bootstrap-multiselect.js"></script>
		<script src="../../script/jquery-ui.js"></script>

	</head>

	<body class="background">
		<div class="wrapper">
			<?php include '../fragments/navbar.php'; ?>


			<div class="content container">
				<div class="text-center">
					<h1>Summary of Leave Requests</h1>
				</div>
				<div class="">
					<select id="month" name="month" class="form-control col-2">
						<option value="All">All</option>
						<option value="1">January</option>
						<option value="2">February</option>
						<option value="3">March</option>
						<option value="4">April</option>
						<option value="5">May</option>
						<option value="6">June</option>
						<option value="7">July</option>
						<option value="8">August</option>
						<option value="9">September</option>
						<option value="10">October</option>
						<option value="11">November</option>
						<option value="12">December</option>
					</select>
				</div>
				<div class="table-container">
					<table class="table" id="leave_month">
						<thead>
							<tr class="table-header">
								<th>First Name</th>
								<th>Middle Name</th>
								<th>Last Name</th>
								<th>Date Filed</th>
								<th>Status</th>
                                <th>Leave Type</th>
							</tr>
						</thead>


						<?php
							$sql = "select * from leave_req;";
							$result = $connect->query($sql);

							if($result->num_rows > 0){
								while($row = $result->fetch_assoc()){
									$fname = explode(",",$row["employee"])[0];
									$mname = explode(",",$row["employee"])[1];
									$lname = explode(",",$row["employee"])[2];

									//print data in table
									echo "
									<tr class='table-data';>
									<td>" . ucwords($fname) . "</td>
									<td>" . ucwords($mname) . "</td>
									<td>" . ucwords($lname) . "</td>
									<td>" . $row['date_filed'] . "</td>
		                            <td>" . $row['status'] ."</td>
		                            <td>" . $row['reason'] . "</td>
									</tr>";
								}
							}
						?>
					</table>
				</div>



			</div>


		</div>


		<script>
			//Script for showing the show more content inside a modal
			$(document).ready(function() {
				$('.show').click(function(e) {
					e.preventDefault();
					$.ajax({
						url: $(this).attr('href'),
						success: function(res) {
							$('#result').html(res);
						}
					});
				});
			});

			//script for calling datatables library

			$(document).ready(function() {
				$('#leave_month').dataTable({
					"columnDefs": [{
						"orderable": false
					}]
				});
				let table = $('#leave_month').DataTable();
			});
			$('#leave_r').addClass('active');
			$.fn.dataTable.ext.search.push(
				function (settings, data) {
					let month = $("#month").val();
					let table_month =  new Date(data[3]);
					if (month === 'All') {
						return true;
					}
					return Number(table_month.getMonth()+1)==month;
				}
			);
			$('#month').change(function(){
				$('#leave_month').DataTable().draw();
			});

		</script>

	</body>

	</html>
