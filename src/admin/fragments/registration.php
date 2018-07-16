<?php
include '../../utilities/session.php';
$connect = Connect();

//user credentials
$first_name = ucwords(mysqli_real_escape_string($connect, $_POST['first_name']));
if (!empty($_POST['middle_name'])) {
    $middle_name = ucwords(mysqli_real_escape_string($connect, $_POST['middle_name']));

} else {
    $middle_name = null;
}
$last_name = ucwords(mysqli_real_escape_string($connect, $_POST['last_name']));
$email = mysqli_real_escape_string($connect, $_POST['email']);
$password = mysqli_real_escape_string($connect, $_POST['password']);
$cpassword = mysqli_real_escape_string($connect, $_POST['confirm_password']);


$stmt = "SELECT username from user";
$result = $connect->query($stmt);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$vUsername = $row['username'];
$usernames = [];
if ($statement = $connect->prepare($stmt)) {
    $statement->execute();
    $statement->bind_result($uname);
    while ($statement->fetch()) {
        $usernames[] = $uname;
    }
    $statement->close();
}


$username = "";
$counter = 1;
if (!empty($middle_name) || $middle_name != '') {
    $username = $first_name[0] . $middle_name[0] . $last_name;
    while (in_array($username, $usernames)) {
        $username = strtoupper(substr($first_name, 0, $counter)) . $middle_name[0] . $last_name;
        $counter++;
    }
} else {
    $username = $first_name[0] . $last_name;
    while (in_array($username, $usernames)) {
        $username = strtoupper(substr($first_name, 0, $counter)) . strtoupper($username[1]) . $last_name;
        $counter++;
    }
}


$password = password_hash($password, PASSWORD_DEFAULT);
$insert_stmt = "INSERT INTO `user` (`username`,`email`,`password`,`date_registered`) VALUES ('$username','$email','$password',NOW());";
if ($connect->query($insert_stmt) === true) {
    $sql = "SELECT user_id FROM user where username='$username';";
    $result = $connect->query($sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $id = $row['user_id'];
    if (!empty($_POST['middle_name'])) {
        $insert_stmt = "INSERT INTO `user_info` (`user_id`,`first_name`,`middle_name`,`last_name`) VALUES ('$id','$first_name','$middle_name','$last_name');";
    }else {
        $insert_stmt = "INSERT INTO `user_info` (`user_id`,`first_name`,`last_name`) VALUES ('$id','$first_name','$last_name');";
    }
    $connect->query($insert_stmt);
}
Disconnect($connect);
echo $username;
