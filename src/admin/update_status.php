<?php
	include '../utilities/session.php';
	$connect = Connect();
	// $username = $_POST["username"];
	// echo $username;
	$username = $_GET["username"];

		if(isset($_GET["enable"])){
    		$update = "UPDATE user SET status='enabled' WHERE username='$username'";

    	}else{
    		$update ="UPDATE user SET status='disabled' WHERE username='$username'";
    	}
	
	$result = $connect->query($update);
header("location:success_accounts.php");