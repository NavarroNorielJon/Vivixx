<?php
include '../utilities/session.php';
error_reporting(0);
$connect = Connect();
$announcement_id = mysqli_real_escape_string($connect,$_GET["id"]);
<<<<<<< HEAD
    if($_GET["connection"] === 'pause'){
        $connection = "UPDATE `announcement` SET `connection`='resume' WHERE `announcement_id`='$announcement_id'";
    }else{
        $connection = "UPDATE `announcement` SET `connection`='pause' WHERE `announcement_id`='$announcement_id'";     
    }
    $connect->query($connection);
//header("location: announcement.php");
=======
    if(isset($_GET["connection"])){
        $connection = "UPDATE `announcement` SET `connection`='resume' WHERE `announcement_id`='$announcement_id'";
    }else{
        $connection = "UPDATE `announcement` SET `connection`='pause' WHERE `announcement_id`='$announcement_id'";
    }
    $connect->query($connection);
    print_r($connection);
header("location: announcement.php");
>>>>>>> ca979666e50a6aea81ffddb3246c4aca7653a99f
