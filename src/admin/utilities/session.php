<?php
    require_once 'db.php';
    session_start();
    $connect = Connect();
	if(!isset($_SESSION['user'])){
        header('location:/');
    }
?>  
