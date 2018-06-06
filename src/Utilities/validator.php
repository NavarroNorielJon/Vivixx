<?php
include 'db.php';
$connect = Connect();

$type = $_REQUEST['type'];

switch ($type){
	case "email":
		$email = $_REQUEST["email"];
		if(!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zAZ0-9.-]+\.[A-Za-z]{2,}$/"), $email){
			echo "<span class='invalid'>Invalid Email</span>";
		}
	case "username":
		$username = $_REQUEST["username"];
		$stmt = "SELECT * FROM user where username = '$username';";
		$result = mysqli_query($connect,$stmt);
		if($result->num_rows > 0){
			echo "<span class='invalid'>Username already exist</span>";
		}
}
?>