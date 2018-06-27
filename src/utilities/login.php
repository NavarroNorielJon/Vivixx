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
        if ($user === $row['username'] || $user === $row['email']) {
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
                        $test = "SELECT * FROM user_info NATURAL JOIN user WHERE (email='$user' or username='$user') and (birth_place is null and birth_place is null and contact_number is null and gender is null and height is null and weight is null and blood_type is null and residential_address is null and residential_zip is null and residential_tel_no is null and permanent_address is null and permanent_zip is null and permanent_tel_no is null and citizenship is null and religion is null and civil_status is null and sss_no is null and tin is null and philhealth_no and pagibig_id_no is null)";
                        $_SESSION['user'] = $user;
                        $result = mysqli_query($connect,$test);
                        if ($result->num_rows > 0 ) {
                            //header('location:../pages/update_information');
                            echo 'pages/update_information';
                        } else {
                            //header('location:../pages/home');
                            echo "pages/home";
                        }
                    } elseif ($type === "admin") {
                       // header('location:../admin/index.php');
                        echo "admin/index.php";
                    }
                }elseif (!password_verify($password, $passwordVerify) && $status === "enabled") {
                    //http_response_code(500);
                    echo "Invalid Password";
//                    echo "<script>
//                            alert('Invalid password');
//                            window.location = '/';
//                             </script>";
                }elseif (password_verify($password, $passwordVerify) && $status === "disabled") {
                   // http_response_code(500);
                    echo "Your account is disabled";
//                    echo "<script>
//                            alert('Your account is disabled');
//                            window.location = '/';
//                             </script>";
                }
            } else{
               // http_response_code(500);
                echo "User does not exist";
//                echo "<script>
//                        alert('User does not exist');
//                        window.location = '/';
//                         </script>";
//                         exit;
            }
        } else {
            //http_response_code(500);
            echo "Invalid Username or password";
//            echo "<script>
//                    alert('Invalid username or password.');
//                    window.location = '/';
//                     </script>";
//                     exit;
        }
    }
?>
