<?php
    include '../../utilities/session.php';
    $connect = Connect();
    $announcement_id = $_GET["announcement_id"];
    $delete = "DELETE FROM `mis`.`announcement` WHERE `announcement_id`='$announcement_id';";
    $result = $connect->query($delete);
    header("location: announcement.php");