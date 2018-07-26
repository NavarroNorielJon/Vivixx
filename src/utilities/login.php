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
            $stmt = "SELECT username, password,email, type, status FROM user WHERE username = '$user' or email = '$user';";
            $results = mysqli_query($connect, $stmt);
            $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
            $count = mysqli_num_rows($results);
            $passwordVerify = $row['password'];
            $type = $row["type"];
            $status = $row["status"];
            if ($count == 1) {
                if (password_verify($password, $passwordVerify) && $status === "enabled") {
                    if ($_SESSION['user'] = $user && ($type === "user")) {
                        $test = "SELECT * FROM user_info NATURAL JOIN user WHERE email='$user' or username='$user' and
                            (birth_place is null and birth_place is null and contact_number is null and gender is null and height is null
                            and weight is null and blood_type is null and residential_address is null and residential_zip is null and
                            residential_tel_no is null and permanent_address is null and permanent_zip is null and permanent_tel_no is null
                            and citizenship is null and civil_status is null and sss_no is null and tin is null and philhealth_no and
                            pagibig_id_no is null)";
                        $_SESSION['user'] = $user;
                        $result = mysqli_query($connect,$test);
                        if ($result->num_rows > 0 ) {
                            echo 'pages/update_information';
                        } else {
                            echo "pages/home";
                        }
                    } elseif ($type === "admin") {
                        $_SESSION['user'] = $user;
                        echo "admin/accounts/accounts_status";
                    }
                }elseif (!password_verify($password, $passwordVerify)) {
                    echo "Invalid Password";
                }elseif (password_verify($password, $passwordVerify) && $status === "disabled") {
                    echo "Your account is disabled";
                }
            } else{
                echo "User does not exist";
            }
        } else {
            echo "Invalid Username or password";
        }
    }
