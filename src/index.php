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

    <body style="background-color:#005959;">
        <?php
            if(!isset($_SESSION['user'])){
                include 'logged_out.php';
                include 'module/footer.html';
                } else {
                    echo "<div class='row'>";
                            echo "<div class='col-3'>";
                                include 'module/sidenav.php';
                            echo "</div>";
                            
                            echo "<div class='col-9'>";
                                include 'logged_in.php';
                            echo "</div>";
                    echo "</div>";
                    }
        ?>
        <script type="text/javascript" src="script/ajax.js"></script>
        <script type="text/javascript" src="script/jquery.min.js"></script>
        <script type="text/javascript" src="script/popper.min.js"></script>
        <script type="text/javascript" src="script/bootstrap/bootstrap.min.js"></script>
    </body>
</html>
