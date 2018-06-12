<script src='../script/jquery.min.js'></script>
<?php
include '../utilities/session.php';
$connect = Connect();
$username = $_POST["username"];
$sql = "SELECT * FROM mis.user_info;";
$result = $connect->query($sql);
header("Location: accounts_status.php");
