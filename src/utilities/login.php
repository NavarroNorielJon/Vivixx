<?php
    include 'db.php';
    session_start();
    $connect = Connect();
    if (isset($_POST["userOrEmail"]) && isset($_POST["login_password"])) {
        $user = mysqli_real_escape_string($connect, $_POST["userOrEmail"]);
        $password = mysqli_real_escape_string($connect, $_POST["login_password"]);
        $sql = "SELECT username, email FROM user WHERE username = '$user' or email ='$user';";
        $result = mysqli_query($connect,$sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($user === $row['username']) {
            $stmt = "SELECT username, password, type, status FROM user WHERE username = '$user' or email = '$user';";
            $results = mysqli_query($connect, $stmt);
            $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
            $count = mysqli_num_rows($results);
            $passwordVerify = $row['password'];
            $type = $row["type"];
            $status = $row["status"];
            if ($count == 1) {
                if (password_verify($password, $passwordVerify) && $status === "enabled") {
                    if ($_SESSION['user'] = $user && $type === "user") {
                        $test = "SELECT * FROM user_info NATURAL JOIN user WHERE (email='$user' or username='$user') and birth_place is null";
                        $_SESSION['user'] = $user;
                        $result = mysqli_query($connect,$test);
                        if ($result->num_rows > 0 ) {
                            header('location:../pages/update_information');
                        } else {
                            header('location:../pages/home');
                        }
                    } elseif ($type === "admin") {
                        header('location:../admin/index');
                    }
                }elseif (!password_verify($password, $passwordVerify) && $status === "enabled") {
                    echo "<script>
                            alert('Invalid password');
                            window.location = '/';
                             </script>";
                }elseif (password_verify($password, $passwordVerify) && $status === "disabled") {
                    echo "<script>
                            alert('Your account is disabled');
                            window.location = '/';
                             </script>";
                }
            } else{
                echo "<script>
                        alert('User does not exist');
                        window.location = '/';
                         </script>";
                         exit;
            }
        } else {
            echo "<script>
                    alert('Invalid username or password.');
                    window.location = '/';
                     </script>";
                     exit;
        }
    }
?>
