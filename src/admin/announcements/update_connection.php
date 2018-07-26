<?php
include '../utilities/session.php';
$connect = Connect();
$announcement_id = mysqli_real_escape_string($connect,$_GET["id"]);
    if(isset($_GET["resume"])){
        $connection = "UPDATE `announcement` SET `connection`='resume' WHERE `announcement_id`='$announcement_id'";
    }else{
        $connection = "UPDATE `announcement` SET `connection`='pause' WHERE `announcement_id`='$announcement_id'";       
    }
    $connect->query($connection);
    print_r($connection);
header("location: announcement.php");