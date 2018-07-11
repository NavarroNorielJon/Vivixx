<?php
    if(isset($_SESSION['user'])){
        $current_user = $_SESSION['user'];
        $stmt = "SELECT * FROM user natural join user_info WHERE username='$current_user' or email='$current_user';";
        $results = mysqli_query($connect, $stmt);
        $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
        $username = $row['username'];
		
    }
	$connect = Connect();
	echo "<script type='text/javascript' src='../script/sweetalert.min.js'></script>";
	
	if($type == "user"){
		$update ="UPDATE user SET status='disabled' WHERE username='$username'";
		$result = $connect->query($update);
		echo "<script>
		function logout() {
			window.location = '../utilities/logout.php';
		}
					function securityBreach() {
						swal({
  								title: 'Security Breach!',
  								text: 'Your account has been deactivated',
								icon: 'error',
  								buttons: false,
								closeOnClickOutside: false
							});
						setTimeout(logout, 2000);
						
					}
					
					window.onload = securityBreach;
			 </script>";
		
		die();
	}	
?>
