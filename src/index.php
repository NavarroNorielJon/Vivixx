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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body style="background-color:#005959;">
        <?php
            if(!isset($_SESSION['user'])){
                include 'logged_out.php';
                include 'module/footer.php';
                } else {
                    include 'module/sidenav.php';
                    include 'logged_in.php';
                    }
        ?>
        <script type="text/javascript" src="script/ajax.js"></script>
        <script type="text/javascript" src="script/jquery.min.js"></script>
        <script type="text/javascript" src="script/popper.min.js"></script>
        <script type="text/javascript" src="script/bootstrap/bootstrap.min.js"></script>
    </body>
</html>
