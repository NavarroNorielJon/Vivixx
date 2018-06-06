<?php
    include 'Utilities/session.php';
    include 'module/navbar.php';
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Vivixx</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body class="white">
        <?php
            if(!isset($_SESSION['user'])){
                include 'logged_out.php';
            }else{
                include 'logged_in.php';
            }
    ?>
    
        <script type="text/javascript" src="JavaScript/js/materialize.min.js"></script>
    </body>
    
</html>