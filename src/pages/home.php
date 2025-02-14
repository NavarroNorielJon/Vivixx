<?php
	include '../mis/utilities/session.php';
	include '../mis/utilities/check_user_info.php';
	$connect = Connect();

	$stmt= "SELECT * FROM employee_info WHERE user_id='$user_id';";
	$res = mysqli_query($connect,$stmt);
	$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
	$department = explode("|",$row['department'])[0];
?>

	<!DOCTYPE html>
	<html lang="en">

	<head>
		<title>Vivixx PH | Home</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="../mis/img/favicon.ico" type="image/x-icon">
		<link type="text/css" rel="stylesheet" href="../mis/style/bootstrap/bootstrap.min.css">
		<link type="text/css" rel="stylesheet" href="../mis/style/style.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script type="text/javascript" src="../mis/script/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="../mis/script/multislider.min.js"></script>
		<script type="text/javascript" src="../mis/script/popper.min.js"></script>
		<script type="text/javascript" src="../mis/script/bootstrap/bootstrap.min.js"></script>
		<script type="text/javascript" src="../mis/script/ajax.js"></script>
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
								$query = "SELECT * FROM announcement_attachments natural join announcement where (CURDATE()>=start_date and CURDATE() <= end_date) and (departments like('%All%') or departments like('%".$department."%')) and connection='resume' group by 1;";
								$announcement = mysqli_query($connect, $query);
								if($announcement->num_rows >0){
									while ($row1 = mysqli_fetch_array($announcement)) {
										if ($row1['status'] == "on") {
											echo "
											<div class='item'>
											<h3 style='color:red'>Due Date: ".$row1['end_date'] ."</h3>
												<div class='imgTitle'>
													<h2 class='blogTitle'>".$row1['subject']."</h2>
												";
										} else {
											echo "
											<div class='item'>
											<h3 style='opacity:0'>Due Date: ".$row1['end_date'] ."sada</h3>
												<div class='imgTitle'>
													<h2 class='blogTitle'>".$row1['subject']."</h2>
												";
										}
										echo "<img class='images' src='../mis/img/announcement-default1.jpg'>";
										echo "
											</div>";
										echo "<a href='#announcement' data-toggle='modal' onclick='announcement(".$row1['announcement_id']."); return false'>Read More</a>
										</div>";
									}
								} else {
									echo "<br><br><br><br><br><br><h1 style='text-align:center'>No Announcement.</h1>";
								}
							?>
						</div>
						<?php
						if ($announcement->num_rows > 1 ) {
							echo '<div class="text-center">
								<button class="MS-left btn btn-info">
									<i class="material-icons">navigate_before</i>
								</button>
								<button class="MS-right btn btn-info">
									<i class="material-icons">navigate_next</i>
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
