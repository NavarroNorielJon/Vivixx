<?php
    if(isset($_SESSION['user'])){
        $current_user = $_SESSION['user'];
        $stmt = "SELECT * FROM user natural join user_info WHERE username='$current_user' or email='$current_user';";
        $results = mysqli_query($connect, $stmt);
        $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
        $username = $row['username'];

    }
 	$connect = Connect();

	if($type == "user"){
		header("location:/pages/home");
	} else {
        header("location:/admin/");
    }
?>
