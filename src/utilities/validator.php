<?php
include 'db.php';
$connect = Connect();

$email = mysqli_real_escape_string($connect,$_REQUEST["email"]);
$stmt = "SELECT * FROM user where email = '$email';";
$result = mysqli_query($connect, $stmt);
if($result->num_rows > 0){
	echo "1";
} else {
	echo "0";
}
