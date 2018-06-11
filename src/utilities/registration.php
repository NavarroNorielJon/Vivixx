<?php
include 'db.php';
$connect = Connect();

//user credentials
$username = mysqli_real_escape_string($connect, $_POST['username']);
$email = mysqli_real_escape_string($connect, $_POST['email']);
$password = mysqli_real_escape_string($connect, $_POST['password']);
$cpassword = mysqli_real_escape_string($connect, $_POST['confirm_password']);

//personal information
$first_name = mysqli_real_escape_string($connect, $_POST['first_name']);
$middle_name = mysqli_real_escape_string($connect, $_POST['middle_name']);
$last_name = mysqli_real_escape_string($connect, $_POST['last_name']);
$birthdate = mysqli_real_escape_string($connect, $_POST['birthdate']);
$birth_place = mysqli_real_escape_string($connect,$_POST['pbirth']);
$contact_number = mysqli_real_escape_string($connect, $_POST['contact_number']);
$gender = mysqli_real_escape_string($connect, $_POST['gender']);
$height = mysqli_real_escape_string($connect, $_POST['height']);
$weight = mysqli_real_escape_string($connect, $_POST['weight']);
$blood_type = mysqli_real_escape_string($connect, $_POST['blood']);
$residential_address = mysqli_real_escape_string($connect, $_POST['residential_address']);
$residential_zip = mysqli_real_escape_string($connect, $_POST['residential_zip']);
$residential_tel_no = mysqli_real_escape_string($connect, $_POST['residential_tel_no']);
$permanent_address = mysqli_real_escape_string($connect, $_POST['permanent_address']);
$permanent_zip = mysqli_real_escape_string($connect, $_POST['permanent_zip']);
$permanent_tel_no = mysqli_real_escape_string($connect, $_POST['permanent_tel_no']);
$citizenship = mysqli_real_escape_string($connect, $_POST['citizenship']);
$religion = mysqli_real_escape_string($connect, $_POST['religion']);
$civil_status = mysqli_real_escape_string($connect, $_POST['civil_status']);
$sss_no = mysqli_real_escape_string($connect, $_POST['sss_no']);
$tin = mysqli_real_escape_string($connect, $_POST['tin']);
$philhealth_no = mysqli_real_escape_string($connect, $_POST['philhealth_no']);
$pagibig_id_no = mysqli_real_escape_string($connect, $_POST['pagibig_id_no']);

//family background
$spouse_first_name = mysqli_real_escape_string($connect, $_POST['spouse_first_name']);
$spouse_middle_name = mysqli_real_escape_string($connect, $_POST['spouse_middle_name']);
$spouse_last_name = mysqli_real_escape_string($connect, $_POST['spouse_last_name']);
$occupation = mysqli_real_escape_string($connect, $_POST['occupation']);
$employer = mysqli_real_escape_string($connect, $_POST['employer']);
$business_address = mysqli_real_escape_string($connect, $_POST['business_address']);
$spouse_tel_no = mysqli_real_escape_string($connect, $_POST['spouse_tel_no']);
$father_first_name = mysqli_real_escape_string($connect, $_POST['father_first_name']);
$father_middle_name = mysqli_real_escape_string($connect, $_POST['father_middle_name']);
$father_last_name = mysqli_real_escape_string($connect, $_POST['father_last_name']);
$mother_first_name = mysqli_real_escape_string($connect, $_POST['mother_first_name']);
$mother_middle_name = mysqli_real_escape_string($connect, $_POST['mother_middle_name']);
$mother_last_name = mysqli_real_escape_string($connect, $_POST['mother_last_name']);
$child_name = mysqli_real_escape_string($connect, $_POST['child_name']);
$child_birth = mysqli_real_escape_string($connect, $_POST['child_birth']);

for ($i=0; $i < ; $i++) {

}




if (empty($username)|| empty($email) || empty($password) || empty($cpassword)) {
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
if(!preg_match("/^09[0-9]{9}$/", $contact_number)){
    echo "
        <script>
            alert('Invalid Contact Number.');
            windows.history.back();
        </script>
    ";
    exit;
}

$sql = "SELECT * FROM user_info where contact_number = '$contact_number'";
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
	$insert_stmt = "INSERT INTO `user_info`(`username`,`first_name`,`middle_name`,`last_name`,`birthdate`,
        `birth_place`,`contact_number`,`gender`,`height`,`weight`,`blood_type`,`residential_address`,`residential_zip`,`residential_tel_no`,
        `permanent_address`,`permanent_zip`,`permanent_tel_no`,`citizenship`,`religion`,`civil_status`,`sss_no`,`tin`,`philhealth_no`,`pagibig_id_no`)
     VALUES ('$username', '$first_name','$middle_name','$last_name','$birthdate','$birth_place','$contact_number','$gender','$height','$weight','$blood_type','$residential_address',
     '$residential_zip','$residential_tel_no','$permanent_address','$permanent_zip','$permanent_tel_no','$citizenship','$religion','$civil_status',
     '$sss_no','$tin','$philhealth_no','$pagibig_id_no');";
	if($connect->query($insert_stmt) === true){
		echo "
			<script>
				alert('Registration Successful);
				window.location.replace('/');
			</script>
		";
	} else {
		echo "Error: <br>" . $connect->error;
	}
} else {
	echo "Error: <br>" . $connect->error;
}
Disconnect($connect);
?>
