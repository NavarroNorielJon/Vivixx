<?php
	include '../mis/utilities/session.php';
	$connect = Connect();
	$username = mysqli_real_escape_string($connect,$_GET["username"]);

	if(isset($_GET["enable"])){
    		$update = "UPDATE user SET status='enabled' WHERE username='$username'";
	}else{
		$update ="UPDATE user SET status='disabled' WHERE username='$username'";
	}
	
	$result = $connect->query($update);
?>
