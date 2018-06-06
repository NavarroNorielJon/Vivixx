<?php
include 'db.php';
$connect = Connect();

$first_name = mysqli_real_escape_string($connect, $_POST['first_name']);
$last_name = mysqli_real_escape_string($connect, $_POST['last_name']);
$birthdate = mysqli_real_escape_string($connect, $_POST['birthdate']);
$house_number = mysqli_real_escape_string($connect, $_POST['house_number']);
$street = mysqli_real_escape_string($connect, $_POST['street']);
$barangay = mysqli_real_escape_string($connect, $_POST['barangay']);
$city = mysqli_real_escape_string($connect, $_POST['city']);
$province = mysqli_real_escape_string($connect, $_POST['province']);
$gender = mysqli_real_escape_string($connect, $_POST['gender']);
$username = mysqli_real_escape_string($connect, $_POST['username']);
$email = mysqli_real_escape_string($connect, $_POST['email']);
$password = mysqli_real_escape_string($connect, $_POST['password']);
$cpassword = mysqli_real_escape_string($connect, $_POST['confirm_password']);
$contact = mysqli_real_escape_string($connect, $_POST['contact_number']);
$address = "$house_number $street, $barangay, $city, $province";
if (empty($username) || empty($first_name) || empty($last_name) || empty($email) || empty($password)
    || empty($cpassword) || empty($gender) || empty($address) || empty($contact) || empty($birthdate)) {
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
            alert('Email already exist.');
            window.history.back();
        </script>
    ";
    exit;
}
/**
 Checks if the passwords are the same
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
			window.history.back();
        </script>
    ";
    exit;
    
}
$password = password_hash($password,PASSWORD_DEFAULT);

$birthdate = date('Y-m-d',strtotime($birthdate));
$insert_stmt = "INSERT INTO `user`(`username`,`email`,`password`,`date_registered`) VALUES ('$username','$email','$password',NOW());";

if($connect->query($insert_stmt) === true){
	$insert_stmt = "INSERT INTO `user_info`(`username`,`first_name`,`last_name`,`birthdate`,`contact_number`,`address`,`gender`) VALUES ('$username', '$first_name','$last_name','$birthdate','$contact','$address','$gender');";
	if($connect->query($insert_stmt) === true){
		echo "
			<script>
				alert('Registration Successful);
				window.location.replace('/');
			</script>
		";
	} else {
		echo "Error: " . $query . "<br>" . $connect->error;
	}
} else {
	echo "Error: " . $query . "<br>" . $connect->error;
}
Disconnect($connect);
?>