<?php
	echo "<script src='../script/jquery.min.js'></script>";
	include '../utilities/session.php';
	$connect = Connect();
	$username = $_POST["username"];
		if(isset($_POST["enable"])){
    		$update = "UPDATE user SET status='enabled' WHERE username='$username'";

    	}else{
    		$update ="UPDATE user SET status='disabled' WHERE username='$username'";
    	}
	
	$result = $connect->query($update);
	header("Location: accounts_status.php");
