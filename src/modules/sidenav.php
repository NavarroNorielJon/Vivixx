<!DOCTYPE html>
<html>
     <head>
        <title>Vivixx</title>
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
        <link type="text/css" rel="stylesheet" href="../style/bootstrap/bootstrap.min.css" media="screen, projection">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="../style/style.css" media="screen, projection">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body style="overflow: hidden;">
        <nav id="sidebar">
			<!-- Header -->
			<div class="sidebar-header">
                <a href="/home">
            	   <img src="../img/Lion.png" id="side-logo">
                </a>
				<hr>
            </div>

			<!-- Links -->
            <ul class="list-unstyled components" style="text-align: left;">
                <li>
                    <a class="navbar-brand" href="../profile" id="user_name">
                        <i class="large material-icons">account_circle</i>
                        <?php echo "$first_name"; ?>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="large material-icons">notifications</i>
                        Notification
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="large material-icons">attach_money</i>
                        Salary Request
                    </a>
                </li>

				<li>
                    <a href="#">
                        <i class="large material-icons">attach_money</i>
                        Leave Request
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="large material-icons">event</i>
                        Events
                    </a>
                </li>

                <li style="position:absolute;bottom:5%;">
                    <a href="../utilities/logout.php">
                        <i class="large material-icons">power_settings_new</i>
                        Logout
                    </a>
                </li>

            </ul>
        </nav>
    </body>
</html>
