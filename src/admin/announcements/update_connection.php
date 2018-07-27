<?php
include '../utilities/session.php';
error_reporting(0);
$connect = Connect();
$announcement_id = mysqli_real_escape_string($connect,$_GET["id"]);
    if($_GET["connection"] === 'pause'){
        $connection = "UPDATE `announcement` SET `connection`='resume' WHERE `announcement_id`='$announcement_id'";
    }else{
        $connection = "UPDATE `announcement` SET `connection`='pause' WHERE `announcement_id`='$announcement_id'";
    }
    $connect->query($connection);

