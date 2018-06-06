<?php
    include 'Utilities/session.php';
    include 'module/navbar.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>MIS</title>
        <link type="text/css" rel="stylesheet" href="Style/materialize/css/materialize.min.css" media="screen, projection">
        <link type="text/css" rel="stylesheet" href="Style/style.css" media="screen, projection">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
    
<body class="white">
    <?php
        if(!isset($_SESSION['user'])){
            echo"
            <div id='start-php'>
                <img src='img/Logo.png' id='start-logo'>
                <h4 class='center-align'>Vivixx Academy</h4>
            </div>";
        }else{
            echo "<div class='center-align'><h1>Welcome to Vivixx Academy $user_first!</h1></div>";
        }
    ?>
    
    <script type="text/javascript" src="JavaScript/js/materialize.min.js"></script>
</body>
    
</html>