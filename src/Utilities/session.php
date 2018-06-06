<?php
    require_once "db.php";
    session_start();

    if(isset($_SESSION['user'])){
        $loggedin_user = $_SESSION['user'];
    }
?>