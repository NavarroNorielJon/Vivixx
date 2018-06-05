<html>
    <head>
    <title>MIS</title>
    <link type="text/css" rel="stylesheet" href="../Style/materialize/css/materialize.min.css" media="screen, projection">
    <link type="text/css" rel="stylesheet" href="../Style/style.css" media="screen, projection">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="../JavaScript/modal.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body>
        <nav>
            <div class="nav-wrapper teal darken-3"><a href="#" class="brand-logo">Vivixx</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">

                <li><a href="../index.php" class="modal-trigger" data-target="login">Login</a></li>
                <li><a href="../registration.html">Register</a></li>

                </ul>
            </div>
        </nav>

        <div class="modal" id="login">    
            <div class="modal-content">
                
                <div class="right-align">
                    <button type="button" class="btn-flat modal-action modal-close"><i class="material-icons">close</i></button>
                </div>
                
                <div class="center-align">
                    
                    <img src="../img/Logo.png" id="logo">
                <div>
                <form action="../Utilities/login.php" method="post" class="col s12 ">
                    
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
                    
                    <div class="center-align">
                    <button type="submit" class="waves-effect waves-light btn teal darken-3" name="submit">Login</button>
                    <a href = "#" style="display: block; margin: 1rem;">Forgot password?</a>
                    </div>
	           </form>
            </div>
        </div>
        
        
        
        <script type="text/javascript" src="../JavaScript/js/materialize.min.js"></script>
        <script>M.AutoInit();</script>
    </body>
</html>