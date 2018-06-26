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


$first_name = ucwords($first_name);
$middle_name = ucwords($middle_name);
$last_name = ucwords($last_name);


if (empty($first_name) || empty($middle_name) || empty($last_name) || empty($email) || empty($password) || empty($cpassword)) {
    echo "
         <script>
             alert('You must fill up all neccessary fields.');
             window.history.back();
         </script>

     ";
    exit;
}
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
if($password !== $cpassword ){
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



$stmt = "SELECT username from user";
$result = $connect->query($stmt);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$vUsername = $row['username'];
$usernames = [];
if($statement = $connect->prepare($stmt)){
    $statement->execute();
    $statement->bind_result($uname);
    while($statement->fetch()){
        $usernames[] = $uname;
    }
    $statement->close();
}



$username = "";
$counter = 1;
if (!empty($middle_name) || $middle_name != '') {
    $username = $first_name[0] . $middle_name[0] . $last_name;
    while (in_array($username, $usernames)) {
        $username = strtoupper(substr($first_name,0,$counter)) . $middle_name[0] . $last_name;
        $counter++;
    }
    echo $username;
}else {
    $username = $first_name[0] . $last_name;
    while (in_array($username, $usernames)) {
        $username = strtoupper(substr($first_name,0,$counter)) . strtoupper($username[1]) . $last_name;
        $counter++;
    }
}



$password = password_hash($password, PASSWORD_DEFAULT);
$insert_stmt = "INSERT INTO `user` (`username`,`email`,`password`,`date_registered`) VALUES ('$username','$email','$password',NOW());";
if($connect->query($insert_stmt) === true){
    $sql = "SELECT user_id FROM user where username='$username';";
    $result = $connect->query($sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $id = $row['user_id'];
	$insert_stmt = "INSERT INTO `user_info` (`user_id`,`first_name`,`middle_name`,`last_name`) VALUES ('$id','$first_name','$middle_name','$last_name');";
	if ($connect->query($insert_stmt) === true) {
        echo "<script>
        $('#signup_form').ajaxForm({
            url: '../utilities/registration.php',
            method: 'post',
            error: function (){
                swal({
                    type: 'error',
                    title: 'Error!',
                    text: 'Invalid input',
                    showConfirmButton: true,
                    icon:'error',
                    timer: 2500
                });
            },
            success: function () {
                swal({
                    type: 'success',
                    title: 'Successfully Registered',
                    text: 'Your username is $username',
                    icon: 'success',
                    showConfirmButton: true,
                }).then(function(){
                    window.location = '/';
                });

            }
        });
        </script>";
    }
}
Disconnect($connect);
?>
