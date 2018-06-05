<?php
include "module/navbar.php";
?>

<html>
    <head>
		<title>MIS</title>
        <link type="text/css" rel="stylesheet" href="Style/materialize/css/materialize.min.css" media="screen, projection">
        <link type="text/css" rel="stylesheet" href="Style/style.css" media="screen, projection">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
    
    <body class="amber lighten-2">
        <div class="center-align container valign-wrapper">
            <div class="row white" id="login-form">
                <form action="Utilities/login.php" method="post" class="col s12">
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" name="user" class="validate" id="userOrEmail" required="required">
                            <label for="userOrEmail">Username or Email-Address</label>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="password" class="validate" required="required" name="password" id="pass">
                            <label for="pass">Password</label>
                        </div>
                    </div>
                
                    <button type="submit" class="waves-effect waves-light btn teal darken-3" name="submit">Login</button>
                    <a href = "#" style="display: block; margin: 1rem;">Forgot password?</a>
	           </form>
            </div>
        </div>
    
    <script type="text/javascript" src="JavaScript/js/materialize.min.js"></script>
</body>
    
</html>