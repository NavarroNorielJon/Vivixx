<?php
include '../Utilities/db.php';
$connect = Connect();
$username = $_POST["username"];
echo $username;
    if(isset($_POST["enable"])){
    	$update = "UPDATE mis.user SET status='enabled' WHERE username='$username'";
    }else{
    	$update ="UPDATE mis.user SET status='disabled' WHERE username='$username'";
    }
$result = $connect->query($update);
echo $result;
header("Location: accounts_status.php");
