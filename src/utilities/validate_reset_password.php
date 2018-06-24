<?php
include 'db.php';
$connect = Connect();

$account = $_POST['account'];
$account = mysqli_real_escape_string($connect, $account);
$username = explode('.', $account)[0];
$password = $_POST['new_pass'];
$conf_password = $_POST['confirm_pass'];

if ($password != $conf_password){
    echo "
        <script>
            alert('Password don\'t match');
            window.history.back();
        </script>
        ";
        exit();
}

$sql = "SELECT CONCAT(username, '.', password), password FROM user where  CONCAT(username, '.', password) = '$account'";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    $old_password = $result->fetch_assoc()['password'];
    $password = password_hash($password,PASSWORD_DEFAULT);
    $update_stmt = "UPDATE user SET password='$password' WHERE username = '$username' AND password = '$old_password';";
    if ($connect->query($update_stmt) === true) {
        echo "
        <script>
            alert('You have successfully changed your password.');
            location.href = '/';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Password do not match.');
            window.history.back();
        </script>
        ";
        exit();
    }
} else {
    echo "
        <script>
            alert('Error in resetting your password, this link might be already expired.');
        </script>
        ";
}
