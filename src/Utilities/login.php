<?php
include "db.php";

$connect = Connect();
if(isset($_POST["username"]) && isset($_POST["password"])){
    $username = mysqli_real_escape_string($connect, $_POST["username"]);
    $password = mysqli_real_escape_string($connect, $_POST["password"]);
    
    $stmt = "SELECT username FROM user WHERE username = '$username'";
    $results = mysqli_query($connect, $stmt);
    $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
    $count = mysqli_num_rows($row);
    $userCheck = $row['username'];
    
    if($count == 1) {
        if($username != $userCheck){
            echo "No user";
        }else
            echo "Hi $username";
    }else
        echo "hello";
}
	 
?>