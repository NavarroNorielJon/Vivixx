<?php
include 'db.php';
$connect = Connect();

$type = $_REQUEST['type'];

switch ($type){
	case "userOrEmail":
		$userOrEmail = $_REQUEST["userOrEmail"];
		$stmt = "SELECT * FROM user where email = '$userOrEmail' or username='$userOrEmail';";
		$result = mysqli_query($connect, $stmt);
		if(!$result->num_rows > 0){
			echo "<span class='invalid'>Invalid Email or Username</span>";
		} else {
			echo "<span class='valid'>Valid</span>";
		}
		break;
	case "password":
		$password = $_REQUEST["password"];
		$userOrEmail = $_REQUEST["userOrEmail"];
		$stmt = "SELECT password FROM user where email = '$userOrEmail' or username='$userOrEmail';";
		$results = mysqli_query($connect, $stmt);
        $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
        $passwordVerify = $row['password'];
		if($password == $userOrEmail){
			echo "<span class='valid'>Valid password</span>";
		} else {
			echo "<span class='invalid'>Invalid password</span>";
		}
		break;		
}
?>