<?php
    require_once "connectToDb.php";
    session_start();

    if(isset($_SESSION['user'])){
        $loggedin_user = $_SESSION['user'];
        $checkUser = $_SESSION['user'];
    }