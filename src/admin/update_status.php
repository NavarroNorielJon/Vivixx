<?php
    if(isset($_POST["username"])){
    	$username = $_POST["username"];
    	include '../Utilities/db.php';

    	$update = "UPDATE mis.user SET status=enabled WHERE username='".$username."';";
    }else{
    	$update = "UPDATE mis.user SET status=disabled WHERE username='".$username."';";
    }
