<script src='../script/jquery.min.js'></script>
<?php
include '../Utilities/db.php';
$connect = Connect();
$username = $_POST["username"];
    if(isset($_POST["enable"])){
    	$update = "UPDATE mis.user SET status='enabled' WHERE username='$username'";

    }else{
    	$update ="UPDATE mis.user SET status='disabled' WHERE username='$username'";
    }
$result = $connect->query($update);
header("Location: accounts_status.php");
