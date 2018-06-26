<?php
include 'db.php';
$connect = Connect();

$type = $_REQUEST['type'];

switch ($type){
	case "email":
		$email = mysqli_real_escape_string($connect,$_REQUEST["email"]);
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
	case "contact_number":
		$contact_number = mysqli_real_escape_string($connect,$_REQUEST["contact_number"]);
		$stmt = "SELECT * FROM user_info where contact_number = '$contact_number';";
		$result = mysqli_query($connect,$stmt);
		if(!preg_match("/^09[0-9]{9}$/",$contact_number)){
			echo "<span class='invalid'>Invalid Contact Number</span>";
		} else if($result->num_rows > 0){
			echo "<span class='invalid'>Contact Number already exist</span>";
		}
		break;
	case "password":
		$password = mysqli_real_escape_string($connect, $_REQUEST["password"]);
		if(strlen($password) < 8 ){
			echo "<span class='invalid'>weak eight(8) characters minimum</span>";
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
		$confirm = mysqli_real_escape_string($connect, $_REQUEST["confirm_password"]);
		$password = mysqli_real_escape_string($connect, $_REQUEST["password"]);
		if ($password !== $confirm) {
			echo "<span class='invalid'>Password doesn't match</span>";
		} else {
			echo "<span class='valid'>Password matches</span>";
		}
		break;
	case "userOrEmail":
		$userOrEmail = mysqli_real_escape_string($connect,$_REQUEST["userOrEmail"]);
		$stmt = "SELECT * FROM user where email = '$userOrEmail' or username='$userOrEmail';";
		$result = mysqli_query($connect, $stmt);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		if($userOrEmail !== $row['username'] && $userOrEmail !== $row['email']){
			echo "<span class='invalid'>User does not exists</span>";
		}
		break;
}
?>
