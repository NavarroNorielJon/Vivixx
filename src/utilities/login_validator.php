<?php
include 'db.php';
$connect = Connect();

$type = $_REQUEST['type'];

switch ($type){
	case "userOrEmail":
		$userOrEmail = mysqli_real_escape_string($connect,$_REQUEST["userOrEmail"]);
		$stmt = "SELECT * FROM user where email = '$userOrEmail' or username='$userOrEmail';";
		$result = mysqli_query($connect, $stmt);
		if(!$result->num_rows > 0){
			echo "<span class='invalid'>User does not exists</span>";
		}
		break;
	case "password":
		$password = mysqli_real_escape_string($connect,$_REQUEST["password"]);
		$userOrEmail = mysqli_real_escape_string($connect,$_REQUEST["userOrEmail"]);
		$stmt = "SELECT password FROM user where email = '$userOrEmail' or username='$userOrEmail';";
		$results = mysqli_query($connect, $stmt);
        $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
        $passwordVerify = $row['password'];
		if(password_verify($password, $passwordVerify)){
		} else {
			echo "<span class='invalid'>Invalid password</span>";
		}
		break;
}
?>
