<?php
    include 'db.php';
    session_start();
    $connect = Connect();
    if(isset($_POST["userOrEmail"]) && isset($_POST["password"])){
        $user = mysqli_real_escape_string($connect, $_POST["userOrEmail"]);
        $password = mysqli_real_escape_string($connect, $_POST["password"]);
        $stmt = "SELECT username, password, type FROM user WHERE username = '$user' or email = '$user' ";
        $results = mysqli_query($connect, $stmt);
        $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
        $count = mysqli_num_rows($results);
        $passwordVerify = $row['password'];
        $type = $row["type"];
        if ($count == 1) {
            if (password_verify($password, $passwordVerify)) {
                if($_SESSION['user'] = $user){
                $test = "SELECT * FROM user_info NATURAL JOIN user WHERE birthdate ='null'";
                $_SESSION['user'] = $user;
                $result = mysqli_query($connect,$test);
                if($result->num_rows > 0){
                    header('location:/information');
                }else{
                    header('location:/home');
                }
            }elseif($type === "admin"){
                header('location:admin/index');
            }

            }else {
				echo "<script>
                        alert('Invalid username or password');
                      </script>";
			}
        }else {
			echo "<script>
                    alert('User does not exist');
				  </script>";
		}
    }

?>
