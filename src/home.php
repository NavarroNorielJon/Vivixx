<?php
	include 'utilities/session.php';
?>
<script>
	function sample() {
		
		swal("Welcome to Vivixx Academy" ,"<?php echo "$first_name" ?>", "success");
		}
	
	function hi() {
		alert("Hi");
	}
</script>

<!DOCTYPE html>
<html>
	<head>
		<?php echo "<script>swal('Welcome to Vivixx Academy' , '$first_name', 'success');</script>"?>
        <title>Vivixx</title>
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
        <link type="text/css" rel="stylesheet" href="style/bootstrap/bootstrap.min.css" media="screen, projection">
        <link type="text/css" rel="stylesheet" href="style/style.css" media="screen, projection">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>

    <body onload="sample()">
    	<div class="row no-gutters">
        	<div class="col-sm-3">
        		<?php include 'modules/sidenav.php'; ?>
        	</div>

        	<div class='col-sm-9'  id="home-content">
            	<div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Announcements</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>        
                        <div style="text-align: right"><a><button class="btn btn-primary" onclick="sample();">See more</button></a></div>
                    </div>
            </div>
                    <div class="row" style="padding-top: 5%;">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Calendar</h4>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>        
                                    <div style="text-align: right"><a><button class="btn btn-primary">See more</button></a></div>
                                </div>
                            </div>
                        </div>

                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Upcoming Events</h4>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>        
                                    
                                <div style="text-align: right">
                                    <a>
                                        <button class="btn btn-primary">See more</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<script type="text/javascript" src="script/ajax.js"></script>
        <script type="text/javascript" src="script/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="script/popper.min.js"></script>
        <script type="text/javascript" src="script/bootstrap/bootstrap.min.js"></script>
		<script type="text/javascript" src="script/sweetalert.min.js"></script>
    </body>
</html>
