<?php
    include 'db.php';
    session_start();
    $connect = Connect();
    if(isset($_POST["userOrEmail"]) && isset($_POST["login_password"])){
        $user = mysqli_real_escape_string($connect, $_POST["userOrEmail"]);
        $password = mysqli_real_escape_string($connect, $_POST["login_password"]);
        $stmt = "SELECT username, password, type FROM user WHERE username = '$user' or email = '$user' ";
        $results = mysqli_query($connect, $stmt);
        $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
        $count = mysqli_num_rows($results);
        $passwordVerify = $row['password'];
        $type = $row["type"];
        if ($count == 1) {
            if (password_verify($password, $passwordVerify)) {
                if($_SESSION['user'] = $user && $type === "user"){
                $test = "SELECT * FROM user_info NATURAL JOIN user WHERE (email='$user' or username='$user') and birth_place is null";
                $_SESSION['user'] = $user;
                $result = mysqli_query($connect,$test);
                if($result->num_rows > 0){
                    header('location:update_information');
                    echo "<script>
                            alert('Invalid username or password');
                          </script>";
                    // if(isset($_SESSION['']) && ){
                    //     header('location:update_information');
                    // }
                }else{
                    header('location:/home');
                }
            }elseif($type === "admin"){
                header('location:../admin/index');
            }

            }else {
				echo "<script>
                        alert('Invalid username or password');
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
