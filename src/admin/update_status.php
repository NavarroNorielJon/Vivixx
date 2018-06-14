<?php
	include '../utilities/db.php';
	$connect = Connect();
	$username = $_GET["username"];

		if(isset($_GET["enable"])){
    		$update = "UPDATE user SET status='enabled' WHERE username='$username'";

    	}else{
    		$update ="UPDATE user SET status='disabled' WHERE username='$username'";
    	}
	
	$result = $connect->query($update);
header("location:success_accounts.php");