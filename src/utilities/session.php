<?php
 	include_once 'db.php';
    session_start();
    $connect = Connect();
    if(isset($_SESSION['user'])){
        $current_user = $_SESSION['user'];
        $stmt = "SELECT * FROM user WHERE username='$current_user' or email='$current_user';";
        $results = mysqli_query($connect, $stmt);
        $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
        $username = $row["username"];
        $user_id = $row['user_id'];
		$type = $row['type'];
    }

	if(!isset($_SESSION['user'])){
        header('location:/');
    }else {
		if($type === "admin"){
        	header('location:/admin/accounts/accounts_status');
    	}
	}

	echo "<script>alert('$type');</script>";
?>
