<?php
include 'mis/db.php';
$connect = Connect();

$account = $_POST['account'];
$account = mysqli_real_escape_string($connect, $account);
$username = explode('.', $account)[0];
$password = $_POST['password'];
$conf_password = $_POST['confirm_password'];

if ($password != $conf_password){
    echo "Password don't match.";
    exit();
}

$sql = "SELECT CONCAT(username, '.', password), password FROM user where  CONCAT(username, '.', password) = '$account'";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    $old_password = $result->fetch_assoc()['password'];
    $password = password_hash($password,PASSWORD_DEFAULT);
    $update_stmt = "UPDATE user SET password='$password' WHERE username = '$username' AND password = '$old_password';";
    if ($connect->query($update_stmt) === true) {
        echo "You have successfully changed your password.";
    } else {
        echo "Password do not match.";
        exit();
    }
} else {
    echo "Sorry, The link is already expired!";
}
