<html>
     <head>
        <title>Vivixx</title>
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
        <link type="text/css" rel="stylesheet" href="../style/bootstrap/bootstrap.min.css" media="screen, projection">
        <link type="text/css" rel="stylesheet" href="../style/style.css" media="screen, projection">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body>
        <nav class="bg-dark" id="sidebar">
            <div class="sidebar-header">
                <h2><?php echo "$user_first"; ?></h2>
            </div>
            
            <ul class="list-unstyled components">
                <li><a href="#">Page1</a></li>
                <li><a href="#">Page2</a></li>    
                <li><a href="#">Page3</a></li>    
                <li><a href="../utilities/logout.php">Logout</a></li>    
            </ul>
        </nav>
            
        <div id="content">
            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                Toggle Sidebar
            </button>
        </div>
    </body>
</html>
