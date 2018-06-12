<?Php
//track IP
	$ip=$_SERVER['REMOTE_ADDR'];
	echo "IP address= $ip";
//track visited page
	session_start();
	if(!empty($_SESSION['visited_pages'])) {
  		$_SESSION['visited_pages']['prev'] = $_SESSION['visited_pages']['current'];
	}else {
  		$_SESSION['visited_pages']['prev'] = 'No previous page';
	}
		$_SESSION['visited_pages']['current'] = $_SERVER['REQUEST_URI'];

//