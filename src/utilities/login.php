<?php
    include 'db.php';
	echo "<script type='text/javascript' src='script/sweetalert.min.js'></script>";
    $connect = Connect();
    if(isset($_POST["userOrEmail"]) && isset($_POST["password"])){
        $user = mysqli_real_escape_string($connect, $_POST["userOrEmail"]);
        $password = mysqli_real_escape_string($connect, $_POST["password"]);
        $stmt = "SELECT username, password FROM user WHERE username = '$user' or email = '$user' ";
        $results = mysqli_query($connect, $stmt);
        $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
        $count = mysqli_num_rows($results);
        $passwordVerify = $row['password'];
        if ($count == 1) {
            if (password_verify($password, $passwordVerify)) {
                session_start();
                $_SESSION['user'] = $user;
                header('location:/home');
            }else {
				echo "<script>
                        alert('Invalid username or password');
                        window.location = '/';
                      </script>";
			}
        }else {	
			echo "<script>
                    alert('User does not exist');
                    window.location = '/';
				  </script>";
		} 
    }
	 
?>
