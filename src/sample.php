<!DOCTYPE html>
<html>

	<head>
		<title>Update Information</title>
		<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="../style/bootstrap/bootstrap.min.css" media="screen, projection">
		<link type="text/css" rel="stylesheet" href="../style/style2.css" media="screen, projection">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script type="text/javascript" src="../script/bootstrap/bootstrap.min.js"></script>

	</head>

	<body id="update-information">
		<div class="update-information-header">
			<h1>Update Information Form
			</h1>
			<button type="button" class="btn btn-default logout">
				<a href="utilities/logout" id="logout">
					<i class="material-icons">
						power_settings_new
					</i>
				</a>
			</button>
		</div>
		<div class="container">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#tab1" data-toggle="tab">Shipping</a>
				</li>
				<li>
					<a href="#tab2" data-toggle="tab">Quantities</a>
				</li>
				<li>
					<a href="#tab3" data-toggle="tab">Summary</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="tab1">
					<a class="btn btn-primary btnNext">Next</a>
				</div>
				<div class="tab-pane" id="tab2">
					<a class="btn btn-primary btnNext">Next</a>
					<a class="btn btn-primary btnPrevious">Previous</a>
				</div>
				<div class="tab-pane" id="tab3">
					<a class="btn btn-primary btnPrevious">Previous</a>
				</div>
			</div>
		</div>

		<div id="footer">
			<p>Vivixx Corporation</p>
		</div>
		<script>
			$('.btnNext').click(function () {
				$('.nav-tabs > .active').next('li').find('a').trigger('click');
			});

			$('.btnPrevious').click(function () {
				$('.nav-tabs > .active').prev('li').find('a').trigger('click');
			});
		</script>

		<script type="text/javascript" src="script/jquery.form.min.js"></script>
		<script type="text/javascript" src="script/alerts.js"></script>
		<script type="text/javascript" src="script/popper.min.js"></script>
		<script type="text/javascript" src="script/sweetalert.min.js"></script>
		<script type="text/javascript" src="script/ajax.js"></script>
	</body>

</html>