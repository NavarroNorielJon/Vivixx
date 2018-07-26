<?php
    include '../../utilities/session.php';
    error_reporting(0);
    $connect = Connect();
    $announcement_id = $_GET["announcement_id"];
    $delete = "DELETE FROM `mis`.`announcement` WHERE `announcement_id`='$announcement_id';";
    $result = $connect->query($delete);
    header("location: announcement.php");