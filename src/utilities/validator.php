<?php
include 'db.php';
$connect = Connect();

$type = $_REQUEST['type'];

switch ($type){
	case "email":
		$email = $_REQUEST["email"];
		$stmt = "SELECT * FROM user where email = '$email';";
		$result = mysqli_query($connect, $stmt);
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			echo "<span class='invalid'>Invalid Email</span>";
		} else if($result->num_rows > 0){
			echo "<span class='invalid'>Email already exist</span>";
		} else if(empty($email)){
			echo "<span class='invalid'>Required</span>";
		}
		break;
	case "username":
		$username = $_REQUEST["username"];
		$stmt = "SELECT * FROM user where username = '$username';";
		$result = mysqli_query($connect,$stmt);
		if($result->num_rows > 0){
			echo "<span class='invalid'>Username already exist</span>";
		} else if(!$result->num_rows > 0 && strlen($username) > 5 ) {
			echo "<span class='valid'>Username available</span>";
		}
		break;
	case "contact_number":
		$contact_number = $_REQUEST["contact_number"];
		$stmt = "SELECT * FROM user_info where contact_number = '$contact_number';";
		$result = mysqli_query($connect,$stmt);
		if(!preg_match("/^09[0-9]{9}$/",$contact_number)){
			echo "<span class='invalid'>Invalid Contact Number</span>";
		} else if($result->num_rows > 0){
			echo "<span class='invalid'>Contact Number already exist</span>";
		}
		break;
	case "password":
		$password = $_REQUEST["password"];
		if(strlen($password) < 8 ){
			echo "<span id='weak'>weak eight(8) characters minimum</span>";
		} else if(strlen($password) >= 8 && strlen($password) <= 10){
			echo "<span id='good'>good</span>";
		} else if(strlen($password) >= 10 && strlen($password) <= 13){
			echo "<span id='average'>average</span>";
		} else if(strlen($password) >= 14 && strlen($password) <= 16){
			echo "<span id='strong'>strong</span>";
		} else if(strlen($password) <= 8 || strlen($password) >= 16){
			echo "<span class='invalid'>Password length must be 8 characters minimum and 16 characters maximum</span>";
		}
		break;
	case "confirm_password":
		$confirm = $_REQUEST["confirm_password"];
		$password = $_REQUEST["password"];
		if ($password !== $confirm) {
			echo "<span class='invalid'>Password doesn't match</span>";
		} else {
			echo "<span class='valid'>Password matches</span>";
		}
		break;

}
?>
