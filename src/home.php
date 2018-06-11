<?php
	include 'utilities/session.php';
?>
<!DOCTYPE html>
<html>
	<head>
        <title>Vivixx</title>
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
        <link type="text/css" rel="stylesheet" href="style/bootstrap/bootstrap.min.css" media="screen, projection">
        <link type="text/css" rel="stylesheet" href="style/style.css" media="screen, projection">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>

    <body>
    	<div class="row">
        	<div class="col-3">
        		<?php include 'module/sidenav.php'; ?>
        	</div>

        	<div class='col-9'>
            	<h1>Welcome to Vivixx Academy <a href="utilities/logout.php"><?php echo "$email!"?></a></h1>
        	</div>
        </div>
    </body>
</html>
