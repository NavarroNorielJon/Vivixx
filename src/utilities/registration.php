<?php
include 'db.php';
$connect = Connect();

//user credentials
$first_name = mysqli_real_escape_string($connect, $_POST['first_name']);
$middle_name = mysqli_real_escape_string($connect, $_POST['middle_name']);
$last_name = mysqli_real_escape_string($connect, $_POST['last_name']);
$email = mysqli_real_escape_string($connect, $_POST['email']);
$password = mysqli_real_escape_string($connect, $_POST['password']);
$cpassword = mysqli_real_escape_string($connect, $_POST['confirm_password']);


/**
 *Checks if the email entered is following the *email@domain.extension
 *1. create a condition which will be followed in registering the
 *   email address
 *2. if the condition is not met output an alert and redirect to the
 *   registration page.
 */
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

    echo "
        <script>
            alert('Invalid Email.');
            window.history.back();
        </script>
    ";
    exit;
}



/**
 *Checks if the passwords are the same
*/
if($password != $cpassword ){
	echo "
        <script>
            alert('Password doesn't match.');
            window.history.back();
        </script>
    ";
    exit;
}
/**
 *Checks if the contact entered is exactly 9 digits, else
 *it will return to the registration
 */

if(strlen($password) < 8 || strlen($password) > 16){
    echo "
        <script>
            alert('Password length must be greater than 8 but less than 16 characters');
			window.history.back();
        </script>
    ";
    exit;

}
$username = strtoupper($first_name[0]) . strtoupper($middle_name[0]) . ucfirst($last_name);
$password = password_hash($password, PASSWORD_DEFAULT);


$insert_stmt = "INSERT INTO `user` (`username`,`email`,`password`,`date_registered`) VALUES ('$username','$email','$password',NOW());";
if($connect->query($insert_stmt) === true){
    $sql = "SELECT user_id FROM user where username='$username';";
    $result = $connect->query($sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $id = $row['user_id'];
	$insert_stmt = "INSERT INTO `user_info` (`user_id`,`first_name`,`middle_name`,`last_name`) VALUES ('$id','$first_name','$middle_name','$last_name');";
	if($connect->query($insert_stmt) === true){
		echo "
			<script>
				alert('Registration Successful. Your username is $username');

			</script>
		";
	} else {
		echo "Error: <br>" . $connect->error;
	}
} else
{
	echo "Error: <br>" . $connect->error;
}
Disconnect($connect);
?>
