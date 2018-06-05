<?php
include 'Utilities/db.php';
$connect = Connect();


$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$birthdate = $_POST['birth_date'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['confirm_password'];
$contact = $_POST['contact_number'];

/**
 *Checks if the email entered is following the *email@domain.extension
 *1. create a condition which will be followed in registering the
 *   email address
 *2. if the condition is not met output an alert and redirect to the
 *   registration page.
 */
if(!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/",$email)){
    
    echo "
        <script>
            alert('Invalid Email.');
            window.history.back();
        </script>
    ";
    exit;
}


$sql = "SELECT * FROM user where email = '$email'";
$result = $connect->query($sql);

/**
 *If the result is greater than 0 output an alert and redirect
 *to the registration
 */
if($result->num_rows > 0){
    echo "
        <script>
            alert('The Email address that you entered is already in use.');
            window.history.back();
        </script>
    ";
    exit;
}

/**
 *Checks if the contact entered is exactly 9 digits, else
 *it will return to the registration
 */
if(!preg_match("/^09[0-9]{9}$/", $contact)){
    echo "
        <script>
            alert('Invalid Contact Number.');
            windows.history.back();
        </script>
    ";
    exit;
}

$sql = "SELECT * FROM user_info where contact_number = '$contact'";
$result = $connect->query($sql);

/**
 *Checks if the contact is already being used and will return
 *to registration.
 */
if($result->num_rows > 0){
    echo "
        <script>
            alert('The Contact you have entered is already in use.');
            window.history.back();
        </script>
    ";
    exit;
}

$sql = "SELECT * FROM user where username = '$username'";
$result = $connect->query($sql);

if($result->num_rows > 0){
    echo "
        <script>
            alert('Username is already in use');
            window.history.back();
        </script>
    ";
    exit;
}

if(strlen($password) < 8 || strlen($password) > 16){
    echo "
        <script>
            alert('Password length must be greater than 8 but less than 16 characters');
        </script>
    ";
    exit;
    
}
$password = password_hash($password,PASSWORD_DEFAULT);

$insert_stmt = "INSERT INTO `user`(`username`,`email`,`password`) VALUES ('$username','$email','$password');";

if($connect->query($insert_stmt) === true){
	$insert_stmt = "INSERT INTO `user_info`(`username`,`first_name`,`last_name`,`birthdate`,`contact_number`,`address`) VALUES ('$username', '$first_name','$last_name','$birthdate','$contact_number','$address');";
	if($connect->query($insert_stmt) === true){
		echo "
			<script>
				alert('Registration Successful);
				window.location.replace('/');
			</script>
		"
	} else{
		echo "Error: " . $query . "<br>" . $connect->error;
	}
} else {
	echo "Error: " . $query . "<br>" . $connect->error;
}
Disconnect($connect);
?>