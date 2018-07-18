<?php
	include '../utilities/session.php';
	include '../utilities/check_user_info.php';
	$connect = Connect();

	$stmt= "SELECT * FROM user NATURAL JOIN user_info NATURAL JOIN user_background NATURAL JOIN user_educ NATURAL JOIN user_offspring NATURAL JOIN emergency_info_sheet NATURAL JOIN employee_info WHERE user_id='$user_id';";
	$res = mysqli_query($connect,$stmt);
	$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
	$department = $row['department'];
?>

	<!DOCTYPE html>
	<html lang="en">

	<head>
		<title>Vivixx PH | Home</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
		<link type="text/css" rel="stylesheet" href="../style/bootstrap/bootstrap.min.css">
		<link type="text/css" rel="stylesheet" href="../style/style.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script type="text/javascript" src="../script/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="../script/multislider.min.js"></script>
		<script type="text/javascript" src="../script/popper.min.js"></script>
		<script type="text/javascript" src="../script/bootstrap/bootstrap.min.js"></script>
		<script type="text/javascript" src="../script/ajax.js"></script>
	</head>

	<body class="home">
		<div class="wrapper">
			<?php include 'fragments/sidebar.php'; ?>
			<div class="content">
				<h1 style="text-align:center; font-family:rock;">Announcements/Events</h1>
				<div class="mixedSlider" id="mixedSlider">
					<div>
						<div class="MS-content">
							<?php
								$query = "SELECT * FROM announcement_attachments natural join announcement where CURDATE()>=start_date and CURDATE() <= end_date and departments like('%".$department."%') or departments like('%All%') group by 1;";
								$announcement = mysqli_query($connect, $query);
								if($announcement->num_rows >1 ){
									while ($row1 = mysqli_fetch_array($announcement)) {
										if ($row1['status'] == "on") {
											echo "
											<div class='item'>
												<div class='imgTitle'>
													<h2 class='blogTitle'>".$row1['subject']. "Due Date:" .$row1['end_date'] ."</h2>
												";
										} else {
											echo "
											<div class='item'>
												<div class='imgTitle'>
													<h2 class='blogTitle'>".$row1['subject']."</h2>
												";
										}
										echo "<img class='images' src='../img/announcement-default1.jpg'>";
										echo "
											</div>
											<a href='#announcement' data-toggle='modal' onclick='announcement(".$row1['announcement_id']."); return false'>Read More</a>
										</div>
											";
									}
								} else {
									echo "<br><br><br><br><br><br><h1 style='text-align:center'>No Announcement.</h1>";
								}
							?>
						</div>
						<?php
						if ($announcement->num_rows > 1 ) {
							echo '<div class="text-center">
								<button class="MS-left">
									<i class="fa fa-angle-left" aria-hidden="true"></i>
								</button>
								<button class="MS-right">
									<i class="fa fa-angle-right" aria-hidden="true"></i>
								</button>
							</div>';
						}
						 ?>
					</div>
					<div class='modal fade' id='announcement' role='dialog'>
						<div class='modal-dialog modal-dialog-centered'>
							<div class='modal-content'>
								<div class='modal-header'>
									<h4 class='modal-title' id="title"></h4>
								</div>

								<div class='modal-body'>
									<div id="am"></div>
									<div id="dl"></div>
								</div>

								<div class='modal-footer'>
									<button type='button' class='btn btn-danger' data-dismiss='modal'>
									Close
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

		<script type="text/javascript">
			$('#mixedSlider').multislider({
				duration: 1000,
				interval: 3500
			});
			$('#home').addClass('active');

		</script>

	</body>

	</html>
